<?php
require "geoplugin.inc";

function getDBConnection()
{
	$dbhost = "localhost";

	//$dbuser = "root";
	$dbuser = "bmcweb_bosenfl";
	
	$dbpwd = "bosenfl4102";
	//$dbpwd = "mysql";

	//$dbschema = "firstandgo";
	$dbschema = "bmcweb_bosenfl";
	
	// get the database connection
	$db = new mysqli($dbhost, $dbuser, $dbpwd, $dbschema);
	// check to see if it errored out... if it did send exception message
	if($db->connect_errno > 0)
	{
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	return $db;
}
// strip bad input from post vars
function cleanStringValues($str)
{
	$str = trim($str);
	$str = stripcslashes($str);
	$str = (filter_var($str, FILTER_SANITIZE_STRING));
	return $str;
}
function getGeocodeInfo($ipAddress)
{	//geoplugin = new geoPlugin();

/* 
Notes:

The default base currency is USD (see http://www.geoplugin.com/webservices:currency ).
You can change this before the call to geoPlugin::locate with eg:
$geoplugin->currency = 'EUR';

The default IP to lookup is $_SERVER['REMOTE_ADDR']
You can lookup a specific IP address, by entering the IP in the call to geoPlugin::locate
eg
$geoplugin->locate('209.85.171.100');
*/
	//echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='."24.91.108.104")));

	$geoplugin = new geoPlugin();
	$geoplugin->locate($ipAddress);
	// now we need the state, areacode
	$locatedCountry = $geoplugin->countryName;
	$locatedState = $geoplugin->region;
	$locatedAreacode = $geoplugin->areaCode;
	return sprintf("%s:%s:%s", $locatedCountry, $locatedState, $locatedAreacode);
	
	
}
function getClientIPAddress()
{
	 $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
	
}



// this will be the code that does the sweepstakes entry
function storeSweepsstakeForm()
{
	
	$dbConn = getDBConnection();
	// sql statement...
	$sql = "INSERT INTO sweepstakes " .
		"(firstname, lastname, address, city, state, zipcode, email, telephone, " .
		"nflagreetoemail, boseagreedtoemail, submitteddate, submittedweek, " .
		"ipaddress, geotarget) " .
		"values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";	
	if($stmt = $dbConn->prepare($sql))
	{
		// bind the params
		$stmt->bind_param('ssssssssiissss', $firstname, $lastname, $address, $city, $state, $zipcode, $email, $telephone,
				  $nflagreetoemail, $boseagreetoemail, $submitteddate, $submittedweek, $ipaddress, $geotarget);
		// now set the params to the post values
		$firstname = cleanStringValues($_POST["firstname"]);
		$lastname = cleanStringValues($_POST["lastname"]);
		$address = cleanStringValues($_POST["address"]);
		$city = cleanStringValues($_POST["city"]);
		$state = cleanStringValues($_POST["state"]);
		$zipcode = cleanStringValues($_POST["zipcode"]);
		$email = cleanStringValues($_POST["email"]);
		$telephone = cleanStringValues($_POST["telephone"]);
		
		// see if nfl is submitted it's a chcekbox so only when it is there
		if(null != $_POST["nflin"])
			$nflagreetoemail = 1;
		else
			$nflagreetoemail = 0;
		// see if bose is submited it's a checkbox so only when it is there
		if(null != $_POST["bosein"])
			$boseagreetoemail = 1;
		else
			$boseagreetoemail = 0;
		$submitteddate = date('Y-m-d H:i:s');
		$submittedweek = cleanStringValues($_POST["week"]);
		$ipaddress = getClientIPAddress();
		
		$geotarget = getGeocodeInfo("209.85.171.100");
		// now
		$stmt->execute();
		$stmt->close();
		
	}else
	{
		 printf("Error - SQLSTATE %s.\n", $dbConn->sqlstate);
		printf("Prepared statement error: %s\n", $db->error);
		die("fatal error");
	}
	$dbConn->close();
	
}
function getJSONData()
{
	$mysqli = getDBConnection();
	$myArray = array();
	$jsonStr = "";
	if ($result = $mysqli->query("SELECT * FROM sweepstakes"))
	{
		while($row = $result->fetch_array(MYSQL_ASSOC))
		{
			$myArray[] = $row;
		}
		$jsonStr = $jsonStr . json_encode($myArray);
	}

	$result->close();
	$mysqli->close();
	// now print out the json string
	//$json_string = json_encode($jsonStr, JSON_PRETTY_PRINT);
	print($jsonStr);
}
// CONFIRMED working ... 28-OCT-2014 : 12:17PM Chad
function doInsertTest()
{
	$dbConnection = getDBConnection();
	// sample insert into database
	if($stmt = $dbConnection->prepare("INSERT into sweepstakes " .
				"(firstname, lastname, submitteddate, ipaddress) " .
				"values (?,?,?,?)"))
	{
		// set bind params  (s = string, d=double, i=integer, b=blob)
		$stmt->bind_param('ssss', $firstname, $lastname, $submitteddate, $ipaddress);
		// set params
		$firstname = cleanStringValues("chad");
		$lastname = cleanStringValues("nale");
		$date = date('Y-m-d H:i:s');
		$submitteddate = $date;
		$ipaddress = getClientIPAddress();
		$stmt->execute();
		$stmt->close();
	}else
	{
		printf("Prepared statement error: %s\n", $db->error);
		die("fatal error");
	}
	$dbConnection->close();
}
?>


