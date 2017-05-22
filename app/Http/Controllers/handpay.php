<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;

class handpay extends Controller
{
    public function showHandpay( $date )
    {
        return view('handpay',['date'=>$date]);
    }

    public function updatedata($id,$amount,$group,$level,$status,$overrideby)
    {
        DB::table('handpay')->where('SeqNo',$id)
                            ->update([
                               'Amount' => $amount,
                               'ProgressiveGroup' => $group,
                               'ProgressiveLevel' => $level,
                               'Status' => $status,
                               'OperatorID' => $overrideby,
                               'OperatorModifyTime' => date('Y-m-d H:i:s'),
                               'OverrideFlag' => 1
                            ]);
    }

    public function getdata($page, $num, $field, $keyword)
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
        
        $count = DB::table('Handpay')->where($field,'like',$search)->count();

        $drop = DB::table('Handpay')->where($field,'like',$search)
                                    ->select('SeqNo','MNum','Location','HandpayTime','OperatorModifyTime','Amount','Type','Status','ProgressiveGroup','ProgressiveLevel')
                                    ->orderby('HandpayTime','dsc')
                                    ->offset($offset)
                                    ->limit($num)
                                    ->get();

        $drop['count'] = $count;

        return Response::json($drop);
    }
}
