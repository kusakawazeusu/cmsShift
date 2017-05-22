@extends('layouts.management_sys_layout') @section('title', 'Page Title') @section('style')
<style>
.mainForm {
    margin-left: 10%;
    width: 50%;
    vertical-align: middle;
}
</style>
@endsection @section('content')
<div class="container">
</div>
<div class="container">
    <div class="row mainForm" a-pg-id="293">
        <div class=".col-xs-6 .col-sm-3 ">
            <h2>會員註冊</h2> @if(Session::has('error'))
            <div class="alert-box success">
                <h2>{{ Session::get('error') }}</h2>
            </div>
            @endif @if(Session::has('status') && Session::get('status') == 1)
            <div class="alert alert-success">
                註冊成功！
            </div>
            @elseif((Session::has('status') && Session::get('status') == 0) || Session::has('errors'))
            <div class="alert alert-danger">
                註冊失敗。
            </div>
            @endif
            <form action="member_register" method="POST">
                <div class="row form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="email" class="cols-sm-2 control-label">姓名</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                <input type="text" class="form-control" placeholder="輸入姓名" name="username">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="email" class="cols-sm-2 control-label">身分證字號</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-star" aria-hidden="true"></span>
                                <input type="text" class="form-control" placeholder="輸入身分證" name="userid">
                            </div>
                        </div>
                        <div class="col-sm-4" ata-pg-id="326">
                            <label for="email" class="cols-sm-2 control-label">生日</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                <input type="date" class="form-control" placeholder="選擇生日" name="userbirth">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            @if($errors->first('username'))
                            <div class="alert alert-danger">
                                {{$errors->first('username')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            @if($errors->first('userid'))
                            <div class="alert alert-danger">
                                {{$errors->first('userid')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            @if($errors->first('userbirth'))
                            <div class="alert alert-danger">
                                {{$errors->first('userbirth')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- 第一排結束 -->
                <div class="row form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="email" class="cols-sm-2 control-label">行動電話</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-phone" aria-hidden="true"></span>
                                <input type="text" class="form-control" placeholder="輸入行動電話" name="cellphone">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="email" class="cols-sm-2 control-label">室內電話</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                                <input type="text" class="form-control" placeholder="輸入室內電話" name="telephone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            @if($errors->first('cellphone'))
                            <div class="alert alert-danger">
                                {{$errors->first('cellphone')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            @if($errors->first('telephone'))
                            <div class="alert alert-danger">
                                {{$errors->first('telephone')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- 第四排結束 -->
                <div class="row form-group">
                    <div class="row">
                        <div class="col-sm-7">
                            <label for="email" class="cols-sm-2 control-label">地址</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-globe" aria-hidden="true"></span>
                                <input type="text" class="form-control" placeholder="輸入地址" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            @if($errors->first('address'))
                            <div class="alert alert-danger">
                                {{$errors->first('address')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- 第二排結束 -->
                <div class="row form-group">
                    <div class="row">
                        <div class="col-sm-7">
                            <label for="email" class="cols-sm-2 control-label">信箱</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                <input type="text" class="form-control" placeholder="輸入信箱" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            @if($errors->first('email'))
                            <div class="alert alert-danger">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    <label for="email" class="cols-sm-2 control-label">密碼</label>
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        <input type="password" class="form-control" placeholder="輸入密碼" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    <label for="email" class="cols-sm-2 control-label">再次輸入密碼</label>
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        <input type="password" class="form-control" placeholder="再次輸入密碼" name="password_again">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    @if($errors->first('password'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('password')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" col-xs-6 col-sm-8">
                            <label for="email" class="cols-sm-2 control-label">備註</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-comment" aria-hidden="true"></span>
                                <textarea rows="5" class="form-control" placeholder="輸入備註" name="memo"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="email" class="cols-sm-2 control-label">會員等級</label>
                            <select name="rank" class="form-control">
                                <option>一般會員</option>
                                <option>黃金會員</option>
                                <option>白金會員</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="email" class="cols-sm-2 control-label">使用額外點數?</label>
                            <select name="XCEnable" class="form-control">
                                <option>否</option>
                                <option>是</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="email" class="cols-sm-2 control-label">使用回饋點數?</label>
                            <select name="RPEnable" class="form-control">
                                <option>否</option>
                                <option>是</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <hr>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <input herf="#" type="submit" class="btn btn-primary btn-block" value="送出註冊" />
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col -->
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection
