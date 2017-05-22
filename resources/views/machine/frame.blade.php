<!DOCTYPE html>
<html lang="en">
<head>
  <title>Monitor</title>
  <meta charset="utf-8">
  <script src="{!! asset('js/assets/js/jquery.min.js') !!}"></script>
  <link href="{!! asset('css/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet"/>
  <script src="{!! asset('js/bootstrap/js/bootstrap.min.js') !!}"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}

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

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
  </style>
  @yield('script')
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
     <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href= "{{ url('index') }}">後台管理系統</a></li>
        @yield('NavtiveBar')
      </ul>
    </div>
  </nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-10">
      <div class="well">
        @yield('MachineStatus')
      </div>
      <div class="well">
       @yield('ControlSection')
      </div>
    </div>

    <div class="col-sm-2 sidenav">
      <h4>Event</h4>
      <ul class="nav nav-pills nav-stacked">
        @yield('EventSection')
      </ul><br>
    </div>
  </div>



</div>

</body>
</html>
