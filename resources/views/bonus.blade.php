@extends('main')

@section('title','交班系統 - 會員贈點')

@section('header')

<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:12%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開啟帳務日</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 手動洗分</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 會員上下分</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 入抄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>機台紀錄變動</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>班表紀錄變動</div>
<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>會員贈點變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">促銷方案變動</div>
<div class="progress-bar" role="progressbar" style="width:11%">關帳</div>
<hr>
@endsection

@section('content')

<style>

th.dt-center, td.dt-center { text-align: center; }

</style>

<script>

var search_now = 'MemberNo';

$(document).ready(function(){
	
	var entries = 0;  // 紀錄總共有幾筆data
	var show_num = 5;  // 紀錄顯示筆數，預設五筆
	var page = 0;  // 記錄目前第幾頁
	var pages_num = Math.ceil(entries / show_num);  // 記錄總共有幾頁
	
	

	// 設定Table，關閉換頁跟關閉資訊顯示
    var t = $('#datatables').DataTable({
    	paging: false,
		"bInfo" : false,
		"bFilter": false,
		fixedHeader: true,
		
    });

	query_data(page,search_now,$("#search_input").val());

	// show default pages info
	$("#page").text('1');
	$("#total_page").text(pages_num);

	function query_data(page,field,keyword)
	{	
		if(keyword == '')
			keyword = 'all';

		$.ajax({
			url: '/shift/bonus/get/{{ Session('ClassID') }}/'+page+'/'+show_num +'/'+ field + '/' + keyword,
			type: 'GET',
			dataType: 'json'
		}).done(function(Response){
			t.clear().draw();

			for( i=0; i<Math.min($("#show").val(),Object.keys(Response).length -1 ) ; i++ )
			{
				
				t.row.add([
					Response[i].Mnum,
					Response[i].Location,
					Response[i].MtrTotalBillIn,
					Response[i].ActTotalBillIns,
					(Response[i].ActTotalBillIns - Response[i].MtrTotalBillIn).toFixed(2),
					"<button onclick='updateDrop("+Response[i].id+","+Response[i].Mnum+","+Response[i].MtrTotalBillIn+")' class='btn-link'><span class='glyphicon glyphicon-pencil'></span></button>"
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
			query_data(page,search_now,$("#search_input").val());
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
			query_data(page,search_now,$("#search_input").val());
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
			query_data(0,search_now,$("#search_input").val());
		}
		else
		{
			pages_num = Math.ceil(entries / show_num);
			page = 0;
			$("#total_page").text(pages_num);
			query_data(0,search_now,$("#search_input").val());
		}
	});

	// 搜尋
	$("#search_input").keyup(function(){
		query_data(0,search_now,$("#search_input").val());

	}); // search_input done

	$("th").click(function(){
		$("#search_text").text( $(this).text() );
		
		var index = $(this).attr('id');
		$( t.cells().nodes() ).css('background-color','#FFFFFF');
		$( t.column( index-1 ).nodes() ).css('background-color','#D7E4EB');
		$("th").css('background-color','#FFFFFF');
		$(this).css('background-color','#D7E4EB');

		search_now = $(this).attr('name');
	});

	$("#exception").click(function(){
		query_data(0,search_now,$("#search_input").val());
	});

	$("#submitDrop").click(function(){

		$.ajax({
			url: '/softdrop/update/' + $("#modalId").val() + '/' + $("#modalActualDrop").val(),
			type: 'GET',
			dataType: 'json'
		});
		query_data(page,search_now,$("#search_input").val());
		$("#modalUpdate").modal('toggle');
	});


});

	function updateDrop(id,mnum,machineDrop)
	{
		jQuery.noConflict();
		$("#modalMnum").text( mnum );
		$("#modalMachineDrop").val( machineDrop );
		$("#modalId").val( id );
		$("#modalActualDrop").val("");
		$("#modalUpdate").modal('show');
	}

</script>

<div id="modalUpdate" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改實際入抄值</h4>
      </div>
      <div class="modal-body">
	  	<form class="form-horizontal">
			<div class="form-group">
				<label class="col-md-4 control-label">機器編號：</label>
				<div class="col-md-6">
					<label class="control-label" id="modalMnum">	</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">機器入抄值：</label>
				<div class="col-md-6">
					<input id="modalMachineDrop" class="form-control input-sm" type="text" disabled></input>
					<input id="modalId" type="hidden"></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">實際入抄值：</label>
				<div class="col-md-6">
					<input id="modalActualDrop" class="form-control input-sm" type="text"></input>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
        <button id="submitDrop" type="button" class="btn btn-primary">儲存</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<h4 class="text-center"><a href="{{ url('/shift/dw',[$Drop]) }}" class="btn btn-sm btn-success">上一個項目</a> 帳務日期：{{ $Drop }} <a href="{{ url('/shift/metervariance',[$Drop]) }}" class="btn btn-sm btn-danger">完成「入抄變動」</a></h4>

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
			<div class="form-group">
				<label style="padding-left:10px" for="exception"><input id="exception" type="checkbox">Exception</label>
			</div>
		</form>
	</div>
	<div class="col-md-4 col-md-offset-4">
		<form class="form-inline pull-right">
			<div class="form-group">
				<label for="search">搜尋「<font id="search_text">機台編號</font>」：</label><input class="form-control input-sm" id="search_input">
			</div>

		</form>
	</div>
</div>

<table style="text-align: center;overflow-x:scroll; white-space: nowrap;" class="table table-striped table-hover" id="datatables">
	<thead >
		<tr>
			<th name="Period.Mnum" id="1" style="text-align: center">機台編號</th>
			<th name="Machine.Location" id="2" style="text-align: center">機台位置</th>
			<th name="Period.MtrTotalBillIn" id="3" style="text-align: center">機器入抄值</th>
			<th name="Period.ActTotalBillIns" id="4" style="text-align: center">實際入抄值</th>
			<th id="5" style="text-align: center">差異值</th>
			<th id="6"  style="text-align: center">修改</th>

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
