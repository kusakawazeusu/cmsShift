<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Database\Eloquent\Member;
use Illuminate\Database\Eloquent\Account;
use App\Http\Controllers\ProfileController;

use App\Models\member_model;
use App\Models\member_account_model;
use App\Models\member_bet_log_model;

// = =
use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;

class member_account_controller extends Controller 
{
    public function __construct()
    {
    }

    protected function requestAccount()
    {
    	//echo 'Member Id = ' . Input::get('id');
    	$memberNo = Input::get('id');
    	$account = member_account_model::where('MemberNo', '=', $memberNo)->get();
    	$user = member_model::where('MemberNo', '=', $memberNo)->get();

    	return view('member_account', ['user'=> $user[0],
    								   'account' => (sizeof($account) == 0 ? null : $account[0])]);
    }
}