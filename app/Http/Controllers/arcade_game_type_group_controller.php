<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use App\models\arcade_game_type_group;

class arcade_game_type_group_controller extends Controller {

	public function index()
	{
	    $post = arcade_game_type_group::all();
	    return View::make('arcade_view.arcade_game_type_group')
        	->with('title', '遊戲類別族群')
        	->with('posts', $post);
	}

	public function store()
	{
	    $input = Input::all();

	    $post = new arcade_game_type_group;
	    $post->GroupID = $input['GroupID'];
	    $post->Description = $input['Description'];
	    $post->Rate = $input['Rate'];
	    $post->SubPointShareRate = $input['SubPointShareRate'];
	    $post->SubPointEnable = $input['SubPointEnable'];
	    $post->Memo = $input['Memo'];
	    $post->save();
	    return Redirect::to('arcade_game_type_group');
	}

	public function edit(Request $request)
	{
		arcade_game_type_group::where('id', $request->get('id'))
			->update(array(
	    		'GroupID' => $request->get('GroupID'),
	    		'Description' => $request->get('Description'),
	    		'Rate' => $request->get('Rate'),
	    		'SubPointShareRate' => $request->get('SubPointShareRate'),
	    		'SubPointEnable' => $request->get('SubPointEnable'),
	    		'Memo' => $request->get('Memo')
			));
	    return Redirect::to('arcade_game_type_group');
	}

	public function delete(Request $request)
	{
		arcade_game_type_group::where('id', $request->get('id'))->delete();
	    return Redirect::to('arcade_game_type_group');
	}
}