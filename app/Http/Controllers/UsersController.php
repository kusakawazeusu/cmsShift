<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
    	$users = [
			'0' => [
				'first_name' => 'Yeh',
				'last_name' => 'Jinyee',
				'location' => 'Taipei'
			],
			'1' => [
				'first_name' => 'Chang',
				'last_name' => 'Jiwcheng',
				'location' => 'Huiwan'
			]
		];
		return view('admin.users.index',compact('users'));
    }

    public function create()
    {
    	return view('admin.users.create');
    }
    public function store(Request $request)
    {
    	User::create($request->all());
		return "<a href='../public'>點我進入返回</a>";

    }
}
