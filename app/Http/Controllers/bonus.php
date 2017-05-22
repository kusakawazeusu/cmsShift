<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
class bonus extends Controller
{
    public function showBonus( $date )
    {
        $checkExist = DB::table('PlayerSession')->where('SessionNo',Session('ClassID'))
                                                ->first();

        if( $checkExist == null)
        {
            $translist = DB::table('memberacctranslist')->where('SessionNo',Session('ClassID'))->get();

            $pointAdd = 0;
            $pointSub = 0;
            $xtraAdd = 0;
            $xtraSub = 0;

            for( $i=0;$i<count($translist);$i++ )
            {
                if( $translist[$i]->Behavior == 1 ) // 增加
                {
                    if( $translist[$i]->PointType == 0 ) // Reward point
                    {
                        $pointAdd += $translist[$i]
                    }
                    else if( $translist[$i]->PointType == 1 ) // XtraCredit point
                    {
                        
                    }
                }
                else if( $translist[$i]->Behavior == 2 ) // 減少
                {
                    if( $translist[$i]->PointType == 0 ) // Reward point
                    {
                        
                    }
                    else if( $translist[$i]->PointType == 1 ) // XtraCredit point
                    {
                        
                    }
                }
            }
        }
    }
}
