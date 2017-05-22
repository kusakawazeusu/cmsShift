@extends('report_layout.report_layout')

@section('name')
	班別關閉紀錄報表
@endsection

@section('script')
<script>
	$(document).ready(function()
		{
			$('#dataTables').DataTable(
				{
					"lengthMenu": [ [10,20,30,40,50,60,70,80,90,100, -1], [10,20,30,40,50,60,70,80,90,100, "All"] ],
					"sorting":false,
					 "iDisplayLength": -1,
					/*drawCallback: function () 
					{
						var api = this.api();
						var total = api.column( 3 ).data().sum();
						var pageTotal = api.column( 3, {page:'current'} ).data().sum();
						$( api.column(3).footer() ).html(//toFixed(X)設定小數點後X位數
							'$'+pageTotal.toLocaleString("en-US") +' <br>  $'+ total.toLocaleString("en-US")
						);
					}*/
	  			});
			//$('table.display').DataTable();
		});
</script>

@endsection


@section('content')
<div class="container-fluid">
	<div>
		<h4><strong>查詢班別: {{$session}}</strong></h4>
	</div>
	<div >
			<table class="table display" id="dataTables">
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td style="text-align:center">Net Cash Flow:</td>
						<td style="text-align:center">{{number_format($sessioncloses->net_cash_flow, 2, '.', ',')}}</td>
					</tr>
				</tfoot>
				<tbody>
						<tr>
							<td style="text-align:center">System Issuance:</td>
							<td style="text-align:center">{{number_format($sessioncloses->issuance, 2, '.', ',')}}</td>
						</tr>
						<tr>
							<td style="text-align:center">System Void:</td>
							<td style="text-align:center">{{number_format($sessioncloses->void, 2, '.', ',')}}</td>
						</tr>
						<tr>
							<td style="text-align:center">System Redemption:</td>
							<td style="text-align:center">{{number_format($sessioncloses->redemption, 2, '.', ',')}}</td>
						</tr>
						<tr>
							<td style="text-align:center">System Handpay:</td>
							<td style="text-align:center">{{number_format($sessioncloses->handpay, 2, '.', ',')}}</td>
						</tr>
				</tbody>
			</table>
	</div>
	
	
</div>
@endsection