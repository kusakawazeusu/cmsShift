<!doctype html>
<html>
    <head>
        <title>管理員登入頁面</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
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
        <div class="container" width="100%">
            {!! Form::open(array('url' => $respondMethod)) !!}
            <h1><kbd>輸入要查詢的{{$title}}</kbd></h1>
            @if(Session::has('error'))
            <div class="alert-box success">
                <h2>{{ Session::get('error') }}</h2>
            </div>
            @endif
            <div class="controls" width="30%">
                <input type="text" name='name' class='form-control span6' placeholder='輸入要查詢的 {{ $title }}' />
                {!! Form::text('name','',array('id'=>'','class'=>'form-control span6','placeholder' => '輸入要查詢的' . $title)) !!}
                <p class="errors">{{$errors->first('name')}}</p>
            </div>
            <p>{!! Form::submit('查詢', array('class'=>'send-btn')) !!}</p>
            {!! Form::close() !!}
        </div>
    </body>
</html>