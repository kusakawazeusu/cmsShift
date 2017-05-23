@extends('main')

@section('title','交班系統 - 會員上下分')

@section('header')

<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:12%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開啟帳務日</div>
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 手動洗分</div>
<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:11%"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> 會員上下分</div>
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
var search_now = 'TransNo';
var classid = "{{ Session('ClassID') }}";
var searching = "%";

$(document).ready(function(){
	
	var entries = 0;  // 紀錄總共有幾筆data
	var show_num = {{ $config->ShowEntries }};  // 紀錄顯示筆數，預設五筆
	var page = 0;  // 記錄目前第幾頁
	var pages_num = Math.ceil(entries / show_num);  // 記錄總共有幾頁
	
	

	// 設定Table，關閉換頁跟關閉資訊顯示
    var t = $('#dwTable').DataTable({
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
			url: '/shift/dw/getdata/'+classid+ '/' + page + '/' + show_num + '/' + field + '/'+keyword,
			type: 'GET',
			dataType: 'json'
		}).done(function(Response){
			t.clear().draw();

			for( i=0; i<Math.min(show_num,Object.keys(Response).length -1 ) ; i++ )
			{
				var type;
				switch( Response[i].TransType )
				{
					case 0:
						type = '儲值';
						break;
					case 1:
						type = '洗分';
						break;
					case 2:
						type = '轉到機台';
						break;
					case 3:
						type = '從機台轉回';
						break;
					case 4:
						type = '調整';
						break;
				}
				
				t.row.add([
					Response[i].TransNo,
					Response[i].TransTime,
					Response[i].Location,
					type,
					Response[i].Amount,
					Response[i].NewBalance
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

		if($(this).attr('name') == 'TransType' )
			$("#typeSearchDiv").show();
		else
			$("#normalSearchDiv").show();

		$("#search_text").text( $(this).text() );
		
		var index = $(this).attr('id');
		$( t.cells().nodes() ).css('background-color','#FFFFFF');
		$( t.column( index-1 ).nodes() ).css('background-color','#D7E4EB');
		$("th").css('background-color','#FFFFFF');
		$(this).css('background-color','#D7E4EB');

		search_now = $(this).attr('name');
	});
});


</script>

<h4 class="text-center"><a href="{{ url('/shift/handpay',[$date]) }}" class="btn btn-sm btn-success">上一個項目</a> 會員上下分 <a href="{{ url('/shift/softdropvariance',[$date]) }}" class="btn btn-sm btn-danger">完成「會員上下分」</a></h4>

<hr>
<div class="row">
	<div class="col-md-4">
		<form class="form-inline">
			<div class="form-group">
				<label for="show">顯示筆數：</label>
				<select class="form-control input-sm" id="show">
					<option @if($config->ShowEntries == 5) selected @endif  value="5">5</option>
					<option @if($config->ShowEntries == 10) selected @endif value="10">10</option>
					<option @if($config->ShowEntries == 20) selected @endif value="20">20</option>
					<option @if($config->ShowEntries == 1) selected @endif value="all">ALL</option>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-4 col-md-offset-4">
		<form class="form-inline pull-right">
			<div id="normalSearchDiv" class="form-group searchDiv">
				<label for="search">搜尋「<font id="search_text">交易序號</font>」：</label><input class="form-control input-sm" id="search_input">
			</div>
            <div id="typeSearchDiv" style="display:none" class="form-group searchDiv">
				<label for="search">搜尋「交易型態」：</label>
                <select class="form-control input-sm specialSearch" id="typeSearch">
                    <option value="%">all</option>
                    <option value="0">儲值</option>
                    <option value="1">洗分</option>
                    <option value="2">轉到機台</option>
					<option value="3">從機台轉回</option>
					<option value="4">調整</option>
                </select>
			</div>
		</form>
	</div>
</div>

<table style="text-align: center;overflow-x:scroll; white-space: nowrap;" class="table table-striped table-hover" id="dwTable">
	<thead >
		<tr>
			<th name="TransNo" id="1" style="text-align: center">交易序號</th>
			<th name="TransTime" id="2" style="text-align: center">交易時間</th>
			<th name="Location" id="3" style="text-align: center">交易位置</th>
			<th name="TransType" id="4" style="text-align: center">交易型態</th>
			<th name="Amount" id="5" style="text-align: center">交易金額</th>
			<th name="NerBalance" id="6"  style="text-align: center">餘額</th>
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
