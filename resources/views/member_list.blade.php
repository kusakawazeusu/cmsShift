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
        "order": [[ 1, "desc" ]],
        "paging": false,
        "info": false,
        "searching": false,
        "columnDefs": [{
            "targets": [5],
            "orderable": false
        }]
    });
});

function CheckAddResult() {
    //if({{$errors->first('addCardResult')}})
    {
        document.getElementById('changePage').submit();
    }
    return false;
}

$(document).on('hide.bs.modal','#tallModal', function () {
    var $status = $('iframe[name=page]').contents().find('#pageStatus').val();
    if($status == "1")
        CheckAddResult();
});



</script>
@endsection @section('content')
<div class="container">
</div>
<header id="header-3" class="soft-scroll header-3">
    <nav>
        <div class="container">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <nav class="pull">
                </nav>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- /.nav -->
    <div class="container midForm">
     <div class="row">
        <div class="col-md-4 col-md-offset-2 text-center">
            <div class="editContent">
                <h1>會員列表</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            顯示筆數
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="pagingMenu" data-toggle="dropdown">{{$pagingSize}}
                    <span class="caret"></span>
                </button>
                <ul id="pagingMenuValue" class="dropdown-menu" role="menu" aria-labelledby="pagingMenu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="OnPagingMenuChanged(10)" href="#">10</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="OnPagingMenuChanged(20)" href="#">20</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="OnPagingMenuChanged(30)" href="#">30</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="OnPagingMenuChanged(40)" href="#">40</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="OnPagingMenuChanged(50)" href="#">50</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" onclick="OnPagingMenuChanged('All')" href="#">全部</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <form id="searchForm" action="member_search" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="hidden" name="pagingSize" value="{{$pagingSize}}" />
                            <span class="input-group-addon glyphicon glyphicon-search" aria-hidden="true"></span>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" value="byDropDown" id="byWhat" name="byWhat">
                            <input id="searchBox" type="text" class="form-control" placeholder="輸入搜尋資訊" name="inputInfo">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="searchBy" value="">
                            <option selected="true" style="display:none;">姓名</option>
                            <option>編號</option>
                            <option>姓名</option>
                            <option>行動電話</option>
                            <option>卡號</option>
                            <option>身份證字號</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>



        @if(sizeof($users) != 0)
        <div class="row">
            <div class="col-md-10">
                <table id="myTable" class="dataTable table-striped" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">會員編號</th>
                            <th scope="col">註冊時間</th>
                            <th scope="col">會員姓名</th>
                            <th scope="col">會員行動電話 </th>
                            <th scope="col">會員卡號 </th>
                            <th align="right">

                            </th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tr>
                        <td>
                        <?php 
                            echo $user->SectionNo . sprintf("%06d", $user->MemberNo);  
                        ?>
                        </td>
                        <td>{{$user->AffiliationTime}}</td>
                        <td>{{$user->MemberName}}</td>
                        <td>{{$user->CellPhone}}</td>
                        <td>
                            @if(sizeof($cards[$user->MemberNo]) != 0) @foreach($cards[$user->MemberNo] as $card)
                            <form id="cardForm{{$card->CardSeqNo}}" target="page" action="member_card_edit" method="get">
                                <input type="hidden" value="{{$card->CardNo}}" name="id" />
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <a herf="#" onclick="ShowPage('cardForm{{$card->CardSeqNo}}', 'member_card_edit', 'get'); return false" data-toggle="modal" data-target="#tallModal">{{$card->CardSeqNo}}</a>
                                <br>
                            </form>
                            @endforeach @endif
                        </td>
                        <form id="pageForm{{$user->MemberNo}}" target="page" action="member_profile" method="get">
                        <input type="hidden" value="{{ $user->MemberNo }}" name="id" />
                            <div id="tallModal" class="modal modal-wide fade">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">會員資訊</h4>
                                        </div>
                                        <div class="modal-body">
                                            <iframe id="page" name="page" src="" height="100%" width="100%" scrolling="yes" frameborder="0" style="border:0" onload="ResetWindowSize('page')"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="ShowPage('pageForm{{$user->MemberNo}}', 'member_profile', 'Get');" class="btn btn-primary" >返回個人資料頁面</button>
                                            <button type="button" onclick="" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </form>
                        <form id="deleteMemberForm{{$user->MemberNo}}"  action="member_delete" method="post">  
                            <input type="hidden" value="" name="deleteId" id="deleteId{{$user->MemberNo}}"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="modal fade modalSmall"  id="confirm-delete{{$user->MemberNo}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modalSmall-dialog" >
                                        <div class="modal-content" style="height:20vh;">
                                            <div class="modal-body">
                                            <br><br><br>
                                                確定要刪除用戶"{{$user->MemberName}}"嗎?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <a onclick="DeleteMember('{{$user->MemberNo}}', '{{$user->MemberNo}}')" class="btn btn-danger btn-ok">刪除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                        </form>         
                            <!-- /.modal -->
                        <td>
                            <button type="button" onclick="ShowPage('pageForm{{$user->MemberNo}}', 'member_profile', 'Get');" class="btn btn-primary " data-toggle="modal" data-target="#tallModal">
                                <span class="glyphicon glyphicon-list-alt"></span>
                            </button>
                            <button type="button submit" onclick="ShowPage('pageForm{{$user->MemberNo}}', 'member_edit', 'Get');" class="btn btn-warning" data-toggle="modal" data-target="#tallModal">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            <button type="button submit" onclick="" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete{{$user->MemberNo}}">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <br>
        <form action="{{$action}}" method="{{$method}}" id="changePage">
            <input type="hidden" value="{{ $pageIndex }}" id="pageIndex" name="pageIndex" />
            <input type="hidden" value="{{ $byWhat }}" id="byWhat" name="byWhat">
            <input type="hidden" value="{{ $searchInfo }}" id="inputInfo" name="inputInfo">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="pagingSize" name="pagingSize" value="{{$pagingSize}}" />
            <div class="row midForm" a-pg-id="293">
                <div class="col-md-3">
                </div>                
                <div class="col-md-3">
                </div>
                <div class="col-md-4">
                    <div class="col-sm-5">
                        <a href="#" onclick="ChangePage(-1)" class="btn btn-primary btn-block">上一頁</a>
                    </div>
                    <div class="col-sm-5">
                        <a href="#" onclick="ChangePage(1)" class="btn btn-danger btn-block">下一頁</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endif @if(sizeof($users) == 0)
    <div class="row " a-pg-id="293">
        <label class="col-sm-2 control-label" for="name"></label>
        <div class="col-sm-4 ">
            <div class="alert alert-danger text-center"> 查無會員資料 </div>
            {!! Form::open(array('url' => 'member_list', 'method' =>'get')) !!}
            <p>{!! Form::submit('返回', array('class'=>'btn btn-info btn-block')) !!}</p>
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</header>
@endsection
