@extends('main')

@section('title','新增/修改 系統管理員')

@section('header')
<ol class="breadcrumb">
  <li><a href="{{ url('/index') }}">首頁</a></li>
  <li><a href="{{ url('/operator') }}">管理員系統</a></li>
  <li class="active">修改系統參數</li>
</ol>
@endsection


@section('content')

<script>

$(document).ready(function(){

	var t = $('#datatables').DataTable({
			paging: false,
			"bInfo" : false,
			"bFilter": false,
			fixedHeader: true,
			
		});

});

</script>


<div class="col-md-8 col-md-offset-2"> 
    <form method="POST" action="{{ url('operator/configure') }}">
    {{ csrf_field() }}
    <table style="padding-top:15px" class="table table-striped" id="datatables">
        <thead>
            <tr>
                <th>參數名稱</th>
                <th>參數值</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>預設語言</td>
                <td>
                    <select name="language" class="form-control input-sm">
                        <option @if($config->Language == 0) selected @endif value="0">繁體中文</option>
                        <option @if($config->Language == 1) selected @endif value="1">英文</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>顯示資料比數</td>
                <td>
                    <select name="numEntries" class="form-control input-sm">
                        <option @if($config->ShowEntries == 5) selected @endif value="5">5</option>
                        <option @if($config->ShowEntries == 10) selected @endif value="10">10</option>
                        <option @if($config->ShowEntries == 20) selected @endif value="20">20</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <input value="確定更改" type="submit" class="btn btn-primary pull-right">
    <a href="{{ url('operator') }}" class="btn btn-danger">回上一頁</a>
    </form>
</div>



@endsection