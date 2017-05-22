@extends('main')

@section('title','交班系統 - 手動洗分')

@section('header')

<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:12%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開啟帳務日</div>
<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> 手動洗分</div>
<div class="progress-bar" role="progressbar" style="width:11%">會員上下分</div>
<div class="progress-bar" role="progressbar" style="width:11%">入抄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">機台紀錄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">班表紀錄變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">會員贈點變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">促銷方案變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">關帳</div>
<hr>

@endsection

@section('content')

<script>

var search_now = 'MNum';
var searching = "%";

$(document).ready(function(){

	var entries = 0;  // 紀錄總共有幾筆data
	var show_num = 5;  // 紀錄顯示筆數，預設五筆
	var page = 0;  // 記錄目前第幾頁
	var pages_num = Math.ceil(entries / show_num);  // 記錄總共有幾頁

    var t = $('#handpayTable').DataTable({
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
			url: 'get/' + page + '/' + show_num + '/' + field + '/' + keyword,
			type: 'GET',
			dataType: 'json'
		}).done(function(Response){
			t.clear().draw();

			for( i=0; i<Math.min($("#show").val(),Object.keys(Response).length -1 ) ; i++ )
			{
                var status,type;

                switch(Response[i].Status)
                {
                    case 0:
                        status = "Void";
                        break;

                    case 1:
                        status = "Handpay";
                        break;

                    case 2:
                        status = "Reset";
                        break;

                    case 3:
                        status = "Confirm";
                        break;
                }

                switch(Response[i].Type)
                {
                    case 0:
                        type = "Cancel Credit";
                        break;

                    case 1:
                        type = "Jackpot";
                        break;

                    case 2:
                        type = "Progressive";
                        break;
                }

                //alert("<button onclick='updateHandpay("+Response[i].SeqNo+","+Response[i].MNum+","+Response[i].HandpayTime+","+Response[i].Type+","+Response[i].Amount+","+Response[i].ProgressiveGroup+","+Response[i].ProgressiveLevel+")' class='btn-link'><span class='glyphicon glyphicon-pencil'></span></button>");

				t.row.add([
                    Response[i].SeqNo,
					Response[i].MNum,
					Response[i].Location,
					Response[i].HandpayTime,
					Response[i].OperatorModifyTime,
					Response[i].Amount,
                    type,
                    status,
                    //"<button onclick='updateHandpay(759,845210,123,201705/13,33728,2,2)' class='btn-link'><span class='glyphicon glyphicon-pencil'></span></button>"
                    "<button onclick='updateHandpay(\""+Response[i].SeqNo+"\",\""+Response[i].MNum+"\",\""+Response[i].HandpayTime+"\",\""+type+"\",\""+Response[i].Amount+"\",\""+Response[i].ProgressiveGroup+"\",\""+Response[i].ProgressiveLevel+"\")' class='btn-link'><span class='glyphicon glyphicon-pencil'></span></button>"
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


    $("th").click(function(){

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

    function submitHandpay(id,amount,group,level,status)
    {
        $.ajax({
			url: 'update/' + id + '/' + amount + '/' + group + '/' + level + '/' + status + '/' + "{{ Auth::user()->id }}",
			type: 'GET',
			dataType: 'json'
		});

		query_data(page,search_now,searching);
		$("#updateHandpay").modal('toggle');
    }

    $("#submitHandpay").click(function(){
        submitHandpay( $("#modalSeqNo").text(),$("#modalAmount").val(),$("#modalProgrssiveGroup").val(),$("#modalProgrssiveLevel").val(),3);
    });
    $("#voidHandpay").click(function(){
        submitHandpay( $("#modalSeqNo").text(),$("#modalAmount").val(),$("#modalProgrssiveGroup").val(),$("#modalProgrssiveLevel").val(),0);
    });


});

	function updateHandpay(id,mnum,time,type,amount,proGroup,proLevel)
	{
		jQuery.noConflict();

        

        if(type != 'Progressive')
        {
            $("#modalProgrssiveGroup").prop('disabled',true);
            $("#modalProgrssiveLevel").prop('disabled',true);
        }
        else
        {
            $("#modalProgrssiveGroup").removeAttr('disabled');
            $("#modalProgrssiveLevel").removeAttr('disabled');
        }

        $("#modalSeqNo").text(id);
		$("#modalMNum").val( mnum );
		$("#modalHandpayTime").val( time );
		$("#modalType").val( type );
		$("#modalAmount").val( amount );
        $("#modalProgrssiveGroup").val( proGroup );
        $("#modalProgrssiveLevel").val( proLevel );
        $("#modalOverrideID").val( "{{ Auth::user()->OperatorName }}" );
		$("#updateHandpay").modal('show');
	}

</script>

<div id="updateHandpay" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">手動洗分 - 編輯</h4>
      </div>
      <div class="modal-body">
	  	<form class="form-horizontal">
			<div class="form-group">
				<label class="col-md-4 control-label">編號：</label>
				<div class="col-md-6">
					<label class="control-label" id="modalSeqNo"></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">機器編號：</label>
				<div class="col-md-6">
					<input id="modalMNum" class="form-control input-sm" type="text" disabled></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Handpay時間：</label>
				<div class="col-md-6">
					<input id="modalHandpayTime" class="form-control input-sm" type="text" disabled></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">類型：</label>
				<div class="col-md-6">
					<input id="modalType" class="form-control input-sm" type="text" disabled></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">金額：</label>
				<div class="col-md-6">
					<input id="modalAmount" class="form-control input-sm" type="text"></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Progrssive Group：</label>
				<div class="col-md-6">
					<input id="modalProgrssiveGroup" class="form-control input-sm" type="text"></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Progrssive Level：</label>
				<div class="col-md-6">
					<input id="modalProgrssiveLevel" class="form-control input-sm" type="text"></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">覆核：</label>
				<div class="col-md-6">
					<input id="modalOverrideID" class="form-control input-sm" type="text" disabled></input>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
        <button id="voidHandpay" type="button" class="btn btn-danger">作廢</button>
        <button id="submitHandpay" type="button" class="btn btn-primary">儲存</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<h4 class="text-center"><a href="{{ url('/shift/startperiod') }}" class="btn btn-sm btn-success">上一個項目</a> Handpay <a href="{{ url('/shift/dw',[$date]) }}" class="btn btn-sm btn-danger">完成「手動洗分」</a></h4>

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
            <div id="typeSearchDiv" style="display:none" class="form-group searchDiv">
				<label for="search">搜尋「類型」：</label>
                <select class="form-control input-sm specialSearch" id="typeSearch">
                    <option value="%">all</option>
                    <option value="0">Cancel Credit</option>
                    <option value="1">Jackpot</option>
                    <option value="2">Progressive</option>
                </select>
			</div>
            <div id="statusSearchDiv" style="display:none" class="form-group searchDiv">
				<label for="search">搜尋「狀態」：</label>
                <select class="form-control input-sm specialSearch" id="statusSearch">
                    <option value="%">all</option>
                    <option value="0">Void</option>
                    <option value="1">Handpay</option>
                    <option value="2">Reset</option>
                    <option value="3">Confirm</option>
                </select>
			</div>
		</form>
	</div>
</div>

<table style="text-align: center;overflow-x:scroll; white-space: nowrap;" class="table table-striped table-hover" id="handpayTable">
	<thead >
		<tr>
			<th name="SeqNo" id="1" style="text-align: center">編號</th>
			<th name="MNum" id="2" style="text-align: center">機台編號</th>
			<th name="Location" id="3" style="text-align: center">機台位置</th>
			<th name="HandpayTime" id="4" style="text-align: center">Handpay時間</th>
			<th name="OperatorModifyTime" id="5" style="text-align: center">處理時間</th>
			<th name="Amount" id="6" style="text-align: center">金額</th>
            <th name="Type" id="7" style="text-align: center">類型</th>
            <th name="Status" id="8" style="text-align: center">狀態</th>
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