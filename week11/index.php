<?php
require realpath("../inc/website.inc.php");
if(isSweepstakesOpen("week11"))
{
print("<meta http-equiv=\"refresh\" content=\"0;url=sweepstakes.php\">");

}
else
{
  print("<meta http-equiv=\"refresh\" content=\"0;url=\index.html\">");
  
}

?>