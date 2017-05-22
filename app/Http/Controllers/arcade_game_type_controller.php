<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use App\models\arcade_game_type;
use App\models\arcade_game_type_group;

class arcade_game_type_controller extends Controller {

	public function index()
	{
	    $post = arcade_game_type::all();
	    $GameTypeGroupOptions = arcade_game_type_group::all();
	    $GameTypeGroupName = array();
	    foreach ($post as $GameRecord) {
			$GameTypeGroupName[$GameRecord->GroupId] = 
			arcade_game_type_group::where('id', '=', $GameRecord->GroupId)->get()[0]->Description;
	    }
	    return View::make('arcade_view.arcade_game_type')
        	->with('title', '遊戲類別')
        	->with('GameTypeGroupOptions', $GameTypeGroupOptions)
        	->with('GameTypeGroupName', $GameTypeGroupName)
        	->with('posts', $post);
	}

	public function store()
	{
	    $input = Input::all();

		$post = new arcade_game_type;
	    $post->GameID = $input['GameID'];
	    $post->GameDesc = $input['GameDesc'];
	    $post->GroupId = $input['GroupId'];
	    $post->RewardPoint = $input['RewardPoint'];
	    $post->RewardRate = $input['RewardRate'];
	    $post->save();
	    return Redirect::to('arcade_game_type');
	}

	public function edit(Request $request)
	{
		arcade_game_type::where('id', $request->get('id'))
			->update(array(
	    		'GameID' => $request->get('GameID'),
	    		'GameDesc' => $request->get('GameDesc'),
	    		'GroupId' => $request->get('GroupId'),
	    		'RewardPoint' => $request->get('RewardPoint'),
	    		'RewardRate' => $request->get('RewardRate')
			));
	    return Redirect::to('arcade_game_type');
	}

	public function delete(Request $request)
	{
		arcade_game_type::where('id', $request->get('id'))->delete();
	    return Redirect::to('arcade_game_type');
	}
}