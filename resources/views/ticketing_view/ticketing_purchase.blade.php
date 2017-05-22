@extends('ticketing_view.layouts.default')

@section('PageName')
    票務管理
@stop

@section('TopNavtiveBar')
    <li><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li class="active"><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
    <li><a href= "{{ url('ticketing/ticketing_valid_pending') }}">票據解鎖</a></li>
    <li><a href= "{{ url('ticketing/ticketing_tally') }}">統計</a></li>
@stop

@section('LeftNavtiveBar')
    <li><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li class="active"><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
    <li><a href= "{{ url('ticketing/ticketing_valid_pending') }}">票據解鎖</a></li>
    <li><a href= "{{ url('ticketing/ticketing_tally') }}">統計</a></li>
@stop

@section('content')
    <div class = "form-inline">
        <!-- Session -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">班別</span>
                <input id="Session" class="form-control" type="text" name="Session" disabled placeholder="需要自動帶入">
            </div>
        </div>
        <!-- CurrentSeq -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">序號</span>
                <input id="CurrentSeq" class="form-control" type="text" name="CurrentSeq" disabled placeholder="1">
            </div>
        </div>
        <div class="checkbox">
            <label><input type="checkbox">Damage</label>
        </div>
    </div>
	
	<div class="well">
		<form>
    		<div class="panel panel-primary well">
      			<div class="panel-heading">Properties</div>
      			<div class="panel-body well">
    				<!-- Amount -->
    				<div class="form-group">
        				<div class="input-group">
	            			<span class="input-group-addon">Print Ticket for Amount</span>
            				<input id="Amount" class="form-control" type="text" name="Amount" placeholder="Amount">
        				</div>
    				</div>

	    			<!-- Quick Selection -->
                    <div class="form-inline">
                        Quick Selection
                        <input id="QuickSelection_0" class="form-control btn-info" type="button" name="QuickSelection_0" value="$300">
                        <input id="QuickSelection_1" class="form-control btn-info"" type="button" name="QuickSelection_1" value="$1000">
                        <input id="QuickSelection_2" class="form-control btn-info"" type="button" name="QuickSelection_2" value="$3000">
                        <input id="QuickSelection_3" class="form-control btn-info"" type="button" name="QuickSelection_3" value="$5000">
                        <input id="QuickSelection_4" class="form-control btn-info"" type="button" name="QuickSelection_4" value="$10000">
                    </div>

            	</div>

      			<div class="panel-footer">
		    		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><input type="hidden" name="_token" value="{{ csrf_token() }}">
            		<button type="submit" class="btn btn-primary">OK</button>
            	</div>
            </div>
	</div>
@stop