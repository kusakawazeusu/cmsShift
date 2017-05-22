<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="description" content=""> 
        <meta name="author" content=""> 
        <title>Blank Template for Bootstrap</title>         
        <!-- Bootstrap core CSS -->         
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> 
        <script src="assets/js/jquery.min.js"></script>  
        <!-- Custom styles for this template -->         
        <!--<link href="style.css" rel="stylesheet">-->         
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->         
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->         
    </head>     
    <style> 
        .container {
        width: 80vh;
        }
        .user-row {
        margin-bottom: 14px;
        }
        .user-row:last-child {
        margin-bottom: 0;
        }
        .dropdown-user {
        margin: 13px 0;
        padding: 5px;
        height: 100%;
        }
        .dropdown-user:hover {
        cursor: pointer;
        }
        .table-user-information > tbody > tr {
        border-top: 1px solid rgb(221, 221, 221);
        }
        .table-user-information > tbody > tr:first-child {
        border-top: 0;
        }
        .table-user-information > tbody > tr > td {
        border-top: 0;
        }
        .toppad {
        margin-top: 20px;
        }
</style>      

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

function GoCardPage(formId) {
    //alert(cardId);
    document.getElementById(formId).submit();
}

function GoListPage() {
    document.getElementById('informationForm').action = 'member_play_record_list';
    document.getElementById('informationForm').submit();
    return false;
}

$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if (idFor.is(':visible')) {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            } else {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });

    if(document.getElementById('time_select').value == '')
        document.getElementById('time_select').valueAsDate = new Date();

    $(window).scrollTop(0);

    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
    });
});

</script>     
    <body> 
        <div class="container"> 
            <div class="row">
                <div class="toppad"> 
                    
                    <form id="searchForm" action="member_play_record" method="post">
                    <div class="panel panel-info"> 
                        <div class="panel-heading"> 
                            <h3 class="panel-title">查詢設定</h3> 
                        </div>                        
                        <div class="row"> 
                            <div class="col-md-3"> 
                                Location:
                                <select class="form-control" name="location" value="{{$location}}"> 
                                    <option selected="true" style="display:none;">{{$location}}</option>                                     
                                    <option>All</option>                                     
                                </select>                                 
                            </div>                             
                            <div class="col-md-3"> 
                                Type of Amount:
                                <select class="form-control" name="amount_type" value="{{$amount_type}}"> 
                                    <option selected="true" style="display:none;">{{$amount_type}}</option>                                     
                                    <option>Total</option>                                                                   
                                    <option>Average</option>              
                                </select>                                 
                            </div>    
                        </div>      
                        <div class="row">
                            <div class="col-md-4"> 
                                    Time:
                                    <input type="date" class="form-control" placeholder="選擇時間" name="time_select" value="{{$time_select}}" id="time_select">                       
                            </div>
     
                            <div class="col-md-7"> 
                                <div class="row">
                                    <div class="col-md-7"> 
                                    Term:
                                    </div>
                                </div>     
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" name="time_term_dir" value=""> 
                                            <option selected="true" style="display:none;">{{$time_term_dir}}</option>                                   
                                            <option>前</option>                                     
                                            <option>後</option>                                    
                                        </select>                                      
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" placeholder="" name="time_term_value" value="{{$time_term_value}}">                                    
                                    </div>                                    
                                    <div class="col-md-4">
                                        <select class="form-control" name="time_term_type" value=""> 
                                            <option selected="true" style="display:none;">{{$time_term_type}}</option>                                   
                                            <option>Day</option>                                     
                                            <option>Month</option>                                       
                                            <option>Year</option>                                     
                                        </select>    
                                    </div>
                                </div>
                            </div>  
                               
                        </div>   
                        <div class="row">                            
                            <div class="col-md-12">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" value="{{$user->MemberNo}}" name="id" /> 
                                    <span class="pull-right"><input herf="#" type="submit" class="btn btn-primary btn-block" value="查詢紀錄" /></span>
                                
                            </div> 
                        </div>
                    </div>   
                    </form>
                    <hr>                  
                    <div class="panel panel-info"> 
                        <div class="panel-heading"> 
                            <h3 class="panel-title">會員名字: {{$user->MemberName}} [{{$user->SectionNo . sprintf("%06d", $user->MemberNo)}}]</h3> 
                        </div>                         
                        <div class="panel-body"> 
                            <div class="row"> 
                                <div class="col-md-3 col-lg-3 " align="center"> 
                                    <img alt="User Pic" src="https://upload.wikimedia.org/wikipedia/en/e/ee/Unknown-person.gif" class="img-circle img-responsive"> 
                                </div>

                                @if(array_key_exists('finishTime', $result))                                 
                                <div class=" col-md-8"> 
                                    <table class="table table-user-information"> 
                                        <tbody> 
                                            <tr> 
                                                <td>起始時間:</td> 
                                                <td>{{$result['initTime']}}</td> 
                                            </tr>                                             
                                            <tr> 

                                            <tr> 
                                                <td>結束時間:</td> 
                                                <td>{{$result['finishTime']}}</td> 
                                            </tr>
                                            <tr> 
                                                <td>遊戲時間:</td> 
                                                <td>{{$result['GameSec']}}</td> 
                                            </tr>
                                            <tr> 
                                                <td>遊戲場次:</td> 
                                                <td>{{$result['Games']}}</td> 
                                            </tr>
                                            <tr> 
                                                <td>押分:</td> 
                                                <td>{{$result['CoinIn']}}</td> 
                                            </tr>
                                            <tr> 
                                                <tr> 
                                                    <td>得分:</td> 
                                                    <td>{{$result['CoinOut']}}</td> 
                                                </tr>                                                 
                                                <tr> 
                                                    <td>平均押注:</td> 
                                                    <td> 
                                                        {{$result['AverageBet']}} 
                                                    </td>                                                     
                                                </tr>                                                 
                                                <tr> 
                                                    <td>輸贏:</td> 
                                                    <td>{{$result['Win']}}</td> 
                                                </tr>                                                 
                                                <tr> 
                                                    <td>回饋點數使用:</td> 
                                                    <td>{{$result['RPointUsed'] }}</td> 
                                                </tr>                                                 
                                                <tr> 
                                                    <td>回饋點數獲得:</td> 
                                                    <td>{{$result['RPointEarned']}}</td> 
                                                </tr>                                                 
                                                <tr> 
                                                    <td>額外點數使用:</td> 
                                                    <td>{{$result['XCUsed']}}</td> 
                                                </tr>                                                 
                                                <tr> 
                                                    <td>額外點數獲得:</td> 
                                                    <td>{{$result['XCEarned']}}</td> 
                                                </tr>                                                 
                                        </tbody>                                         
                                    </table>                                     
                                    <form id="informationForm" action="Account" method="GET"> 
                                        <input type="hidden" value="{{$user->MemberNo}}" name="id" /> 
                                        <!-- <a href="#" disabled onclick="GoListPage()" class="btn btn-primary">查看紀錄清單</a> -->
                                    </form>                                     
                                </div> 
                                @endif                                
                            </div>                             
                        </div>                                                
                    </div>                     
                </div>                 
            </div>             
        </div>         
        <!-- Bootstrap core JavaScript
    ================================================== -->         
        <!-- Placed at the end of the document so the pages load faster -->         
        <script src="assets/js/jquery.min.js"></script>         
        <script src="bootstrap/js/bootstrap.min.js"></script>         
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->         
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>         
    </body>     
</html>
