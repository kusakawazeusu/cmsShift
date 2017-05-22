<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;

class shiftdw extends Controller
{
    public function getdata($classid,$page,$num,$field,$keyword)
    {
        $offset = $num * $page;
        
        if($keyword != 'all')
        {
            $search = '%'.$keyword.'%';
        }
        else
        {
            $search = '%';
        }
        
        $count = DB::table('MemberCashlessTrans')
                     ->where('SessionNo',$classid)
                     ->where($field,'like',$search)->count();

        $drop = DB::table('MemberCashlessTrans')->where('SessionNo',$classid)
                                    ->where($field,'like',$search)
                                    ->select('TransNo','Location','SessionNo','TransTime','TransType','Amount','NewBalance')
                                    ->orderby('TransNo')
                                    ->offset($offset)
                                    ->limit($num)
                                    ->get();

        $drop['count'] = $count;

        return Response::json($drop);
    }

    public function showDW( $date )
    {
        return view('shiftdw',['date'=>$date]);
    }
}
