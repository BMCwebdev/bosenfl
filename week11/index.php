<?php
require realpath("../inc/website.inc.php");
if(isSweepstakesOpen("week11"))
{
print("<meta http-equiv=\"refresh\" content=\"0;url=sweepstakes.html\">");

}
else
{
  print("<meta http-equiv=\"refresh\" content=\"0;url=\index.html\">");
  
}

?>