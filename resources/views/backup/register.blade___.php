<!doctype html>
<html>
<head>
<title>管理員登入頁面</title>
<link href = "https://fonts.googleapis.com/css?family=Lato:100" rel = "stylesheet"
type = "text/css">

<style>
html, body {
    height: 100%;
}
body {
    margin: 0;
    padding: 0;
    width: 100%;
    display: table;
    font-weight: 100;
    font-family: 'Lato';
}
.container {
    text-align: center;
    display: table-cell;
    vertical-align: middle;
}
.content {
    text-align: center;
    display: inline-block;
}
.title {
    font-size: 96px;
}
</style>
</head>

    <body>
        <div class = "container">
            {!! Form::open(array('url' => 'Reg')) !!}
            <h1>會員註冊</h1>
            @if(Session::has('error'))
            <div class="alert-box success">
                <h2>{{ Session::get('error') }}</h2>
            </div>
            @endif
        <div class="controls">
            <h3>帳號</h3>
            {!! Form::text('useraccount','',array('id'=>'','class'=>'form-control span6','placeholder' => '輸入帳號')) !!}
            <p class="errors">{{$errors->first('useraccount')}}</p>
        </div>
        <div class="controls">
            <h3>名稱</h3>
            {!! Form::text('username','',array('id'=>'','class'=>'form-control span6','placeholder' => '輸入帳號')) !!}
            <p class="errors">{{$errors->first('username')}}</p>
        </div>        
        <div class="controls">
            <h3>密碼</h3>
            {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => '輸入密碼')) !!}
            <p class="errors">{{$errors->first('password')}}</p>
        </div>
        <div class="controls">
            <h3>確認密碼</h3>
            {!! Form::password('password_again',array('class'=>'form-control span6', 'placeholder' => '再次輸入密碼')) !!}
            <p class="errors">{{$errors->first('password_again')}}</p>
        </div>        
        <p>{!! Form::submit('送出', array('class'=>'send-btn')) !!}</p>
        {!! Form::close() !!}
        </div>
    </body>
</html>