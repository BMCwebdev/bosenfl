<?php
// sumbit this form...
require realpath("./inc/website.inc.php");
if(isSweepstakesOpen("week11"))
{
    $exists = doesEmailAlreadyExist("chad.nale@gmail.com", "week11");
    if($exists)
    {
        print("Email exists");
        die();
    }else
    {
        storeSweepsstakeForm();
        print("OK");
    }
}else
{
    print("Sweepstakes Closed");
    die();
}



?>