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
        @yield('NavtiveBar')
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-12"> 
        <div class="well">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <div id="addModelForm" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">            
          <h4 class="modal-title">@yield('ModalTitle')</h4>
        </div>
        @yield('FormIdActionMethodClass')
          <div class="modal-body">
            <div class="flexbox">
              <div class="panel panel-default">
                <div class="panel-body">
                  @yield('ModalBodyForForm')
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" name="add">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button><input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">新增</button>
          </div>
        </form>
      </div>
    </div>  
  </div>

  <div id="ShowModelForm" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">            
          <h4 class="modal-title">@yield('ShowModelTitle')</h4>
        </div>
        <div class="modal-body">
          <div class="flexbox">
            <div class="panel panel-default">
              <div class="panel-body">
                @yield('ShowModelBody')
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">關閉</button>
        </div>
      </div>
    </div>  
  </div>

  <div id="EditModelForm" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">            
          <h4 class="modal-title">@yield('EditModalTitle')</h4>
        </div>
        @yield('EditFormIdActionMethodClass')
          <div class="modal-body">
            <div class="flexbox">
              <div class="panel panel-default">
                <div class="panel-body">
                  @yield('EditModalBodyForForm')
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button><input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary">編輯</button>
          </div>
        </form>
      </div>
    </div>  
  </div>

  <div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">刪除確認</h4>
        </div>
        <div class="modal-body">
          <div class="flexbox">
            <div class="panel panel-default">
              <div class="panel-body">
                <p>確定要刪除這筆資料嗎?</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          @yield('DeleteFormIdActionMethodClass')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            <button type="submit" class="btn btn-danger">刪除</button>
          </form>
        </div>
      </div>
    </div>  
  </div>

  <footer class="container-fluid">
      @include('arcade_view.layouts.footer')
  </footer>

</body>
</html>
