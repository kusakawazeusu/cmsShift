<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Carousel Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- Custom styles for this template -->
        <link href="carousel.blade.css" rel="stylesheet">
    </head>
    <!-- NAVBAR
================================================== -->
    <body>
        <div class="navbar-wrapper">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">後臺管理</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="#">首頁</a>
                                </li>
                                <li>
                                    <a href="#searchMember" onclick="document.getElementById('page').src= 'member_search';">查詢會員</a>
                                </li>
                                <li>
                                    <a href="#searchCard" onclick="document.getElementById('page').src='member_card_search';">查詢卡號</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">其他<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">Nav header</li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                        <li>
                                            <a href="#">One more separated link</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Carousel
    ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <iframe id="page" src="Reg" height="95%" width="100%" scrolling="no" frameborder="0" style="border:0"></iframe>
            <div class="container pg-empty-placeholder"></div>
            <!-- Indicators -->
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table"> 
            <thead> 
                <tr> 
                    <th>#</th> 
                    <th>{{$name}}</th> 
                </tr>                 
            </thead>             
            <tbody> 
                <tr> 
                    <td>1</td> 
                    <td>Mark</td> 
                    <td>Otto</td> 
                    <td>@mdo</td> 
                </tr>                 
                <tr> 
                    <td>2</td> 
                    <td>Jacob</td> 
                    <td>Thornton</td> 
                    <td>@fat</td> 
                </tr>                 
                <tr> 
                    <td>3</td> 
                    <td>Larry</td> 
                    <td>the Bird</td> 
                    <td>@twitter</td> 
                </tr>                 
            </tbody>
        </table>
        <!-- /.carousel -->
        <!-- Marketing messaging and featurettes
    ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <!-- /.container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="assets/js/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
