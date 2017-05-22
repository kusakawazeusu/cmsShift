<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>會員管理系統</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/datatable/css/jquery.dataTables.min.css">
    <style>
    .mainContainer {
        padding-top: 60px;
    }
    
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
    }

.modalSmall {
  text-align: center;
  padding: 0!important;
}

.modalSmall:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modalSmall-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

    
    .modal.modal-wide .modal-dialog {
        width: 70%;
        height: 90vh;
    }
    
    .modal-content {
        /* 80% of window height */
        height: 90vh;
    }
    
    .modal-wide .modal-body {
        height: 85%;
        overflow-y: auto;
    }
    /* irrelevant styling */
    
    body {
        text-align: center;
    }
    
    body p {
        max-width: 400px;
        margin: 20px auto;
    }
    </style>
    @yield('style')
</head>

<body>
    <script src="assets/js/jquery.min.js"></script>
    <script>
    //根據引入的頁面大小來改變當前頁面大小
    function ResetWindowSize() {
        var iframeid = document.getElementById("page"); //iframe id
        if (document.getElementById) {
            if (iframeid && !window.opera) {
                if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight) {
                    iframeid.height = iframeid.contentDocument.body.offsetHeight;
                } else if (iframeid.Document && iframeid.Document.body.scrollHeight) {
                    iframeid.height = iframeid.Document.body.scrollHeight;
                }
            }
        }
    };

    function ResetWindowSize($pageId) {
        var iframeid = document.getElementById($pageId); //iframe id
        if (document.getElementById) {
            if (iframeid && !window.opera) {
                if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight) {
                    iframeid.height = iframeid.contentDocument.body.offsetHeight;
                } else if (iframeid.Document && iframeid.Document.body.scrollHeight) {
                    iframeid.height = iframeid.Document.body.scrollHeight;
                }
            }
        }
    };
    //搜尋框按下Enter時觸發的js
    $(function() {
        $('#searchBox').keypress(function(e) {
            //13 = Enter
            if (e.which == 13) {
                if (document.getElementById("searchBox").value == "")
                    return;
                document.getElementById("searchForm").submit();
            }
        })
    });

    //換頁時觸發之js
    function ChangePage(pageOffset) {
        newPage = parseInt(document.getElementById('pageIndex').value) + pageOffset;
        if (newPage <= 0)
            return false;
        document.getElementById('pageIndex').value = newPage;
        document.getElementById('changePage').submit();
        return false;
    }

    function OnPagingMenuChanged(value) {
        document.getElementById('pagingSize').value = value;
        ChangePage(0);
    }


    function DeleteMember(form, id)
    {
        document.getElementById('deleteId' + form).value=id; 
        document.getElementById('deleteMemberForm' + form).submit(); 
        return false;
    }    

    </script>

    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">後臺管理系統</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">會員管理</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mainContainer container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-2 col-sm-2 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    <a href="#" class="list-group-item active">會員管理</a>
                    <a href="member_register" class="list-group-item">會員註冊</a>
                    <a href="member_trans_list" class="list-group-item">會員註冊紀錄</a>
                    <a href="member_list" class="list-group-item">列出會員</a>
                    <a href="member_card_list" class="list-group-item">卡號列出</a>
                    <a href="#" class="list-group-item">登出</a>
                    <input type="hidden" name="pageInfo" value="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mainContent">
                    @yield('content')
                </div>
            </div>
        </div>
        <hr>
        <footer>
            <span class="label label-default">© Casino Management System by National Taiwan University of Science and Technology 2016</span>
        </footer>
    </div>
    <!--/.container-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="offcanvas"]').click(function() {
            $('.row-offcanvas').toggleClass('active')
        });
    });
    </script>
    @yield('script')
</body>

</html>
