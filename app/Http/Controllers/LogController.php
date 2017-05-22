<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('log_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('LogEvent')->insert(['created_at' => date("Y/m/d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))), 
									'updated_at' => date("Y/m/d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))), 
									'code' => $request->code]);
		return redirect('/log');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('LogEvent')
            ->where('id', $request->log_edit_id)
            ->update(['code' => $request->log_edit_code]);
		
		return redirect('/log');
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        DB::table('LogEvent')
			->where('updated_at', '<', date("Y/m/d H:i:s",mktime(date('H'),date('i'),date('s'),date('m') - 3,date('d'),date('Y'))))
			->delete();
		return redirect('/log');
    }
	
	public function search(Request $request)
    {
		$page = (isset($request->page) ? $request->page : 1);
		$limit = (isset($request->limit) ? $request->limit : 10);
		$type =(isset($request->type) ? $request->type : 'N');
		$log_search_col = (isset($request->log_search_col) ? $request->log_search_col : 'code');
		$log_search_command = (isset($request->log_search_command) ? '%' . $request->log_search_command . '%' : '%');
		$time_from =(isset($request->time_from) ? $request->time_from : '0001-01-01T00:00');
		$time_to =(isset($request->time_to) ? $request->time_to : date("Y") . '-' . date("m") . '-' . date("d") . 'T' . date("H") . ':' . date("i"));
		
		$col_table = ($log_search_col == 'EventDescription' ? 'EventDef.' : 'LogEvent.');
		
		$datas = DB::table('LogEvent')
				->join('EventDef', 'LogEvent.code', '=', 'EventDef.code')
				->select('LogEvent.*', 'EventDef.EventDescription')
				->where($col_table . $log_search_col, 'like', $log_search_command)
				->where('updated_at', '>', date("Y/m/d H:i:s",strtotime($time_from)))
				->where('updated_at', '<', date("Y/m/d H:i:s",strtotime($time_to . "+1 min")));
		
		if ($type != 'N') $datas = $datas->where('type', '=', $type);
		
		$count = $datas->count();
		
		$datas = $datas->orderBy('updated_at', 'desc');
		
		if ($limit != -1) 
		{
			$datas = $datas
					->offset(0 + ($page - 1) * 10)
					->limit($limit);
		}
		
		$datas = $datas->get();
		
		$totalpage = ($limit != -1 ? ceil($count / $limit) : 1);
		
		return view('log_index', 
						['datas' => $datas, 
						'totalpage' => $totalpage, 
						'type' => $type, 
						'page' => $page, 
						'limit' => $limit,
						'log_search_col' => $log_search_col,
						'log_search_command' => $request->log_search_command,
						'time_from' => $time_from,
						'time_to' => $time_to]);
    }
	
	public function remove(Request $request)
    {
		DB::table('LogEvent')
			->where('id', '=', $request->id)
			->delete();
		return redirect('/log');
	}
	
	public function export_excel()
    {

		$log_datas = \App\log_excel_export::select('*')
					->join('EventDef', 'LogEvent.code', '=', 'EventDef.code')
					->select('LogEvent.updated_at', 'LogEvent.code', 'EventDef.EventDescription')
					->orderBy('updated_at', 'desc')
					->get()
					->toArray();
		
		Excel::create(iconv('UTF-8', 'BIG5', 'log'), function($excel) use ($log_datas) {
			
			$excel->sheet('log', function($sheet) use ($log_datas) {
				$sheet->row(1,array_keys($log_datas[0]));
	        	$sheet->freezeFirstRow();
				foreach ($log_datas as $log_data) 
				{
            		$sheet->appendRow($log_data);
       			}
			});
			
		})->download('xlsx');
    }
	
}
