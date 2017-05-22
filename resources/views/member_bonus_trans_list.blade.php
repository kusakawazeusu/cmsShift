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
                    <h1>會員 {{$user->MemberName}} [{{$user->SectionNo . sprintf("%06d", $user->MemberNo)}}] 紅利點數紀錄</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <hr>
                <form id="searchForm" action="member_bonus_trans_list" method="post">
                <input type="hidden" name="id" value="{{$user->MemberNo}}" />
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
                            <div class="col-md-3"> 
                                Bonus:
                                <select class="form-control" name="point_type" value="{{$point_type}}"> 
                                    <option selected="true" style="display:none;">{{$point_type}}</option>                                     
                                    <option>XTraCredit</option>                                                                   
                                    <option>RewardCredit</option>              
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
                            <div class="col-md-11">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <span class="pull-right"><input herf="#" type="submit" class="btn btn-primary btn-block" value="查詢紀錄" /></span>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#newModal">新增</a>
                                <div id="newModal" class="modal modal-wide fade">
                                    <div class="modal-dialog" style="height:40vh;" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">紅利資訊更新</h4>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="page" name="page" src="member_bonus_update?id={{$user->MemberNo}}" height="50%" width="100%" scrolling="yes" frameborder="0" style="border:0" onload="ResetWindowSize()"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                                                <button type="button" class="btn btn-primary">重新整理</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
        @if(sizeof($transList) > 0)
        <div class="row">
            <div class="col-md-10">
                <table id="myTable" class="dataTable table-striped" cellspacing="0">
                    <thead >
                        <tr>
                            <th scope="col" align="center">交易時間</th>
                            <th scope="col" align="center">獎金</th>
                            <th scope="col" align="center">地點</th>
                            <th scope="col" align="center">行為</th>
                            <th scope="col" align="center">來源</th>
                            <th scope="col" align="center">過期</th>
                            <th scope="col" align="center">過期日</th>
                        </tr>
                    </thead>
                    @foreach($transList as $transData)
                    <tr>
                        <td>{{$transData->TransTime}}</td>
                        <td>{{$transData->Point}}</td>
                        <td>{{$transData->Location}}</td>
                        <td>{{$point_type . ' ' . $behaviorTable[$transData->Behavior]}}</td>
                        <td>{{$transData->Place}}</td>
                        <td>{{$transData->Expire}}</td>
                        <td>{{$transData->ExpireDate}}</td>
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
            <div class="alert alert-danger text-center"> 查無紅利紀錄，請確認搜尋的時間正確。 </div>
            {!! Form::open(array('url' => 'member_list', 'method' =>'get')) !!}
            <p>{!! Form::submit('返回', array('class'=>'btn btn-info btn-block')) !!}</p>
            {!! Form::close() !!}
        </div>
    </div>
    @endif    
</header>
@endsection
