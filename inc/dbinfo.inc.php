<?php
function getDBConnection()
{
    // 1. get the environment
    $environment = determineEnvironment();
    // 2. set appropiate db values
    switch($environment)
    {
        case "development" :
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpwd = "mysql";
            $dbschema = "firstandgo";
        break;
        case "staging" :
            $dbhost = "db00.perfectprize.com";
            $dbuser = "web";
            $dbpwd = "thpffffft";
            $dbschema = "stg_bosefirstandgo";
        break;
        case "production" :
	    $dbhost = "db00.perfectprize.com";
	    $dbuser = "web";
	    $dbpwd = "thpffffft";
	    $dbschema = "bosetakeithome";
	break;
    }
    
 	
    // get the database connection
    $db = new mysqli($dbhost, $dbuser, $dbpwd, $dbschema);
    // check to see if it errored out... if it did send exception message
    if($db->connect_errno > 0)
    {
            die('Unable to connect to database [' . $db->connect_error . ']');
    }
    return $db;
}
function determineEnvironment()
{
    $environment = $_SERVER["HTTP_HOST"];
    if($environment == "localhost" || $environment == "cnale-t420" || $environment == "127.0.0.1")
    {
        $environment = "development";
    }else if($environment == "staging" || $environment == "staging.firstandgo.com")
    {
        $environment = "staging";
    }
    else if($environment == "www" || $environment == "www.firstandgo.com")
    {
        $environment = "production";
    }else
    {
        die(sprintf("Can't determine the correct enviroment[%s]", $environment));
    }
    return $environment;
}
?>