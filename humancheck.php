<?php
$result = "nice try";
require realpath("./inc/website.inc.php");
session_start();
if(isset($_POST["humancode"]))
{
    $code = cleanStringValues($_POST["humancode"]);
    if($code == $_SESSION['captcha']['code'])
    {
        $result = "OK";
    }
}
print($result);

?>