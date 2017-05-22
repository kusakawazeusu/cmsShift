<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\models\arcade;
use App\models\arcade_denom_type;
use App\models\arcade_game_type;

class arcade_controller extends Controller {

	public function index()
	{
	    $post = arcade::all();
		$DenomCodetable=arcade_denom_type::all();
		$GameTypetable=arcade_game_type::all();
		$GameTypeName = array();
		$DenomTypeValue = array();
		foreach ($post as $machineRecord) {
			$GameTypeName[$machineRecord->GameType] = 
			arcade_game_type::where('GameID', '=', $machineRecord->GameType)->get()[0]->GameDesc;
			
			$DenomTypeValue[$machineRecord->DenomCode] = 
			arcade_denom_type::where('id', '=', $machineRecord->DenomCode)->get()[0]->DenomValue;

		}
	    return View::make('arcade_view.arcade')
        	->with('title', '機台列表')
    		->with('GameTypeOptions', $GameTypetable)
    		->with('DenomCodeOptions', $DenomCodetable)
    		->with('GameTypeName', $GameTypeName)
    		->with('DenomTypeValue', $DenomTypeValue)
        	->with('posts', $post);
	}

	public function store()
	{
	    $input = Input::all();

		$post = new Arcade;
	    $post->MNum = $input['MNum'];
	    $post->IPAddress = $input['IPAddress'];
	    $post->SerialNum = $input['SerialNum'];
	    $post->Location = $input['SectionName'].$input['BankNo'].$input['SeqNo'];
	    $post->SectionName = $input['SectionName'];
	    $post->BankNo = $input['BankNo'];
	    $post->SeqNo = $input['SeqNo'];
	    $post->GameType = $input['GameType'];
	    $post->DenomCode = $input['DenomCode'];
	    $post->PayTable = $input['PayTable'];
	    $post->Status = $input['Status'];
	    $post->save();
	    return Redirect::to('arcade');
	}

	public function edit(Request $request)
	{
		arcade::where('id', $request->get('id'))
			->update(array(
	    		'MNum' => $request->get('MNum'),
	    		'IPAddress' => $request->get('IPAddress'),
	    		'SerialNum' => $request->get('SerialNum'),
	    		'Location' => $request->get('SectionName').$request->get('BankNo').$request->get('SeqNo'),
	    		'SectionName' => $request->get('SectionName'),
	    		'BankNo' => $request->get('BankNo'),
	    		'SeqNo' => $request->get('SeqNo'),
	    		'GameType' => $request->get('GameType'),
	    		'DenomCode' => $request->get('DenomCode'),
	    		'PayTable' => $request->get('PayTable'),
	    		'Status' => $request->get('Status')
			));
	    return Redirect::to('arcade');
	}

	public function delete(Request $request)
	{
		arcade::where('id', $request->get('id'))->delete();
	    return Redirect::to('arcade');
	}
}