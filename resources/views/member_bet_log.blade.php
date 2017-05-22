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
            [1, "desc"]
        ],
        "info": false,
        "searching": false,
    });
});

function test() {
    document.write('aa');
}
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
                    <h1>會員 {{$user->MemberName}} [{{$user->SectionNo . sprintf("%06d", $user->MemberNo)}}] 押分紀錄</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <hr>
                <form id="searchForm" action="member_bet_log" method="post">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">查詢設定</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Location:
                                <select class="form-control" name="location" value="{{$location}}">
                                    <option selected="true" style="display:none;">{{$location}}</option>
                                    <option>All</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                From:
                                <input type="datetime-local" class="form-control" placeholder="選擇時間" name="time_select_from" value="{{$timeFrom}}" id="time_select">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    To:
                                    <input type="datetime-local" class="form-control" placeholder="選擇時間" name="time_select_to" value="{{$timeTo}}" id="time_select">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="id" value="{{$user->MemberNo}}" />
                                <span class="pull-right"><input herf="#" type="submit" class="btn btn-primary btn-block" value="查詢紀錄" /></span>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
        @if(sizeof($logs) > 0)
        <div class="row">
            <div class="col-md-10">
                <table id="myTable" class="dataTable table-striped" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">開始時間</th>
                            <th scope="col">押分</th>
                            <th scope="col">得分</th>
                            <th scope="col">遊戲次數</th>
                            <th scope="col">回饋點數獲得</th>
                            <th scope="col">回饋點數使用</th>
                            <th scope="col">額外點數獲得</th>
                            <th scope="col">額外點數使用</th>
                            <th scope="col">剩餘額外點數</th>
                            <th scope="col">剩餘回饋點數</th>
                            <th scope="col">未紀錄之額外點數使用</th>
                        </tr>
                    </thead>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{$log->StartTime}}</td>
                        <td>{{$log->CoinIn}}</td>
                        <td>{{$log->CoinOut}}</td>
                        <td>{{$log->Games}}</td>
                        <td>{{$log->RPointUsed}}</td>
                        <td>{{$log->RPointEarned}}</td>
                        <td>{{$log->XCUsed}}</td>
                        <td>{{$log->XCEarned}}</td>
                        <td>{{$log->XCLeft}}</td>
                        <td>{{$log->RPointLeft}}</td>
                        <td>{{$log->XCNotUsed}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <br>
    </div>
        <div class="row">
            <div class="col-md-10">
                <hr>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">統計資訊</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4">平均CoinIn :
                        </div>
                        <div class="col-md-4">{{$result['CoinIn']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">平均CoinOut :
                        </div>
                        <div class="col-md-4">{{$result['CoinOut']}}
                        </div>
                    </div>
                <hr>
            </div>
        </div>    
    @endif 
    @if(sizeof($logs) == 0)
    <div class="row " a-pg-id="293">
        <label class="col-sm-2 control-label" for="name"></label>
        <div class="col-sm-4 ">
            <div class="alert alert-danger text-center"> 查無押注資訊，請確認搜尋的時間正確。 </div>
            {!! Form::open(array('url' => 'member_list', 'method' =>'get')) !!}
            <p>{!! Form::submit('返回', array('class'=>'btn btn-info btn-block')) !!}</p>
            {!! Form::close() !!}
        </div>
    </div>
    @endif    
</header>
@endsection
