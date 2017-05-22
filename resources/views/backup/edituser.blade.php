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
    <script>
         $(document).ready(function() {

    var enrollType;
  //  $("#div_id_As").hide();
    $("input[name='As']").change(function() {
        memberType = $("input[name='select']:checked").val();
        providerType = $("input[name='As']:checked").val();
		toggleIndividInfo();
    });
    
    $("input[name='select']").change(function() {
		memberType = $("input[name='select']:checked").val();
		toggleIndividInfo();
		toggleLearnerTrainer();
	});
	
	function toggleLearnerTrainer() {

	if (memberType == 'P' || enrollType=='company') {
		$("#cityField").hide();
		$("#providerType").show();
		$(".provider").show();
		$(".locationField").show();
		if(enrollType=='INSTITUTE'){
			$(".individ").hide();
		}
	
	} 
    else {
		$("#providerType").hide();
		$(".provider").hide();
		$('#name').show();
		$("#cityField").hide();
		$(".locationField").show();
		$("#instituteName").hide();
		$("#cityField").show();
		
	}
    }
    function toggleIndividInfo(){

	if(((typeof memberType!=='undefined' && memberType == 'TRAINER')||enrollType=='INSTITUTE') && providerType=='INDIVIDUAL'){
		$("#instituteName").hide();
		$(".individ").show();
		$('#name').show();
	}
    else if((typeof memberType!=='undefined' && memberType == 'TRAINER')|| enrollType=='INSTITUTE'){
		$('#name').hide();
		$("#instituteName").show();
		$(".individ").hide();
	}
    }
   
 });



    </script>
    <body>
        <div class="container"> 
            <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info"> 
                    <div class="panel-body">
                        @if($errors->first('success') && $errors->first('success') == true)
                        <div class="alert alert-success"> 
                            <strong>編輯成功！</strong> 
                        </div>
                        @elseif($errors->first('success') && $errors->first('success') == false)
                        <div class="alert alert-danger"> 
                            <strong>編輯失敗！</strong> 
                        </div>                         
                        @endif
                        {!! Form::open(array('url' => 'member_edit', 'method' =>'put')) !!}
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                        <form class="form-horizontal" method="post">
                            <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            <div id="div_id_select" class="form-group required">
                                <div class="controls col-md-8 " style="margin-bottom: 10px">
</div>
                            </div>                             
                            <div id="div_id_As" class="form-group required">
                                <div class="controls col-md-8 " style="margin-bottom: 10px">
</div>
                            </div>
                            <div id="div_id_username" class="form-group required">
                                <label for="id_username" class="control-label col-md-4 ">
                                    <span class="asteriskField">姓名</span>
                                </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" placeholder="Choose your username" style="margin-bottom: 10px" type="text" value="{{$user->name}}" />
                                </div>
                            </div>
                            <div id="div_id_email" class="form-group required">
                                <label for="id_email" class="control-label col-md-4"> E-mail</label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="請輸入Email" style="margin-bottom: 10px" type="email" value="{{$user->email}}" />
                                </div>                                 
                            </div>
                            <div id="div_id_password1" class="form-group required">
                                <label for="id_password1" class="control-label col-md-4 ">密碼</label>
                                <div class="controls col-md-8 "> 
                                    <input class="input-md textinput textInput form-control" id="id_password1" name="password" placeholder="請輸入要更改的密碼" style="margin-bottom: 10px" type="password" />
                                    <div class="controls col-md-8">
                                        @if($errors->first('password'))
                                        <div class="alert alert-danger"> 
                                            {{$errors->first('password')}}
</div>
                                        @endif   
                                    </div>
                                </div>
                            </div>
                            <div id="div_id_password2" class="form-group required">
                                <label for="id_password2" class="control-label col-md-4 ">
                                    <span class="asteriskField">確認密碼</span>
                                </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_password2" name="password_again" placeholder="再次輸入要更改的密碼" style="margin-bottom: 10px" type="password" /> 
                                    <div class="controls col-md-8">
                                        @if($errors->first('password_again'))
                                        <div class="alert alert-danger"> 
                                            {{$errors->first('password_again')}}
</div>
                                        @endif   
                                    </div>
                                </div>
                            </div>
                            <div id="div_id_name" class="form-group required"> 
</div>
                            <div id="div_id_gender" class="form-group required">
                                <label for="id_gender" class="control-label col-md-4 ">性別</label>
                                <div class="controls col-md-8 " style="margin-bottom: 10px">
                                    <label class="radio-inline"> 
                                        <input type="radio" name="gender" id="id_gender_1" value="M" style="margin-bottom: 10px">男生
                                    </label>
                                    <label class="radio-inline"> 
                                        <input type="radio" name="gender" id="id_gender_2" value="F" style="margin-bottom: 10px">女生
                                    </label>
                                </div>
                            </div>
                            <div id="div_id_company" class="form-group required"> 
                                <label for="id_company" class="control-label col-md-4  ">公司行號</label>
                                <div class="controls col-md-8 "> 
                                    <input class="input-md textinput textInput form-control" id="id_company" name="company" placeholder="輸入會員隸屬公司" style="margin-bottom: 10px" type="text" />
                                </div>
                            </div>                             
                            <div id="div_id_catagory" class="form-group required">
</div>                             
                            <div id="div_id_number" class="form-group required">
                                <label for="id_number" class="control-label col-md-4  ">手機號碼</label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_number" name="phone" placeholder="輸入手機號碼" style="margin-bottom: 10px" type="text" value="{{$user->phone}}" />
                                </div>                                 
                            </div>                             
                            <div id="div_id_location" class="form-group required">
                                <label for="id_location" class="control-label col-md-4  ">住址</label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="id_location" name="address" placeholder="輸入住址" style="margin-bottom: 10px" type="text" value="{{$user->address}}" />
                                </div>                                 
                            </div>
                            <div id="div_id_location" class="form-group required">
                                <label for="id_location" class="control-label col-md-4  ">會員卡</label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="cardId" name="cardId" placeholder="輸入會員卡號" style="margin-bottom: 10px" type="text" value="{{$user->cardId}}" />
                                </div>                                 
                            </div>
                            <div class="form-group">
</div>                             
                            <div class="form-group"> 
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8 ">
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                    <input type="submit" name="Submit" value="提交修改" class="btn btn-primary btn btn-info" id="submit-id-signup">&nbsp;
                                </div>
                            </div>                             
                        </form>
                        {!! Form::close() !!}  
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
