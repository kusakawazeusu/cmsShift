<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {

    if(Auth::check())
    {
        $pof = array( DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions0')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions1')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions2')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions3')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions4')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions5')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions6')->first(),
                      DB::table('OperatorGroup')->where('GroupID',Auth::user()->GroupID)->pluck('PrivilegeOfFunctions7')->first() );
    
        return view('index',['POF'=>$pof]);
    }

    return view('welcome');
    
});

Route::get('/Logout',function(){
    Auth::logout();
    return view('welcome');
});


Route::post('login', 'member_auth_controller@login');

Route::get('/login', function () {
    return view('login');
});
Route::get('/autherror',function(){
    return view('autherror');
});





//WSR
Route::post('member_search', 'members_controller@searchMember');
Route::post('member_card_search', 'member_card_controller@search');

Route::get('member_register', 'members_controller@requestRegister');
Route::post('member_register', 'members_controller@register');
Route::get('member_card_register', 'member_card_controller@requestRegister');
Route::post('member_card_register', 'member_card_controller@register');

Route::get('member_card_edit', 'member_card_controller@showMemberCardEdit');
Route::post('member_card_edit', 'member_card_controller@edit');

Route::post('member_card_delete', 'member_card_controller@memberCardDelete');
Route::post('member_delete', 'members_controller@deleteMember');

Route::put('member_edit', 'member_profile_controller@update');
Route::get('member_edit', 'member_profile_controller@edit');

Route::get('member_profile', 'member_profile_controller@showProfile');
Route::get('member_account', 'member_account_controller@requestAccount');

Route::get('member_card_list', 'member_card_controller@listAll');
Route::get('member_list', 'members_controller@searchMember');

Route::get('member_card_add', 'member_card_controller@requestAddCard');
Route::post('member_card_add', 'member_card_controller@addCard');

Route::get('member_play_record', 'member_record_controller@getMemberPlayRecord');
Route::post('member_play_record', 'member_record_controller@queryMemberPlayRecord');

Route::get('member_bet_log', 'member_record_controller@getBetLog');
Route::post('member_bet_log', 'member_record_controller@queryMemberBetLog');

Route::get('member_bonus_trans_list', 'member_bonus_controller@requestBonusTransList');
Route::post('member_bonus_trans_list', 'member_bonus_controller@queryBonusTransList');

Route::get('member_bonus_update', 'member_bonus_controller@requestBonusUpdate');
Route::post('member_bonus_update', 'member_bonus_controller@updateBonus');

Route::get('member_card_trans_list', 'member_log_controller@requestCardTransList');
Route::get('member_trans_list', 'member_log_controller@requestMemberTransList');



//YCH
Route::get('dataTable',function(){
    return view('dataTable');
});

//Route::get('report','report_controller@report_show')->name('Report_Show');

Route::get('report_general','report_controller@report_general_index')->name('report_general');
Route::post('report_add_general','report_controller@report_add_general')->name('report_add_general');
Route::post('report_edit_general','report_controller@report_edit_general')->name('report_edit_general');
Route::post('report_delete_general','report_controller@report_delete_general')->name('report_delete_general');
Route::post('report_search_general','report_controller@report_search_general')->name('report_search_general')
;
Route::get('report_export_excel','report_excelcontroller@report_export_excel')->name('report_Export_Excel');

Route::get('report_advance','report_controller@report_advance_index')->name('report_advance');
Route::post('report_add_advance','report_controller@report_add_advance')->name('report_add_advance');
Route::post('report_edit_advance','report_controller@report_edit_advance')->name('report_edit_advance');
Route::post('report_delete_advance','report_controller@report_delete_advance')->name('report_delete_advance');
Route::post('report_search_advance','report_controller@report_search_advance')->name('report_search_advance')
;

//TS
Route::group(['prefix'=>'arcade'], function(){
    Route::get('/', 'arcade_controller@index');
    Route::post('/arcade_add_machine', 'arcade_controller@store');
    Route::post('/arcade_edit_machine', 'arcade_controller@edit');
    Route::post('/arcade_delete_machine', 'arcade_controller@delete');
});

Route::group(['prefix'=>'arcade_denom_type'], function(){
    Route::get('/', 'arcade_denom_type_controller@index');
    Route::post('/arcade_add_denom_type', 'arcade_denom_type_controller@store');
    Route::post('/arcade_edit_denom_type', 'arcade_denom_type_controller@edit');
    Route::post('/arcade_delete_denom_type', 'arcade_denom_type_controller@delete');
});

Route::group(['prefix'=>'arcade_game_type'], function(){
    Route::get('/', 'arcade_game_type_controller@index');
    Route::post('/arcade_add_game_type', 'arcade_game_type_controller@store');
    Route::post('/arcade_edit_game_type', 'arcade_game_type_controller@edit');
    Route::post('/arcade_delete_game_type', 'arcade_game_type_controller@delete');
});

Route::group(['prefix'=>'arcade_game_type_group'], function(){
    Route::get('/', 'arcade_game_type_group_controller@index');
    Route::post('/arcade_add_game_type_group', 'arcade_game_type_group_controller@store');
    Route::post('/arcade_edit_game_type_group', 'arcade_game_type_group_controller@edit');
    Route::post('/arcade_delete_game_type_group', 'arcade_game_type_group_controller@delete');
});

//ticketing
Route::group(['prefix'=>'ticketing'], function(){
    Route::get('/ticketing_validation', 'ticketing_controller@ticketing_validation');
    Route::post('/ticketing_validation_search', 'arcade_controller@index');
    Route::get('/ticketing_purchase', 'ticketing_controller@ticketing_purchase');
    Route::get('/ticketing_void', 'ticketing_controller@ticketing_void');
    Route::get('/ticketing_valid_pending', 'ticketing_controller@ticketing_valid_pending');
    Route::get('/ticketing_tally', 'ticketing_controller@ticketing_tally');
    //Route::post('/arcade_edit_machine', 'arcade_controller@edit');
    //Route::post('/arcade_delete_machine', 'arcade_controller@delete');
});


//T3Y
Route::get('/log', 'LogController@search');

Route::get('/log_create', 'LogController@create');

Route::get('/log_delete', 'LogController@destroy');

Route::get('/log_export_excel', 'LogController@export_excel');

Route::post('/log_store', 'LogController@store');

Route::post('/log', 'LogController@search');

Route::post('/log_edit', 'LogController@update');

Route::post('/log_remove', 'LogController@remove');


//MN

Route::get('machinemonitor','machine_controller@index');
Route::get('socket', 'machine_controller@socket');
Route::post('sendmessage', 'machine_controller@sendMessage');
Route::get('writemessage', 'machine_controller@writemessage');

//KT

// 管理員系列
Route::group(['prefix'=>'operator'], function(){
// 管理員介面選單
Route::get('/','operator@operator_functions')->middleware('CheckAuth:3');
// 管理員群組
Route::get('/gmanage','operator@show_group_manage')->middleware('CheckAuth:3');
Route::get('/gmanage/{id}','operator@focus_group_manage')->middleware('CheckAuth:3');
Route::post('/gmanage/edit/{id}','operator@edit_group')->middleware('CheckAuth:3');
Route::post('/gmanage/newgroup','operator@new_group')->middleware('CheckAuth:3');
Route::get('/gmanage/delete/{id}','operator@delete_group')->middleware('CheckAuth:3');
// 新增/修改管理員
Route::get('/manage','operator@show_operator_manage')->middleware('CheckAuth:3');
Route::get('/manage/{groupname}','operator@sort_operator_manage')->middleware('CheckAuth:3');
Route::post('/manage/edit/{id}','operator@edit_operator')->middleware('CheckAuth:3');
Route::post('/manage/newoperator','operator@new_operator')->middleware('CheckAuth:3');
Route::get('/manage/delete/{id}','operator@delete_operator')->middleware('CheckAuth:3');
// 新增/修改事件
Route::get('/event','operator@show_event')->middleware('CheckAuth:3');
Route::post('/event/edit/{id}','operator@edit_event')->middleware('CheckAuth:3');
Route::post('/event/newevent','operator@new_event')->middleware('CheckAuth:3');
Route::get('/event/delete/{id}','operator@delete_event')->middleware('CheckAuth:3');
});
// 新增/修改班別
Route::get('/class','operator@show_class')->middleware('CheckAuth:3');
// 交班系統 (Layout only)
Route::get('/shift/startperiod','shift@show_startperiod');
Route::get('/shift/softdropvariance/{date}','shift@show_softdropvariance');

Route::get('/shift/sessionvariance/{date}','shift@show_sessionvariance');
Route::get('/shift/patronsession/{date}','shift@show_patronsession');
Route::get('/shift/closeperiod/{date}','shift@show_closeperiod');

// Hand-pay
Route::get('/shift/handpay/{date}','handpay@showHandpay');
Route::get('/shift/handpay/get/{page}/{num}/{field}/{keyword}','handpay@getdata');
Route::get('/shift/handpay/update/{id}/{amount}/{group}/{level}/{status}/{overrideby}','handpay@updatedata');

// Member D-W
Route::get('/shift/dw/{date}','shiftdw@showDW');
Route::get('/shift/dw/getdata/{classid}/{page}/{num}/{field}/{keyword}','shiftdw@getdata');

// Meter Variance
Route::get('/shift/metervariance/{date}','metervariance@showMetervariance');
Route::get('/shift/metervariance/getdata/{date}/{page}/{num}/{field}/{keyword}','metervariance@getMachine');
Route::get('/shift/metervariance/getperiod/{date}/{mnum}','metervariance@getPeriodData');
Route::get('/shift/metervariance/update/{id}/{games}/{coinin}/{coinout}/{billin}/{jackpot}/{ticketin}/{ticketout}/{xtracredit}/{cancelcredit}/{progressive}','metervariance@update');

// Bonus Variance
Route::get('/shift/bonus/{date}','bonus@showBonus');

// api testing
Route::get('/softsearch/{date}/{keyword}/{field}/{exception}','shift@softsearch');
Route::get('/soft/{date}/{page}/{num}/{field}/{keyword}/{exception}','shift@page');
Route::get('/softdrop/update/{id}/{value}','shift@updateSoftDrop');
