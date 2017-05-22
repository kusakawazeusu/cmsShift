@extends('layouts.management_sys_layout') @section('title', 'Page Title') @section('style')
<style>
.midForm {
    margin: 0;
    margin-left: auto;
    width: 100%;
    vertical-align: middle;
}

.returnInfo {
    margin-left: 35%;
    width: 80%;
}
</style>
@endsection @section('script')
<script>
function ShowPage(formName, pageName, methodName, hiddenValue) {
    document.getElementById(formName).querySelector(".form_id").value = hiddenValue;
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
            "targets": [4],
            "orderable": false
        }]
    });
});

function DeleteCard(form, id)
{
    document.getElementById('deleteId' + form).value=id; 
    document.getElementById('deleteMemberForm' + form).submit(); 
    return false;
}

function CheckAddResult() {
    //if({{$errors->first('addCardResult')}})
    {
        document.getElementById('changePage').submit();
    }
    return false;
}

$(document).on('hide.bs.modal','#tallModal', function () {
    var $status = $('iframe[name=page2]').contents().find('#pageStatus').val();
    if($status == "1")
        CheckAddResult();
});

$(document).on('hide.bs.modal','#newModal', function () {
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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-2 text-center">
                <div class="editContent midForm">
                    <h1>會員卡列表</h1>
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
            <form id="searchForm" action="member_card_search" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="hidden" name="pagingSize" value="{{$pagingSize}}" />
                            <span class="input-group-addon glyphicon glyphicon-search" aria-hidden="true"></span>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" value="byDropDown" id="byWhat" name="byWhat">
                            <input id="searchBox" type="text" class="form-control" placeholder="輸入搜尋資訊" name="name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="searchBy" value="">
                            <option selected="true" style="display:none;">卡號</option>
                            <option>卡號</option>
                            <option>會員姓名</option>
                        </select>
                    </div>
                    <div class="col-md-2"><a class="btn btn-primary btn-block" data-toggle="modal" data-target="#newModal" >新增</a>
                    
                    <div id="newModal" class="modal modal-wide fade">
                        <div class="modal-dialog" style="height:40vh;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">會員資訊</h4>
                                </div>
                                <div class="modal-body">
                                    <iframe id="page" name="page" src="member_card_register" height="50%" width="100%" scrolling="yes" frameborder="0" style="border:0" onload="ResetWindowSize()"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
        @if(sizeof($cards) != 0 && $cards != null)
        <div class="row">
            <div class="col-md-8">
                <table id="myTable" class="dataTable table-striped " cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" width=20%>#會員卡卡號 </th>
                            <th scope="col" width=20%>登錄日期</th>
                            <th scope="col" width=20%>會員卡用戶 </th>
                            <th scope="col" width=20%>會員卡狀態 </th>
                            <th scope="col" width=40%>

                        </th>
                    </tr>
                </thead>
                @foreach($cards as $card)
                <tr>
                    <td>{{$card->CardSeqNo}}</td>
                    <td>{{$card->created_at}}</td>
                    <td>
                        @if($user[$card->CardNo] != null)
                        <form method="GET" action="/Profile" id="{{$user[$card->CardNo]->MemberName}}Form">
                            <input type="hidden" value="{{$user[$card->CardNo]->MemberName}}" name="id" />
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> {{$user[$card->CardNo]->MemberName}}
                        </form>
                        @endif
                    </td>

                    <!-- /.modal -->
                    <td>{{$card->CardStatus == 1 ? 'Active' : 'InActive'}}</td>
                            <form id="deleteMemberForm{{$card->CardNo}}"  action="member_card_delete" method="post">  
                            <input type="hidden" value="" name="deleteId" id="deleteId{{$card->CardNo}}"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="modal modalSmall fade"  id="confirm-delete{{$card->CardNo}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modalSmall-dialog" >
                                        <div class="modal-content" style="height:20vh;">
                                            <div class="modal-body">
                                            <br><br><br>
                                                確定要刪除此會員卡嗎?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <a onclick="DeleteCard('{{$card->CardNo}}', '{{$card->CardNo}}')" class="btn btn-danger btn-ok">刪除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                        </form>        
                        <td align="center">
                            <form id="pageForm{{$card->CardNo}}" target="page2" action="member_profile" method="get">
                                <input name="id" type="hidden" value="" class="form_id" />
                                @if($user[$card->CardNo] != null)
                                <div id="tallModal" class="modal modal-wide fade">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">會員資訊</h4>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="page2" name="page2" src="" height="100%" width="100%" scrolling="yes" frameborder="0" style="border:0" onload="ResetWindowSize('page2')"></iframe>
                                            </div>
                                            <div class="modal-footer">                                            
                                                <button type="button" onclick="ShowPage('pageForm{{$card->CardNo}}', 'member_profile', 'Get', '{{ $user[$card->CardNo]->MemberNo }}');" class="btn btn-primary" >返回個人資料頁面</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>                                  
                                <button type="button" onclick="ShowPage('pageForm{{$card->CardNo}}', 'member_profile', 'Get', '{{ $user[$card->CardNo]->MemberNo }}');" class="btn btn-primary " data-toggle="modal" data-target="#tallModal">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </button>
                                @else
                                <button type="button" disabled class="btn btn-primary " data-toggle="modal" data-target="#tallModal">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </button>                           
                                @endif
                                <button type="button submit" onclick="ShowPage('pageForm{{$card->CardNo}}', 'member_card_edit', 'Get', '{{$card->CardNo }}');" class="btn btn-warning" data-toggle="modal" data-target="#tallModal">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button>                                
                                <button type="button submit"  enable="false" onclick="ShowPage('pageForm{{$card->CardNo}}', 'member_edit', 'Get');" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete{{$card->CardNo}}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>                      
                            </form>
                        </td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
        <br>
        <form method="{{$method}}" action="{{$action}}" id="changePage">
            <input type="hidden" value="{{ $searchInfo }}" id="name" name="name" />
            <input type="hidden" value="{{ $byWhat }}" id="byWhat" name="byWhat">
            <input type="hidden" value="{{ $pageIndex }}" id="pageIndex" name="pageIndex" />
            <input type="hidden" id="pagingSize" name="pagingSize" value="{{$pagingSize}}" />
            <div class="row midForm" a-pg-id="293">
                <div class="col-md-3">
                </div>                
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
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
    @endif @if(sizeof($cards) == 0)
    <div class="row text-center">
        <label class="col-sm-2 control-label" for="name"></label>
        <div class="col-sm-4 ">
            <div class="alert alert-danger"> 查無此會員卡資料 </div>
            {!! Form::open(array('url' => 'member_card_list', 'method' =>'get')) !!}
            <p>{!! Form::submit('返回', array('class'=>'btn btn-info btn-block')) !!}</p>
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</header>
@endsection
