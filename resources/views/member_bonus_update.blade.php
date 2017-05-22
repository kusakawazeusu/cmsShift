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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<script>
function DoSubmit() {
    document.getElementById('mainForm').submit();
    return false;
}

</script>


<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header text-center">
                <h1>更新紅利資訊</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
         @if(session()->has('success'))
        <div class="alert alert-success">
            <strong>{{session()->get('success')}}</strong>
        </div>
        @endif
        <div class="form-group" align="center">
            <p>輸入要變更的資訊</p>
        </div>
        <form action="member_bonus_update" method="POST" id="mainForm">
            <input type="hidden" name="id" value="{{$id}}" />
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-4 control-label" for="name"></label>                    
                    <div class="col-sm-2 center-block">
                        <select class="form-control crsa-selected" name="point_type" onclick="">
                            <option selected="true" style="display:none;">XTraCredit</option>
                            <option>XTraCredit</option>
                            <option>RewardCredit</option>
                        </select>
                    </div>
                    <div class="col-sm-2 center-block">
                        Current Value : 0
                    </div>                    
                </div>            
                <div class="row">
                    <label class="col-sm-4 control-label" for="name"></label>                    
                    <div class="col-sm-2 center-block">
                        <input type="text" class="form-control" placeholder="輸入變更數值" name="newValue">
                        <div class="controls col-md-12">
                            @if($errors->first('cardSeq'))
                            <div class="alert alert-danger">
                                {{$errors->first('cardSeq')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control crsa-selected" name="behavior" onclick="">
                            <option selected="true" style="display:none;">增加</option>
                            <option>增加</option>
                            <option>減少</option>
                        </select>
                    </div>                 
                </div>

                <div class="row">
                    <label class="col-sm-4 control-label" for="name"></label>    
                    <div class="col-sm-2 control-label">  
                    過期日
                    
                    </div>   
                </div>   
                <div class="row">
                    <label class="col-sm-4 control-label" for="name"></label>    
                    <div class="col-sm-4 control-label">
                        <input type="datetime-local" class="form-control" placeholder="選擇時間" name="expire_date" >
                    </div>   
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <label class=" control-label" for="singlebutton"></label>
                <div class=" center-block">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block">
                        確定送出
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
