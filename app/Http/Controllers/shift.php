<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;

class shift extends Controller
{

    public function updateSoftDrop($id,$value)
    {
        DB::table('Period')->where('id',$id)->update(['ActTotalBillIns'=>$value]);
    }

    public function page($date, $page, $num, $field, $keyword,$exception)
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
        

        if($exception)
        {
            $count = DB::table('Period')
                                    ->where('Period',$date)
                                    ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                    ->whereColumn('Period.MtrTotalBillIn','<>','Period.ActTotalBillIns')
                                    ->where($field,'like',$search)
                                    ->count();

            $drop = DB::table('Period')->where('Period',$date)
                                    ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                    ->whereColumn('Period.MtrTotalBillIn','<>','Period.ActTotalBillIns')
                                    ->where($field,'like',$search)
                                    ->select('Period.id','Period.Mnum','Period.MtrTotalBillIn','Period.ActTotalBillIns','Machine.Location')
                                    ->orderby('Mnum')
                                    ->offset($offset)
                                    ->limit($num)
                                    ->get();
        }
        else
        {
            $count = DB::table('Period')->where('Period',$date)
                                    ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                    ->where($field,'like',$search)
                                    ->count();

            $drop = DB::table('Period')->where('Period',$date)
                                    ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                    ->where($field,'like',$search)
                                    ->select('Period.id','Period.Mnum','Period.MtrTotalBillIn','Period.ActTotalBillIns','Machine.Location')
                                    ->orderby('Mnum')
                                    ->offset($offset)
                                    ->limit($num)
                                    ->get();
        }

        

        $drop['count'] = $count;



        return Response::json($drop);
    }


    public function show_startperiod()
    {
        $logTime = DB::table('memberbetlog')->orderBy('BetLogTime')->pluck('BetLogTime');
        
        $logTime_arr = array();

        for($i=0;$i<count($logTime);$i++)
        {
            $logTime[$i] = substr($logTime[$i],0,10);
            array_push($logTime_arr,$logTime[$i]);
        }
        
    	return view('shift_startperiod',['PeriodDate' => array_unique($logTime_arr)]);
    }

    public function show_softdropvariance( $date )
    {
        // 在這裡建立好Period的話，就不用修改其他functionㄌ！

        // 先確定一下，Period裡面有沒有資料了
        // 沒有的話就創立一個
        $check_exist = DB::table('Period')->where('Period',$date)->first();
        if( $check_exist == null )
        {
            // 找到這一天中，有哪些Machine有資料
            $machineNum = DB::table('memberbetlog')
                            ->whereYear('BetLogTime',substr($date,0,4))
                            ->whereMonth('BetLogTime',substr($date,5,2))
                            ->whereDay('BetLogTime',substr($date,8,2))
                            ->select('Mnum')
                            ->distinct()
                            ->get();

            for($j=0;$j<count($machineNum);$j++)
            {
                $games = 0;
                $coinin = 0;
                $coinout = 0;
                $jackpot = 0;
                $billin = 0;
                
                // 在memberBetLog這個表找到所有這一天，該machine的所有資料
                $memberBetLog = DB::table('memberbetlog')
                                ->whereYear('BetLogTime',substr($date,0,4))
                                ->whereMonth('BetLogTime',substr($date,5,2))
                                ->whereDay('BetLogTime',substr($date,8,2))
                                ->where('Mnum',$machineNum[$j]->Mnum)
                                ->get();

                //return $memberBetLog;

                for($i=0;$i<count($memberBetLog);$i++)
                {
                    $games += $memberBetLog[$i]->Games;
                    $coinin += $memberBetLog[$i]->CoinIn;
                    $coinout += $memberBetLog[$i]->CoinOut;
                    $jackpot += $memberBetLog[$i]->Jackpot;
                    $billin += $memberBetLog[$i]->BillsIn;
                }
                DB::table('Period')->insert([
                        'Period' => $date,
                        'Mnum' => $memberBetLog[0]->Mnum,
                        'MtrGames' => $games,
                        'MtrTotalCoinIn' => $coinin,
                        'MtrTotalCoinOut' => $coinout,
                        'MtrTotalDrop' => $coinin,
                        'MtrTotalBillIn' => $billin,
                        'MtrJackpot' => $jackpot                
                ]);
            }
        }

        $num_of_entries = DB::table('Period')->where('Period',$date)->count();

        return view('shift_softdropvariance',['Drop'=>$date,'num_of_entries'=>$num_of_entries]);
    }
    public function show_metervariance( $date )
    {
        $meter = DB::table('Period')->where('Period',$date)
                                    ->join('Machine','Period.Mnum','=','Machine.Mnum')
                                    ->select('Period.*','Machine.Location','Machine.IPAddress')
                                    ->orderby('Mnum')
                                    ->get();

        return view('shift_metervariance',['Meters'=>$meter]);
    }
    public function show_sessionvariance( $date )
    {
        $sessions = DB::table('Sessions')->where('SessionDate',$date)
                                        ->join('Operator as op','Sessions.OpenBy','=','op.id')
                                        ->join('Operator as cl','Sessions.ClodeBy','=','cl.id')
                                        ->select('Sessions.*','op.OperatorName as Opener','cl.OperatorName as Closer')
                                        ->orderby('SessionNo')
                                        ->get();

        return view('shift_sessionvariance',['Sessions'=>$sessions]);
    }
    public function show_patronsession( $date )
    {
        $session = DB::table('PlayerSession')->where('SessionDate',$date)
                                             ->orderby('SessionNo')
                                             ->get();

        return view('shift_partonsession',['Sessions'=>$session]);
    }
    public function show_closeperiod( $date )
    {
        return view('shift_closeperiod',['date'=>$date]);
    }
}
