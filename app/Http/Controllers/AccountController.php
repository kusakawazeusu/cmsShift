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

class AccountController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAccount()
    {
        $accountResult = Account::where('MemberNo', '=', Input::get('id'))->get();
        print_r($accountResult);
        //echo Input::get('id');
    }
}