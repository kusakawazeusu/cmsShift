<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('PageName')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
  <link href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet"/>
  <script src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="{!! asset('assets/bootstrapValidator/bootstrapValidator.js') !!}"></script>

  @yield('script')
  <style>    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="navbar-header">
     <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href= "{{ url('index') }}">後台管理系統</a></li>
        @yield('TopNavtiveBar')
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 well">
        <h4>票務管理</h4>
        <ul class="nav nav-pills nav-stacked">
          @yield('LeftNavtiveBar')
        </ul><br>
      </div>
      <div class="col-sm-10"> 
        <div class="well">
        
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <footer class="container-fluid">
      @include('ticketing_view.layouts.footer')
  </footer>

</body>
</html>
