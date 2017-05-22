@extends('main')

@section('title','新增/修改管理員群組')

@section('header')
<ol class="breadcrumb">
  <li><a href="{{ url('/index') }}">首頁</a></li>
  <li><a href="{{ url('/operator') }}">管理員系統</a></li>
  <li class="active">新增 / 修改管理員群組</li>
</ol>
@endsection


@section('content')

<script>

$(document).ready(function(){

	$("#edit").click(function(){
		$("input").prop('disabled',false)
		$("[type='submit']").prop('disabled',false)
		$("#delete").prop('disabled',false)
	});

	$(".group_row").click(function(){

		var select = $(this).attr('name');

		//$(".group_row").css("background-color","#ffffff")
		//$(this).css("background-color","#99b3ff")
		window.location.href = "{{ url('/operator/gmanage') }}/"+select;
	});

	$("#error_msg").delay( 2000 ).fadeOut("slow");
	$("#msg").delay( 2000 ).fadeOut("slow");

});
</script>

@if( $errors->has('new_name') )
<div id="error_msg" class="alert alert-danger">
	<p class="error">{{ $errors->first('new_name') }}</p>
</div>
@endif

@if( session('msg') )
<div id="msg" class="alert alert-info">
	<p class="error">{{ session('msg') }}</p>
</div>
@endif

<a data-toggle="modal" data-target="#newgroup" class="btn btn-primary">新增群組</a>
<br>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>群組名稱</th>
			<th>現金票開出允許金額</th>
			<th>現金票驗證允許金額</th>
			<th>現金票作廢允許金額</th>
			<th>最大覆核金額</th>
		</tr>
	</thead>
	<tbody>
		@foreach( $groups as $group )
		<tr @if( isset($focus_group->GroupID) ) @if( $group->GroupID == $focus_group->GroupID ) style="background-color:#99b3ff" @endif @endif class="group_row" name="{{ $group->GroupID }}">
			<td>{{ $group->GroupID }}</td>
			<td>{{ $group->GroupName }}</td>
			<td>{{ $group->MaxTKTIssueAmount }}</td>
			<td>{{ $group->MaxTKTValidAmount }}</td>
			<td>{{ $group->MaxTKTVoidAmount }}</td>
			<td>{{ $group->MaxTKTOverrideLimitAmount }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<hr>
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">群組權限設定</div>
	    <div class="panel-body">
	    	<form  method="POST" @if(isset($focus_group->GroupID)) action="{{ url('/operator/gmanage/edit',array('id'=>$focus_group->GroupID)) }}@endif" class="form-horizontal col-sm-10">
	    		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled name="pof0" type="checkbox" @if($focus_group->PrivilegeOfFunctions0) checked @endif"> 會計</label>
	    			@else
	    			<label><input disabled name="pof0" type="checkbox"> 會計</label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled name="pof1" type="checkbox" @if($focus_group->PrivilegeOfFunctions1) checked @endif> 票務</label>
	    			@else
	    			<label><input disabled name="pof1" type="checkbox"> 票務</label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled  name="pof2" type="checkbox" @if($focus_group->PrivilegeOfFunctions2) checked @endif> 機台管理/監控 </label>
	    			@else
	    			<label><input disabled  name="pof2" type="checkbox"> 機台管理/監控 </label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled  name="pof3" type="checkbox" @if($focus_group->PrivilegeOfFunctions3) checked @endif> 系統管理員</label>
	    			@else
	    			<label><input disabled  name="pof3" type="checkbox"> 系統管理員</label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled  name="pof4" type="checkbox" @if($focus_group->PrivilegeOfFunctions4) checked @endif> 會員管理</label>
	    			@else
	    			<label><input disabled  name="pof4" type="checkbox"> 會員管理</label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled  name="pof5" type="checkbox" @if($focus_group->PrivilegeOfFunctions5) checked @endif> 一般報表作業</label>
	    			@else
	    			<label><input disabled  name="pof5" type="checkbox"> 一般報表作業</label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled  name="pof6" type="checkbox" @if($focus_group->PrivilegeOfFunctions6) checked @endif> 進階報表作業</label>
	    			@else
	    			<label><input disabled  name="pof6" type="checkbox"> 進階報表作業</label>
	    			@endif
	    		</div>
	    		<div class="form-group">
	    			@if(isset($focus_group->PrivilegeOfFunctions0))
	    			<label><input disabled  name="pof7" type="checkbox" @if($focus_group->PrivilegeOfFunctions7) checked @endif> 登出</label>
	    			@else
	    			<label><input disabled  name="pof7" type="checkbox"> 登出</label>
	    			@endif
	    		</div>
	    	<!-- </form> -->
	    </div>
	</div>
</div>

<div class="col-md-7">
	<div class="panel panel-default">
		<div class="panel-heading">群組資訊設定</div>
	    <div class="panel-body">
	    		<div class="form-group">
	    			<label class="control-label col-sm-4">ID:</label>
	    			<div class="col-sm-6">
      					<input disabled class="form-control" placeholder="Group ID" value="{{ $focus_group->GroupID or 'N/A' }}">
    				</div>
    				<br><br>
	    		</div>
	    		<div class="form-group">
	    			<label class="control-label col-sm-4">名稱:</label>
	    			<div class="col-sm-6">
      					<input name="gname" disabled class="form-control"placeholder="Group Name" value="{{ $focus_group->GroupName or 'N/A' }}">
    				</div>
    				<br><br>
    			</div>
    			<hr>
	    		<div class="form-group">
	    			<label class="control-label col-sm-4">現金票開出允許金額:</label>
	    			<div class="col-sm-6">
      					<input name="tktissue" disabled class="form-control"placeholder="Ticket Issue" value="{{ $focus_group->MaxTKTIssueAmount or 'N/A' }}">
    				</div>
    				<br>
	    		</div>
	    		<div class="form-group">
	    			<label class="control-label col-sm-4">現金票驗證允許金額:</label>
	    			<div class="col-sm-6">
      					<input name="tktvalid" type="text" disabled class="form-control"placeholder="Ticket Validation" value="{{ $focus_group->MaxTKTValidAmount or 'N/A' }}">
    				</div>
    				<br>
	    		</div>
	    		<div class="form-group">
	    			<label class="control-label col-sm-4">現金票作廢允許金額:</label>
	    			<div class="col-sm-6">
      					<input name="tktvoid" disabled class="form-control"placeholder="Ticket Void" value="{{ $focus_group->MaxTKTVoidAmount or 'N/A' }}">
    				</div>
    				<br>
	    		</div>
	    		<div class="form-group">
	    			<label class="control-label col-sm-4">最大覆核金額:</label>
	    			<div class="col-sm-6">
      					<input name="tktoverride" disabled class="form-control"placeholder="Orride Limit" value="{{ $focus_group->MaxTKTOverrideLimitAmount or 'N/A' }}">
    				</div>
    				<br><br>
	    		</div>
	    		<div class="pull-right">
					<input disabled  id="sub" type="submit" class="btn btn-primary"></input>
				</div>

	    		<div class="pull-left">
					<button type="button" id="edit" class="btn btn-warning">解鎖</button>
					@if(isset($focus_group->GroupID))
					<input type="button" value="刪除" onclick=window.location.href="{{ url('/operator/gmanage/delete',array('id'=>$focus_group->GroupID)) }}" disabled id="delete" class="btn btn-danger"></button>
					@endif
				</div>
	    		</div>
	    	</form>
	    </div>
	</div>
</div>

<!-- 新增群組的表單 -->
<div class="modal fade" id="newgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">新增管理員群組</h4>
			</div>
			<div class="modal-body col-sm-offset-2">
				<form method="POST" action="{{ url('/operator/gmanage/newgroup') }}" class="form-horizontal">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label class="contorl-label col-sm-4">群組名稱：</label>
						<div class="col-sm-5">
							<input name="new_name" class="form-control" value=""></input>
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



@endsection