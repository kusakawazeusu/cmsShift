<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\member_model;
use App\Models\member_card_model;
use App\Models\member_rank_model;

// = =
use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;

abstract class member_query_type
{
    const no_condition = 0;
    const by_multi_column = 1;
    const by_specified_column = 2;
    const by_card_no = 3;
}

class members_controller extends Controller 
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

	protected function register()
    {
        if(!member_auth_controller::checkAuth())
            return;

        $data = Input::all();
        $rules = array(
            'password' => 'required|min:4|max:4',
             );
        $validator = Validator::make($data, $rules);

        //檢查條件
        if ($validator->fails())
           return Redirect::to('member_register')->withInput(Input::except('password'))->withErrors($validator);

        //避免重複註冊
        if(sizeof(member_model::where('MemberID', '=', Input::get('userid'))->get()) != 0)
        	return Redirect::to('member_register')->withInput()->withErrors(['userid'=>"此身份證字號已經註冊過會員"]);

        $rank = member_rank_model::where('RankName', '=', Input::get('rank'))->get()[0]->RankNo;

        $data = (['MemberName'=>Input::get('username'), 
                                'MemberID'=>Input::get('userid'), 
                                'Birthday'=>Input::get('userbirth'), 
                                'Address'=>Input::get('address'), 
                                'CellPhone'=>Input::get('cellphone'), 
                                'TelePhone'=>Input::get('telephone'), 
                                'Memo'=>Input::get('memo'), 
                                'Password'=>Input::get('password'),
                                'Email'=>Input::get('email'),
                                'Rank'=>$rank,
                                'XCEnable'=> Input::get('XCEnable') == "是" ? 1 : 0,
                                'RPEnable'=>Input::get('RPEnable') == "是" ? 1 : 0]);
        //建立新會員
        $user = member_model::create($data);
        
        $data['MemberNo'] = member_model::where('MemberID', '=', Input::get('userid'))->select('MemberNo')->get()[0]->MemberNo;

        member_log_controller::memberLogHelper(member_log_type::MEMBER_TRANS_LOG, $data);

        //建立結果
        $result = ($user != null);
        Session::flash('status', $result);
        //echo Input::get('userbirth');
        return view('member_register', array(['status'=>$result]));
    }

    protected function requestRegister()
    {        
        if(!member_auth_controller::checkAuth())
            return;
        return view('member_register');
    }

    protected function query($queryType, $byWhat, $searchInfo, $pagingSize, &$page)
    {
        $result = null;
        switch($queryType)
        {
            case member_query_type::no_condition:
                $result = member_model::where('MemberNo', '>=', '0')->orderBy('AffiliationTime', 'desc');
                break;
            case member_query_type::by_multi_column:
                $result = member_model::where('MemberName', '=', $searchInfo)->orWhere('MemberID', '=', $searchInfo)->orderBy('AffiliationTime', 'desc');
                break;
            case member_query_type::by_specified_column:
                $result = member_model::where($byWhat, '=',  $searchInfo)->orderBy('AffiliationTime', 'desc');
                break;
            case member_query_type::by_card_no:
            {
                $cardResult = member_card_model::where('CardSeqNo', '=', $searchInfo)->get();
                if(sizeof($cardResult) > 0)
                    $result = member_model::where('MemberNo', '=', $cardResult[0]->MemberNo);
                else
                    return null;
                break;
            }
        }

        if($pagingSize != "All")
        {
            $ret = $result->limit($pagingSize)->offset(($page - 1) * $pagingSize)->get();

            //no matter
            if(sizeof($ret) == 0)
            {
                $page = ($page == 1 ? 1 : $page - 1);
                $ret = $result->limit($pagingSize)->offset(($page - 1) * $pagingSize)->get();
            }
        }
        else
            return $result->get();
        return $ret;
    }

    private function GetDropDownInfo()
    {
        switch(Input::get('searchBy'))
        {
            case '編號':
                return 'MemberNo';
            case '姓名':
                return 'MemberName';
            case '行動電話':
                return 'CellPhone';
            case '卡號':
                return 'CardSeqNo';
            case '身份證字號':
                return 'MemberID';
        }
        return 'MemberNo';
    }

    protected function searchMember()
    {        
        if(!member_auth_controller::checkAuth())
            return;
        $pagingSize = 10;      
        
        //判斷要查詢的筆數
        if(Input::get('pagingSize'))
            $pagingSize = Input::get('pagingSize');
        $page = 1;

        //判斷是不是經由上一頁或下一頁來get
        if(Input::get('pageIndex'))
            $page = Input::get('pageIndex');

        $searchType = member_query_type::no_condition;
        $byWhat = Input::get('byWhat');
        $searchInfo = Input::get('inputInfo');
        $action = "member_search";
        $method = "POST";

        if($byWhat == "byDropDown")
        {
            $byWhat = $this->GetDropDownInfo();
            if($byWhat == 'CardSeqNo')
                $searchType = member_query_type::by_card_no;
            else
                $searchType = member_query_type::by_specified_column;
        }
        else if($byWhat != null && $byWhat != "")
            $searchType = member_query_type::by_specified_column;
        else if(!(Input::get('byWhat')))
        {
            $action = "member_list";
            $method = "GET";
        }

        $users = $this->query($searchType, $byWhat, $searchInfo, $pagingSize, $page);
        $cards = array();
        if(sizeof($users) > 0)
        {
            foreach($users as $user)
                $cards[$user->MemberNo] = member_card_model::where('MemberNo', '=', $user->MemberNo)->get();
        }
        return view('member_list', 
            ['users'=>$users, 
             'pageIndex' =>$page, //當前頁數
             'action' => $action, //換頁是直接member_list還是member_search?
             'method'=> $method, //member_list用Get，反之用POST
             'cards'=> $cards, 
             'pagingSize'=> $pagingSize, //分頁大小
             'byWhat'=> $byWhat, //member_search的搜尋依據
             'searchInfo'=> $searchInfo //搜尋資訊
            ]); 
    }

    protected function deleteMember()
    {        
        if(!member_auth_controller::checkAuth())
            return;
        $user = member_model::where('MemberNo', '=', Input::get('deleteId'));
        if($user != null)
        {
            member_card_controller::removeCardFromMember(Input::get('deleteId'));
            $user->forceDelete();
        }
        return $this->searchMember();
    }
}