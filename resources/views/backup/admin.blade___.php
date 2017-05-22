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
.nav {background:#eee;}

.nav ul {
    list-style-type: none;
    padding: 0;
}
.nav ul a {
    text-decoration: none;
}
@media all and (min-width: 768px) {
    .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
</style>
</head>

<body>
<p><input type="button" onclick="document.getElementById('page').src='Reg'" value = "會員註冊"/></p>
<p><input type="button" onclick="document.getElementById('page').src='member_list'" value = "列出會員"/></p>
<p><input type="button" onclick="document.getElementById('page').src='member_search'" value = "查詢會員"/></p>
<p><input type="button" onclick="document.getElementById('page').src='member_card_search'" value = "查詢會員卡"/></p>
<p><input type="button" onclick="document.getElementById('page').src='member_card_list'" value = "列出會員卡"/></p>
<p><input type="button" onclick="document.getElementById('page').src='Logout'" value="登出"/></p>
	<div class = "container">
    	<iframe id ="page" src="" height="95%" width="100%" scrolling="no" frameborder="0" style="border:0"></iframe>
	</div>
</body>
</html>
