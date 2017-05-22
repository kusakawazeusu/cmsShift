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
            {!! Form::open(array('url' => 'login')) !!}
            <h1>請先登入</h1>
            @if(Session::has('error'))
            <div class="alert-box success">
                <h2>{{ Session::get('error') }}</h2>
            </div>
            @endif
        <div class="controls">
            {!! Form::text('name','',array('id'=>'','class'=>'form-control span6','placeholder' => '輸入帳號')) !!}
            <p class="errors">{{$errors->first('name')}}</p>
        </div>
        <div class="controls">
            {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => '輸入密碼')) !!}
            <p class="errors">{{$errors->first('password')}}</p>
        </div>
            <p>{!! Form::submit('登入', array('class'=>'send-btn')) !!}</p>
            {!! Form::close() !!}
        </div>
    </body>
</html>