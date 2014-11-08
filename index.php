<?php
require realpath("./inc/website.inc.php");

//

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
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Brian Custom CSS -->
<link href="assets/css/custom.css" rel="stylesheet">
<!-- Bose Fonts -->
<link href="assets/webfontkit/stylesheet.css" rel="stylesheet">
<!-- scripts -->
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<!-- add in our site common javascript flie -->
<script language="javascript" type="text/javascript" src="assets/js/website.common.js"></script>
<script language="javascript" type="text/javascript">
  // bring it home : 31-OCT-2014
  $(document).ready(function(){
      //fetchAccountName();
      //alert("herewego");
  });
</script>
</head>
<body>
    <div>

		<div class="header col-xs-12">
			<div class="header_text col-sm-6 col-xs-12">
				<img src="assets/images/header_text/header_week11.png" />
			</div>
			<div class="header_teams col-sm-6 col-xs-12">
				<!--<img src="assets/images/header_teams/nfl.png" alt="nfl" />-->
				<?php
				
				$banner = calculateCorrectNFLTeamBanner();
				print(sprintf('<img src="assets/images/header_teams/%s.png" alt="%s" />',$banner,$banner));
				
				?>
			</div>
		</div>
		
		<div class="main-section col-xs-12">
			<div class="form-column col-sm-6 col-xs-12">
					<div class="intro-text no-padding col-xs-12">
						<h1>It's First and Go time!</h1>
						<h5>Enter now for a chance to win NFL tickets and Bose&#174; headphones. Hurry up because the clock is running!  We&rsquo;ll be drawing winners soon.</h5>
					</div>
					<div><img src="assets/images/spacer.gif" alt="spacer" width="1" height="20" /></div>
					<div id="form-padding" class="form_area col-xs-12">
					  <?php
					  include realpath("./inc/section_form.inc.php");
					  ?>
					</div>
			</div>
			
			<div class="schedual-column col-sm-6 col-xs-12">
				<div class="schedual">
					<img src="assets/images/scheduals/schedual_week11.png" alt="schedual_week11" />
				</div>
			</div>
		</div>
		
		<div class="footer col-xs-12">
			<div class="footer-text col-xs-12">
				<p class="footerbold">Terms and Conditions</p>
				<p class="footerregular">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
			</div>
		</div>
    </div>

		
    
    
    
						        
		
</div>








    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
