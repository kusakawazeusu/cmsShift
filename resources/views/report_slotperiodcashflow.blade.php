@extends('report_layout.report_layout')

@section('name')
	各機台現金流資訊報表
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
						var CoinInTotal=api.column(1).data().sum();
						var CoinOutTotal=api.column(2).data().sum();
						var MeterJackpotTotal=api.column(3).data().sum();
						var NetWinTotal=api.column(4).data().sum();
						var IssueTotal=api.column(5).data().sum();
						var ValidationTotal=api.column(6).data().sum();
						var VoidTotal=api.column(7).data().sum();
						var HandpayTotal=api.column(8).data().sum();
						var CashflowTotal=api.column(9).data().sum();
						var SoftDropTotal=api.column(10).data().sum();
						var TotalCashReceivedTotal=api.column(11).data().sum();
						var VarianceTotal=api.column(12).data().sum();
						//var pageTotal = api.column( 4, {page:'current'} ).data().sum();
						$(api.column(1).footer() ).html(CoinInTotal.toLocaleString("en-US"));
						$(api.column(2).footer() ).html(CoinOutTotal.toLocaleString("en-US"));
						$(api.column(3).footer() ).html(MeterJackpotTotal.toLocaleString("en-US"));
						$(api.column(4).footer() ).html(NetWinTotal.toLocaleString("en-US"));
						$(api.column(5).footer() ).html(IssueTotal.toLocaleString("en-US"));
						$(api.column(6).footer() ).html(ValidationTotal.toLocaleString("en-US"));
						$(api.column(7).footer() ).html(VoidTotal.toLocaleString("en-US"));
						$(api.column(8).footer() ).html(HandpayTotal.toLocaleString("en-US"));
						$(api.column(9).footer() ).html(CashflowTotal.toLocaleString("en-US"));
						$(api.column(10).footer() ).html(SoftDropTotal.toLocaleString("en-US"));
						$(api.column(11).footer() ).html(TotalCashReceivedTotal.toLocaleString("en-US"));
						$(api.column(12).footer() ).html(VarianceTotal.toLocaleString("en-US"));
						
					}
	  			});
			$('table.display').DataTable();
		});
</script>

@endsection


@section('content')
<div class="container-fluid">
	<div>
	</div>
	<div >
			<table class="table display table-bordered" id="dataTables" style="text-align:center">
				<thead>
					<tr class="warning">
						<th>Period</th>
						<th>Coin In<br>押分總計</th>
						<th>Coin Out<br>得分總計</th>
						<th>Meter Jackpot<br>機台紀錄Jackpot</th>
						<th>Net Win<br>機台營收</th>
						<th>Issue<br>總開分</th>
						<th>Validation<br>總洗分</th>
						<th>Void<br>取消開分</th>
						<th>Handpay</th>
						<th>Cashflow<br>工作站現金流</th>
						<th>Soft Drop<br>清鈔</th>
						<th>TotalCashReceived<br>總收到現金</th>
						<th>Variance<br>現金流差異</th>
					</tr>
				</thead>
				<tfoot >
					<tr class="info">
						<th style="text-align:center">合計:</th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center"></th>
						<th style="text-align:center;color:red"></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($SPCobjs as $SPCobj)
						<tr>
							<td>{{$SPCobj->Period}}</td>
							<td>{{number_format($SPCobj->Coin_In, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Coin_Out, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Meter_Jackpot, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Net_Win, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Issue, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Validation, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Void, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Handpay, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Cashflow, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Soft_Drop, 2, '.', ',')}}</td>
							<td>{{number_format($SPCobj->Total_Cash_Received, 2, '.', ',')}}</td>
							<td><strong><font font color="red">{{number_format($SPCobj->Variance, 2, '.', ',')}}</font></strong></td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
	
	
</div>
@endsection