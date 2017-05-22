@extends('ticketing_view.layouts.default')

@section('PageName')
    票務管理
@stop

@section('TopNavtiveBar')
    <li><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
    <li><a href= "{{ url('ticketing/ticketing_valid_pending') }}">票據解鎖</a></li>
    <li class="active"><a href= "{{ url('ticketing/ticketing_tally') }}">統計</a></li>
@stop

@section('LeftNavtiveBar')
    <li><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
    <li><a href= "{{ url('ticketing/ticketing_valid_pending') }}">票據解鎖</a></li>
    <li class="active"><a href= "{{ url('ticketing/ticketing_tally') }}">統計</a></li>
@stop

@section('content')
	<div class="well">
		<form id="ticketing_validation_search" action="ticketing/ticketing_validation_search" method="POST" class="class=form-horizontal">
    		<div class="form-group">
		    	<!-- Validation Code -->
		    	<div class ="col-xs-10">
	    	    	<div class="input-group">
    	        		<span class="input-group-addon">序號</span>
	            		<input id="ValidationCode" class="form-control" type="text" name="ValidationCode" placeholder="Ticket號碼">
	            	</div>
	            </div>
	            <button type="submit" class="btn btn-primary">搜尋</button>
        	</div>
		</form>
		<table id="datatables" class="table display">
            <thead>
                <tr>
                    <th>Validation Code</th>
                    <th>Ticket Amount</th>
                    <th>Ticket State</th>
                </tr>
            </thead>
        </table>
                    <!-- Amount -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Ticket Amount</span>
                            <input id="Amount" class="form-control" type="text" name="Amount" placeholder="Amount">
                        </div>
                    </div>

                    <!-- Ticket # of Tickets -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Ticket # of Tickets</span>
                            <input id="Machine" class="form-control" type="text" name="Machine" placeholder="Machine">
                        </div>
                    </div>  
	</div>
    <div class="panel panel-body well">
    <div class="col-xs-10">
    <div class ="well">
        <table id="datatables" class="table display">
            <thead>
                <tr>
                    <th>Seq #</th>
                    <th>Validation Code</th>
                    <th>Reason</th>
                </tr>
            </thead>
        </table>
    </div>
    </div>
    <div class="col-xs-2">
    <div class ="well">
    <button>Clear All</button>
    </div>
    </div>
    </div>
@stop