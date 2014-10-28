<?php
require "site.inc";
// this is the processing page for the sweepstake form
 storeSweepsstakeForm();
 print("completed....<br><hr>");
 // now print out the data so we can see what went in
 getJSONData();
 print("<br><hr>");
 // display geo infom
 //displayGeocodeInfo();


?>