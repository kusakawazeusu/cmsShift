@extends('layouts.management_sys_layout') @section('title', 'Page Title') @section('script')
<script>
function OnChangeSearchItem() {
    switch (document.getElementById("searchItem").selectedIndex) {
        case 0:
            document.getElementById("mainForm").action = "member_search";
            document.getElementById("byWhat").value = "MemberName";
            break;
        case 1:
            document.getElementById("mainForm").action = "member_search";
            document.getElementById("byWhat").value = "MemberID";
            break;
        case 2:
            document.getElementById("mainForm").action = "member_card_search";
            break;
    }
    //  alert(document.getElementById("searchItem").selectedIndex);
}
</script>
@endsection @section('style')
<style>
.midForm {
    margin-left: auto;
    margin-right: auto;
    width: 100%;
}

.textbox {
    width: 100%;
}
</style>
@endsection @section('content')
<!-- Begin page content -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header text-center">
                <h1>查詢系統</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="form-group" align="center">
            <p>請選擇要查詢的資訊並且輸入必要的查詢依據</p>
        </div>
        <form action="member_search" method="POST" id="mainForm">
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label" for="name"></label>
                    <div class="col-sm-4 center-block">
                        <input type="text" class="form-control" placeholder="請輸入查詢資訊" name="name">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control crsa-selected" id="searchItem" onclick="OnChangeSearchItem()">
                            <option>查詢會員姓名</option>
                            <option>查詢會員身份證字號</option>
                            <option>查詢會員卡號</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" value="MemberName" id="byWhat" name="byWhat">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <label class=" control-label" for="singlebutton"></label>
                <div class=" center-block">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block">
                        送出查詢
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endsection
