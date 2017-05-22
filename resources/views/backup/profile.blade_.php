<!DOCTYPE html>
<html>

<head>
<title>Laravel</title>
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
	font-weight: 20;
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
	font-size: 20px;
}
</style>
</head>

<body>
	<div class = "container">
		<div class = "content"> 
		<div class = "title">會員姓名 : <?=$user->name;?></div>
		<div class = "title">會員帳號 : <?=$user->account;?></div>
		<div class = "title">會員卡號 : <?=$user->cardId;?></div>
		    {!! Form::open(array('url' => 'admin', 'method' =>'get')) !!}
			<p>{!! Form::submit('查看會員遊戲資料', array('class'=>'send-btn')) !!}</p>
			{!! Form::close() !!}
		    {!! Form::open(array('url' => 'member_edit', 'method' =>'get')) !!}
		    <input type = "hidden" value = <?=$user->id;?> name = "id"/>
			<p>{!! Form::submit('修改會員資料', array('class'=>'send-btn')) !!}</p>
			{!! Form::close() !!}			
		</div>
	</div>
</body>
</html>
