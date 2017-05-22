<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gaming Manager System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Gaming Manager System
                </div>
                <br></br>
                <div class="links">

                    <?php //0 會計 1票務 2機台 3系統 4會員 5一班報表 6進階報表 7登出?>

                    @if($POF[4] == 1)
                   	<a href="member_list">會員管理</a>
                    @endif
                    @if($POF[3] == 1)
                    <a href="operator">管理員</a>
                    @endif
                    @if($POF[5] == 1 || $POF[6] == 1)
                   	<a href="report_general">報表管理</a>
                    @endif
                    @if($POF[2] == 1)
                   	<a href="arcade">機台管理</a>
                    @endif
                    @if($POF[3] == 1)
                    <a href="#">雲端管理</a>
                    @endif
                     @if($POF[3] == 1)
                    <a href="log">紀錄</a>
                    @endif
                </div>
                 <div class="links">
                   <br></br>
                </div>
                 <div class="links">
                   <br></br>
                </div>
                 <div class="links">
                    @if($POF[4] == 1)
                    <a href="#">會員卡作業</a>
                    @endif
                    @if($POF[1] == 1)
                    <a href="ticketing/ticketing_validation">票務作業</a>
                    @endif
                    @if($POF[0] == 1)
                    <a href="shift/startperiod">交班</a>
                    @endif
                    @if($POF[3] == 1)
                    <a href="#">促銷活動</a>
                    @endif
                    @if($POF[2] == 1)
                    <a href="machinemonitor">機台監控</a>
                    @endif
                </div>
                 <br></br>
                  <br></br>
                 <div class="links">
 
                    <a href="Logout">登出</a>
                  
                </div>
            </div>
        </div>
    </body>
</html>
