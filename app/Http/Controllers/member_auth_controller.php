<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Database\Eloquent\Member;
use Illuminate\Database\Eloquent\Account;
use App\Http\Controllers\ProfileController;

// = =
use Input;
use Validator;
use Redirect;
use Auth;
use Session;
use DB;

class member_auth_controller extends Controller 
{
    public function __construct()
    {
    }

	public function login() 
	{
	    $data = Input::all();
	    $rules = array(
			'name' => 'required|min:6',
			'password' => 'required|min:6',
		    );
	    $validator = Validator::make($data, $rules);
	    if ($validator->fails())
	        return Redirect::to('/login')->withInput(Input::except('password'))->withErrors($validator);
	    else 
        {
	        $userdata = array(
			    'OperatorName' => Input::get('name'),
			    'password' => Input::get('password')
			);
	        if (Auth::attempt($userdata))
			{
				$now = date("Y-m-d H:i:s");
				
				$userid = Auth::user()->id;
				$class = DB::table('OperatorClass')
						 ->where('OperatorID',$userid)
						 ->where('OpenTime','<=',$now)
						 ->where('CloseTime','>=',$now)
						 ->value('ClassID');
				
				if( $class == null )
				{
					Session::flash('error', '錯誤，目前沒有你的班別。'); 
	            	return Redirect::to('login');
				}

				session(['ClassID'=>$class]);
				return Redirect::to('/index');
			}
	            
	        else 
	        {
	            Session::flash('error', '錯誤，請檢查帳號密碼。'); 
	            return Redirect::to('login');
	        }
	    }
	}

	public static function checkAuth()
	{
		return true;
	}

	public static function getAuthID()
	{
		return 0;
	}

	public static function getAuthName()
	{
		return "Wanger";
	}

	public static function getSessionID()
	{
		return 0;
	}
}