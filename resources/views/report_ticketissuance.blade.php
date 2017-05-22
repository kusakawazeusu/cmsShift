@extends('report_layout.report_layout')

@section('name')
	櫃台開出票據報表
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
		<form action="report_export_ticketissuance" method="POST" class="form-horizontal col-sm-8">
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
						<th style="text-align:center">Tkt Seq<br>機台Ticket序號</th>
						<th style="text-align:center">Validation Code<br>Ticket號碼</th>
						<th style="text-align:center">Issued<br>Ticket列印時間</th>
						<th style="text-align:center">Amount<br>Ticket金額</th>
						<th style="text-align:center">Paid/Void Flag<br>付款/取消 標示</th>
						<th style="text-align:center">Paid Date<br>付款時間</th>
					</tr>
				</thead>
				<tfoot>
			            <tr class="info">
			                <th colspan="3" style="text-align:center">合計:<br>總計:</th>
			                <th colspan="3" style="text-align:center"></th>
			            </tr>
		        	</tfoot>
				<tbody>
					@foreach($ticketissuances as $ticketissuance)
						<tr>
							<td style="text-align:center">{{$ticketissuance->MachineTKTSeqNo}}</td>
							<td style="text-align:center">{{$ticketissuance->Validation_Code}}</td>
							<td style="text-align:center">{{$ticketissuance->Issued}}</td>
							<td style="text-align:center">{{number_format($ticketissuance->Amount, 2, '.', ',')}}</td>
							<td style="text-align:center">{{$ticketissuance->Paid_Void_Flag}}</td>
							<td style="text-align:center">{{$ticketissuance->Paid_Date}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
	
	
</div>
@endsection