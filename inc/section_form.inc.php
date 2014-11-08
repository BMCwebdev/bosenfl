<?php

//

?>
<form role="form" class="form-horizontal">
<div id="errormessage"></div>
<div class="form-group">
  <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="firstname" name="firstname" placeholder="*First Name" value=""/></div>
  <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="lastname" name="lastnamee" placeholder="*Last Name" value=""/></div>
</div>
<div class="form-group">
  <div class="col-sm-12"><input type="text" class="form-control" id="address1" name="address1" placeholder="*Street" value=""/></div>
</div>
<div class="form-group">
  <div class="col-sm-4"><input type="text" class="form-control" id="city" name="city" placeholder="*City" value=""/></div>
  <div class="col-sm-4">
    <select class="form-control" id="state" name="state">
		<option value="">*State</option>
		<option value="two">Two</option>
		<option value="three">Three</option>
		<option value="four">Four</option>
		<option value="five">Five</option>
	    </select>
  </div>
  <div class="col-sm-4"><input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code" value=""/></div>
</div>
<div class="form-group">
  <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="email" name="email" placeholder="*Email Address" value=""/></div>
  <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="confirm" name="confirm" placeholder="*Confirm Email Address" value=""/></div>
</div>
<div class="form-group">
  <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="phone" name="phone" placeholder="*Telephone Nmber" value=""/></div>
  <div class="col-sm-6 col-xs-12">
    <select class="form-control" id="favoriteteam" name="favoriteteam">
		<option value="">*Pick Your Team</option>
		<option value="two">Two</option>
		<option value="three">Three</option>
		<option value="four">Four</option>
		<option value="five">Five</option>
	    </select>
  </div>
</div>
<div class="form-group checkbox-margins">
	<div class="checkbox col-xs-12">
		<label id="cbo21Label">
		  <input type="checkbox" id="cbo21" name="cbo21" value="21"/> *Yes, I am over 21 years of age.
		</label>
	</div>
</div>
<div class="form-group checkbox-margins">
	<div class="checkbox col-xs-12">
		<label id="cboAgreeLabel">
		  <input type="checkbox" id="cboAgree" name="cboAgree" value="Agree"/> *yes, I have read and agree to the <a href="#">Official Rules</a>.
		</label>
	</div>
</div>
<div class="form-group checkbox-margins">
	<div class="checkbox col-xs-12">
		<label>
		  <input type="checkbox" id="cboBose" name="cboBose" value="AgreeBose"/> Sign me up for email communications, offers, &amp; incentives from Bose.
		</label>
	</div>
</div>
<div class="form-group checkbox-margins">
	<div class="checkbox col-xs-12">
		<label>
		  <input type="checkbox" id="cboNFL" name="cboNFL" value="AgreeNFL"/> Sign me up for promotional emails, newsletters, and similar communications from the NFL.
		</label>
	</div>
</div>
<div class="form-group checkbox-margins">
	<div class="checkbox col-xs-12">
		<label>
		  <input type="button" id="btnsubmit" name="btmsubmit" value="Submit" onclick="javascript:validateForm();"/>
		</label>
	</div>
</div>
</form>
<?php
//
?>