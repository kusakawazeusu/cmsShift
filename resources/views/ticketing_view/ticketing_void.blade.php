@extends('ticketing_view.layouts.default')

@section('PageName')
    票務管理
@stop

@section('TopNavtiveBar')
    <li><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li class="active"><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
    <li><a href= "{{ url('ticketing/ticketing_valid_pending') }}">票據解鎖</a></li>
    <li><a href= "{{ url('ticketing/ticketing_tally') }}">統計</a></li>
@stop

@section('LeftNavtiveBar')
    <li><a href= "{{ url('ticketing/ticketing_validation') }}">票據驗證</a></li>
    <li><a href= "{{ url('ticketing/ticketing_purchase') }}">票據印製</a></li>
    <li class="active"><a href= "{{ url('ticketing/ticketing_void') }}">票據作廢</a></li>
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
		    		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <!-- void -->
                    <button 
                        class='btn btn-danger btn-xs open-DeleteModal' 
                        href="#Modal" 
                        data-toggle="modal" >
                        <span class="glyphicon glyphicon-remove">void</span>
                    </button>
            	</div>
            </div>
	</div>
@stop

<div id="Modal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="flexbox">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-sm-9 well">
                <div class="panel-heading">Ticket Informations</div>
                <div class="panel-body well">
                    <!-- Asset -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Asset</span>
                            <input id="Asset" class="form-control" type="text" name="Asset" placeholder="Asset">
                        </div>
                    </div>

                    <!-- Validation Code[last 4] -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Validation Code[last 4]</span>
                            <input id="ValidationCodeLast4" class="form-control" type="text" name="ValidationCodeLast4" placeholder="Validation Code[last 4]">
                        </div>
                    </div>  

                    <!-- Amount -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Amount</span>
                            <input id="Amount" class="form-control" type="text" name="Amount" placeholder="Amount">
                        </div>
                    </div>

                    <!-- Print Date -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Print Date</span>
                            <input id="PrintDate" class="form-control" type="date" name="PrintDate" placeholder="PrintDate">
                        </div>
                    </div>  

                    </div>
                </div>
                <div class="col-sm-3 well">
                <div class="panel-heading">Action</div>
                    <div class="panel-body well">
                    <button>
                        <span class="glyphicon glyphicon-on-ok">OK</span>
                    </button> 
                    <button>
                        <span>Clear</span>
                    </button>
                    <button>
                        <span class="glyphicon glyphicon-on-remove">Cancel</span>
                    </button>
                    </div>
                </div>
                </div>
                <div class="container-fluid">
                    <table id="datatables" class="table display">
                        <thead>
                            <tr>
                                <th>Machine ID</th>
                                <th>Ticket Serial</th>
                                <th>Validation Code</th>
                                <th>Amount</th>
                                <th>Print Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>