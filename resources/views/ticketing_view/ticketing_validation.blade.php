@extends('ticketing_view.layouts.default')

@section('PageName')
    票務管理
@stop

@section('TopNavtiveBar')
    <li class="active"><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
    <li><a href= "{{ url('ticketing/ticketing_valid_pending') }}">票據解鎖</a></li>
    <li><a href= "{{ url('ticketing/ticketing_tally') }}">統計</a></li>
@stop

@section('LeftNavtiveBar')
    <li class="active"><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
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
		<form>
    		<div class="panel panel-primary well">
      			<div class="panel-heading">Ticket</div>
      			<div class="panel-body well">
    				<!-- Amount -->
    				<div class="form-group">
        				<div class="input-group">
	            			<span class="input-group-addon">Amount</span>
            				<input id="Amount" class="form-control" type="text" name="Amount" placeholder="Amount">
        				</div>
    				</div>

	    			<!-- Machine -->
    				<div class="form-group">
        				<div class="input-group">
            				<span class="input-group-addon">Machine</span>
            				<input id="Machine" class="form-control" type="text" name="Machine" placeholder="Machine">
	        			</div>
    				</div>	

    				<!-- Print Date -->
	    			<div class="form-group">
    	    			<div class="input-group">
        	    			<span class="input-group-addon">Print Date</span>
            				<input id="PrintDate" class="form-control" type="date" name="PrintDate" placeholder="PrintDate">
        				</div>
    				</div>	

    				<!-- Ticket State -->
	    			<div class="form-group">
    	    			<div class="input-group">
        	    			<span class="input-group-addon">Ticket State</span>
            				<input id="TicketState" class="form-control" type="text" name="TicketState" placeholder="TicketState">
        				</div>
    				</div>

    				<!-- Paid Date -->
	    			<div class="form-group">
    	    			<div class="input-group">
        	    			<span class="input-group-addon">Paid Date</span>
            				<input id="PaidDate" class="form-control" type="date" name="PaidDate" placeholder="PaidDate">
        				</div>
    				</div>

    				<!-- Paid By -->
    				<div class="form-inline"><div class="form-group">
    					<div class="col-xs-4"><div class="input-group">
        	    			<span class="input-group-addon">Paid By</span>
            				<input id="PaidBy_1" class="form-control" type="text" name="PaidBy_1" placeholder="PaidBy_1">
        				</div></div>
        				<input id="PaidBy_2" class="form-control" type="text" name="PaidBy_2" placeholder="PaidBy_2">
        				<input id="PaidBy_3" class="form-control" type="text" name="PaidBy_3" placeholder="PaidBy_3">
        				<div class="checkbox">
    					<label><input type="checkbox">Audit Paid</label>
  						</div>
    				</div></div>

    				<!-- Player Card -->
    				<div class="form-inline"><div class="form-group">
    					<div class="input-group">
        	    			<span class="input-group-addon">Paid By</span>
            				<input id="PlayerCard_1" class="form-control" type="text" name="PlayerCard_1" placeholder="PlayerCard_1">
        				</div>
        				<input id="PlayerCard_2" class="form-control" type="text" name="PlayerCard_2" placeholder="PlayerCard_2">
        				<div class="checkbox">
    					<label><input type="checkbox">Audit Paid</label>
  						</div>
    				</div></div>
            	</div>

      			<div class="panel-footer">
		    		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><input type="hidden" name="_token" value="{{ csrf_token() }}">
            		<button type="submit" class="btn btn-primary">Paid</button>
            	</div>
            </div>
		</form>
	</div>
@stop