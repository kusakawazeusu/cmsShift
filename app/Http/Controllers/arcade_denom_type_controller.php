<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use App\models\arcade_denom_type;

class arcade_denom_type_controller extends Controller {

	public function index()
	{
	    $post = arcade_denom_type::all();
	    return View::make('arcade_view.arcade_denom_type')
        	->with('title', '面額類別')
        	->with('posts', $post);
	}

	public function store()
	{
	    $input = Input::all();

	    $post = new arcade_denom_type;
	    $post->DenomCode = $input['DenomCode'];
	    $post->DenomValue = $input['DenomValue'];
	    $post->save();
	    return Redirect::to('arcade_denom_type');
	}
	
	public function edit(Request $request)
	{
		arcade_denom_type::where('id', $request->get('id'))
			->update(array(
	    		'DenomCode' => $request->get('DenomCode'),
	    		'DenomValue' => $request->get('DenomValue')
			));
	    return Redirect::to('arcade_denom_type');
	}

	public function delete(Request $request)
	{
		arcade_denom_type::where('id', $request->get('id'))->delete();
	    return Redirect::to('arcade_denom_type');
	}
}