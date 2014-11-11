<?php
require realpath("../inc/website.inc.php");

$totalSoFar = getTotalEnrollmentsByWeek("week11");


?>
<html>
<head>
<title>Bose - First and Go Sweepstakes</title>

<script language="javascript" type="text/javascript" src="/assets/js/jquery-2.1.1.min.js"></script>
<script language="javascript"  type="text/javascript">
    
 $(document).ready(function(){
    //alert("showing data");
  });   
</script>
</head>    
<body>
<p><b>First and Go - Enrollments</b></p>

<b>Week 11</b> : <?php print($totalSoFar);?><br>

<br>
<br>
<br>
<br>
<br>
<br>


Download CSV of data : <a href="admindatacsv.php">Here</a>

</body>    
</html>
