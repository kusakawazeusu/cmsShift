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
    function ResetWindowSize() {
        var iframeid = document.getElementById("page"); //iframe id
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

function CheckAddResult() {
    //if({{$errors->first('addCardResult')}})
    {
        document.getElementById('informationForm').action = 'Profile';
        document.getElementById('informationForm').submit();
    }
    return false;
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

    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
    });
});
</script>

<body>
    <div class="container">
        <div class="row">
            <div class="toppad">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">帳務資訊 : {{$user->MemberName}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
                                <img alt="User Pic" src="https://upload.wikimedia.org/wikipedia/en/e/ee/Unknown-person.gif" class="img-circle img-responsive">
                            </div>
                            @if($account != null)
                            <div class=" col-md-8">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>回饋點數:</td>
                                            <td>{{$account->RewardPoint}}</td>
                                        </tr>
                                        <tr>
                                            <tr>
                                                <td>額外點數:</td>
                                                <td>{{$account->XtraPoint}}</td>
                                            </tr>
                                            <tr>
                                                <td>櫃台增加的額外點數:</td>
                                                <td>{{$account->OPAddXCredit}}</td>
                                            </tr>
                                            <tr>
                                                <td>機台增加的額外點數:</td>
                                                <td>{{$account->EGMAddXCredit}}</td>
                                            </tr>
                                            <tr>
                                                <td>上次回饋點數:</td>
                                                <td>{{$account->LastRewardPoint}}</td>
                                            </tr>
                                            <tr>
                                                <tr>
                                                    <td>上次回饋押注:</td>
                                                    <td>{{$account->LastRewardBet}}</td>
                                                </tr>
                                                <tr>
                                                    <td>保留回饋點數:</td>
                                                    <td>{{$account->ReservedPoint}}</td>
                                                </tr>
                                                <tr>
                                                    <td>保留額外點數:</td>
                                                    <td>{{$account->ReservedXTraCredit}}</td>
                                                </tr>
                                                <tr>
                                                    <td>狀態:</td>
                                                    <td>{{$account->Status}}</td>
                                                </tr>
                                                <tr>
                                                    <td>使用中的機台編號:</td>
                                                    <td>{{$account->CurMNum}}</td>
                                                </tr>
                                                <tr>
                                                    <td>使用中的機台位置:</td>
                                                    <td>{{$account->CurLocation}}</td>
                                                </tr>
                                                <tr>
                                                    <td>插卡時間:</td>
                                                    <td>{{$account->CurStartTime}}</td>
                                                </tr>
                                                <tr>
                                                    <td>插卡咬住的額外點數:</td>
                                                    <td>{{$account->CurLockXCredit}}</td>
                                                </tr>
                                                <tr>
                                                    <td>插卡咬住的櫃台增加額外點數:</td>
                                                    <td>{{$account->CurLockXCreditByOP}}</td>
                                                </tr>
                                                <tr>
                                                    <td>插卡咬住的機台增加額外點數:</td>
                                                    <td>{{$account->CurLockXCreditByEGM}}</td>
                                                </tr>
                                                <tr>
                                                    <td>插卡咬住的回饋點數:</td>
                                                    <td>{{$account->CurLockPoint}}</td>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if($account == null)
                            <div class=" col-md-12">
                                <table class="table table-user-information">
                                <div class="alert alert-danger text-center"> 查無帳務資訊 </div>
                                </table>
                            </div>
                            @endif
                        </div>
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
