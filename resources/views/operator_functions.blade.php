@extends('main')

@section('title','系統管理員')

@section('header')
<ol class="breadcrumb">
  <li><a href="{{ url('/index') }}">首頁</a></li>
  <li class="active"><a href="#">管理員系統</a></li>

</ol>
@endsection


@section('content')

<script>

$(document).ready(function(){

	$(".opFunction").fadeIn("fast");


});
</script>

<div class="row">
	<div style="display:none" class="col-md-2 col-md-offset-3 opFunction">
		<img class="img-responsive" src="{{ asset('assets/icon/operator.png') }}"></img>
		<a href="{{ url('/operator/manage') }}" class="btn btn-primary btn-block">新增/修改管理員</a>
	</div>

	<div id="div2" style="display:none" class="col-md-2 col-md-offset-2 opFunction">
		<img class="img-responsive" src="{{ asset('assets/icon/group.png') }}"></img>
		<a href="{{ url('/operator/gmanage') }}" class="btn btn-primary btn-block">新增/修改管理群組</a>
	</div>
</div>
<br>
<div class="row">
	<div style="display:none" class="col-md-2 col-md-offset-3 opFunction">
		<img class="img-responsive" src="{{ asset('assets/icon/event.png') }}"></img>
		<a href="{{ url('/operator/event') }}" class="btn btn-primary btn-block">新增/修改事件警示</a>
	</div>

	<div style="display:none" class="col-md-2 col-md-offset-2 opFunction">
		<img class="img-responsive" src="{{ asset('assets/icon/session.png') }}"></img>
		<a href="{{ url('/operator/class') }}" class="btn btn-primary btn-block">新增/修改班別</a>
	</div>
</div>
<br>
<div class="row">
	<div style="display:none" class="col-md-2 col-md-offset-3 opFunction">
		<img class="img-responsive" src="{{ asset('assets/icon/configure.png') }}"></img>
		<a href="{{ url('/operator/configure') }}" class="btn btn-primary btn-block">修改系統參數</a>
	</div>
</div>
@endsection