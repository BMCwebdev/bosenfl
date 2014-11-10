<?php
require realpath("../inc/website.inc.php");
if(isSweepstakesOpen("week11"))
{
print("<meta http-equiv=\"refresh\" content=\"0;url=sweepstake.html\">");

}
else
{
  print("<meta http-equiv=\"refresh\" content=\"0;url=\index2.html\">");
  
}

?>