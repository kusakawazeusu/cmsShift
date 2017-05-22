<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
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
use Excel;

class report_excelcontroller extends Controller
{
    //
    public function Report_Export_Excel()
    {
    	$Report_Datas = Report::select('SeqNo','ReportName','Favorite','ReportDesc','ReportFile')->get()->toArray();
        return Excel::create(iconv('UTF-8', 'BIG5', '報表'),function($excel) use ($Report_Datas)
        {
        	$excel->setTitle('報表');
            $excel->sheet('報表', function($sheet) use ($Report_Datas)
            {
	        	$sheet->row(1,array_keys($Report_Datas[0]));
	        	$sheet->freezeFirstRow();
				foreach ($Report_Datas as $Report_Data) 
				{
            		$sheet->appendRow($Report_Data);
       			}
            });

        })->store('xlsx', storage_path('excel/exports'))->export('xlsx');
    }


    public function report_export_ticketissuance(Request $request)
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $ticketissuanceDatas = ticketissuance::whereBetween('Issued',[$startTime,$endTime])->select('MachineTKTSeqNo','Validation_Code','Issued','Amount','Paid_Void_Flag','Paid_Date')->orderBy('MachineTKTSeqNo','asc')->get()->toArray();
       return Excel::create(iconv('UTF-8', 'BIG5', '櫃台開出票據紀錄報表'),function($excel) use ($ticketissuanceDatas)
        {
            $excel->setTitle('櫃台開出票據紀錄報表');
            $excel->sheet('櫃台開出票據紀錄報表', function($sheet) use ($ticketissuanceDatas)
            {
                $sheet->row(1,array_keys($ticketissuanceDatas[0]));
                $sheet->freezeFirstRow();
                foreach ($ticketissuanceDatas as $ticketissuanceData) 
                {
                    $ticketissuanceData['Amount']=number_format($ticketissuanceData['Amount'], 2, '.', ',');
                    $sheet->appendRow($ticketissuanceData);
                }
            })->store('xlsx')->export('xlsx');

        });
    }



    public function report_export_ticketvoid(Request $request)
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $ticketvoidDatas = ticketvoid::whereBetween('Issued',[$startTime,$endTime])->select('Validation_Code','Issued','Issued_by','Amount','Void_date')->orderBy('Validation_Code','asc')->get()->toArray();
        return Excel::create(iconv('UTF-8', 'BIG5', '櫃台作廢票據紀錄報表'),function($excel) use ($ticketvoidDatas)
        {
            $excel->setTitle('櫃台作廢票據紀錄報表');
            $excel->sheet('櫃台作廢票據紀錄報表', function($sheet) use ($ticketvoidDatas)
            {
                $sheet->row(1,array_keys($ticketvoidDatas[0]));
                $sheet->freezeFirstRow();
                foreach ($ticketvoidDatas as $ticketvoidData) 
                {
                    $ticketvoidData['Amount']=number_format($ticketvoidData['Amount'], 2, '.', ',');
                    $sheet->appendRow($ticketvoidData);
                }
            });

        })->store('xlsx','../database/excel')->export('xlsx');
    }




    public function report_export_ticketredemption(Request $request)
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $slotticketredemptionDatas = slotticketredemption::whereBetween('Issued',[$startTime,$endTime])->select('MachineTKTSeqNo','Validation_Code','Issued','Issued_by','Amount','Validation_by','Paid_Date')->orderBy('MachineTKTSeqNo','asc')->get()->toArray();
        return Excel::create(iconv('UTF-8', 'BIG5', '櫃台入票紀錄報表'),function($excel) use ($slotticketredemptionDatas)
        {
            $excel->setTitle('櫃台入票紀錄報表');
            $excel->sheet('櫃台入票紀錄報表', function($sheet) use ($slotticketredemptionDatas)
            {
                $sheet->row(1,array_keys($slotticketredemptionDatas[0]));
                $sheet->freezeFirstRow();
                foreach ($slotticketredemptionDatas as $slotticketredemptionData) 
                {
                    $slotticketredemptionData['Amount']=number_format($slotticketredemptionData['Amount'], 2, '.', ',');
                    $sheet->appendRow($slotticketredemptionData);
                }
            });

        })->store('xlsx','../database/excel')->export('xlsx');
    }



    public function report_export_slotticketcashout(Request $request)
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $slotticketcashoutDatas = slotticketcashout::whereBetween('Issued',[$startTime,$endTime])->select('TktSeq','Validation_Code','Issued','Amount','Paid_Void_Flag','Paid_Date')->orderBy('TktSeq','asc')->get()->toArray();
        return Excel::create(iconv('UTF-8', 'BIG5', '機台洗分_印票紀錄報表'),function($excel) use ($slotticketcashoutDatas)
        {
            $excel->setTitle('機台洗分_印票紀錄報表');
            $excel->sheet('機台洗分_印票紀錄報表', function($sheet) use ($slotticketcashoutDatas)
            {
                $sheet->row(1,array_keys($slotticketcashoutDatas[0]));
                $sheet->freezeFirstRow();
                foreach ($slotticketcashoutDatas as $slotticketcashoutData) 
                {
                    $slotticketcashoutData['Amount']=number_format($slotticketcashoutData['Amount'], 2, '.', ',');
                    $sheet->appendRow($slotticketcashoutData);
                }
            });

        })->store('xlsx','../database/excel')->export('xlsx');
    }



    public function report_export_validation(Request $request)
    {
        $startTime = date("Y/m/d H:i:s",strtotime($request->get('startTime')));
        $endTime = date("Y/m/d H:i:s",strtotime($request->get('endTime')));
        $validationDatas = validation::whereBetween('Issued',[$startTime,$endTime])->select('Validation_Code','Issued','Issued_by','Amount','Paid_Date')->orderBy('Validation_Code','asc')->get()->toArray();
        return Excel::create(iconv('UTF-8', 'BIG5', '櫃台兌換票據紀錄報表'),function($excel) use ($validationDatas)
        {
            $excel->setTitle('櫃台兌換票據紀錄報表');
            $excel->sheet('櫃台兌換票據紀錄報表', function($sheet) use ($validationDatas)
            {
                $sheet->row(1,array_keys($validationDatas[0]));
                $sheet->freezeFirstRow();
                foreach ($validationDatas as $validationData) 
                {
                    $validationData['Amount']=number_format($validationData['Amount'], 2, '.', ',');
                    $sheet->appendRow($validationData);
                }
            });

        })->store('xlsx','../database/excel')->export('xlsx');
    }
}
