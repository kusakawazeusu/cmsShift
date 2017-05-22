<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\report;
use App\models\ticketissuance;
use App\models\ticketvoid;
use App\models\validation;
use App\models\softdropvariance;
use App\models\slotticketcashout;
use App\models\slotticketredemption;
use App\models\sessionclose;
use App\models\report_advance;
use App\models\slotperformance;
use App\models\report_slotperformancecashflowvariance;
use App\models\slotperiodcashflow;
use DB;
class report_controller extends Controller
{
    //
    public function report_show()
    {
    	$reports = report::all();
    	return view('Report',['reports'=>$reports]);
    }

    public function report_general_index()
    {
        $report_general_datas = report::all();
        return view('report_general',['report_general_datas'=>$report_general_datas]);
    }
    public function report_add_general(Request $request)
    {
        $report = new report;
        $report->SeqNo = $request->get('SeqNo');
        $report->ReportName = $request->get('ReportName');
        $report->Favorite = $request->get('Favorite');
        $report->ReportDesc = $request->get('ReportDesc');
        $report->ReportFile = $request->get('ReportFile');
        $report->save();
        return redirect()->route('report_general');
    }
    public function report_edit_general(Request $request)
    {
        report::where('id',$request->get('id'))
            ->update(array(
                'SeqNo'=>$request->get('SeqNo'),
                'ReportName'=>$request->get('ReportName'),
                'Favorite'=>$request->get('Favorite'),
                'ReportDesc'=>$request->get('ReportDesc'),
                'ReportFile'=>$request->get('ReportFile'),
                ));
        return redirect()->route('report_general');   
    }
    public function report_delete_general(Request $request)
    {
        report::where('id',$request->get('id'))->delete();
        return redirect()->route('report_general');
    }

    public function report_ticketissuance(Request $request)//櫃台開出票據紀錄報表
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $ticketissuances = ticketissuance::whereBetween('issued',[$startTime,$endTime])->get();
        return view('report_ticketissuance',[
            'ticketissuances'=>$ticketissuances,
            'startTime'=>$startTime,
            'endTime'=>$endTime]);
    }

    public function report_ticketvoid(Request $request)//櫃台作廢票據紀錄報表
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $ticketvoids =ticketvoid::whereBetween('issued',[$startTime,$endTime])->get();
        return view('report_ticketvoid',['ticketvoids'=>$ticketvoids,
            'startTime'=>$startTime,
            'endTime'=>$endTime]);
    }

    public function report_validation(Request $request)//櫃台兌換票據紀錄報表
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));

        $validations = validation::whereBetween('issued',[$startTime,$endTime])->get();
        return view('report_validation',['validations'=>$validations,
            'startTime'=>$startTime,
            'endTime'=>$endTime]);
    }

    public function report_slotticketcashout(Request $request)//機台洗分/印票紀錄報表
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $slotticketcashouts = slotticketcashout::whereBetween('issued',[$startTime,$endTime])->get();
        return view('report_slotticketcashout',['slotticketcashouts'=>$slotticketcashouts,
            'startTime'=>$startTime,
            'endTime'=>$endTime]);
    }

    public function report_slotticketredemption(Request $request)//機台入票紀錄報表
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));

        $slotticketredemptions = slotticketredemption::whereBetween('issued',[$startTime,$endTime])->get();
        return view('report_slotticketredemption',['slotticketredemptions'=>$slotticketredemptions,
            'startTime'=>$startTime,
            'endTime'=>$endTime]);
    }

    public function report_softdropvariance()//清鈔差異紀錄報表
    {

        $softdropvariances = softdropvariance::all();
        return view('report_softdropvariance',['softdropvariances'=>$softdropvariances]);
    }

    public function report_sessionclose(Request $request)
    {
        $sessioncloses = sessionclose::where('session',$request->get('Session'))->get()->first();
        return view('report_sessionclose',['sessioncloses'=>$sessioncloses,'session'=>$request->get('Session')]);
    }




    public function report_search_general(Request $request)
    {
        $reportName = $request->get('ReportName');
        $SeqNoRadio = $request->get('Radio');
        if($SeqNoRadio =="SeqNoRadio")
        {
            if($reportName=="班別關閉紀錄報表")
            {
                return $this->report_sessionclose($request);
            }
        }
        else
        {
            $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
            $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
            if($reportName=="櫃台開出票據紀錄報表")
            {
                return $this->report_ticketissuance($request);
            }
            elseif($reportName=="櫃台作廢票據紀錄報表")
            {
                return $this->report_ticketvoid($request);
            }
            elseif($reportName=="櫃台入票紀錄報表")
            {
                return $this->report_slotticketredemption($request);
            }
            elseif($reportName=="櫃台兌換票據紀錄報表")
            {
                return $this->report_validation($request);
            }
            elseif($reportName=="機台洗分/印票紀錄報表")
            {
                return $this->report_slotticketcashout($request);
            }
            elseif($reportName=="清鈔差異紀錄報表")
            {
                return $this->report_softdropvariance($request);
            }
        }
    }


    public function report_advance_index()
    {

        $report_advance_datas = report_advance::all();
        return view('report_advance',['report_advance_datas'=>$report_advance_datas]);
    }   

    public function report_add_advance(Request $request)
    {
        $report_advance = new report_advance;
        $report_advance->SeqNo = $request->get('SeqNo');
        $report_advance->ReportName = $request->get('ReportName');
        $report_advance->Favorite = $request->get('Favorite');
        $report_advance->ReportDesc = $request->get('ReportDesc');
        $report_advance->ReportFile = $request->get('ReportFile');
        $report_advance->save();
        return redirect()->route('report_advance');
    }

    public function report_edit_advance(Request $request)
    {
        report_advance::where('id',$request->get('id'))
            ->update(array(
                'SeqNo'=>$request->get('SeqNo'),
                'ReportName'=>$request->get('ReportName'),
                'Favorite'=>$request->get('Favorite'),
                'ReportDesc'=>$request->get('ReportDesc'),
                'ReportFile'=>$request->get('ReportFile'),
                ));
        return redirect()->route('report_advance');   
    }
    public function report_delete_advance(Request $request)
    {
        report_advance::where('id',$request->get('id'))->delete();
        return redirect()->route('report_advance');
    }

    public function report_slotperformance()
    {
        $descArr = Array("Hexbreaker","QinEmpire","testMachine");
        $SPobjs=[];
        $SPTypeSums=array(array());
        $SPTypeSums_temp=array();
        $SPTypeTotalSums=array();
        for ( $i=0 ; $i<3 ; $i++ ) 
        {
            array_push($SPobjs,slotperformance::where('Description',$descArr[$i])->get());
            //return slotperformance::where('Description',$descArr[$i])->get()->sum('Coin_In');
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Coin_In'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Coin_Out'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Xcredit'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Meter_Handpay'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Meter_Jackpot'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Progressive'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Actual_Handpay'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Soft_Drop'));
            array_push($SPTypeSums_temp,slotperformance::where('Description',$descArr[$i])->get()->sum('Net_Win'));
            $SPTypeSums[$i]=$SPTypeSums_temp;
            unset($SPTypeSums_temp);
            $SPTypeSums_temp = array();
        }
        for($i=0;$i<9;$i++)
        {
            $SPTypeTotalSums[$i]=0;
        }
        for($i=0;$i<3;$i++)
        {
            for($j=0;$j<9;$j++)
            {
                $SPTypeTotalSums[$j]= $SPTypeTotalSums[$j]+$SPTypeSums[$i][$j];
            }
        }

        return view('report_slotperformance',[
            'SPobjs'=>$SPobjs,
            'SPTypeSums'=>$SPTypeSums,
            'SPTypeTotalSums'=>$SPTypeTotalSums,
            'descArr'=>$descArr
            ]);
    }

    public function report_slotperformance_cashflowvariance()
    {
        $descArr = Array("HOUSE","KING","POKER");
        $SPCVobjs=array();
        $SPCVsums=array(array());
        $SPCVsums_temp=array();
        $SPCVTypeTotalSums=array();
        for ( $i=0 ; $i<3 ; $i++ ) 
        {

            array_push($SPCVobjs,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get());
            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Coin_In'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Coin_Out'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Xcredit'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Meter_Handpay'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Meter_Jackpot'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Progressive'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Actual_Handpay'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Soft_Drop'));

            array_push($SPCVsums_temp,report_slotperformancecashflowvariance::where('Description',$descArr[$i])->get()->sum('Net_Win'));

            $SPCVsums[$i]=$SPCVsums_temp;
            unset($SPCVsums_temp);
            $SPCVsums_temp = array();
        }

        for($i=0;$i<9;$i++)
        {
            $SPCVTypeTotalSums[$i]=0;
        }
        for($i=0;$i<3;$i++)
        {
            for($j=0;$j<9;$j++)
            {
                $SPCVTypeTotalSums[$j]+=$SPCVsums[$i][$j];
            }
        }
        return view('report_slotperformance_cashflowvariance',[
            'SPCVobjs'=>$SPCVobjs,
            'SPCVsums'=>$SPCVsums,
            'SPCVTypeTotalSums'=>$SPCVTypeTotalSums,
            'descArr'=>$descArr
            ]);
    }


    public function report_slotperiod_cashflow()
    {
        $SPCobjs=slotperiodcashflow::all();
    
        return view('report_slotperiodcashflow',[
            'SPCobjs'=>$SPCobjs
            ]);
    }




    public function report_search_advance(Request $request)
    {
        $reportName = $request->get('ReportName');
        $SeqNoRadio = $request->get('Radio');
        if($SeqNoRadio =="SeqNoRadio")
        {
            
        }
        else
        {
            $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
            $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
            if($reportName=="各機台營運狀況報表")
            {
                return $this->report_slotperformance();
            }
            elseif($reportName=="各機台營運狀況與現金流資訊報表")
            {
                return $this->report_slotperformance_cashflowvariance();
            }
            elseif($reportName=="各機台現金流資訊報表")
            {
                return $this->report_slotperiod_cashflow();
            }
        }
    }
}
