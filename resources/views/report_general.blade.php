@extends('report_layout.report_layout')

@section('name')
	一般報表
@endsection

@section('script')
	<script>
		$(document).ready(function()
		{
			$('#datatables').DataTable(
				{
					"lengthMenu": [ [10,20,30,40,50,60,70,80,90,100, -1], [10,20,30,40,50,60,70,80,90,100, "All"] ],
					"iDisplayLength": -1
				});
			$('table.display').DataTable();
	    	var table = $('#datatables').DataTable();
			$('#datatables tbody').on('click','td.data',function()
			{
				var data = table.row( this ).data();
				//var report_search_general_modal = document.getElementById("report_search_general");
				//report_search_general_modal.find('.modal-body ReportName').val(data[1]);
				$('#report_search_general_modal').find('.modal-body input.ReportName').val(data[1]);
				$('#report_search_general_modal').modal('show'); 
				//( 'You clicked on '+data[0]+'\'s row' );
				if ( $(this).hasClass('selected') ) 
				{
					$(this).removeClass('selected');
				}
				else 
				{
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
		});
	</script>
@endsection

@section('style')
	<style>
		form{display:inline;}
	</style>
@endsection

@section('content')
	<div class="container-fluid">
		<div>
			<button type="button" class="btn btn-primary btn-flat"  
			data-toggle="modal" 
			data-target="#report_add_general_modal"><span class="glyphicon glyphicon-plus-sign"></span></button><!-- Add -->
		</div>
		<div>
			<table class="table display table-bordered" id="datatables">
			<thead>
				<th style="text-align:center">報表編號</th>
				<th style="text-align:center">報表名稱</th>
				<th style="text-align:center">是否為常用報表</th>
				<th style="text-align:center">報表說明</th>
				<th style="text-align:center">報表檔名</th>
				<th style="text-align:center">動作</th>
			</thead>
			<tbody>
				@foreach($report_general_datas as $report_general_data)
					<tr>
						<td class="data" style="text-align:center">{{$report_general_data->SeqNo}}</td>
						<td class="data" style="text-align:center">{{$report_general_data->ReportName}}</td>
						<td class="data" style="text-align:center">{{$report_general_data->Favorite}}</td>
						<td class="data" style="text-align:center">{{$report_general_data->ReportDesc}}</td>
						<td class="data" style="text-align:center">{{$report_general_data->ReportFile}}</td>
						<td style="text-align:center"><!-- data-後面只能接小寫！！！ -->
							<button type="button" 
							data-report_general_id="{{$report_general_data->id}}"
							data-report_general_seqno="{{$report_general_data->SeqNo}}"
							data-report_general_reportname="{{$report_general_data->ReportName}}"
							data-report_general_favorite="{{$report_general_data->Favorite}}"
							data-report_general_reportdesc="{{$report_general_data->ReportDesc}}"
							data-report_general_reportfile="{{$report_general_data->ReportFile}}"
							data-toggle="modal" 
							data-target="#report_edit_general_modal" 
							class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
							<button type="button" 
							data-report_general_id="{{$report_general_data->id}}"
							data-report_general_seqno="{{$report_general_data->SeqNo}}" 
							data-toggle="modal" 
							data-target="#report_confirmDelete_modal" 
							class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
			</table>
		</div>
	</div>


	<div id="report_add_general_modal" class="modal fade" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">新增一般報表</h4>
				</div> 
				<form action="report_add_general" method="POST" class="form-horizontal">
					<div class="modal-body">
						<div class="input-group">
							<span class="input-group-addon">報表編號</span>
							<input id="SeqNo" class="form-control" type="integer" name="SeqNo">
						</div>
						<div class="input-group">
							<span class="input-group-addon">報表名稱</span>
							<input id="ReportName" class="form-control" type="text" name="ReportName">
						</div>
						<div class="input-group">
							<span class="input-group-addon">是否為常用報表</span>
							<input id="Favorite" class="form-control" type="integer" name="Favorite">
						</div>
						<div class="input-group">
							<span class="input-group-addon">報表說明</span>
							<input id="ReportDesc" class="form-control" type="text" name="ReportDesc">
						</div>
						<div class="input-group">
							<span class="input-group-addon">報表檔名</span>
							<input id="ReportFile" class="form-control" type="text" name="ReportFile">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			   			<button type="submit" class="btn btn-primary">新增</button>
					</div>
				</form>
			</div>
		</div>	
	</div>

	<div id="report_search_general_modal" class="modal fade" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">查詢</h4>
				</div> 
				<form action="report_search_general" method="POST" class="form-horizontal">
					<div class="modal-body">
						<div class="container-fluid">
							<div class="input-group">
								<span class="input-group-addon">報表名稱</span>
								<input id="ReportName" class="form-control ReportName" type="text" name="ReportName" readonly>
							</div>
							<div class="well well-lg">
								<div class="input-group">
									<input type="radio" id="SeqNoRadio" name="Radio" checked="checked" value="SeqNoRadio">
									<span class="input-group-addon">請輸入班別</span>
									<input id="Session" class="form-control" type="integer" name="Session">
								</div>
							</div>
							<div  class="well well-lg">
								<input type="radio" id="dateRadio" name="Radio" value="dateRadio">
								<div class="input-group">
									<span class="input-group-addon">開始時間</span>
									<input id="startTime" class="form-control" type="datetime-local" name="startTime">
								</div>
								<div class="input-group">
									<span class="input-group-addon">結束時間</span>
									<input id="endTime" class="form-control" type="datetime-local" name="endTime">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			   			<button type="submit" class="btn btn-primary">查詢</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="report_confirmDelete_modal" class="modal fade" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">刪除確認</h4>
				</div>
				<div class="modal-body">
   					<p>確定要刪除這筆報表嗎?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<form action="report_delete_general" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" class="id" name="id" id="id">
    					<button type="submit" class="btn btn-primary">刪除</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="report_edit_general_modal" class="modal fade" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">修改一般報表</h4>
				</div> 
				<form action="report_edit_general" method="POST" class="form-horizontal">
					<div class="modal-body">
						<div class="input-group">
							<span class="input-group-addon">報表編號</span>
							<input id="SeqNo" class="form-control SeqNo" type="integer" name="SeqNo">
						</div>
						<div class="input-group">
							<span class="input-group-addon">報表名稱</span>
							<input id="ReportName" class="form-control ReportName" type="text" name="ReportName">
						</div>
						<div class="input-group">
							<span class="input-group-addon">是否為常用報表</span>
							<input id="Favorite" class="form-control Favorite" type="integer" name="Favorite">
						</div>
						<div class="input-group">
							<span class="input-group-addon">報表說明</span>
							<input id="ReportDesc" class="form-control ReportDesc" type="text" name="ReportDesc">
						</div>
						<div class="input-group">
							<span class="input-group-addon">報表檔名</span>
							<input id="ReportFile" class="form-control ReportFile" type="text" name="ReportFile">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<input type="hidden" class="id" name="id" id="id">
			   			<button type="submit" class="btn btn-primary">修改完成</button>
					</div>
				</form>
			</div>
		</div>	
	</div>	



<script>
	$('#report_confirmDelete_modal').on('show.bs.modal',function(event)
		{
			var button = $(event.relatedTarget)
			var report_general_id = button.data('report_general_id')
			var modal=$(this)
			modal.find('.modal-footer input.id').val(report_general_id)
		})

	$('#report_edit_general_modal').on('show.bs.modal',function(event)
		{
			var button = $(event.relatedTarget)
			var report_general_SeqNo = button.data('report_general_seqno')
			var report_general_ReportName = button.data('report_general_reportname')
			var report_general_Favorite = button.data('report_general_favorite')
			var report_general_ReportDesc = button.data('report_general_reportdesc')
			var report_general_ReportFile = button.data('report_general_reportfile')
			var report_general_id = button.data('report_general_id')
			var modal=$(this)
			modal.find('.modal-body input.SeqNo').val(report_general_SeqNo)
			modal.find('.modal-body input.ReportName').val(report_general_ReportName)
			modal.find('.modal-body input.Favorite').val(report_general_Favorite)
			modal.find('.modal-body input.ReportDesc').val(report_general_ReportDesc)
			modal.find('.modal-body input.ReportFile').val(report_general_ReportFile)
			modal.find('.modal-footer input.id').val(report_general_id)
		})

</script>


@endsection