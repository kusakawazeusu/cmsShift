<!doctype html>
<html>
<head>
<title>編輯會員</title>
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
        {!! Form::open(array('url' => 'member_edit', 'method' =>'put')) !!}
            <h1>會員修改</h1>
            @if(Session::has('error'))
            <div class="alert-box success">
                <h2>{{ Session::get('error') }}</h2>
            </div>
            @endif
        <div class="controls">
            <h3>帳號 : {{$user->account}}</h3>
        </div>      
        <div class="controls">
            <h3>名稱</h3>
            {!! Form::text('username',$user->name,array('id'=>'','class'=>'form-control span6', 'placeholder' => '輸入帳號')) !!}
            <p class="errors">{{$errors->first('username')}}</p>
        </div>        
        <div class="controls">
            <h3>卡號</h3>
            {!! Form::text('cardId',$user->cardId,array('id'=>'','class'=>'form-control span6', 'placeholder' => '輸入帳號')) !!}
            <p class="errors">{{$errors->first('cardId')}}</p>
        </div>          
        <div class="controls">
            <h3>密碼</h3>
            {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => '輸入新密碼')) !!}
            <p class="errors">{{$errors->first('password')}}</p>
        </div>
        <div class="controls">
            <h3>確認密碼</h3>
            {!! Form::password('password_again',array('class'=>'form-control span6', 'placeholder' => '再次輸入新密碼')) !!}
            <p class="errors">{{$errors->first('password_again')}}</p>
        </div>
        <input type = "hidden" value ={{$user->id}} name = "id">
        {!! Form::submit('送出', array('class'=>'send-btn')) !!}
        {!! Form::close() !!}
        {!! Form::open(array('url' => 'member_list', 'method' =>'get')) !!}
        {!! Form::submit('返回', array('class'=>'send-btn')) !!}
        {!! Form::close() !!}        
        </div>
    </body>
</html>