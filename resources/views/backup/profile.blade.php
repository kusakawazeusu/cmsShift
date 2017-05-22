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
        <link href="style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <style>
        .container{
        width:80vh;
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
        .toppad
        {margin-top:20px;
        }
</style>
    <script>
    
    	function GoDeletePage() 
        {
            document.getElementById('mainForm').action='DelMember';
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
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
    </script>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                    <br>
                    <p class=" text-info">上次編輯時間 : (還沒Implement)</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$user->name}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"> 
                                    <img alt="User Pic" src="http://2.bp.blogspot.com/_qLG1qH88vDM/TTVW9iOUU5I/AAAAAAAAAJI/l6omM3RQsSU/s1600/terminator.jpg" class="img-circle img-responsive"> 
                                </div>
                                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                                <div class=" col-md-9 col-lg-9 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>帳號:</td>
                                                <td>{{$user->account}}</td>
                                            </tr>
                                            <tr>
                                                <td>註冊日期:</td>
                                                <td>{{$user->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>生日:</td>
                                                <td>{{$user->birthday}}</td>
                                            </tr>
                                            <tr>
                                                <tr>
                                                    <td>性別:</td>
                                                    <td>{{$user->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <td>住址</td>
                                                    <td>{{$user->address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>
                                                        <a href="{{$user->email}}">{{$user->email}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>手機號碼</td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>使用者卡號</td> 
                                                    <td>{{$user->cardId == "" ? "尚未指派" : $user->cardId}}</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" class="btn btn-primary">使用者紅利資訊</a>
                                    <a href="#" class="btn btn-primary">使用者消費資訊</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <form id="mainForm" action="member_edit" method="GET">
                                <input type="hidden" value="{{$user->id}}" name="id" />
                                <button type="button submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span>編輯會員
                                </button>
                                <span class="pull-right"><button type="button submit" class="btn btn-danger" onclick="GoDeletePage()">
                                        <span class="glyphicon glyphicon-remove"></span>刪除會員
                                    </button></span>
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
