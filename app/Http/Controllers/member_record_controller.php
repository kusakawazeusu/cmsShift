<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\member_model;
use App\Models\member_play_record_model;
use App\Models\member_bet_log_model;

use App\Utilities\DateLib;

use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;


class member_record_controller extends Controller {
    public function __construct()
    {
        //$this->middleware('auth');
    } 

    public function query($memberNo, $location, $amountType, $timeTermType, $timeTermValue, $timeSelect, $timeDir)
    {
        $timeSplit = explode("-",$timeSelect);
        //echo 'Player Id = ' . $memberNo . ' Term Type = ' . $amountType . ' Term Unit = ' . $timeTermValue . ' Time = ' . $timeSelect . "<br>";
        $tDate = new DateLib($timeSplit[0], $timeSplit[1], $timeSplit[2]);

        $direction = ($timeDir == '後' ? 1 : -1);
        switch ($timeTermType) {
            case 'Year':
                $tDate = $tDate->Modify($timeTermValue * $direction, 0, 0, 0);
                break;
            case 'Month':
                $tDate = $tDate->Modify(0, $timeTermValue * $direction, 0, 0);
                break;
            case 'Day':
                $tDate = $tDate->Modify(0, 0, 0, $timeTermValue * $direction);
                break;
            default:
                break;
        }
        //echo $tDate->GetModifiedFullDate();
        $queryResult = member_play_record_model::where('MemberNo', '=', $memberNo)->
                                                 where('StartTime', '>=', $timeSelect . ' 00:00:00')->
                                                 where('StartTime', '<=', $tDate->GetModifiedFullDate())->get();

        $result = array();
        $result['initTime'] = '';
        $result['finishTime'] = '';
        $result['GameSec'] = 0;
        $result['Games'] = 0;
        $result['Jackpot'] = 0;
        $result['CoinIn'] = 0;
        $result['CoinOut'] = 0;
        $result['AverageBet'] = 0;
        $result['Win'] = 0;
        $result['XCEarned'] = 0;
        $result['XCUsed'] = 0;
        $result['RPointUsed'] = 0;
        $result['RPointEarned'] = 0;

        foreach ($queryResult as $record) {
            //echo $record->CoinOut . '<br>';
            if($result['initTime'] == '')
                $result['initTime'] = $record->StartTime;
            $result['finishTime'] = $record->EndTime;
            $result['GameSec'] += DateLib::SecondBetweenDays($record->EndTime, $record->StartTime);
            $result['Games'] += $record->Games;
            $result['Jackpot'] += $record->Jackpot;
            $result['CoinIn'] += $record->CoinIn;
            $result['CoinOut'] += $record->CoinOut;
            $result['AverageBet'] += $record->AverageBet;
            $result['Win'] += $record->Win;
            $result['XCEarned'] += $record->XCEarned;
            $result['XCUsed'] += $record->XCUsed;
            $result['RPointUsed'] += $record->RPointUsed;
            $result['RPointEarned'] += $record->RPointEarned;
        }

        if($amountType == "Average")
        {
            $result['Jackpot'] /= $result['Games'];
            $result['CoinIn'] /= $result['Games'];
            $result['CoinOut'] /= $result['Games'];
            $result['AverageBet'] /= $result['Games'];
            $result['Win'] /= $result['Games'];
            $result['XCEarned'] /= $result['Games'];
            $result['XCUsed'] /= $result['Games'];
            $result['RPointUsed'] /= $result['Games'];
            $result['RPointEarned'] /= $result['Games'];         
        }
        //echo 'Query Size = ' . sizeof($result);
        $user = member_model::where('MemberNo', '=', $memberNo)->get();
        return view('member_play_record', [
                                    'user'=> $user[0], 
                                    'rank'=>"XX",
                                    'location' => $location,
                                    'amount_type' => $amountType,
                                    'time_term_type' => $timeTermType,
                                    'time_term_value' => $timeTermValue,
                                    'time_select' => $timeSelect,
                                    'time_term_dir' => $timeDir,
                                    'result' => $result
                                    ]);        
    }

    public function queryBetLog($memberNo, $location, $timeFrom, $timeTo)
    {

        $tFromSplit = explode('T', $timeFrom);
        $tToSplit = explode('T', $timeTo);

        //echo ($tFromSplit[0] . ' ' . $tFromSplit[1]) . ' xxxx ' . ($tToSplit[0] . ' ' . $tToSplit[1]);
        $playRecordResult = member_play_record_model::where('MemberNo', '=', $memberNo)->
                                                      where('StartTime', '>=', ($tFromSplit[0] . ' ' . $tFromSplit[1]))->
                                                      where('StartTime', '<=', ($tToSplit[0] . ' ' . $tToSplit[1]))->get();

        $result = array();
        $result['initTime'] = '';
        $result['GameSec'] = 0;
        $result['Games'] = 0;
        $result['Jackpot'] = 0;
        $result['CoinIn'] = 0;
        $result['CoinOut'] = 0;
        $result['AverageBet'] = 0;
        $result['Win'] = 0;
        $result['XCEarned'] = 0;
        $result['XCUsed'] = 0;
        $result['RPointUsed'] = 0;
        $result['RPointEarned'] = 0;

        $betLog = member_bet_log_model::where('MemberNo', '=', $memberNo)
                                      ->where('StartTime', '>=', ($tFromSplit[0] . ' ' . $tFromSplit[1]))
                                      ->where('StartTime', '<=', ($tToSplit[0] . ' ' . $tToSplit[1]))->get();

        foreach ($betLog as $record) {
            $result['Games'] += $record->Games;
            $result['CoinIn'] += $record->CoinIn;
            $result['CoinOut'] += $record->CoinOut;
        }

        if($result['Games'] != 0)
        {
            $result['CoinIn'] /= $result['Games'];
            $result['CoinOut'] /= $result['Games'];     
        }

        //echo 'Query Size = ' . sizeof($result);
        $user = member_model::where('MemberNo', '=', $memberNo)->get();

        return view('member_bet_log', [
                                    'user'=> $user[0],
                                    'logs' => $betLog,
                                    'location' => $location,
                                    'timeFrom' => $timeFrom,
                                    'timeTo' => $timeTo,
                                    'result' => $result
                                    ]);        
    }

    public function getMemberPlayRecord()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $id = Input::get('id');

        $user = member_model::where('MemberNo', '=', $id)->get();
        return $this->query($id, 'All', 'Total', 'Year', '20', '2001-1-1', '後');
    }

    public function getBetLog()
    {
        if(!member_auth_controller::checkAuth())
            return;
        $id = Input::get('id');

        $user = member_model::where('MemberNo', '=', $id)->get();
        //$betLog = member_bet_log_model::where('MemberNo', '=', $id)->get();

        return view('member_bet_log', 
                                    ['logs'=> null,
                                     'location' => "All",
                                     'amount_type' => "Total",
                                     'time_term_type' => "Year",
                                     'time_term_value' => "20",
                                     'timeFrom' => "",
                                     'timeTo' => "",
                                     'time_term_dir' => "後",
                                     'user' => $user[0]]);
    }    

    public function queryMemberPlayRecord()
    {
        $location = Input::get('location');
        $amountType = Input::get('amount_type');
        $memberNo = Input::get('id');
        $timeTermType = Input::get('time_term_type');
        $timeTermValue = Input::get('time_term_value');
        $timeSelect = Input::get('time_select');
        $timeDir = Input::get('time_term_dir');
        return $this->query($memberNo, $location, $amountType, $timeTermType, $timeTermValue, $timeSelect, $timeDir);
    }

    public function queryMemberBetLog()
    {
        $timeFrom = Input::get('time_select_from');
        $timeTo = Input::get('time_select_to');
        //echo 'Id = ' . Input::get('id') . ' From = ' . $timeFrom . ' To = ' . $timeTo;
        return $this->queryBetLog(Input::get('id'), Input::get('location'), $timeFrom, $timeTo);
    }
}