<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;

class metervariance extends Controller
{
    public function update($id,$games,$coinin,$coinout,$billin,$jackpot,$ticketin,$ticketout,$xtracredit,$cancelcredit,$progressive)
    {
        DB::table('Period')->where('id',$id)
                           ->update([
                                'MtrGames' => $games,
                                'MtrTotalCoinIn' => $coinin,
                                'MtrTotalCoinOut' => $coinout,
                                'MtrTotalBillIn' => $billin,
                                'MtrJackpot' => $jackpot,
                                'MtrTicketIn' => $ticketin,
                                'MtrTicketOut' => $ticketout,
                                'MtrXtraCredit' => $xtracredit,
                                'MtrCreditPay' => $cancelcredit,
                                'MtrProgressive' => $progressive
                           ]);
    }

    public function getPeriodData($date,$mnum)
    {
        $periodData = DB::table('Period')->where('Period',$date)
                                         ->where('Mnum',$mnum)
                                         ->get();

        return Response::json($periodData);
    }

    public function getMachine($date,$page,$num,$field,$keyword)
    {
        $offset = $num * $page;
        
        if($keyword != 'all')
            $search = '%'.$keyword.'%';
        else
            $search = '%';
        
        $count = DB::table('Period')->whereDate('Period',$date)
                                    ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                    ->join('GameType','Machine.GameType','=','GameType.id')
                                    ->where($field,'like',$search)
                                    ->select('MNum')
                                    ->count();

        $drop = DB::table('Period')->where('Period',$date)
                                   ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                   ->join('GameType','Machine.GameType','=','GameType.id')
                                   ->where($field,'like',$search)
                                   //->select('GameType.GameDesc','Machine.Mnum','Machine.GameType','Machine.Location')
                                   ->orderby('Machine.Mnum')
                                   ->offset($offset)
                                   ->limit($num)
                                   ->get();

        $returnError = '';
        $restriction = DB::table('restriction')->first();

        for($i=0;$i<$num;$i++)
        {
            $error = 0;

            if( $drop[$i]->MtrGames > $restriction->Games )
                $error++;
            if( $drop[$i]->MtrTotalCoinIn > $restriction->CoinIn )
                $error++;
            if( $drop[$i]->MtrTotalCoinOut > $restriction->CoinOut )
                $error++;
            if( $drop[$i]->MtrTotalBillIn > $restriction->BillIn )
                $error++;
            if( $drop[$i]->MtrTicketIn > $restriction->TicketIn )
                $error++;
            if( $drop[$i]->MtrTicketOut > $restriction->TicketOut )
                $error++;
            if( $drop[$i]->MtrCreditPay > $restriction->CancelCredit )
                $error++;
            if( $drop[$i]->MtrProgressive > $restriction->Progressive )
                $error++;
            if( $drop[$i]->MtrXtraCredit > $restriction->XtraCredit )
                $error++;
            if( $drop[$i]->MtrJackpot > $restriction->Jackpot )
                $error++;

            $returnError .= $error;
        }

        $drop['error'] = $returnError;
        $drop['count'] = $count;
        return Response::json($drop);
    }


    public function showMetervariance($date)
    {
        $restriction = DB::table('restriction')->first();

        return view('shift_metervariance',['date'=>$date,'restriction'=>$restriction]);
    }
}
