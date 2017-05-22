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
table {
  border-collapse: collapse;
}
th,
td {
  border-bottom: 1px solid #cecfd5;
  padding: 10px 15px;
}
th {
  font-weight: bold;
}
tfoot tr:last-child td {
  border-bottom: 0;
}
</style>
</head>

<body>
	<div class = "container">
		@if(sizeof($users) != 0)
		<div class = "content"> 
		<table border="1">
			<tr>
			<th scope="col">{{$firstColName}} </th>
			<th scope="col">會員帳號 </th>
			<th scope="col">會員卡號 </th>
			<th></th>			<th></th>
			</tr>
			@foreach($users as $user)	
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->account}}</td>
				<td>{{$user->cardId}}</td>
				<td>
				<form method = "GET" action="/Profile">
					<input type = "hidden" value = {{ $user->id }} name = "id"/>
					<input type="submit" value = "會員詳細資料"/>
				</form>
				</td>
				<td>
				<form method = "GET" action="/member_edit">
					<input type = "hidden" value = {{ $user->id }} name = "id"/>
					<input type="submit" value = "修改會員"/>
				</form>
				</td>			
			</tr>
			@endforeach
		</table>
			<input type="button" value = "返回" onclick="window.history.back()" />
		</div>
		@else
		<div class = "content"> 
			<div class = "title">查無此會員</div>
			    {!! Form::open(array('url' => 'member_search', 'method' =>'get')) !!}
				<p>{!! Form::submit('返回', array('class'=>'send-btn')) !!}</p>
				{!! Form::close() !!}
			</div>
		</div>
		@endif
	</div>
</body>
</html>
