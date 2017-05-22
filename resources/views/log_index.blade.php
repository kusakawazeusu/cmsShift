<!DOCTYPE html>

<html>

<!-----------------------data--------------------------->

<form name="all_data" action="log" method="post">
	{{ csrf_field() }}	
	<input id="totalpage" type="hidden" name="totalpage" value="{{ $totalpage }}"/>
	<input id="type" type="hidden" name="type" value="{{ $type }}"/> 
	<input id="page" type="hidden" name="page" value="{{ $page }}"/>
	<input id="limit" type="hidden" name="limit" value="{{ $limit }}"/>
	<input id="log_search_col" type="hidden" name="log_search_col" value="{{ $log_search_col }}"/>
	<input id="log_search_command" type="hidden" name="log_search_command" value="{{ $log_search_command }}"/>
	<input id="time_from" type="hidden" name="time_from" value="{{ $time_from }}"/>
	<input id="time_to" type="hidden" name="time_to" value="{{ $time_to }}"/>
</form>

<!-----------------------data--------------------------->

<head>
	<title>紀錄Log</title>
	<!--<link rel="stylesheet" type="text/css" href="{{ asset('css\bootstrap.css')}}">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!--modal-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--modal-->
	
	<!--sort table-->
	<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<!--sort table-->
	
	<style type="text/css">
		
	</style>
	
	<script>
    $(document).ready(function(){
            <!--sort table-->
			$('#log_table').DataTable({
                "lengthMenu": [ [10, 20, 30, -1], [10, 20, 30, "All"] ],   //顯示筆數清單
                "pageLength": 10,			 //預設顯示筆數
				"order": [[ 0, "desc" ]],	 //預設排序
				"info": false,
				"paging":false,
				"searching":false
            });
			<!--sort table-->
			
			<!--modal-->	   
			$(document).on("click", ".log_detail", function (e) {
				e.preventDefault();
				$('#log_detail_time').html($(this).data('time'));
				$('#log_detail_code').html($(this).data('code'));
				$('#log_detail_eventdescription').html($(this).data('eventdescription'));
				$("#log_detail_modal").modal('show');
			});
			
			$(document).on("click", ".log_edit", function (e) {
				e.preventDefault();
				$('#log_edit_id').val($(this).data('id'));
				$('#log_edit_time').html($(this).data('time'));
				$('#log_edit_code').val($(this).data('code'));
				$('#log_edit_eventdescription').html($(this).data('eventdescription'));
				$("#log_edit_modal").modal('show');
			});
			
			$(document).on("click", ".log_create", function (e) {
				e.preventDefault();
				$("#log_create_modal").modal('show');
			});
			
			<!--modal-->	
			
        });  
	
    </script>
	
	
	<script language="javascript" type="text/javascript">
	function set_value(id, value)
	{
		document.getElementById(id).value = value;
	}
	function get_value(id)
	{
		return document.getElementById(id).value;
	}
	function page_check()
	{
		return parseInt(get_value('totalpage')) > parseInt(get_value('page'));
	}
	function confirm_check(content)
	{
		return confirm(content);
	}
	function log_delete(content)
	{
		if(confirm_check(content)) window.location.href = '/system/public/log_delete';
	}
	function log_data_restart()
	{
		set_value('page', '1');
		set_value('log_search_col', 'code');
		set_value('log_search_command', '');
	}
	</script>
	
</head>

<body>

<!--log_detail_modal-->
<div id="log_detail_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      
	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail</h4>
      </div>
	  
      <div class="modal-body">
        <table class="table table-striped table-bordered middle display">
			<tbody class="row-count">
				<tr>
					<th width="20%">時間</th>
					<th id="log_detail_time" width="80%">
					</th>
				</tr> 
				
				<tr>
					<th>代碼</th>
					<th id="log_detail_code"></th>
				</tr> 
				
				<tr>
					<th>詳細資訊</th>
					<th id="log_detail_eventdescription"></th>
				</tr> 
				
			</tbody>
		</table>	
      </div>
      
	  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  
    </div>

  </div>
</div>
<!--log_detail_modal-->

<!--log_edit_modal-->
<div id="log_edit_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<form name="log_edit" action="log_edit" method="post">
		<div class="modal-content">
		  
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Edit</h4>
		  </div>
		  
		  <div class="modal-body">
			<table class="table table-striped table-bordered middle display">
				<tbody class="row-count">
					<tr>
						<th width="20%">時間</th>
						<th id="log_edit_time" width="80%"></th>
					</tr> 
					
					<tr>
						<th>代碼</th>
						<th>
							{{ csrf_field() }}	
							<input id="log_edit_id" type="hidden" name="log_edit_id"/> 
							<input id="log_edit_code" type="text" name="log_edit_code"/>
						
						</th>
					</tr> 
					
					<tr>
						<th>詳細資訊</th>
						<th id="log_edit_eventdescription"></th>
					</tr> 
					
				</tbody>
			</table>	
		  </div>
		  
		  <div class="modal-footer">
			<button type="submit" class="btn btn-success">更新</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
		  </div>
		  
		</div>
	</form>
  </div>
</div>
<!--log_edit_modal-->

<!--log_create_modal-->
<div id="log_create_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<form action="/system/public/log_store" method="post">
		{{ csrf_field() }}
		<div class="modal-content">
		  
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">create</h4>
		  </div>
		  
		  <div class="modal-body">
			  Code&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="code" />
		  </div>
		  
		  <div class="modal-footer">
			<button type="submit" class="btn btn-success">新增</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
		  </div>
		  
		</div>
	</form>
  </div>
</div>
<!--log_create_modal-->

<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/system/public/index">後臺管理系統</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				@if ($type == 'N') <li class="active">
				@else <li>
				@endif
					<a href="#" onclick="set_value('type', 'N'); log_data_restart(); all_data.submit();">全部事件</a>
				</li>
				@if ($type == 'Q') <li class="active">
				@else <li>
				@endif
					<a href="#" onclick="set_value('type', 'Q'); log_data_restart(); all_data.submit();">一般事件</a>
				</li>                                       
				@if ($type == 'P') <li class="active">
				@else <li>
				@endif                       
					<a href="#" onclick="set_value('type', 'P'); log_data_restart(); all_data.submit();">重大事件</a>
				</li>                                       
				@if ($type == 'A') <li class="active">
				@else <li>
				@endif                            
					<a href="#" onclick="set_value('type', 'A'); log_data_restart(); all_data.submit();">操作事件</a>
				</li>
			</ul>
		</div>
		<!-- /.nav-collapse -->
	</div>
	<!-- /.container -->
</nav>
<!-- /.navbar -->
	
<div class="container" style="padding-top:60px;">

	<div class="row row-offcanvas row-offcanvas-left">
	
		<div class="col-sm-12">
			
			<div class="row">
				<div class="col-md-12">					
					<button class='btn btn-primary log_create' href="#log_create_modal" data-toggle="modal">
						新增資料
					</button>
					
					<a class="btn btn-primary text-left" onclick="log_delete('是否要刪除3個月以前的紀錄?');">刪除紀錄</a>
					<a href="log_export_excel" class="btn btn-primary">匯出報表</a>
					
					<form action="" method="post" style='float:right;'>
					  {{ csrf_field() }}
					  <div style="float:right;">
						  查詢時間從 <input id="select_time_from" type="datetime-local" value="{{ $time_from }}" onchange="set_value('time_from', get_value('select_time_from'));" />
						  到 <input id="select_time_to" type="datetime-local" value="{{ $time_to }}" onchange="set_value('time_to', get_value('select_time_to'));"/>
						  <button type="button" class="btn btn-primary" onclick="log_data_restart(); all_data.submit();">
							<span class="glyphicon glyphicon-search"></span>
						  </button>
					  </div>
					  
					</form>		
				</div>
			</div>
			
			<div class="row" style="margin-top:10px;">
				<div class="col-sm-12">
					<div style="float:left;">顯示筆數&nbsp;&nbsp;</div>
					<form style="float:left;">
					{{ csrf_field() }}
					<select id="select_limit" onchange="set_value('limit', get_value('select_limit')); set_value('page', '1'); all_data.submit();">
						@if ($limit == 10)
							<option value="10" selected>10</option>
						@else
						　	<option value="10">10</option>	
						@endif
						
						@if ($limit == 20)
							<option value="20" selected>20</option>
						@else
						　	<option value="20">20</option>	
						@endif
						
						@if ($limit == 30)
							<option value="30" selected>30</option>
						@else
						　	<option value="30">30</option>	
						@endif
						
						@if ($limit == -1)
							<option value="-1" selected>All</option>
						@else
						　	<option value="-1">All</option>	
						@endif
					</select>
					</form>
					
					<form style='float:right;'>
					  {{ csrf_field() }}
					  
					  <select id="text_log_search_col" onchange="set_value('log_search_col', get_value('text_log_search_col'));">
						@if ($log_search_col == 'updated_at')
							<option value="updated_at" selected>時間</option>
						@else
						　	<option value="updated_at">時間</option>	
						@endif
						
						@if ($log_search_col == 'code')
							<option value="code" selected>代碼</option>
						@else
						　	<option value="code">代碼</option>	
						@endif
						
						@if ($log_search_col == 'EventDescription')
							<option value="EventDescription" selected>詳細資訊</option>
						@else
						　	<option value="EventDescription">詳細資訊</option>	
						@endif
					</select>
					
					  <input id="text_log_search_command" type="text" value="{{ $log_search_command }}" onkeypress="if (window.event.keyCode==13) return false; " oninput="set_value('log_search_command', get_value('text_log_search_command'));" />
					  <button type="button" class="btn btn-primary" onclick="set_value('page', '1'); all_data.submit();">
						<span class="glyphicon glyphicon-search"></span>
					  </button>
					  
					</form>		
					
				</div>
			</div>
			
			<div class="row" style="margin-top:10px;">
				<div class="col-sm-12">
					<table class="table table-striped table-bordered middle display" id="log_table">
						<thead>
							<tr class="info down-border">
								<th width="20%">時間</th>
								<th width="10%">代碼</th>
								<th width="50%">詳細資訊</th>
								<th width="20%"></th>
							</tr>
						</thead>
						<tbody class="row-count">
						  @foreach($datas as $data)
							<tr>
								<th>{{ $data -> updated_at}}</th>
								<th>{{ $data -> code}}</th>
								<th>{{ $data -> EventDescription}}</th>
								<th>
									<form name="log_record_remove" action="/system/public/log_remove" method="post">
										{{ csrf_field() }}
									
										<button class='btn btn-primary log_detail' href="#log_detail_modal" data-toggle="modal" 
											data-time="{{ $data->updated_at }}"
											data-code="{{ $data->code }}"
											data-eventdescription="{{ $data->EventDescription }}">
											
											<span class="glyphicon glyphicon-list-alt"></span>
										</button>
										
										<button class='btn btn-warning log_edit' href="#log_edit_modal" data-toggle="modal" 
											data-id="{{ $data->id }}"
											data-time="{{ $data->updated_at }}"
											data-code="{{ $data->code }}"
											data-eventdescription="{{ $data->EventDescription }}">
											
											<span class="glyphicon glyphicon-edit"></span>
										</button>
										
										<input type="hidden" name="id" value="{{ $data->id }}"/>
										<button type="submit" class="btn btn-danger">	
											<span class="glyphicon glyphicon-remove"></span>										
										</button>
									</form>	
								</th>
							</tr>
						  @endforeach
						  
						</tbody>
					</table>	
				</div>
			</div>
			
			<div class="row" style="margin-top:10px;">
				<div class="col-sm-12">
					<form>
					  <input style='width:100px; float:right; margin-left:10px;' name="down" class="btn btn-primary" onclick="set_value('page', parseInt(get_value('totalpage'))); all_data.submit();" value="最後一頁">
					  <input style='width:100px; float:right; margin-left:10px;' name="down" class="btn btn-primary" onclick="set_value('page', parseInt(get_value('page')) + (page_check() ? 1 : 0)); all_data.submit();" value="下一頁">
					  <input style='width:100px; float:right; margin-left:10px;' name="up" class="btn btn-primary" onclick="set_value('page', parseInt(get_value('page')) - (get_value('page') > 1 ? 1 : 0)); all_data.submit();" value="上一頁">
					  <input style='width:100px; float:right; margin-left:10px;' name="down" class="btn btn-primary" onclick="set_value('page', 1); all_data.submit();" value="第一頁">
					  <div class='middle' style="width:100px;">
					  {{ $page }} / {{ $totalpage }}
					  </div>
					</form>
				</div>
			</div>
				
			
			
		</div>
		
	</div>

</div>

</body>
</html>