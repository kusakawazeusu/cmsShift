@extends('main')

@section('title','新增/修改 系統管理員')

@section('header')
<ol class="breadcrumb">
  <li><a href="{{ url('/index') }}">首頁</a></li>
  <li><a href="{{ url('/operator') }}">管理員系統</a></li>
  <li class="active">新增/修改 事件警示</li>
</ol>
@endsection


@section('content')

<script>

$(document).ready(function(){

	$("#error_msg").delay( 2000 ).fadeOut("slow");
	$("#msg").delay( 2000 ).fadeOut("slow");

});

</script>



@if( session('msg') )
<div id="msg" class="alert alert-info">
	{{ session('msg') }}
</div>
@endif

<a data-toggle="modal" data-target="#newevent" style="margin-left:10px" class="btn btn-primary">新增事件</a>

<table id="datatables">
	<thead>
		<tr>
			<th>EVENT CODE</th>
			<th>事件敘述</th>
			<th>編輯</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $events as $event )
		<tr>
			<td>{{ $event->code }}</td>
			<td>{{ $event->EventDescription }}</td>
			<td><a data-toggle="modal" data-target="#event{{ $event->id }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
		</tr>
		@endforeach
	</tbody>
</table>

<!-- 新增事件的表單 -->
<div class="modal fade" id="newevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">新增事件</h4>
			</div>
			<div class="modal-body col-sm-offset-2">
				<form method="POST" action="{{ url('/operator/event/newevent') }}" class="form-horizontal">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label class="contorl-label col-sm-4">EVENT CODE：</label>
						<div class="col-sm-5">
							<input name="event_code" class="form-control" value=""></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">事件敘述：</label>
						<div class="col-sm-5">
							<input name="event_description" class="form-control" value=""></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">警告模式：</label>
						<div class="col-sm-5">
							<label><input name="new-redlight" type="checkbox"> 螢幕紅燈</label>
							<label><input name="new-yellowlight" type="checkbox"> 螢幕黃燈</label>
							<label><input name="new-screenflicker" type="checkbox"> 螢幕閃爍</label>
							<label><input name="new-audio" type="checkbox"> 發警告音</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-7">
							<input class="btn btn-primary" type="submit"></input>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- 每一位事件的詳細資料 -->
@foreach( $events as $event )
<div class="modal fade" id="event{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">事件：{{ $event->code }}</h4>
			</div>
			<div class="modal-body col-sm-offset-2">
				<form method="POST" action="{{ url('/operator/event/edit',array('id'=>$event->id)) }}" class="form-horizontal">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label class="contorl-label col-sm-4">Event Code：</label>
						<div class="col-sm-5">
							<input name="event_code" class="form-control" value="{{$event->code}}"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">事件敘述：</label>
						<div class="col-sm-5">
							<input name="event_description" class="form-control" value="{{$event->EventDescription}}"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">警告模式：</label>
						<div class="col-sm-5">
							<label><input name="redlight{{$event->id}}" type="checkbox" @if($event->RedLight == '1') checked @endif> 螢幕紅燈</label>
							<label><input name="yellowlight{{$event->id}}" type="checkbox" @if($event->YellowLight == '1') checked @endif> 螢幕黃燈</label>
							<label><input name="screenflicker{{$event->id}}" type="checkbox" @if($event->ScreenFlicker == '1') checked @endif> 螢幕閃爍</label>
							<label><input name="audio{{$event->id}}" type="checkbox" @if($event->WarningAudio == '1') checked @endif> 發警告音</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2">
						<a name="delete_btn" href="{{ url('/operator/event/delete',array('event'=>$event->id)) }}" class="btn btn-danger">刪除</a>	
						</div>
						<div class="col-sm-2 col-sm-offset-5">
							<input name="submit_btn" class="btn btn-primary" type="submit"></input>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection