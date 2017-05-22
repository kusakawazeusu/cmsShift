@extends('report_layout.report_layout')

@section('name')
	櫃台作廢紀錄報表
@endsection

@section('script')
<script>
	$(document).ready(function()
		{
			$('#dataTables').DataTable(
				{
					"lengthMenu": [ [10,20,30,40,50,60,70,80,90,100, -1], [10,20,30,40,50,60,70,80,90,100, "All"] ],
					 "iDisplayLength": -1,
					drawCallback: function () 
					{
						var api = this.api();
						var total = api.column( 3 ).data().sum();
						var pageTotal = api.column( 3, {page:'current'} ).data().sum();
						$( api.column(3).footer() ).html(//toFixed(X)設定小數點後X位數
							'$'+pageTotal.toLocaleString("en-US") +' <br>  $'+ total.toLocaleString("en-US")
						);
					}
	  			});
			//$('table.display').DataTable();
		});
</script>

@endsection


@section('content')
<div class="container-fluid">
	<div>
		<h4 class="col-sm-4"><strong>{{$startTime}}~{{$endTime}}</strong></h4>
		<form action="report_export_ticketvoid" method="POST" class="form-horizontal col-sm-8">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="startTime" value="{{ $startTime }}">
			<input type="hidden" name="endTime" value="{{ $endTime }}">
    		<button type="submit" class="btn btn-success">匯出報表</button>
		</form>
	</div>
	<div >
			<table class="table display table-bordered" id="dataTables">
				<thead>
					<tr class="warning">
						<th style="text-align:center">Validation Code<br>Ticket號碼</th>
						<th style="text-align:center">Issued<br>Ticket列印時間</th>
						<th style="text-align:center">Issued by</th>
						<th style="text-align:center">Amount<br>Ticket金額</th>
						<th style="text-align:center">Void Date</th>
					</tr>
				</thead>
				<tfoot>
			            <tr class="info">
			                <th colspan="3" style="text-align:center">Game Machine 小計<br>合計</th>
			                <th colspan="2" style="text-align:center"></th>
			            </tr>
		        	</tfoot>
				<tbody>
					@foreach($ticketvoids as $ticketvoid)
						<tr>
							<td style="text-align:center">{{$ticketvoid->Validation_Code}}</td>
							<td style="text-align:center">{{$ticketvoid->Issued}}</td>
							<td style="text-align:center">{{$ticketvoid->Issued_by}}</td>
							<td style="text-align:center">{{number_format($ticketvoid->Amount, 2, '.', ',')}}</td>
							<td style="text-align:center">{{$ticketvoid->Void_date}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
	
	
</div>
@endsection