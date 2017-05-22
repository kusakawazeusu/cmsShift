<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.management_sys_layout') @section('title', 'Page Title') @section('style')
<style>
body {
    margin: 0;
    padding: 0;
    width: 100%;
    display: table;
    font-weight: 100;
    font-family: 'Lato';
}

.midForm {
    margin-left: auto;
    width: %;
    vertical-align: middle;
}

.returnInfo {
    margin-left: 35%;
    width: 80%;
}
</style>
@endsection @section('script')
<script>
function ShowPage(formName, pageName, methodName, hidden) {
    document.getElementById('page').contentWindow.document.close();
    document.getElementById(formName).method = methodName;
    document.getElementById(formName).action = pageName;
    document.getElementById(formName).submit();
    return false;
}

$(document).ready(function() {
    $('#myTable').DataTable({
        "order": [
            [0, "desc"]
        ],
        "info": false,
        "searching": false,
    });
});

function test() {
    document.write('aa');
}


$(document).on('hide.bs.modal','#newModal', function () {
    document.getElementById('searchForm').submit();
});

</script>
@endsection @section('content')
<div class="container">
</div>
<header id="header-3" class="soft-scroll header-3">
    <nav>
        <!-- /.container-fluid -->
    </nav>
    <!-- /.nav -->
    <div class="container midForm">
        <div class="row">
            <div class="col-md-8 text-center">
                <div class="editContent">
                    <h1>註冊紀錄</h1>
                </div>
            </div>
        </div>
        @if(sizeof($transList) > 0)
        <div class="row">
            <div class="col-md-10">
                <table id="myTable" class="dataTable table-striped" cellspacing="0">
                    <thead >
                        <tr>
                            <th scope="col" align="center">註冊時間</th>
                            <th scope="col" align="center">會員姓名</th>
                            <th scope="col" align="center">會員生日</th>
                            <th scope="col" align="center">會員身份證字號</th>
                            <th scope="col" align="center">所屬班別編號</th>
                            <th scope="col" align="center">操作人員</th>
                            <th scope="col" align="center">會員等級</th>
                            <th scope="col" align="center">是否使用額外點數</th>
                            <th scope="col" align="center">是否使用回饋點數</th>
                        </tr>
                    </thead>
                    @foreach($transList as $transData)
                    <tr>
                        <td>{{$transData->ModifyTime}}</td>
                        <td>{{$transData->MemberName}}</td>
                        <td>{{$transData->Birthday}}</td>
                        <td>{{$transData->MemberID}}</td>
                        <td>{{$transData->SessionNo}}</td>
                        <td>{{$transData->OperatorID}}</td>
                        <td>{{$transData->Rank}}</td>
                        <td>{{$transData->XCEnable}}</td>
                        <td>{{$transData->RPEnable}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <br>
    </div>   
    @endif 
    @if(sizeof($transList) == 0)
    <div class="row " a-pg-id="293">
        <label class="col-sm-2 control-label" for="name"></label>
        <div class="col-sm-4 ">
            <div class="alert alert-danger text-center"> 查無註冊紀錄。 </div>
            {!! Form::open(array('url' => 'member_list', 'method' =>'get')) !!}
            <p>{!! Form::submit('返回', array('class'=>'btn btn-info btn-block')) !!}</p>
            {!! Form::close() !!}
        </div>
    </div>
    @endif    
</header>
@endsection
