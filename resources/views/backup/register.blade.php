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
        <link href="reg.css" rel="stylesheet">
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
        font-weight: 100;
        font-family: 'Lato';
        }          
        .mainForm {
        margin-right: auto; margin-left: auto;
        width: 70%;
        vertical-align: middle;
        }
</style>
    <body>
        <div class="container">
</div>
        <section id="promo-1" class="content-block promo-1 min-height-600px bg-offwhite">
            <div class="container">
                <div class="row mainForm" a-pg-id="293">
                    <div class=".col-xs-6 .col-sm-3 ">
                        <h2>會員註冊</h2> 
                        @if(Session::has('error'))
                        <div class="alert-box success">
                            <h2>{{ Session::get('error') }}</h2>
                        </div>
                        @endif
                        @if(Session::has('status') && Session::get('status') == 1)
                        <div class="alert alert-success"> 
                            註冊成功！
</div>
                        @elseif((Session::has('status') && Session::get('status') == 0) || Session::has('errors'))                      
                        <div class="alert alert-danger"> 
                            註冊失敗。
</div>
                        @endif
                        <form action="Reg" method="POST">
                            <label for="email" class="cols-sm-2 control-label">帳號</label>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="input-group"> 
                                        <span class="input-group-addon glyphicon glyphicon-user" aria-hidden="true"></span> 
                                        <input type="text" class="form-control" placeholder="輸入帳號" name="useraccount"> 
                                    </div>                                     
                                </div>                                 
                                <div class="col-sm-6">
                                    @if($errors->first('useraccount'))
                                    <div class="alert alert-danger"> 
                                        {{$errors->first('useraccount')}}
</div>
                                    @endif  
                                </div>
                            </div>
                            <label for="email" class="cols-sm-2 control-label">姓名</label>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="input-group"> 
                                        <span class="input-group-addon glyphicon glyphicon-globe" aria-hidden="true"></span> 
                                        <input type="text" class="form-control" placeholder="輸入姓名" name="username"> 
                                    </div>                                     
                                </div>
                                <div class="col-sm-6">
                                    @if($errors->first('username'))
                                    <div class="alert alert-danger"> 
                                        {{$errors->first('username')}}
</div>
                                    @endif   
                                </div>
                            </div>                             
                            <label for="email" class="cols-sm-2 control-label">密碼</label>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="input-group"> 
                                        <span class="input-group-addon glyphicon glyphicon-lock" aria-hidden="true"></span> 
                                        <input type="password" class="form-control" placeholder="輸入密碼" name="password"> 
                                    </div>                                     
                                </div>
                                <div class="col-sm-6">
                                    @if($errors->first('password'))
                                    <div class="alert alert-danger"> 
                                        {{$errors->first('password')}}
</div>
                                    @endif   
                                </div>
                            </div>
                            <label for="email" class="cols-sm-2 control-label">確認密碼</label>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="input-group"> 
                                        <span class="input-group-addon glyphicon glyphicon-lock" aria-hidden="true"></span> 
                                        <input type="password" class="form-control" placeholder="再次輸入密碼" name="password_again"> 
                                    </div>                                     
                                </div>                                 
                                <div class="col-sm-6">
                                    @if($errors->first('password_again'))
                                    <div class="alert alert-danger"> 
                                        {{$errors->first('password_again')}}
</div>
                                    @endif   
                                </div>                                 
                            </div>
                            <label for="email" class="cols-sm-2 control-label">信箱</label>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <div class="input-group"> 
                                        <span class="input-group-addon glyphicon glyphicon-envelope" aria-hidden="true"></span> 
                                        <input type="text" class="form-control" placeholder="輸入信箱" name="email"> 
                                    </div>                                     
                                </div>                                 
                                <div class="col-sm-6">
                                    @if($errors->first('email'))
                                    <div class="alert alert-danger"> 
                                        {{$errors->first('email')}}
</div>
                                    @endif   
                                </div>                                 
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <hr>
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="submit" class="btn btn-primary btn-block" value="送出註冊" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
