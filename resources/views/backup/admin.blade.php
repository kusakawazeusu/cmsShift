<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>會員管理系統</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="offcanvas.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <style>
</style>
        <script>
        //根據引入的頁面大小來改變當前頁面大小
        function ResetWindowSize(){
            var iframeid=document.getElementById("page"); //iframe id
            if (document.getElementById){   
            if (iframeid && !window.opera) {   
                    if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight) {   
                        iframeid.height = iframeid.contentDocument.body.offsetHeight;
                    }
                    else if(iframeid.Document && iframeid.Document.body.scrollHeight) {   
                        iframeid.height = iframeid.Document.body.scrollHeight;   
                    }
                }
            }
        };
        </script>
        <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">後臺管理系統</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">會員管理</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- /.navbar -->
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">會員管理</a>
                        <a href="#" onclick="document.getElementById('page').src='Reg'" class="list-group-item">會員註冊</a>
                        <a href="#" onclick="document.getElementById('page').src='member_search'" class="list-group-item">會員查詢</a>
                        <a href="#" onclick="document.getElementById('page').src='member_list'" class="list-group-item">列出會員</a>
                        <a href="#" onclick="document.getElementById('page').src='member_card_search'" class="list-group-item">卡號查詢</a>
                        <a href="#" onclick="document.getElementById('page').src='member_card_list'" class="list-group-item">卡號列出</a>
                        <a href="#" onclick="document.getElementById('page').src='Logout'" class="list-group-item">登出</a>
                        <input type="hidden" name="pageInfo" value="">
                    </div>
                </div>
                <div class="iframe-rwd">
                    <iframe id="page" src="" height="100%" width="70%" scrolling="no" frameborder="0" style="border:0" onload="ResetWindowSize()"></iframe>
                </div>                 
                <!--/.col-xs-12.col-sm-9-->
                <!--/.sidebar-offcanvas-->
            </div>
            <!--/row-->
            <hr>
            <footer>
                <span class="label label-default">© Casino Management System by National Taiwan University of Science and Technology 2016</span>
            </footer>
        </div>
        <!--/.container-->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
        $(document).ready(function () {
            $('[data-toggle="offcanvas"]').click(function () {
                $('.row-offcanvas').toggleClass('active')
            });
        });
    </script>
    </body>
</html>
