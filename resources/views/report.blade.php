<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
	<script src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>
  	<link href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet"/>

  	<link href="{!! asset('assets/dataTable/css/jquery.dataTables.min.css') !!}" media="all" rel="stylesheet"/>
	<script src="{!! asset('assets/dataTable/js/jquery.dataTables.min.js') !!}"></script>

	<script>
		$(document).ready(function(){
			$('#datatables').DataTable(
				{'searching':false});
			$('table.display').DataTable();
		});
	</script>
	<style >
		form{display:inline;}
	</style>
</head>
<body>
<br>
<div class="container-fluid">
	<div>
		<p>
			<a href="{{ route('Report_Export_Excel') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-download"></span> 匯出報表</a>
			<button type="button" class="btn btn-success btn-flat"
			data-toggle="modal" 
			data-target="#importReport"><span class="glyphicon glyphicon-upload"></span> 匯入報表</button>
			<button type="button" class="btn btn-primary btn-flat"  
			data-toggle="modal" 
			data-target="#addModal"><span class="glyphicon glyphicon-plus-sign"></span></button><!-- Add -->
			<button type="button" class="btn btn-primary btn-flat" 
			data-toggle="modal" 
			data-target="#searchModal">
			<span class="glyphicon glyphicon-search"></span></button><!-- Search -->
		</p>
		<p>
			<a href="#" class="btn btn-success" role="button">櫃台開出票據紀錄</a>
			<a href="#" class="btn btn-success" role="button">櫃台作廢票據紀錄</a>
			<a href="#" class="btn btn-success" role="button">櫃台兌換票據紀錄</a>
			<a href="#" class="btn btn-success" role="button">櫃台洗分/印票紀錄</a>
			<a href="#" class="btn btn-success" role="button">清鈔差異紀錄</a>
			<a href="#" class="btn btn-success" role="button">櫃台入票紀錄</a>
		</p>
		<p>
			<a href="#" class="btn btn-success" role="button">各機台營運狀況</a>
			<a href="#" class="btn btn-success" role="button">各機台營運狀況與現金流資訊</a>
			<a href="#" class="btn btn-success" role="button">各機台現金流資訊</a>
		</p>
	</div>
	<br>
	<div>
		<table class="table display" id="datatables">
			<thead>
				<th>報表編號</th>
				<th>報表名稱</th>
				<th>是否為常用報表</th>
				<th>報表說明</th>
				<th>報表檔名</th>
				<th sorting=false>動作</th>
			</thead>
			<tbody>
				@foreach($reports as $report)
					<tr>
						<td>{{$report->SeqNo}}</td>
						<td>{{$report->ReportName}}</td>
						<td>{{$report->Favorite}}</td>
						<td>{{$report->ReportDesc}}</td>
						<td>{{$report->ReportFile}}</td>
						<td>
							<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
							<button type="button" class="btn btn-danger"
							data-toggle="modal" 
							data-target="#confirmDelete"><span class="glyphicon glyphicon-trash"></span></button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


<div id="searchModal" name="searchModal" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">搜尋</h4>
			</div>
			<div class="modal-body">
				<h4>Test</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	   			<button type="submit" class="btn btn-primary">搜尋</button>
			</div>
		</div>
	</div>	
</div>

<div id="addModal" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">新增</h4>
			</div>
			<div class="modal-body">
				<h4>新增</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	   			<button type="submit" class="btn btn-primary">新增</button>
			</div>
		</div>
	</div>	
</div>

<div id="confirmDelete" class="modal fade" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">刪除確認</h4>
				</div>
				<div class="modal-body">
   					<p>確定要刪除這筆資料嗎?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<form action="DeleteOrder" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" class ="id" name="id" id="id">
    					<button type="submit" class="btn btn-primary">刪除</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="importReport" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">匯入報表</h4>
			</div>
			<form enctype="multipart/form-data" class="form-horizontal">
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="file" name="import_file" id="import_file">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	   					<button type="submit" class="btn btn-primary">匯入報表</button>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>