@extends('main')

@section('title','交班系統 - 會員贈點變動')

@section('header')

<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">開啟帳務日</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">入抄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">機台紀錄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">班表紀錄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:15%">會員贈點變動</div>
<div class="progress-bar" role="progressbar" style="width:15%">促銷方案變動</div>
<div class="progress-bar" role="progressbar" style="width:10%">關帳</div>
<hr>
@endsection

@section('content')

<h4>帳務日期：{{ $Sessions[0]->SessionDate }}</h4>

<table id="datatables">
	<thead>
		<tr>
			<th>已結帳</th>
			<th>班別</th>
			<th>店家代碼</th>
			<th>回饋點數贈點</th>
			<th>回饋點數消點</th>
			<th>額外點數贈分</th>
			<th>額外點數消分</th>
			<th>開班時間</th>
			<th>關班時間</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $Sessions as $Session )
		<tr>
			<td>No</td>
			<td>{{ $Session->SessionNo }}</td>
			<td>{{ $Session->SectionNo }}</td>
			<td>{{ $Session->TotalPointAdd }}</td>
			<td>{{ $Session->TotalPointSub }}</td>
			<td>{{ $Session->TotalXtraAdd }}</td>
			<td>{{ $Session->TotalXtraSub }}</td>
			<td>{{ $Session->OpenTime }}</td>
			<td>{{ $Session->CloseTime }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<hr>
<div class="pull-left"><a href="{{ url('shift/sessionvariance',['date'=>$Sessions[0]->SessionDate]) }}" class="btn btn-default">返回上一頁</a></div>
<div class="pull-right"><a href="{{ url('shift/closeperiod',['date'=>$Sessions[0]->SessionDate]) }}" class="btn btn-default">前往下一頁</a></div>

@endsection
