@extends('report_layout.report_layout')

@section('name')
	各機台營運狀況與現金流資訊報表
@endsection

@section('script')
<script>
	$(document).ready(function()
		{
			$('#dataTables').DataTable(
				{
					"lengthMenu": [ [10,20,30,40,50,60,70,80,90,100, -1], [10,20,30,40,50,60,70,80,90,100, "All"] ],
					 "iDisplayLength": -1,
					 "sorting":false,
					/*drawCallback: function () 
					{
						var api = this.api();
						var total = api.column( 4 ).data().sum();
						var pageTotal = api.column( 4, {page:'current'} ).data().sum();
						$( api.column(4).footer() ).html(//toFixed(X)設定小數點後X位數
							'$'+pageTotal.toLocaleString("en-US") +' <br>  $'+ total.toLocaleString("en-US")
						);
					}*/
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
						<th>Mnum<br>機台編號</th>
						<th>Location<br>位置</th>
						<th>Denom<br>比例</th>
						<th>Description<br>機台說明</th>
						<th>Coin In<br>押分總計</th>
						<th>Coin Out<br>得分總計</th>
						<th>Xcredit<br>贈分/回饋使用</th>
						<th>Meter Handpay<br>機台紀錄Handpay</th>
						<th>Meter Jackpot<br>機台紀錄Jackpot</th>
						<th>Progressive<br>機台派彩金額</th>
						<th>Actual Handpay<br>現場實際Handpay</th>
						<th>Soft Drop<br>清鈔</th>
						<th>Net Win<br>機台營收</th>
					</tr>
				</thead>
				<tfoot>
					<tr class="bg-info">
						<td colspan="4"><strong>總計:</strong></td>
						@for($i=0;$i<9;$i++)
							<td><strong>{{number_format($SPCVTypeTotalSums[$i], 2, '.', ',')}}</strong></td>
						@endfor
					</tr>
				</tfoot>
				<tbody>
				@for ($i =0;$i<3;$i++)
					@foreach($SPCVobjs[$i] as $SPCVobj)
						<tr>
							<td>{{$SPCVobj->Mnum}}</td>
							<td>{{$SPCVobj->Location}}</td>
							<td>{{number_format($SPCVobj->Denom, 2, '.', ',')}}</td>
							<td>{{$SPCVobj->Description}}</td>
							<td>{{number_format($SPCVobj->Coin_In, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Coin_Out, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Xcredit, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Meter_Handpay, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Meter_Jackpot, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Progressive, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Actual_Handpay, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Soft_Drop, 2, '.', ',')}}</td>
							<td>{{number_format($SPCVobj->Net_Win, 2, '.', ',')}}</td>
						</tr>
					@endforeach
						<tr class="success">
							<td colspan="4"><strong>{{$descArr[$i]}}小計:</strong></td>
							@for($j=0; $j<9; $j++)
								<td><strong>{{number_format($SPCVsums[$i][$j], 2, '.', ',')}}</strong></td>
							@endfor
						</tr>
				@endfor
				</tbody>
			</table>
	</div>
	
	
</div>
@endsection