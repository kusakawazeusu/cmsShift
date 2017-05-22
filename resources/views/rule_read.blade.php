@extends('main')

@section('title','Rule Read')

@section('header')

@endsection


@section('content')

<script>

$(document).ready(function(){

    $("#href").click(function(){
        //alert($("#pre_rule").val());
        window.location.href = "{{ url('/rule') }}/"+$("#pre_rule").val();
    });

});

</script>

<form class="form-horizontal">
    <div class="form-group">
        <label class="form-label col-sm-2 col-sm-offset-1">解析前指令：</label>
        <div class="col-sm-8">
            <input disabled id="pre_rule" value="{{ $pre_rule }}" class="form-control"></input>
        </div>
    </div>
    
    <div class="form-group">
        <label class="form-label col-sm-2 col-sm-offset-1">解析後指令：</label>
        <div class="col-sm-8">
            <input value="{{ $rule }}" class="form-control"></input>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-1">
            <button type="button" id="href" class="btn btn-primary">解析</button>
        </div>
    </div>
    
</form>

@endsection