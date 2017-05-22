<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Illuminate\Http\Request;
use Validator;

class ticketing_controller extends Controller {

	public function ticketing_validation()
	{
	    return View::make('ticketing_view.ticketing_validation');
	}
	
	public function ticketing_purchase()
	{
	    return View::make('ticketing_view.ticketing_purchase');
	}
	
	public function ticketing_void()
	{
	    return View::make('ticketing_view.ticketing_void');
	}
	
	public function ticketing_valid_pending()
	{
	    return View::make('ticketing_view.ticketing_valid_pending');
	}
	
	public function ticketing_tally()
	{
	    return View::make('ticketing_view.ticketing_tally');
	}
}