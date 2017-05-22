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
    <style>
        .midForm{
        margin:0;
        margin-right: auto;
        margin-left: auto;
        }
</style>
 <script src="assets/js/jquery.min.js"></script>
    <script>
        
       function calc_total(){
    var sum = 0;
    $('.input-amount').each(function(){
        sum += parseFloat($(this).text());
    });
    $(".preview-total").text(sum);    
}
$(document).on('click', '.input-remove-row', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
    	tr.remove();
	   	calc_total()
	});
});

$(function(){
    $('.preview-add-button').click(function(){
        var form_data = {};
        form_data["concept"] = $('.payment-form input[name="concept"]').val();
        form_data["description"] = $('.payment-form input[name="description"]').val();
        form_data["amount"] = parseFloat($('.payment-form input[name="amount"]').val()).toFixed(2);
        form_data["status"] = $('.payment-form #status option:selected').text();
        form_data["date"] = $('.payment-form input[name="date"]').val();
        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
        var row = $('<tr></tr>');
        $.each(form_data, function( type, value ) {
            $('<td class="input-'+type+'"></td>').html(value).appendTo(row);
        });
        $('.preview-table > tbody:last').append(row); 
        calc_total();
    });  
});
    </script>
    <body>
        <div class="container">
            <label class="control-label" for="name">
                <div class="col-md-8 center-block">
                    <form class="form-horizontal " action='member_card_edit' method="POST">
                        <fieldset>
                            <div class="form-group">
                                <div class="  col-sm-offset-2 col-sm-10">
                                    <div id="legend">
                                        <legend>                                                                                                                               編輯會員卡 : 
</legend>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="  col-sm-offset-2 col-sm-10"> 
                                    @if(Session::has('status') && Session::get('status') == 1)
                                    <input type="hidden" value="1" id="pageStatus">
                                    <div class="alert alert-success"> 
                                        <strong>更新成功!</strong> 
                                    </div>
                                    @elseif(Session::has('status'))
                                    <div class="alert alert-danger"> 
                                    <input type="hidden" value="0" id="pageStatus">
                                        <strong>更新失敗!</strong> 查不到您所輸入的會員名稱及身份證字號。        
                                    </div>   
                                    @else
                                    <input type="hidden" value="0" id="pageStatus">                                  
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="      col-sm-offset-2 col-sm-10">
                                    <div class="control-group">
                                        <!-- Username -->
                                        <label class="control-label" for="username">會員卡:{{$CardSeqNo}}</label><br>
                                    </div>
                                </div>
                                <div class="      col-sm-offset-2 col-sm-10">
                                    <div class="control-group">
                                        <!-- Username -->
                                        <label class="control-label" for="username">使用者名稱</label>
                                        <div class="controls">
                                            <input type="text" id="username" value='{{$MemberName}}' name="MemberName" placeholder="" class="input-xlarge form-control">
                                            <p class="help-block">輸入要使用的會員名稱</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group">
                                <div class="      col-sm-offset-2 col-sm-10">
                                    <div class="control-group">
                                        <!-- Username -->
                                        <label class="control-label" for="username">身份證字號</label>
                                        <div class="controls">
                                            <input type="text" id="username" value='{{$MemberID}}' name="MemberID" placeholder="" class="input-xlarge form-control">
                                            <p class="help-block">輸入要使用的會員身份證字號</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="      col-sm-offset-2 col-sm-10">
                                    <div class="control-group">
                                        <!-- Password-->
                                        <label class="control-label" for="password">會員卡狀態</label>
                                        <div class="controls">
                                            <select class="form-control" name="cardStatus"> 
                                                <option selected="true" style="display:none;">{{$cardStatus == 0 ? 'InActive' : 'Active'}}</option>
                                                <option>Active</option>                                                 
                                                <option>InActive</option>                                                 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="      col-sm-offset-2 col-sm-10">
                                    <div class="control-group">
                                        <!-- Button -->
                                        <div class="controls">
                                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                            <input type="hidden" value='{{$CardNo}}' name="CardNo">
                                            <input type="hidden" value='{{$CardSeqNo}}' name="CardSeqNo">
                                            <button class="btn btn-success">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </label>
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
