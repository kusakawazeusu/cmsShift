<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\member_model;
use App\Models\member_card_log_model;
use App\Models\member_log_model;
use App\Models\member_rank_model;

// = =
use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;

abstract class member_log_type
{
    const MEMBER_TRANS_LOG = 0;
    const MEMBER_CARD_TRANS_LOG = 1;
    const MEMBER_ACC_TRANS_LOG = 2;
    const MEMBER_BONUS_TRANS_LOG = 3;
}

class member_log_controller extends Controller 
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public static function memberLog($logData)
    {
        $logData['SessionNo'] = member_auth_controller::getSessionID();
        $logData['SectionNo'] = 'KK';
        $logData['OperatorID'] = member_auth_controller::getAuthID();
        member_log_model::create($logData);
    }

    public static function memberCardLog($logData)
    {
        $behavior = $logData['cardStatus'];
        member_card_log_model::create(['CardSeqNo' => $logData['CardSeqNo'],
                                         'MemberNo' => $logData['MemberNo'],
                                         'SectionNo' => 'KK',
                                         'SessionNo' => member_auth_controller::getSessionID(),
                                         'Behavior' => $behavior,
                                         'OperatorID' => member_auth_controller::getAuthID()]);
    }

    public static function getCardTransBehaviorStr($behaviorCode)
    {
        switch ($behaviorCode) {
            case 0:
                return 'The Membership Card Inactived';
                break;
            case 1:
                return 'The Membership Card Actived';
                break;
            case 2:
                return 'The Membership Card Isseued';
                break;
            default:
                break;
        }
    }

    public static function memberAccLog($logData)
    {

    }

    public static function memberBonusLog($logData)
    {

    }

    public static function memberLogHelper($logType, $logData)
    {
        switch($logType)
        {
            case member_log_type::MEMBER_TRANS_LOG:
                member_log_controller::memberLog($logData);
            break;
            case member_log_type::MEMBER_CARD_TRANS_LOG:
                member_log_controller::memberCardLog($logData);
            break;
            case member_log_type::MEMBER_ACC_TRANS_LOG:
                member_log_controller::memberAccLog($logData);
            break;
            case member_log_type::MEMBER_BONUS_TRANS_LOG:
                member_log_controller::memberBonusLog($logData);
            break;
        }
    }

    protected function requestCardTransList()
    {
        $id = Input::get('id');
        $transList = member_card_log_model::where('MemberNo', '=', $id)->get();
        $user = member_modeL::where('MemberNo', '=', $id)->get()[0];

        return view('member_card_trans_list', ['transList' => $transList, 'user' => $user]);
    }

    protected function requestMemberTransList()
    {
        $transList = member_log_model::all();
        return view('member_trans_list', ['transList' => $transList]);
    }
}