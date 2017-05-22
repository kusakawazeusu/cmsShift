<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sticky Footer Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="sticky-footer.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <style> 
        .midForm {
        margin-left:35%;
        width: 100%;
        }        
        .button {
        margin-left:6%;
        width: auto;
        }
</style>
    <body>
        <!-- Begin page content -->
        <div class="container">
            <div class="page-header text-center">
                <h1>查詢系統</h1>
            </div>
        </div>
        <div class="midForm" align="center">
            <form action="{{$respondMethod}}" method="POST">
                <div class="row"> 
                    <div class="col-sm-4">
                        <p>
                     輸入要查詢的{{$title}} </p> 
                        <input type="text" class="form-control" placeholder="請輸入{{$title}}" name="name">
                    </div>
                </div>
                <div class="form-group row button">
                    <div class="col-sm-2">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <input type="submit" class="btn btn-primary btn-block" value="送出查詢" />
                    </div>
                </div>
            </form>
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
