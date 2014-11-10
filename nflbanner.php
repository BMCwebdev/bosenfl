<?php
require realpath("./inc/website.inc.php");
// this needs to determine the correct NFL Banner to show and grab the contents of that and print it out or can we do a redirect??
$banner = calculateCorrectNFLTeamBanner();
print($banner);

?>