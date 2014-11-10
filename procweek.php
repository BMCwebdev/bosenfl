<?php
// sumbit this form...
require realpath("./inc/website.inc.php");

// make sure week is set
if(isset($_POST["week"]) && isset($_POST["email"]))
{
    $week = $_POST["week"];
    $email = $_POST["email"];
    if(isSweepstakesOpen($week))
    {
        $exists = doesEmailAlreadyExist($email, $week);
        if($exists)
        {
            print("Email exists");
        }else
        {
            storeSweepsstakeForm();
            print("OK");
        }
    }
    else
    {
        print("Sweepstakes Closed");
    }
}
else
{
        print("Sweepstakes Closed");
}


?>