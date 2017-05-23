@extends('main')

@section('title','新增/修改 系統管理員')

@section('header')
<ol class="breadcrumb">
  <li><a href="{{ url('/index') }}">首頁</a></li>
  <li><a href="{{ url('/operator') }}">管理員系統</a></li>
  <li class="active">新增/修改 系統管理員</li>
</ol>
@endsection


@section('content')

<script>

$(document).ready(function(){

	var t = $('#datatables').DataTable({
			paging: false,
			"bInfo" : false,
			"bFilter": false,
			fixedHeader: true,
			
		});

	$("#sort").change(function(){

		if( $(this).find(":selected").text() == 'ALL' )
			window.location.href = "{{ url('/operator/manage') }}";
		else
			window.location.href = "{{ url('/operator/manage') }}/"+$(this).find(":selected").text();
	});

	$("[name='delete_btn']").click(function(){
		if(confirm("你確定要刪除這名管理員嗎？"))
		{
			window.event.returnValue=true;
		}
		else
		{
			window.event.returnValue=false;
		};
	});

	$("#error_msg").delay( 2000 ).fadeOut("slow");
	$("#msg").delay( 2000 ).fadeOut("slow");

});

</script>

@if( $errors->has('name') || $errors->has('password') )
<div id="error_msg" class="alert alert-danger">
	<p class="error">{{ $errors->first('name') }}</p>
	<p class="error">{{ $errors->first('password') }}</p>
</div>
@endif

@if( session('msg') )
<div id="msg" class="alert alert-info">
	{{ session('msg') }}
</div>
@endif

<form class="form-inline">
	<div class="form-group">
		<label><span class="glyphicon glyphicon-search"></span> 搜尋群組：</label>
		<select id="sort" class="form-control">
			<option>ALL</option>
			@foreach($groups as $group)
				@if( !isset($selected) )
				<option>{{ $group }}</option>
				@elseif( $group == $selected )
				<option selected>{{ $group }}</option>
				@else
				<option>{{ $group }}</option>
				@endif
			@endforeach
		</select>
	</div>
	<a data-toggle="modal" data-target="#newoperator" style="margin-left:10px" class="btn btn-primary">新增管理員</a>
</form>




<table style="padding-top:30px" class="table table-striped table-hover" id="datatables">
	<thead>
		<tr>
			<th>ID</th>
			<th>管理員名稱</th>
			<th>所屬管理群</th>
			<th>編輯</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $operators as $operator )
		<tr>
			<td>{{ $operator->id }}</td>
			<td>{{ $operator->OperatorName }}</td>
			<td>{{ $operator->GroupName }}</td>
			<td><a data-toggle="modal" data-target="#operator{{ $operator->id }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
		</tr>
		@endforeach
	</tbody>
</table>

<!-- 新增管理員的表單 -->
<div class="modal fade" id="newoperator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">新增管理員</h4>
			</div>
			<div class="modal-body col-sm-offset-2">
				<form method="POST" action="{{ url('/operator/manage/newoperator') }}" class="form-horizontal">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label class="contorl-label col-sm-4">帳號：</label>
						<div class="col-sm-5">
							<input name="name" class="form-control" value=""></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">所屬群組：</label>
						<div class="col-sm-5">
							<select name="group" class="form-control">
								@foreach($groups as $group)
									<option>{{ $group }}</option>	
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">密碼：</label>
						<div class="col-sm-5">
							<input name="pw" type="password" class="form-control" value=""></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4"><input name="active" type="checkbox"></input> 啟用</label>
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


<!-- 每一位管理員的詳細資料 -->
@foreach( $operators as $operator )
<div class="modal fade" id="operator{{$operator->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">{{ $operator->OperatorName }}</h4>
			</div>
			<div class="modal-body col-sm-offset-2">
				<form method="POST" action="{{ url('/operator/manage/edit',array('id'=>$operator->id)) }}" class="form-horizontal">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label class="contorl-label col-sm-4">ID：</label>
						<div class="col-sm-5">
							<input disabled class="form-control" value="{{$operator->id}}"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">帳號：</label>
						<div class="col-sm-5">
							<input name="name" class="form-control" value="{{$operator->OperatorName}}"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">所屬群組：</label>
						<div class="col-sm-5">
							<select name="group" class="form-control">
								@foreach($groups as $group)
									@if( $group == $operator->GroupName )
									<option selected>{{ $group }}</option>
									@else
									<option>{{ $group }}</option>
									@endif		
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="contorl-label col-sm-4">密碼：</label>
						<div class="col-sm-5">
							<input name="pw" type="password" class="form-control" value="{{$operator->password}}"></input>
						</div>
					</div>
					<div class="form-group">
						@if( $operator->Active )
						<label class="contorl-label col-sm-4"><input checked name="active" type="checkbox"></input> 啟用</label>
						@else
						<label class="contorl-label col-sm-4"><input name="active" type="checkbox"></input> 啟用</label>
						@endif
					</div>
					<div class="form-group">
						<div class="col-sm-2">
						<a name="delete_btn" href="{{ url('/operator/manage/delete',array('operatorID'=>$operator->id)) }}" class="btn btn-danger">刪除</a>	
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