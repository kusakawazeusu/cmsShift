<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Input;
use Hash;
use Validator;

class operator extends Controller
{
    // 主選單
    public function operator_functions()
    {
        return view('operator_functions');
    }

    // 新增/修改管理員 - 初始介面
    public function show_operator_manage()
    {
        $operators = DB::table('Operator')->join('OperatorGroup','Operator.GroupID','=','OperatorGroup.GroupID')
                                          ->select('Operator.*','OperatorGroup.GroupName')
                                          ->get();

        $groups = DB::table('OperatorGroup')->pluck('GroupName');

        return view('operator_manage',['operators'=>$operators,'groups'=>$groups]);
    }

    // 新增/修改管理員 - 依照群組名稱搜尋
    public function sort_operator_manage($groupname)
    {
        $operators = DB::table('Operator')->join('OperatorGroup','Operator.GroupID','=','OperatorGroup.GroupID')
                                          ->where('GroupName',$groupname)
                                          ->select('Operator.*','OperatorGroup.GroupName')
                                          ->get();

        $groups = DB::table('OperatorGroup')->pluck('GroupName');
        
        return view('operator_manage',['operators'=>$operators,'groups'=>$groups,'selected'=>$groupname]);
    }

    // 新增/修改管理員 - 新增管理員

    public function new_operator(Request $request)
    {

        if(Input::get('active')=='') $active=0; else $active=1;

        $group_id = DB::table('OperatorGroup')->where('GroupName',$request->input('group'))
                                              ->pluck('GroupID')->first();

        DB::table('Operator')
            ->insert([
              'OperatorName' => $request->input('name'),
              'password' => Hash::make($request->input('pw')),
              'GroupID' => $group_id,
              'Active' => $active,
              ]);

        return redirect('/operator/manage/');

    }

    // 新增/修改管理員 - 編輯管理員
    public function edit_operator(Request $request, $operatorID)
    {
        if(Input::get('active')=='') $active=0; else $active=1;

        $group_id = DB::table('OperatorGroup')->where('GroupName',$request->input('group'))
                                              ->pluck('GroupID');

        $input = array( 'name' => $request->input('name'), 'password' => $request->input('pw') );
        $rule = ['name'=>'required', 'password'=>'required'];
        $error_msg = ['name.required' => '編輯管理員發生錯誤，名字欄位不能為空白。','password.required' => '編輯管理員發生錯誤，密碼欄位不能為空白。'];

        $validator = Validator::make($input,$rule,$error_msg);

        if($validator->fails())
        {
          return redirect('/operator/manage/')->withErrors($validator);
        }
        else
        {
          DB::table('Operator')
              ->where('id',$operatorID)
              ->update(['OperatorName' => $request->input('name'),
                        'password' => Hash::make($request->input('pw')),
                        'GroupID' => $group_id[0],
                        'Active' => $active]);

          return redirect('/operator/manage/'); 
        }

        
    }

    // 新增/修改管理員 - 刪除管理員
    public function delete_operator($operatorID)
    {
        $name = DB::table('Operator')
                    ->where('id',$operatorID)
                    ->pluck('OperatorName')
                    ->first();

        DB::table('Operator')
            ->where('id',$operatorID)
            ->delete();



        return redirect('/operator/manage/')->with('msg','管理員'.$name.'已從資料庫中刪除。');             
    }


	// 管理員群組管理 - 初始介面
    public function show_group_manage()
    {
    	// 抓取資料庫裡的群組資料
    	$groups = DB::table('OperatorGroup')->orderby('GroupID')->get();

    	return view('operatorgroup_manage',['groups'=>$groups]);
    }

	// 管理員群組管理 - 選取群組
    public function focus_group_manage($id)
    {
    	// 抓取資料庫裡的群組資料
    	$groups = DB::table('OperatorGroup')->orderby('GroupID')->get();

    	// 抓取正在被選取的群組資料，這寫法好糟要修改
    	$focus_group = DB::table('OperatorGroup')->where('GroupID',$id)->first();

    	return view('operatorgroup_manage',['groups'=>$groups,'focus_group'=>$focus_group]);
    }
    // 新增/修改管理員 - 新增群組
    public function new_group(Request $request)
    {
        $rule = ['new_name'=>'required'];
        $input = array('new_name'=>$request->input('new_name'));
        $msg = ['required'=>'新增群組發生錯誤，群組名稱不能為空！'];

        $validator = Validator::make($input,$rule,$msg);

        if($validator->fails())
        {
          return redirect('/operator/gmanage/')->withErrors($validator);
        }
        else
        {
          DB::table('OperatorGroup')
              ->insert([
                'GroupName'=>$request->input('new_name'),
                'MaxTKTIssueAmount' => 0,
                'MaxTKTValidAmount' => 0,
                'MaxTKTVoidAmount' => 0,
                'MaxTKTOverrideLimitAmount' => 0,
                'PrivilegeOfFunctions0' => 0,
                'PrivilegeOfFunctions1' => 0,
                'PrivilegeOfFunctions2' => 0,
                'PrivilegeOfFunctions3' => 0,
                'PrivilegeOfFunctions4' => 0,
                'PrivilegeOfFunctions5' => 0,
                'PrivilegeOfFunctions6' => 0,
                'PrivilegeOfFunctions7' => 0,
                'XtraCreditAdd' => 0,
                'RewardPointAdd' => 0,
                'XtraCreditSub' => 0,
                'RewardPointSub' => 0,
                'Active' => 1
          ]);
          return redirect('/operator/gmanage/'); 
        }

    }
    // 管理員群組管理 - 編輯群組
    public function edit_group(Request $request,$id)
    {
        if($request->get('pof0') == 'on') $pof0 = 1; else $pof0 = 0;
        if($request->get('pof1') == 'on') $pof1 = 1; else $pof1 = 0;
        if($request->get('pof2') == 'on') $pof2 = 1; else $pof2 = 0;
        if($request->get('pof3') == 'on') $pof3 = 1; else $pof3 = 0;
        if($request->get('pof4') == 'on') $pof4 = 1; else $pof4 = 0;
        if($request->get('pof5') == 'on') $pof5 = 1; else $pof5 = 0;
        if($request->get('pof6') == 'on') $pof6 = 1; else $pof6 = 0;
        if($request->get('pof7') == 'on') $pof7 = 1; else $pof7 = 0;

        $group_name = $request->input('gname');
        $tktissue = $request->input('tktissue');
        $tktvalid = $request->input('tktvalid');
        $tktvoid = $request->input('tktvoid');
        $tktoverride = $request->input('tktoverride');

        DB::table('OperatorGroup')
            ->where('GroupID',$id)
            ->update(['GroupName' => $group_name,
                      'MaxTKTIssueAmount' => $tktissue,
                      'MaxTKTValidAmount' => $tktvalid,
                      'MaxTKTVoidAmount' => $tktvoid,
                      'MaxTKTOverrideLimitAmount' => $tktoverride,
                      'PrivilegeOfFunctions0' => $pof0,
                      'PrivilegeOfFunctions1' => $pof1,
                      'PrivilegeOfFunctions2' => $pof2,
                      'PrivilegeOfFunctions3' => $pof3,
                      'PrivilegeOfFunctions4' => $pof4,
                      'PrivilegeOfFunctions5' => $pof5,
                      'PrivilegeOfFunctions6' => $pof6,
                      'PrivilegeOfFunctions7' => $pof7]);

        return redirect('/operator/gmanage/'.$id); 
    }
    // 新增/修改管理員 - 刪除群組
    public function delete_group($id)
    {
        DB::table('OperatorGroup')
            ->where('GroupID',$id)
            ->delete();

        return redirect('/operator/gmanage/')->with('msg','群組已從資料庫中刪除。');             
    }
    // 新增/修改 事件警示
    public function show_event()
    {
        $event = DB::table('eventdef')->orderby('code')->get();

        return view('operator_event',['events'=>$event]);
    }

    // 新增/修改 事件警示 - 新增
    public function new_event(Request $request)
    {

        if($request->get('new-redlight') == 'on') $redlight = 1; else $redlight = 0;
        if($request->get('new-yellowlight') == 'on') $yellowlight = 1; else $yellowlight = 0;
        if($request->get('new-screenflicker') == 'on') $screenflicker = 1; else $screenflicker = 0;
        if($request->get('new-audio') == 'on') $audio = 1; else $audio = 0;

        DB::table('eventdef')
            ->insert([
              'code' => $request->input('event_code'),
              'EventDescription' => $request->input('event_description'),
              'type' => 'Q',
              'RedLight' => $redlight,
              'YellowLight' => $yellowlight,
              'ScreenFlicker' => $screenflicker,
              'WarningAudio' => $audio
              ]);

        return redirect('/operator/event/');
    }
    // 新增/修改 事件警示 - 修改
    public function edit_event(Request $request, $id)
    {

        if($request->get('redlight'.$id) == 'on') $redlight = 1; else $redlight = 0;
        if($request->get('yellowlight'.$id) == 'on') $yellowlight = 1; else $yellowlight = 0;
        if($request->get('screenflicker'.$id) == 'on') $screenflicker = 1; else $screenflicker = 0;
        if($request->get('audio'.$id) == 'on') $audio = 1; else $audio = 0;

        DB::table('eventdef')
            ->where('id',$id)
            ->update(['code' => $request->input('event_code'),
                      'EventDescription' => $request->input('event_description'),
                      'RedLight' => $redlight,
                      'YellowLight' => $yellowlight,
                      'ScreenFlicker' => $screenflicker,
                      'WarningAudio' => $audio
        ]);

        return redirect('/operator/event'); 
    }
    // 新增/修改 事件警示 - 刪除
    public function delete_event($id)
    {
        $description = DB::table('eventdef')->where('id',$id)->pluck('EventDescription')->first();

        DB::table('eventdef')
            ->where('id',$id)
            ->delete();

        return redirect('/operator/event')->with('msg','事件「'.$description.'」已從資料庫中刪除。');             
    }
    // 新增/修改 班別 - 顯示班別
    public function show_class()
    {
        
    }

    // 修改系統參數
    public function show_configure()
    {
        return view('operator_configure');
    }
    public function update_configure(Request $request)
    {
        DB::table('configure')->where('id','1')->update(['Language'=>$request->input('language'), 'ShowEntries'=>$request->input('numEntries')]);
        return back();
    }

}
