<?php

namespace App\Http\Controllers;

use Request;
use LRedis;
use App\models\arcade;

class machine_controller extends Controller
{
    public function index()
    {
    	$MachineStatues = array();

    	$MachineCounts = arcade::count();

    	for($machine = 1; $machine <= $MachineCounts; ++$machine){
    		$MachineStatues[$machine] = 
				arcade::where('id', '=', $machine)->orderby('BankNo')->orderby('SeqNo')->get()[0]->Status;
    	}

    	$MachineBankMax = arcade::max('BankNo');
    	$MachineSeqMax = arcade::max('SeqNo');

    	return view('machine.monitor')
    		->with('MachineCounts', $MachineCounts)
    		->with('MachineBankMax', $MachineBankMax)
    		->with('MachineSeqMax', $MachineSeqMax)
    		->with('MachineStatues', $MachineStatues);
    }

    //for socket
    public function socket()
	{
		return view('machine.socket');
	}
	public function writemessage()
	{
		return view('machine.writemessage');
	}
	public function sendMessage(){
		$redis = LRedis::connection();

		$redis->publish('message', Request::input('message'));
		return redirect('writemessage');
	}
}
