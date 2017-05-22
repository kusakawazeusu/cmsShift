<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\member_model;
use App\Models\member_account_model;
use App\Models\member_play_record_model;
use App\Models\member_bet_log_model;
use App\Models\member_bonus_model;

use App\Utilities\DateLib;

use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;


class member_bonus_controller extends Controller {
    public function __construct()
    {
        //$this->middleware('auth');
    }

    protected function requestBonusTransList()
    {
        $memberNo = Input::get('id');

        //$transList = member_bonus_model::where('MemberNo', '=', $memberNo)->get();
        $user = member_model::where('MemberNo', '=', $memberNo)->get();

        return view('member_bonus_trans_list', 
                                    ['transList'=> null,
                                     'location' => "All",
                                     'timeFrom' => "T00:00",
                                     'timeTo' => "T00:00",
                                     'point_type' => 'XTraCredit',
                                     'user' => $user[0]]);
        //print_r($transList);
    }

    private function GetBehaviorString($behaviorCode)
    {
        switch($behaviorCode)
        {
            case 0:
                return "added";
            case 1:
                return 'substracted';
            case 2:
                return 'earned';
            case 3:
                return 'used';
            case 4:
                return 'expired';
        }
    }

    private function GetBehaviorCode($behaviorStr)
    {
        for($i = 0; $i < 5; ++$i)
            if($this->GetBehaviorString($i) == $behaviorStr)
                return $i;
        return 0;
    }

    private function GetPointType($pointType)
    {
        switch($pointType)
        {
            case 'XTraCredit':
                return 1;
            case 'RewardCredit':
                return 0;
        }
        return 0;
    }

    protected function query($memberNo, $pointType, $location, $timeFrom, $timeTo)
    {
        $tFromSplit = explode('T', $timeFrom);
        $tToSplit = explode('T', $timeTo);

        $transListResult = member_bonus_model::where('MemberNo', '=', $memberNo)->
                                                      where('TransTime', '>=', ($tFromSplit[0] . ' ' . $tFromSplit[1]))->
                                                      where('TransTime', '<=', ($tToSplit[0] . ' ' . $tToSplit[1]))->
                                                      where('PointType', '=', $this->GetPointType($pointType))->get();  

        $user = member_model::where('MemberNo', '=', $memberNo)->get();

        $account = member_account_model::where('MemberNo', '=', $memberNo)->get();

        $curXTraCredit = 0;
        $curRewardPoint = 0;

        $behaviorStr = array();
        for($i = 0; $i < 5; ++$i)
            $behaviorStr[$i] = $this->GetBehaviorString($i);

        return view('member_bonus_trans_list', 
                                    ['transList'=> $transListResult,
                                     'location' => $location,
                                     'timeFrom' => $timeFrom,
                                     'timeTo' => $timeTo,
                                     'point_type' => $pointType,
                                     'behaviorTable' => $behaviorStr,
                                     'user' => $user[0]]);                                                            
    }

    public function queryBonusTransList()
    {
        $timeFrom = Input::get('time_select_from');
        $timeTo = Input::get('time_select_to');
        return $this->query(Input::get('id'), Input::get('point_type'), Input::get('location'), $timeFrom, $timeTo);
    }    

    public function requestBonusUpdate()
    {
        return view('member_bonus_update', ['id'=> Input::get('id'), 'curXTraCredit' => 0, 'curRewardPoint' => 0]);
    }

    public function updateBonus()
    {
        $memberNo = Input::get('id');
        $behavior = (Input::get('behavior') == "增加" ? 0 : 1);
        $pointType = Input::get('point_type');
        $expireDate = Input::get('expire_date');
        $value = Input::get('newValue');

        $user = member_model::where('MemberNo', '=', $memberNo)->get();

        member_bonus_model::create(['MemberNo' => $memberNo,
                                   'SectionNo' => $user[0]->SectionNo,
                                   'Point' => $value,
                                   'PointType' => $this->GetPointType($pointType),
                                   'Behavior' => $behavior,
                                   'Place' => 'Workstation',
                                   'ExpireDate' => ($expireDate == "" ? null : $expireDate)
                                  ]);

        //echo 'OK';
        return Redirect::to('member_bonus_update')->withInput()->with(['success'=>"紅利資訊修改成功！"]);
        //echo 'Member Id = ' . Input::get('id') . ' behavior = ' . Input::get('behavior') . ' point type = ' . Input::get('point_type');
    }
}