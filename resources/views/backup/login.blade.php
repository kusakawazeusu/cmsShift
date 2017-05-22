<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Cover Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="cover.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <style>
        body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 50;
        font-family: 'Lato';
        }          
        .mainForm {
        margin-right: auto; margin-left: auto;
        width: 50%;
        vertical-align: middle;
        }
</style>
    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="masthead clearfix">
                        <div class="inner">
                            <h3 class="masthead-brand">請先登入</h3>
                            <nav>
                                <ul class="nav masthead-nav">
                                    <li class="active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Features</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="inner cover">
                        <h1 class="cover-heading"><form action="login" method="post">
                                <p>請先登入管理員帳密碼</p>
                                @if(Session::has('error'))
                                <div class="alert-box success">
                                    <h2><font color="0xFF0000000">{{ Session::get('error') }}</font></h2>
                                </div>
                                @endif
                                <div class="well mainForm">
                                    <div class="input-group"> 
                                        <span class="input-group-addon">帳號</span> 
                                        <input type="text" name="name" class="form-control" placeholder="請輸入帳號">
                                    </div>                                     
                                    <p class="errors">{{$errors->first('name')}}</p>
                                    <div class="input-group"> 
                                        <span class="input-group-addon">密碼</span> 
                                        <input type="password" name="password" class="form-control" placeholder="請輸入密碼"> 
                                    </div>
                                    <p class="errors">{{$errors->first('password')}}</p>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <p class="lead"><input type="submit" class="btn btn-lg btn-default" value="登入"></p>
                            </form></h1>
                    </div>
                    <div class="mastfoot">
                        <div class="inner">
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
