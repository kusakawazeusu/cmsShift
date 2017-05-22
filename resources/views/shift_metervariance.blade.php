@extends('main')

@section('title','交班系統 - 機台記錄變動')

@section('header')

<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:12%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開啟帳務日</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 手動洗分</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 會員上下分</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 入抄變動</div>
<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> 機台紀錄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">班表紀錄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">會員贈點變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">促銷方案變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">關帳</div>
<hr>

@endsection

@section('content')

<script>

var search_now = 'Machine.Mnum';
var searching = "%";

$(document).ready(function(){

	var entries = 0;  // 紀錄總共有幾筆data
	var show_num = 5;  // 紀錄顯示筆數，預設五筆
	var page = 0;  // 記錄目前第幾頁
	var pages_num = Math.ceil(entries / show_num);  // 記錄總共有幾頁

    var t = $('#machineTable').DataTable({
            paging: false,
            "bInfo" : false,
            "bFilter": false,
            fixedHeader: true,
        });

    query_data(page,search_now,searching);

    // show default pages info
	$("#page").text('1');
	$("#total_page").text(pages_num);

    function query_data(page,field,keyword)
	{	
		if(keyword == '')
			keyword = 'all';

		$.ajax({
			url: 'getdata/'+ "{{$date}}" + '/' + page + '/' + show_num + '/' + field + '/' + keyword,
			type: 'GET',
			dataType: 'json'
		}).done(function(Response){
			t.clear().draw();

			for( i=0; i<Math.min($("#show").val(),Object.keys(Response).length -1 ) ; i++ )
			{
				t.row.add([
					Response[i].Mnum,
					Response[i].Location,
					Response[i].GameDesc,
					Response.error.substr(i,1),
                    "<button onclick='updateMeterVariance("+ Response[i].Mnum +")' class='btn-link'><span class='glyphicon glyphicon-pencil'></span></button>"
				]).draw(false);
			}
			entries = Response.count;  // 紀錄總共有幾筆data
			pages_num = Math.ceil(entries / show_num);  // 記錄總共有幾頁
			$("#page").text(page+1);
			$("#total_page").text(pages_num);

		}).fail(function(){
			swal('ajax failed!','','error');
		});
	} // end of query data

	// 按下「下一頁」
	$("#next_page").click(function(){
		page = page +1;
		if( page > pages_num -1)
		{
			swal('已到最後一頁！','','error');
			page = page - 1;
		}
		else
			query_data(page,search_now,searching);
	});

	// 按下「上一頁」
	$("#previous_page").click(function(){
		page = page -1;
		if( page < 0)
		{
			swal('已到第一頁！','','error');
			page = 0;
		}
		else
			query_data(page,search_now,searching);
	});

	// 顯示筆數
	$("#show").change(function(){
		show_num = $(this).val();

		if( show_num == 'all' )
		{
			show_num = entries;
			pages_num = 1;
			page = 0;
			$("#total_page").text(pages_num);
			query_data(0,search_now,searching);
		}
		else
		{
			pages_num = Math.ceil(entries / show_num);
			page = 0;
			$("#total_page").text(pages_num);
			query_data(0,search_now,searching);
		}
	});

	// 搜尋
	$("#search_input").keyup(function(){
        searching = $(this).val();
		query_data(0,search_now,searching);
	}); // search_input done

    $(".specialSearch").change(function(){
        searching = $(this).val();
        query_data(0,search_now,searching);
    });


    $("#machineTable th").click(function(){

        $(".searchDiv").hide();

        if( $(this).attr('name') == 'Type' )
            $("#typeSearchDiv").show();
        else if( $(this).attr('name') == 'Status' )
            $("#statusSearchDiv").show();
        else
            $("#normalSearchDiv").show();

		var index = $(this).attr('id');
		$( t.cells().nodes() ).css('background-color','#FFFFFF');
		$( t.column( index-1 ).nodes() ).css('background-color','#D7E4EB');
		$("th").css('background-color','#FFFFFF');
		$(this).css('background-color','#D7E4EB');

		search_now = $(this).attr('name');
        $("#search_text").text( $(this).text() );
	});

    function submitHandpay(id,games,coinin,coinout,billin,jackpot,ticketin,ticketout,xtracredit,cancelcredit,progressive)
    {
        $.ajax({
			url: 'update/' + id + '/' + games + '/' + coinin + '/' + coinout + '/' + billin + '/' + jackpot + '/' + ticketin + '/' + ticketout + '/' + xtracredit + '/' + cancelcredit + '/' + progressive,
			type: 'GET',
			dataType: 'json'
		});

		query_data(page,search_now,searching);
		$("#updateHandpay").modal('toggle');
    }
	$("#submitHandpay").click(function(){
		submitHandpay(
			$("#modalID").val(),
			$("#modalGames").val(),
			$("#modalCoinIn").val(),
			$("#modalCoinOut").val(),
			$("#modalBillIns").val(),
			$("#modalJackpot").val(),
			$("#modalTicketIn").val(),
			$("#modalTicketOut").val(),
			$("#modalXtraCredit").val(),
			$("#modalCancelCredit").val(),
			$("#modalProgressive").val())
	});

});

	function updateMeterVariance(mnum)
	{
		jQuery.noConflict();
		
		$.ajax({
			url: 'getperiod/'+ "{{$date}}" + '/' + mnum,
			type: 'GET',
			dataType: 'json'
		}).done(function(Response){
			$("#modalGames").val(Response[0].MtrGames);
			$("#modalCoinIn").val(Response[0].MtrTotalCoinIn);
			$("#modalCoinOut").val(Response[0].MtrTotalCoinOut);
			$("#modalBillIns").val(Response[0].MtrTotalBillIn);
			$("#modalJackpot").val(Response[0].MtrJackpot);
			$("#modalCancelCredit").val(Response[0].MtrCreditPay);
			$("#modalProgressive").val(Response[0].MtrProgressive);
			$("#modalTicketIn").val(Response[0].MtrTicketIn);
			$("#modalTicketOut").val(Response[0].MtrTicketOut);
			$("#modalXtraCredit").val(Response[0].MtrXtraCredit);
			$("#modalID").val(Response[0].id)

			$("#varianceGames").text({{ $restriction->Games }} - Response[0].MtrGames);
			$("#varianceCoinIn").text({{ $restriction->CoinIn }} - Response[0].MtrTotalCoinIn);
			$("#varianceCoinOut").text({{ $restriction->CoinOut }} - Response[0].MtrTotalCoinOut);
			$("#varianceBillIn").text({{ $restriction->BillIn }} - Response[0].MtrTotalBillIn);
			$("#varianceJackpot").text({{ $restriction->Jackpot }} - Response[0].MtrJackpot);
			$("#varianceCancelCredit").text({{ $restriction->CancelCredit }} - Response[0].MtrCreditPay);
			$("#varianceProgressive").text({{ $restriction->Progressive }} - Response[0].MtrProgressive);
			$("#varianceTicketIn").text({{ $restriction->TicketIn }} - Response[0].MtrTicketIn);
			$("#varianceTicketOut").text({{ $restriction->TicketOut }} - Response[0].MtrTicketOut);
			$("#varianceXtraCredit").text({{ $restriction->XtraCredit }} - Response[0].MtrXtraCredit);
		});

		$("#updateHandpay").modal('show');
	}

</script>

<div id="updateHandpay" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">機台記錄 - 編輯</h4>
      </div>
      <div class="modal-body">
	  	<table class="table table-condensed table-striped">
		  <thead>
		  	<th style="width:30%">紀錄名稱</th>
			<th style="width:30%">當日淨值</th>
			<th>限度值</th>
			<th>差異值</th>
		  </thead>
		  <tbody>
		  	<tr>
				<input style="width:60%" type="hidden" id="modalID">			  	
				<td>遊戲次數</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalGames"></td>
				<td>{{ $restriction->Games }}</td>
				<td id="varianceGames"></td>
			</tr>
		  	<tr>
				<td>總押分</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalCoinIn"></td>
				<td>{{ $restriction->CoinIn }}</td>
				<td id="varianceCoinIn"></td>
			</tr>
		  	<tr>
				<td>總得分</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalCoinOut"></td>
				<td>{{ $restriction->CoinOut }}</td>
				<td id="varianceCoinOut"></td>
			</tr>
		  	<tr>
				<td>紙鈔金額</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalBillIns"></td>
				<td>{{ $restriction->BillIn }}</td>
				<td id="varianceBillIn"></td>
			</tr>
		  	<tr>
				<td>彩金金額</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalJackpot"></td>
				<td>{{ $restriction->Jackpot }}</td>
				<td id="varianceJackpot"></td>
			</tr>
		  	<tr>
				<td>CancelCredit HP金額</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalCancelCredit"></td>
				<td>{{ $restriction->CancelCredit }}</td>
				<td id="varianceCancelCredit"></td>
			</tr>
		  	<tr>
				<td>Progressive HP金額</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalProgressive"></td>
				<td>{{ $restriction->Progressive }}</td>
				<td id="varianceProgressive"></td>
			</tr>
		  	<tr>
				<td>票入金額</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalTicketIn"></td>
				<td>{{ $restriction->TicketIn }}</td>
				<td id="varianceTicketIn"></td>
			</tr>
		  	<tr>
				<td>票出金額</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalTicketOut"></td>
				<td>{{ $restriction->TicketOut }}</td>
				<td id="varianceTicketOut"></td>
			</tr>
		  	<tr>
				<td>額外點數</td>
				<td><input style="width:60%" type="text" class="form-control input-sm" id="modalXtraCredit"></td>
				<td>{{ $restriction->XtraCredit }}</td>
				<td id="varianceXtraCredit"></td>
			</tr>
		  </tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
        <button id="submitHandpay" type="button" class="btn btn-primary">儲存</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<h4 class="text-center"><a href="/shift/softdropvariance/{{$date}}" class="btn btn-sm btn-success">上一個項目</a> 機台記錄變動：{{$date}} <a href="dw" class="btn btn-sm btn-danger">完成「機台記錄變動」</a></h4>

<hr>
<div class="row">
	<div class="col-md-4">
		<form class="form-inline">
			<div class="form-group">
				<label for="show">顯示筆數：</label>
				<select class="form-control input-sm" id="show">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="all">ALL</option>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-4 col-md-offset-4">
		<form class="form-inline pull-right">
			<div id="normalSearchDiv" class="form-group searchDiv">
				<label for="search">搜尋「<font id="search_text">機台編號</font>」：</label><input class="form-control input-sm" id="search_input">
			</div>
		</form>
	</div>
</div>

<table style="text-align: center;overflow-x:scroll; white-space: nowrap;" class="table table-striped table-hover" id="machineTable">
	<thead >
		<tr>
			<th name="Period.Mnum" id="1" style="text-align: center">機台編號</th>
			<th name="Machine.Location" id="2" style="text-align: center">機台位置</th>
			<th name="GameType.GameDesc" id="3" style="text-align: center">機台敘述</th>
			<th id="4" style="text-align: center">異常</th>
            <th style="text-align: center">操作</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<br>
<p class="text-center">總共<font id="total_page"></font>頁，目前<font id="page"></font>頁。</p>
<hr>

<div class="pull-left"><a id="previous_page" class="btn btn-default">返回上一頁</a></div>
<div class="pull-right"><a id="next_page" class="btn btn-default">前往下一頁</a></div>
@endsection
