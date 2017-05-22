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
		@if(sizeof($cards) != 0)
		<div class = "content"> 
		<table border="1">
			<tr>
			<th scope="col">卡號 </th>
			<th scope="col">使用此卡片的會員 </th>
			<th></th>			<th></th><th></th>
			</tr>
			@foreach($cards as $card)	
			<tr>
				<td>{{$card->cardId}}</td>
				<td>{{$user[$card->id] == null ? ' ' : $user[$card->id]->name}}</td>
				@if($user[$card->id] != null)
				<td>
				<form method = "GET" action="/Profile">
					<input type = "hidden" value = {{ $user[$card->id] == null ? -1 : $user[$card->id]->id }} name = "id"/>
					<input type="submit" value = "會員詳細資料"/>
				</form>
				</td>
				<td>
				<form method = "GET" action="/member_edit">
					<input type = "hidden" value = {{ $user[$card->id] == null ? -1 : $user[$card->id]->id }} name = "id"/>
					<input type="submit" value = "修改會員"/>
				</form>
				</td>
				@else
				<td></td><td></td>
				@endif
				<td>
				<form method = "GET" action="/member_card_edit">
					<input type = "hidden" value = {{ $user[$card->id] == null ? -1 : $user[$card->id]->id }} name = "id"/>
					<input type="submit" value = "設定卡片"/>
				</form>
				</td>	
			</tr>
			@endforeach
		</table>
			<input type="button" value = "返回" onclick="window.history.back()" />
		</div>
		@else
		<div class = "content"> 
			<div class = "title">查無此卡片</div>
			    {!! Form::open(array('url' => 'member_card_search', 'method' =>'get')) !!}
				<p>{!! Form::submit('返回', array('class'=>'send-btn')) !!}</p>
				{!! Form::close() !!}
			</div>
		</div>
		@endif
	</div>
</body>
</html>
