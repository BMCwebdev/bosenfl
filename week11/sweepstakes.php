<?php
require realpath("../inc/website.inc.php");
if(!isSweepstakesOpen("week11"))
{
  print("<meta http-equiv=\"refresh\" content=\"0;url=\index.html\">");
  die();
}
// should convert this to do the captcha and banner without making ajax calls to simplify

// get banner ...
$banner = calculateCorrectNFLTeamBanner();
$bannerURL = sprintf("/assets/images/header_teams/%s.png", $banner);

/*
// get captcha
session_start();
$_SESSION = array();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
$captchaURL =  $_SESSION['captcha']['image_src'];

// that's it.....
*/

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bose NFL First and Go</title>
    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Brian Custom CSS -->
    <link href="/assets/css/custom.css" rel="stylesheet"/>
    <!-- Bose Fonts -->
    <link href="/assets/webfontkit/stylesheet.css" rel="stylesheet"/>
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><![endif]-->
    <!--<script src="../../assets/js/ie8-responsive-file-warning.js"></script>-->
    
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- promosis js artifacts -->
    <script src="/assets/js/jquery-2.1.1.min.js" type="text/javascript" language="javascript"></script>
    <script src="/assets/js/website.common.js" type="text/javascript" language="javascript"></script>
    <script language="javascript" type="text/javascript">
   
   $( document ).ready(function() {
    // display correct banner
    $.ajax({
            type: 'post',
            url: '/nflbanner.php',
            //data: $("#form1").serialize(),
            success: function (data) {
	        var image = document.getElementById("nflbanner");
		image.src = "/assets/images/header_teams/" + data +".png";
            }
        });
    // generate human verification
    //getHumanVerification();
    
    
    
});   
      
    </script>
  </head>
  
  <style>
	  .processingresult {
		  color: red;
	  }
	  </style>

  <body>
    <div>

		<div class="header col-xs-12">
			<div class="header_text desktop col-sm-6 col-xs-12">
				<img src="/assets/images/header_text/header_week11_wider.png" />
			</div>
			<div class="header_text mobile col-sm-6 col-xs-12">
				<img src="/assets/images/header_text/header_week11_wider.png" />
			</div>
			<div class="header_teams col-sm-6 col-xs-12">
				<img id="nflbanner" name="nflbanner" src="/assets/images/header_teams/nfl.png" alt="nfl" />
			</div>
		</div>
		
		<div class="main-section col-xs-12">
			<div class="form-column col-sm-6 col-xs-12">
					<div class="intro-text col-xs-12">
						<h1>It's First and Go time!</h1>
						<h5>If you want to make it to the NFL, you&rsquo;ve got to give 100&#37;. Please fill out all of the required fields below.</h5>
					</div>
					<div><img src="/assets/images/spacer.gif" alt="spacer" width="1" height="20" /></div>
    				<div class="form_area col-xs-12"> <!-- id="form-padding" took out, maybe not looking right-->
					  <form role="form" class="form-horizontal" id="form1" name="form1">
					  <input type="hidden" id="week" name="week" value="week11"/>
					    <div class="form-group">
					      <div class="col-sm-6 col-xs-12 extra-15-pad"><input type="text" class="form-control" id="firstname" name="firstname" placeholder="*First Name" value=""/></div>
					      <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="lastname" name="lastname" placeholder="*Last Name" value=""/></div>
					    </div>
					    <div class="form-group">
					      <div class="col-sm-12"><input type="text" class="form-control" id="street" name="street" placeholder="*Street" value=""/></div>
					    </div>
					    <div class="form-group">
					      <div class="col-sm-4 extra-15-pad"><input type="text" class="form-control" id="city" name="city" placeholder="*City" value=""/></div>
					      <div class="col-sm-4 extra-15-pad">
					      	<select class="form-control" id="state" name="state">
							    <option value="">*State</option>
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
							</select>
					      </div>
					      <div class="col-sm-4"><input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="*Zip Code" value="" maxlength="5"/></div>
					    </div>
					    <div class="form-group">
					      <div class="col-sm-6 col-xs-12 extra-15-pad"><input type="text" class="form-control" id="email" name="email" placeholder="*Email Address" value=""/></div>
					      <div class="col-sm-6 col-xs-12"><input type="text" class="form-control" id="emailconfirm" name="emailconfirm" placeholder="*Confirm Email Address" value=""/></div>
					    </div>
					    <div class="form-group">
					      <div class="col-sm-6 col-xs-12 extra-15-pad"><input type="text" class="form-control" id="telephone" name="telephone" placeholder="*Telephone Number" value=""/></div>
					      <div class="col-sm-6 col-xs-12">
					      	<select class="form-control" id="favoriteteam" name="favoriteteam">
							    <option value="">*Pick Your Game</option>
								<option>Bills at Dolphins</option>
								<option>Texans at Browns</option>
								<option>Falcons at Panthers</option>
								<option>Vikings at Bears</option>
								<option>Bengals at Saints</option>
								<option>Broncos at Rams</option>
								<option>Seahawks at Chiefs</option>
								<option>49ers at Giants</option>
								<option>Buccaneers at Redskins</option>
								<option>Raiders at Chargers</option>
								<option>Eagles at Packers</option>
								<option>Patriots at Colts</option>
								<option>Steelers at Titans</option>

								<!--<option>Arizona Cardinals - NOT PARTICIPATING</option>-->
<!--
								<option>Atlanta Falcons</option>
								<option>Baltimore Ravens</option> 
								<option>Buffalo Bills</option> 
								<option>Carolina Panthers</option> 
								<option>Chicago Bears</option> 
								<option>Cincinnati Bengals</option> 
								<option>Cleveland Browns</option> 
-->
								<!--<option>Dallas Cowboys - NOT PARTICIPATING</option>-->
<!--
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
-->
								<!--<option>San Francisco 49ers - NOT PARTICIPATING</option>-->
<!--
								<option>Seattle Seahawks</option> 
								<option>Tampa Bay Buccaneers</option> 
								<option>Tennessee Titans</option> 
								<option>Washington Redskins</option>
-->
							</select>
					      </div>
					    </div>
					    <div class="form-group checkbox-margins">
						    <div class="checkbox col-xs-12" id="cbo21Label">
							    <label>
							      <input type="checkbox" id="cbo21" name="cbo21" value="Over21"> *Yes, I am over 18 years of age.
							    </label>
						    </div>
					    </div>
					    <div class="form-group checkbox-margins">
						    <div class="checkbox col-xs-12" id="cboRulesAgreeLabel">
							    <label>
							      <input type="checkbox" id="cboRulesAgree" name="cboRulesAgree" value="RulesAgree"> *Yes, I have read and agree to the <a href="/rules.html" target="_blank" style="text-decoration: underline;">Official Rules</a>.
							    </label>
						    </div>
					    </div>
					    <div class="form-group checkbox-margins">
						    <div class="checkbox col-xs-12">
							    <label>
							      <input type="checkbox" checked id="cboEmailBose" name="cboEmailBose" value="EmailBose"> Sign me up for email communications, offers, and incentives from Bose.
							    </label>
						    </div>
					    </div>
					    <div class="form-group checkbox-margins">
						    <div class="checkbox col-xs-12">
							    <label>
							      <input type="checkbox" id="cboEmailNFL" name="cboEmailNFL" value="EmailNFL"> Sign me up for promotional emails, newsletters, and similar communications from the NFL.
							    </label>
						    </div>
					    </div>
					    <!--
					    <div class="form-group">
					      <div class="col-xs-12" style="padding-top:15px;"><img id="humanverify" name="humanverify" src="/assets/images/captcha.png" alt="captcha" width="150" height="50"></div>
					    </div>
					    <div class="form-group">
					      <div class="col-xs-12"><input type="text" class="form-control" id="captcha" name="captcha" placeholder="**Please type the characters above in this box" value=""/></div>
					    </div>
					    -->
					    <div class="form-group">
					      <div class="col-xs-12">
						      <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12" style="padding-left: 0px;">
							      <button type="button" class="btn btn-primary greytext" onclick="javascript:validateForm();">GO!</button>
						      </div>
						      <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12" style="padding-left: 0px;">
							      <div id="processingresult"></div>
						      </div>
					      </div>
					    </div>
					  </form>
					</div>
			</div>
			
			<div class="schedual-column col-sm-6 col-xs-12">
				<div class="schedual desktop">
					<img src="/assets/images/scheduals/schedual_week11.png" alt="schedual_week11" />
				</div>
				<div class="schedual mobile">
					<img src="/assets/images/scheduals/schedual_week11_mobile.png" alt="schedual_week11" />
				</div>
			</div>
		</div>
		
		<div class="footer col-xs-12">
			<div class="footer-text col-xs-12">
				<p class="footerregular">NO PURCHASE NECESSARY. Open <meta name="format-detection" content="telephone=no">11/11/14 - 12/22/14 to legal residents of the U.S., 18 or older. The NFL Entities (as defined in the Official Rules) have not offered or sponsored this Giveaway in any way. See <a href="/rules.html" target="_blank" style="text-decoration: underline;">Official Rules</a> for details and specific entry periods.  Void where prohibited.</p>
			</div>
		</div>
    </div>

		
    
    
    
						        
		
</div>








    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-12419430-7', 'auto');
	  ga('send', 'pageview');
	</script>
  </body>
</html>
