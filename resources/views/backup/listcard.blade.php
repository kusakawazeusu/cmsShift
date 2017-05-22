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
        body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
        }  
        .midForm {        margin:0;
        margin-left: auto;
        width: 70%;
        vertical-align: middle;
        }
        .returnInfo {
        margin-left: 35%;
        width: 80%;
        }
</style>

<script>
	function ChangePage(pageOffset)
	{
		newPage = parseInt(document.getElementById('pageIndex').value) + pageOffset;
		if(newPage <= 0)
			return false;
		document.getElementById('pageIndex').value = newPage;
		document.getElementById('changePage').submit();
		return false;
	}
</script>
    <body>
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
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="editContent">
                        <h1>會員卡列表</h1>
                    </div>
                </div>
                @if(sizeof($cards) != 0)
                <table class="table table-striped">
                    <thead> 
                        <tr>
                            <th scope="col">卡號 </th>
                            <th scope="col">使用此卡片的會員 </th>
                            <th></th> 
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($cards as $card)	
                    <tr>
                        <td>{{$card->cardId}}</td>
                        <td>{{$user[$card->id] == null ? ' ' : $user[$card->id]->name}}</td>
                        @if($user[$card->id] != null)
                        <td>
                            <form method="GET" action="/CardInfo">
                                <input type="hidden" value="{{ $user[$card->id] == null ? -1 : $user[$card->id]->id }}" name="id" />
                                <input type="submit" class="btn btn-info btn-block" value="查看會員卡資料" />
                            </form>
                        </td>
                        <td>
                            <form method="GET" action="/Profile">
                                <input type="hidden" value="{{ $user[$card->id] == null ? -1 : $user[$card->id]->id }}" name="id" />
                                <input type="submit" class="btn btn-info btn-block" value="查看會員資料" />
                            </form>
                        </td>                         
                        @else
                        <td></td>
                        <td></td>
                        @endif				
                        <td>
                            <form method="GET" action="/member_card_edit">
                                <input type="hidden" value="{{ $user[$card->id] == null ? -1 : $user[$card->id]->id }}" name="id" />
                                <input type="submit" class="btn btn-info btn-block" value="設定會員卡" />
                            </form>
                        </td>                         
                    </tr>
                    @endforeach
                </table>                 
                <form method="GET" action="{{$action}}" id="changePage">
                <input type="hidden" value="{{$card->id}}" id="name" name="name"/>
                <input type="hidden" value="{{ $pageIndex }}" id="pageIndex" name="pageIndex" />
                <div class="row midForm" a-pg-id="293">
                    <div class="col-sm-4 ">
                        <a href="#" onclick="ChangePage(-1)" class="btn btn-primary btn-block">上一頁</a>
                    </div>
                    <div class="col-sm-4 ">
                        <a href="#" onclick="ChangePage(1)" class="btn btn-danger btn-block">下一頁</a>
                    </div>
                </div>
                </form>
                @else
                <div class="row returnInfo">
                    <div class="col-sm-4 ">
                        <div class="alert alert-danger"> 查無此會員卡</div>
                        {!! Form::open(array('url' => 'member_card_search', 'method' =>'get')) !!}
                        <p>{!! Form::submit('返回', array('class'=>'btn btn-info btn-block')) !!}</p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @endif
        </header>         
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
