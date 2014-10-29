<?php
require "site.inc";
?>
<html>
<head>
<title>Test Page</title>    
    
</head>
<body>
Test Information<br>
<div>
<?php 

// lets get geocode info
$ipAddress = getClientIPAddress();
$locationInfo = getGeocodeInfo($ipAddress);
$correctBanner = calculateCorrectNFLTeamBanner();
print($locationInfo->toHTML());
printf("Correct banner to show would be : %s", $correctBanner);
?>    
    
</div>
    
</body>
    
</html>
