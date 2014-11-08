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
      <option>*State</option>
<option value="AK" >AK - Alaska</option>
							
							              <option value="AL" >AL - Alabama</option>
							              <option value="AR" >AR - Arkansas</option>
							              <option value="AZ" >AZ - Arizona</option>
							              <option value="CA" >CA - California</option>
							              <option value="CO" >CO - Colorado</option>
							              <option value="CT" >CT - Connecticut</option>
							
							              <option value="DC" >DC - District of Columbia</option>
							              <option value="DE" >DE - Delaware</option>
							              <option value="FL" >FL - Florida</option>
							              <option value="GA" >GA - Georgia</option>
							              <option value="HI" >HI - Hawaii</option>
							              <option value="IA" >IA - Iowa</option>
							
							              <option value="ID" >ID - Idaho</option>
							              <option value="IL" >IL - Illinois</option>
							              <option value="IN" >IN - Indiana</option>
							              <option value="KS" >KS - Kansas</option>
							              <option value="KY" >KY - Kentucky</option>
							              <option value="LA" >LA - Louisiana</option>
							
							              <option value="MA" >MA - Massachusetts</option>
							              <option value="MD" >MD - Maryland</option>
							              <option value="ME" >ME - Maine</option>
							              <option value="MI" >MI - Michigan</option>
							              <option value="MN" >MN - Minnesota</option>
							              <option value="MO" >MO - Missouri</option>
							
							              <option value="MS" >MS - Mississippi</option>
							              <option value="MT" >MT - Montana</option>
							              <option value="NC" >NC - North Carolina</option>
							              <option value="ND" >ND - North Dakota</option>
							              <option value="NE" >NE - Nebraska</option>
							              <option value="NH" >NH - New Hampshire</option>
							
							              <option value="NJ" >NJ - New Jersey</option>
							              <option value="NM" >NM - New Mexico</option>
							              <option value="NV" >NV - Nevada</option>
							              <option value="NY" >NY - New York</option>
							              <option value="OH" >OH - Ohio</option>
							              <option value="OK" >OK - Oklahoma</option>
							
							              <option value="OR" >OR - Oregon</option>
							              <option value="PA" >PA - Pennsylvania</option>
							              <option value="RI" >RI - Rhode Island</option>
							              <option value="SC" >SC - South Carolina</option>
							              <option value="SD" >SD - South Dakota</option>
							              <option value="TN" >TN - Tennessee</option>
							
							              <option value="TX" >TX - Texas</option>
							              <option value="UT" >UT - Utah</option>
							              <option value="VA" >VA - Virginia</option>
							              <option value="VT" >VT - Vermont</option>
							              <option value="WA" >WA - Washington</option>
							              <option value="WI" >WI - Wisconsin</option>
							
							              <option value="WV" >WV - West Virginia</option>
							              <option value="WY" >WY - Wyoming</option>	    </select>
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
		<!--<option>Arizona Cardinals - NOT PARTICIPATING</option>-->
		<option>Atlanta Falcons</option>
		<option>Baltimore Ravens</option> 
		<option>Buffalo Bills</option> 
		<option>Carolina Panthers</option> 
		<option>Chicago Bears</option> 
		<option>Cincinnati Bengals</option> 
		<option>Cleveland Browns</option> 
		<!--<option>Dallas Cowboys - NOT PARTICIPATING</option>-->
		<option>Denver Broncos</option> 
		<option>Detroit Lions</option> 
		<option>Green Bay Packers</option> 
		<option>Houston Texans</option> 
		<option>Indianapolis Colts</option> 
		<option>Jacksonville Jaguars</option> 
		<option>Kansas City Chiefs</option> 
		<option>Miami Dolphins</option> 
		<option>Minnesota Vikings</option> 
		<option>New England Patriots</option> 
		<option>New Orleans Saints</option> 
		<option>New York Giants</option> 
		<option>New York Jets</option> 
		<option>Oakland Raiders</option> 
		<option>Philadelphia Eagles</option> 
		<option>Pittsburgh Steelers</option> 
		<option>Saint Louis Rams</option> 
		<option>San Diego Chargers</option> 
		<!--<option>San Francisco 49ers - NOT PARTICIPATING</option>-->
		<option>Seattle Seahawks</option> 
		<option>Tampa Bay Buccaneers</option> 
		<option>Tennessee Titans</option> 
		<option>Washington Redskins</option>
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