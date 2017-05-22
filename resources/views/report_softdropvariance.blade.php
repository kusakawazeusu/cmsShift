@extends('report_layout.report_layout')

@section('name')
	清鈔差異紀錄報表
@endsection

@section('script')
<script>
	$(document).ready(function()
		{
			$('#dataTables').DataTable(
				{
					"lengthMenu": [ [10,20,30,40,50,60,70,80,90,100, -1], [10,20,30,40,50,60,70,80,90,100, "All"] ],
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
	</div>
	<div >
			<table class="table display table-bordered" id="dataTables">
				<thead>
					<tr class="warning">
						<th style="text-align:center">Mnum<br>機台編號</th>
						<th style="text-align:center">Location<br>位置</th>
						<th style="text-align:center">Denom<br>比例</th>
						<th style="text-align:center">Description<br>機台說明</th>
						<th style="text-align:center">MeterSoftDrop<br>當日機台收入紙鈔金額</th>
						<th style="text-align:center">ActualSoftDrop<br>實際清鈔金額</th>
						<th style="text-align:center">Variances</th>
						<th style="text-align:center">Percentage</th>
					</tr>
				</thead>
				<tbody>
					@foreach($softdropvariances as $softdropvariance)
						<tr>
							<td style="text-align:center">{{$softdropvariance->Mnum}}</td>
							<td style="text-align:center">{{$softdropvariance->Location}}</td>
							<td style="text-align:center">{{$softdropvariance->Denom}}</td>
							<td style="text-align:center">{{$softdropvariance->Description}}</td>
							<td style="text-align:center">{{number_format($softdropvariance->MeterSoftDrop, 2, '.', ',')}}</td>
							<td style="text-align:center">{{number_format($softdropvariance->ActualSoftDrop, 2, '.', ',')}}</td>
							<td style="text-align:center">{{$softdropvariance->Variance}}</td>
							<td style="text-align:center">{{number_format($softdropvariance->Percentage,2,'.','')}}%</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
	
	
</div>
@endsection