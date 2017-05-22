<!DOCTYPE html>
<html>
    <head>
        <title>賭場管理系統CMS - @yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="{{ asset('dist/sweetalert2.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/fh-3.1.2/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/fh-3.1.2/datatables.min.js"></script>
        <script>

        </script>


    </head>

    <body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            @if( Auth::check() )
            <li><a>管理員名稱：{{ Auth::user()->OperatorName}}</a></li>
            <li><a>班別名稱：{{ session('ClassID') }}</a></li>
            @else
            <li><a>您尚未登入！</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if( Auth::check() )
            <li><a href="{{ url('Logout') }}">登出</a></li>
            @else
            <li><a href="{{ url('login') }}">登入</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

      <br>
      <div class="col-md-10 col-md-offset-1">
          @section('header')
            Header
          @show
      </div>

      <div class="col-md-10 col-md-offset-1">
            @section('content')
              這裡顯示內容。
            @show
      </div>
    </body>
</html>