<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\member_model;
use App\Models\member_card_model;
use App\Models\member_rank_model;
use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;

class member_profile_controller extends Controller {
    public function __construct()
    {
        //$this->middleware('auth');
    } 

    public function showProfile() 
    {
        if(!member_auth_controller::checkAuth())
            return;
        $id = Input::get('id');
        $fecthData = member_model::where('MemberNo', '=', array($id))->get();
        $cards = member_card_model::where('MemberNo', '=', array($id))->get();
        $rankName = member_rank_model::where('RankNo', '=', $fecthData[0]->Rank)->get()[0];
        
        return view('member_profile', ['user'=> $fecthData[0], 
                                       'cards'=>$cards, 
                                       'rank'=>$rankName->RankName,
                                       'pageStatus' => Input::get('success')]);
    }    

    public function edit()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $id = Input::get('id');

        //判斷是不是經由Redirect返回的頁面
        if($id == null)
          $id = Input::old('id');
        $fecthData = member_model::where('MemberNo', '=', array($id))->get();
        $rankName = member_rank_model::where('RankNo', '=', $fecthData[0]->Rank)->get()[0];
        return view('member_edit', ['user'=>$fecthData[0], 'rank'=>$rankName->RankName]);
    }

    public function update()
    {
        if(!member_auth_controller::checkAuth())
            return;


        $password = Input::get('password');
        $pass_again = Input::get('password_again');
        if($password != '' && $password != $pass_again)
            return Redirect::to('member_edit')->withInput()->withErrors(['password_again'=>"修改密碼請確認兩次密碼皆相同"]);
        $id = Input::get('id');
        $email = Input::get('email');
        $address = Input::get('address');
        $cellphone = Input::get('cellphone');
        $telephone = Input::get('telephone');
        $birthday = Input::get('birthday');
        $memberStatus = 1;
        switch(Input::get('status_select'))
        {
            case "Active":
            $memberStatus = 1;
            break;
            case "Freezen":
            $memberStatus = 0;
            break;
            case 'Abandon':
            $memberStatus = 2;
            break;
            case 'Un-Abandon':
            $memberStatus = 3;
            break;
        }

        $rank = member_rank_model::where('RankName', '=', Input::get('rank'))->get()[0]->RankNo;

        $result = (member_model::where('MemberNo', '=', $id)->update(
            [
             'Password'=>$password, 
             'Email'=>$email, 
             'Address'=>$address, 
             'CellPhone'=>$cellphone, 
             'TelePhone'=> $telephone,
             'XCEnable'=> Input::get('XCEnable') == "是" ? 1 : 0,
             'RPEnable'=>Input::get('RPEnable') == "是" ? 1 : 0,
             'Rank' => $rank,
             'MemberStatus' => $memberStatus,
            ])) != null;

        $changePwd = true;
        if($password != '')
            $changePwd = member_model::find($id)->update(['password'=>$password]);
        //echo ($result || $changePwd) ? '更新會員資料成功!' : '更新失敗';
        //Session::push('status', 1);
        return Redirect::to('member_edit')->withInput()->withErrors(['success'=>($result && $changePwd)]);;
    }
}