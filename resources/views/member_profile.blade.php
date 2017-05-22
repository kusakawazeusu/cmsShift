<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blank Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!--<link href="style.css" rel="stylesheet">-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
.container {
    width: 80vh;
}

.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}

.table-user-information > tbody > tr > td {
    border-top: 0;
}

.toppad {
    margin-top: 20px;
}
</style>
 <script src="assets/js/jquery.min.js"></script>
    <script>
    //根據引入的頁面大小來改變當前頁面大小
    function ResetWindowSize($pageId) {
        var iframeid = document.getElementById($pageId); //iframe id
        if (document.getElementById) {
            if (iframeid && !window.opera) {
                if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight) {
                    iframeid.height = iframeid.contentDocument.body.offsetHeight;
                } else if (iframeid.Document && iframeid.Document.body.scrollHeight) {
                    iframeid.height = iframeid.Document.body.scrollHeight;
                }
            }
        }
    };

function GoCardPage(formId) {
    //alert(cardId);
    document.getElementById(formId).submit();
}

function GoDeletePage() {
    document.getElementById('informationForm').target="";
    document.getElementById('mainForm').metohd = 'post';
    document.getElementById('mainForm').action = 'member_delete';
    return false;
}

function GoAccountPage() {
    document.getElementById('informationForm').target="";
    document.getElementById('informationForm').action = 'member_account';
    document.getElementById('informationForm').submit();
    return false;
}

function GoGameRecordPage() {
    document.getElementById('informationForm').target="";
    document.getElementById('informationForm').action = 'member_play_record';
    document.getElementById('informationForm').submit();
    return false;
}

function GoEditPage() {
    document.getElementById('informationForm').target="";
    document.getElementById('informationForm').action = 'member_edit';
    document.getElementById('informationForm').submit();
    return false;
}

function GoCardRecordPage() {
    document.getElementById('informationForm').target="_blank";
    document.getElementById('informationForm').action = 'member_card_trans_list';
    document.getElementById('informationForm').submit();
    return false;
}

function GoBounsRecordPage() {
    document.getElementById('informationForm').target="_blank";
    document.getElementById('informationForm').action = 'member_bonus_trans_list';
    document.getElementById('informationForm').submit();
    return false;
}

function GoProfilePage() {
    //if({{$errors->first('addCardResult')}})
    {
        document.getElementById('informationForm').action = 'member_profile';
        document.getElementById('informationForm').submit();
    }
    return false;
}

function GoProfileSuccessPage() {
    //if({{$errors->first('addCardResult')}})
    {
        document.getElementById('informationForm').action = 'member_profile?success=1';
        document.getElementById('informationForm').submit();
    }
    return false;
}

function GoBetLogPage() {
    //if({{$errors->first('addCardResult')}})
    {
        document.getElementById('informationForm').target="_blank";
        document.getElementById('informationForm').action = 'member_bet_log';
        document.getElementById('informationForm').submit();
    }
    return false;
}
function GetMemberStatus(statusCode)
{
    switch(statusCode)
    {
            case 0:
        return "Freezen";
            case 1:
        return "Active";
            case 2:
        return "Abandon";
            case 3:
        return "Un-Abandon";
    }
    return "None";
}

$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if (idFor.is(':visible')) {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            } else {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });

    $(window).scrollTop(0);

    $('button').click(function(e) {
        e.preventDefault();
    });

    $(document).on('hide.bs.modal','#myModal', function () {
        var $status = $('iframe[name=addCardPage]').contents().find('#pageStatus').val();
        if($status == "1")
            GoProfileSuccessPage();
    });
});

</script>
<body>
    <div class="container">
        <div class="row">
            <div class="toppad">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">會員名字: {{$user->MemberName}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
                                <img alt="User Pic" src="https://upload.wikimedia.org/wikipedia/en/e/ee/Unknown-person.gif" class="img-circle img-responsive">
                            </div>

                            <div class=" col-md-8">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>會員等級:</td>
                                            <td>{{$rank}}</td>
                                        </tr>
                                        <tr>
                                            <tr>
                                                <td>會員狀態:</td>
                                                <td>{{$user->MemberStatus == 1 ? "Active" : 
                                                     ($user->MemberStatus == 0 ? "Freezen" : 
                                                     ($user->MemberStatus == 2 ? "Abandon" : "Un-Abandon"))}}</td>
                                            </tr>
                                            <tr>
                                                <td>身份證字號:</td>
                                                <td>{{$user->MemberID}}</td>
                                            </tr>
                                            <tr>
                                                <td>入會時間:</td>
                                                <td>{{$user->AffiliationTime}}</td>
                                            </tr>
                                            <tr>
                                                <td>生日:</td>
                                                <td>{{$user->Birthday}}</td>
                                            </tr>
                                            <tr>
                                                <tr>
                                                    <td>住址:</td>
                                                    <td>{{$user->Address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td>
                                                        <a href="{{$user->Email}}">{{$user->Email}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>行動電話:</td>
                                                    <td>{{$user->CellPhone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>室內電話:</td>
                                                    <td>{{$user->TelePhone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>使用者卡號:</td>
                                                    <td>
                                                        @if(sizeof($cards) != 0) @foreach($cards as $card)
                                                        <form method="POST" action="member_card_search" id="{{$card->CardSeqNo}}Form">
                                                            <input type="hidden" value="{{$card->CardSeqNo}}" name="name" />
                                                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                                            <a herf="#" onclick="GoCardPage('{{$card->CardSeqNo}}Form'); return false;">{{$card->CardSeqNo}}</a>
                                                            <br>
                                                        </form>
                                                        @endforeach @endif
                                                        <br>
                                                        <br>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" onclick="document.getElementById('pageForm').submit()" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                                            新增會員卡
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal" >
                                                            <div class="modal-dialog" style="height:40vh;" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="pageForm" target="addCardPage" action="member_card_add" method="get">
                                                                            <input type="hidden" value="{{$user->MemberNo}}" name="MemberNo" />
                                                                        </form>
                                                                        <iframe id="addCardPage" name="addCardPage" src="" height="400" width="100%" scrolling="no" frameborder="0" style="border:0" onload=""></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>是否使用額外點數:</td>
                                                    <td>{{$user->XCEnable ? "是" : "否"}}</td>
                                                </tr>
                                                <tr>
                                                    <td>使否使用回饋點數:</td>
                                                    <td>{{$user->RPEnable ? "是" : "否"}}</td>
                                                </tr>
                                                <tr>
                                                    <td>備註:</td>
                                                    <td>{{$user->Memo}}</td>
                                                </tr>
                                    </tbody>
                                </table>
                                <form id="informationForm" action="Account" method="GET">
                                    <input type="hidden" value="{{$user->MemberNo}}" name="id" />
                                    <input type="hidden" value="1" id="pageStatus" />
                                    <a href="#" onclick="GoAccountPage()" class="btn btn-primary">會員帳務資訊</a><br>
                                    <a href="#" onclick="GoGameRecordPage()" class="btn btn-primary">會員遊戲紀錄資訊</a><br>
                                    <a href="#" onclick="GoBetLogPage()" class="btn btn-primary">會員押注紀錄資訊</a><br>
                                    <a href="#" onclick="GoBounsRecordPage()" class="btn btn-primary">會員紅利點數查詢</a><br>
                                    <a href="#" onclick="GoCardRecordPage()" class="btn btn-primary">會員發卡記錄查詢</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <form id="mainFormX" action="member_edit" method="GET">
                            <input type="hidden" value="{{$user->MemberNo}}" name="id" />
                            <input type="hidden" value="{{$user->MemberNo}}" name="deleteId" />
                            <button type="button submit" class="btn btn-warning" onclick="GoEditPage()">
                                <span class="glyphicon glyphicon-edit"></span>編輯會員
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
