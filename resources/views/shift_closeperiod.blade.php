@extends('main')

@section('title','交班系統 - 關帳')

@section('header')

<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">開啟帳務日</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">入抄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">機台紀錄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">班表紀錄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">會員贈點變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">促銷方案變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:10%">關帳</div>
<hr>
@endsection

@section('content')

<h4>帳務日期：{{ $date }}</h4>
<h5>已關帳成功</h5>

<hr>
<div class="pull-left"><a href="{{ url('shift/patronsession',['date'=>$date]) }}" class="btn btn-default">返回上一頁</a></div>

@endsection
