<form method="POST" action="/system/public/users">
{!! csrf_field() !!}
名字<input type="text" name="name">	
信箱<input type="email" name="email">	
密碼<input type="password" name="password">	
<input type="submit" value="Create">	
</form>