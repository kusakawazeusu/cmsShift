@extends('main')

@section('title','交班系統 - 開啟帳務日')

@section('header')

<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:12%"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> 開啟帳務日</div>
<div class="progress-bar" role="progressbar" style="width:11%">手動洗分</div>
<div class="progress-bar" role="progressbar" style="width:11%">會員上下分</div>
<div class="progress-bar" role="progressbar" style="width:11%">入抄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">機台紀錄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">班表紀錄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">會員贈點變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">促銷方案變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">關帳</div>
<hr>
@endsection

@section('content')

<h4>請選擇要開啟的帳務日：</h4>

@foreach( $PeriodDate as $date )
    <div class="col-md-2" style="padding-top:10px">
    	<a href="{{ url('shift/handpay',[$date]) }}" class="btn btn-default">{{ $date }}</a>
    </div>
@endforeach

@endsection

<!-- 世界中の誰より -->