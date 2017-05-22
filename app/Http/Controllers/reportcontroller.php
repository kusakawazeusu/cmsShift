<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class reportcontroller extends Controller
{
    //
    public function Report_Show()
    {
    	$reports = Report::all();
    	return view('Report',['reports'=>$reports]);
    }

    public function Report_Add(Request $request)
    {

    }
    public function Report_Edit(Request $request)
    {

    }
    public function Report_Delete(Request $request)
    {

    }

}
