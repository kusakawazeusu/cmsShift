<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\member_model;
use App\Models\member_card_model;

use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;

class member_card_controller extends Controller {
    public function __construct()
    {
        //$this->middleware('auth');
    } 

    public function showMemberCardEdit()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $id = Input::get('id');

        //判斷是不是經由Redirect返回的頁面
        if($id == null)
          $id = Input::old('id');
        $fetchData = member_card_model::where('CardNo', '=', array($id))->get();
        $MemberName = "";
        if(sizeof($fetchData) > 0 && $fetchData[0]->MemberNo != null)
            $Member = member_model::where('MemberNo', '=', $fetchData[0]->MemberNo)->get()[0];
        else
            $Member = null;
        return view('member_card_edit', ['CardNo'=> $fetchData[0]->CardNo, 
                                         'CardSeqNo'=> $fetchData[0]->CardSeqNo, 
                                         'MemberName' => ($Member ? $Member->MemberName : ""), 
                                         'MemberID' => ($Member ? $Member->MemberID : ""),
                                         'cardStatus' => $fetchData[0]->CardStatus]);
    }

    public function edit()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $MemberName = Input::get('MemberName');
        $MemberID = Input::get('MemberID');
        $memberQueryResult = member_model::where('MemberName', '=', $MemberName)->where('MemberID', '=', $MemberID)->get();
        $cardStatus = (Input::get('cardStatus') == 'Active' ? 1 : 0);

        if(sizeof($memberQueryResult) == 0)
        {
            Session::flash('status', 0);
            return view('member_card_edit', ['CardNo'=>Input::get('CardNo'), 
                                             'CardSeqNo'=>Input::get('CardSeqNo'), 
                                             'MemberName'=>$MemberName, 
                                             'MemberID'=>$MemberID,
                                             'cardStatus' => $cardStatus]);
        }
        $MemberNo = $memberQueryResult[0]->MemberNo;

        member_card_model::where('CardNo', '=', Input::get('CardNo'))->update(['MemberNo'=>$MemberNo, 'CardStatus' => $cardStatus]);

        $data = (['CardNo'=>Input::get('CardNo'), 
                 'CardSeqNo'=>Input::get('CardSeqNo'), 
                 'MemberName' => $MemberName, 
                 'MemberID'=>$MemberID,
                 'cardStatus' => $cardStatus,
                 'MemberNo'=>$MemberNo]);

        member_log_controller::memberLogHelper(member_log_type::MEMBER_CARD_TRANS_LOG, $data);

        Session::flash('status', 1);
        return view('member_card_edit', $data);
    }

    public static function removeCardFromMember($memberNo)
    {
        member_card_model::where('MemberNo', '=', $memberNo)->update(['MemberNo'=> null]);
    }

    public function addCard()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $card = member_card_model::where('CardSeqNo', '=', Input::get('cardSeqNo'))->get();
        $memberNo = Input::get('MemberNo');

        if(sizeof($card) == 0)
            return Redirect::to('member_card_register')->withInput()->withErrors(['cardSeq'=>"無此會員卡，請重試。"]);
        else
        {
            if($card[0]->MemberNo != null)
            {
                return Redirect::to('member_card_register')->withInput()->withErrors(['cardSeq'=>"此卡片已經有人使用，請重試。"]);
            }
            member_card_model::where('CardSeqNo', '=', Input::get('cardSeqNo'))->update(['MemberNo'=> $memberNo]);

            //$userData = member_model::where('MemberNo', '=', Input::get('MemberNo'))->select('MemberNo', 'MemberName', 'MemberID')->get()[0];

            $data = (['CardSeqNo'=>Input::get('cardSeqNo'), 
                     'cardStatus' => 2,
                     'MemberNo'=> $memberNo]);

            member_log_controller::memberLogHelper(member_log_type::MEMBER_CARD_TRANS_LOG, $data);

            return Redirect::to('member_card_register')->withInput()->with(['success'=>"會員卡登錄成功！"]);
        }
    }

    protected function listAll()
    {
        if(!member_auth_controller::checkAuth())
            return;
        //每頁最多的資料數
        $pagingSize = 10;
        if(Input::get('pagingSize'))
            $pagingSize = Input::get('pagingSize');

        //初始化頁數
        $page = 1;

        //判斷是不是經由上一頁或下一頁來get
        if(Input::get('pageIndex'))
            $page = Input::get('pageIndex'); 

        if($pagingSize != "All")
        {
            //查詢，每$pageSize一組，每組差距為($page - 1) * $pageSize
            $cards =  member_card_model::orderBy('CardSeqNo', 'desc')->limit($pagingSize)->offset(($page - 1) * $pagingSize)->get();

            //如果新的一頁沒有資料，返回原本的頁面
            if(sizeof($cards) == 0)
            {
                $page = ($page == 1 ? 1 : $page - 1);
                $cards =  member_card_model::orderBy('CardSeqNo', 'desc')->limit($pagingSize)->offset(($page - 1) * $pagingSize)->get();
            }
        }
        else
            $cards = member_card_model::orderBy('CardSeqNo', 'desc')->get();

        $passData = array();
        foreach ($cards as $card) {
            $passData[$card->CardNo] = null;
            if($card->MemberNo != null)
            {
                $passData[$card->CardNo] = member_model::where('MemberNo', '=', $card->MemberNo)->select('MemberNo', 'MemberName')->get()[0];
            }
        }

        return view('member_card_list', 
            [
             'cards' => $cards, 
             'user' => $passData, 
             'action' => 'member_card_list', 
             'method' => 'get', 
             'pageIndex' => $page, 
             'pagingSize' => $pagingSize,
             'byWhat' => '',
             'searchInfo' => Input::get('name')
            ]);
    }

    private function GetDropDownInfo()
    {
        switch(Input::get('searchBy'))
        {
            case '卡號':
                return 'CardSeqNo';
            case '會員姓名':
                return 'MemberName';
        }
        return 'CardSeqNo';
    }

    public function search() 
    {
        if(!member_auth_controller::checkAuth())
            return;

        $byWhat = Input::get('byWhat');
        if($byWhat == 'byDropDown')
            $byWhat = $this->GetDropDownInfo();

        $fetchData = null;;
        if($byWhat == 'MemberName')
        {
            $user = member_model::where($byWhat, '=', Input::get('name'))->get();
            if(sizeof($user) > 0)
                $fetchData = member_card_model::where('MemberNo', '=', $user[0]->MemberNo);
        }
        else
            $fetchData = member_card_model::where('CardSeqNo', '=', Input::get('name'))->get();

        $passData = array();
        if($fetchData != null && sizeof($fetchData) > 0)
        {

            foreach ($fetchData as $data) {
                $passData[$data->CardNo] = null;
                if($data->MemberNo != null)
                    $passData[$data->CardNo] = member_model::where('MemberNo', '=', $data->MemberNo)->
                                                             orderBy('CardSeqNo', 'desc')->
                                                             select('MemberNo', 'MemberName')->get()[0];
            }
        }

        return view('member_card_list', 
            [
             'cards' => $fetchData,
             'user' => $passData, 
             'action' => 'member_card_search', 
             'method' => 'post', 
             'pageIndex' => 1, 
             'pagingSize' => 10,
             'byWhat' => Input::get('byWhat'),
             'searchInfo' => Input::get('name')
            ]);
    }

    public function requestAddCard()
    {
        if(!member_auth_controller::checkAuth())
            return;
        return view('member_card_add', ['MemberNo'=>Input::get('MemberNo')]); 
    }

    protected function memberCardDelete()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $card = member_card_model::Where('CardNo', '=', Input::get('deleteId'));
        $card->forceDelete();
        return $this->listAll();
    }

    protected function requestRegister()
    {
        return view('member_card_register');
    }

    protected function register()
    {
        //echo Input::get('newCardSeq');
        $newSeq = Input::get('newCardSeq');
        $check = member_card_model::where('CardSeqNo', '=', $newSeq)->get();

        if(sizeof($check) != 0)
            return Redirect::to('member_card_register')->
                             withInput()->
                             withErrors(['cardSeq'=>"此會員卡已經登錄於系統之中。"]);

        $createResult = member_card_model::create(['CardSeqNo'=> $newSeq]);

        //建立結果
        $result = ($createResult != null);
        Session::flash('status', $result);    
        return Redirect::to('member_card_register')->
                         withInput()->
                         with(['success'=>"會員卡登錄成功！"]);
    }
}