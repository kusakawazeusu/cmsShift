<!DOCTYPE html>
<html>
<head>
	<title>@yield('name')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
	<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
  	<link href="{!! asset('bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet"/>

  	<link href="{!! asset('assets/dataTable/css/jquery.dataTables.min.css') !!}" media="all" rel="stylesheet"/>
	<script src="{!! asset('assets/dataTable/js/jquery.dataTables.min.js') !!}"></script>

	<script src="{!! asset('assets/dataTable/js/sum().js') !!}"></script>

	
	@yield('script')
	@yield('style')

</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ url('index') }}">後臺管理系統</a>
			</div>
			 <ul class="nav navbar-nav">
				<li><a href="{{route('report_general')}}">一般報表</a></li>
				<li><a href="{{route('report_advance')}}">進階報表</a></li>
		    </ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div>
				@yield('content')
			</div>
		</div>
	</div>

</body>
</html>