<?php
require "dbinfo.inc.php";
require "geoplugin.inc.php";
require "dao-classes.inc.php";

// determine what is available and when
function isSweepstakesOpen($weekof)
{
	$allowed = false;
	date_default_timezone_set('America/New_York');
	switch($weekof)
	{
		case "week11" :
			//11-11-2014 8am - 12pm
			$startTime = strtotime("2014-11-11 07:30:00");
			$endTime = strtotime("2014-11-12 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
		case "week12" :
			//11-18-2014 8am - 12pm
			$startTime = strtotime("2014-11-18 08:00:00");
			$endTime = strtotime("2014-11-19 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
		case "week13" :
			//11-24-2014 8am - 12pm
			$startTime = strtotime("2014-11-24 08:00:00");
			$endTime = strtotime("2014-11-25 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
		case "week14" :
			//12-02-2014 8am - 12pm
			$startTime = strtotime("2014-12-02 08:00:00");
			$endTime = strtotime("2014-12-03 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
		case "week15" :
			//12-09-2014 8am - 12pm
			$startTime = strtotime("2014-12-09 08:00:00");
			$endTime = strtotime("2014-12-10 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
		case "week16" :
			//12-16-2014 8am - 12pm
			$startTime = strtotime("2014-12-16 08:00:00");
			$endTime = strtotime("2014-12-17 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
		case "week17" :
			//12-22-2014 8am - 12pm
			$startTime = strtotime("2014-12-22 08:00:00");
			$endTime = strtotime("2014-12-23 00:00:00");
			if(time() >= $startTime && time() <$endTime )
				$allowed = true;
			break;
	}
	
	return $allowed;
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
{	
	$geoplugin = new geoPlugin();
	$geoplugin->locate($ipAddress);
	$cClientInfo = new ClientLocationInfo();
	
	$cClientInfo->country = $geoplugin->countryName;
	// now we need the state, areacode
	$cClientInfo->state = $geoplugin->region;
	$cClientInfo->areacode = $geoplugin->areaCode;
	
	// to see if it worked we check to see the country, state and areacode
	return $cClientInfo;
	
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
function getCSVDataForEnrollments()
{
	$mysqli = getDBConnection();
	$myArray = array();
	$jsonStr = "";
	$sql = "SELECT * from sweepstakes order by submitteddate asc";

	$headers = "";
	$rows = "";
	if ($result = $mysqli->query($sql))
	{
		$isFirst = true;
		while ($fieldinfo=mysqli_fetch_field($result))
		{
			// add comma unless it's the first one
			if(!$isFirst)
				$headers .= ",";
			// now get name
			$headers .= $fieldinfo->name;
			//flip isFirst
			$isFirst = false;
		}
		// now add \r\n
		$headers .= "\r\n";
		while($row = $result->fetch_array(MYSQL_ASSOC))
		{
			$myArray = $row;
			// now loop through array and add , between and \r\n at end
			$isFirst = true;
			$currentRow = "";
			foreach($myArray as $value)
			{
				if(!$isFirst)
					$currentRow .= ",";
				$currentRow .= $value;
				$isFirst = false;
			}
			$rows .= $currentRow . "\r\n";
		}
	}
	$result->close();
	$mysqli->close();
	// now print out the json string
	//$json_string = json_encode($jsonStr, JSON_PRETTY_PRINT);
	print($headers . $rows);
}


// function see if they already exist....
function doesEmailAlreadyExist($email, $submittedweek)
{
	// only allow one per email per week...
	$mysqli = getDBConnection();
	$exists = false;
	$emailexists ="";
	/* Create a prepared statement */
	if($stmt = $mysqli -> prepare("SELECT email FROM sweepstakes WHERE email=? and submittedweek=?")) {
	      $stmt -> bind_param("ss", $email,$submittedweek);
	      $stmt -> execute();
	      $stmt -> bind_result($result);
	      $stmt -> fetch();
	      $emailexists = $result;
	      $stmt -> close();
	}
	$mysqli->close();
	// switching to MD5 less secure
	if($emailexists == $email)
	   $exists = true;
	// this needs to return string 
	return $exists;
}


// this will be the code that does the sweepstakes entry
function storeSweepsstakeForm()
{
	
	$dbConn = getDBConnection();
	
	
	
	
	
	// sql statement...
	$sql = "INSERT INTO sweepstakes " .
		"(firstname, lastname, address, city, state, " .
		"zipcode, email, telephone, nflagreetoemail, boseagreedtoemail, " .
		"submitteddate, submittedweek, ipaddress, geotarget, favoriteteam, " .
		"bannerdisplayed, browser) " .
		"values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";	
	if($stmt = $dbConn->prepare($sql))
	{
		// bind the params
		$stmt->bind_param('ssssssssiisssssss',
				  $firstname, $lastname, $address, $city, $state,
				  $zipcode, $email, $telephone,$nflagreetoemail, $boseagreetoemail,
				  $submitteddate,$submittedweek,$ipaddress, $geotarget, $favoriteteam,
				  $banner,$browser);
		// now set the params to the post values
		$firstname = cleanStringValues($_POST["firstname"]);
		$lastname = cleanStringValues($_POST["lastname"]);
		$address = cleanStringValues($_POST["street"]);
		$city = cleanStringValues($_POST["city"]);
		$state = cleanStringValues($_POST["state"]);
		$zipcode = cleanStringValues($_POST["zipcode"]);
		$email = cleanStringValues($_POST["email"]);
		$telephone = cleanStringValues($_POST["telephone"]);
		$favoriteteam = cleanStringValues($_POST["favoriteteam"]);
		// see if nfl is submitted it's a chcekbox so only when it is there
		if(isset($_POST["cboEmailNFL"]))
			$nflagreetoemail = 1;
		else
			$nflagreetoemail = 0;
		// see if bose is submited it's a checkbox so only when it is there
		if(isset($_POST["cboEmailBose"]))
			$boseagreetoemail = 1;
		else
			$boseagreetoemail = 0;
		$submitteddate = date('Y-m-d H:i:s');
		$submittedweek = cleanStringValues($_POST["week"]);
		$ipaddress = getClientIPAddress();
		// we store the geocode information
		$geotarget = getGeocodeInfo($ipaddress)->toString();
		// get displayed banner
		$banner = calculateCorrectNFLTeamBanner();
		
		// get browser info
		$browser = $_SERVER['HTTP_USER_AGENT'];
		// now
		try
		{
		$stmt->execute();
		$stmt->close();
		}catch(exception $ex)
		{
			print("Error : " . $ex->error);
		}
		
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


// determine which banner....
function calculateCorrectNFLTeamBanner()
{
	
	/*
Giants = State NY, NJ, CT
Steelers = State PA [814,724,878,412]
Seahawks = State WA
Patriots = State : MA, NH, RI, ME, VT
Dolphins = State FL [772,863,561,754,954,305,786]
Chiefs = State KS
Texans = State TX [936,409,281,832,713,979,361,512]
Browns = State OH [440,216,234,330,419,567]
Panthers = State NC,SC 
*/

	$currentIP = getClientIPAddress();
	// we actually want to use our real ip here...
	
	// NH = 24.91.108.104
	//Pittsburgh = 209.166.162.44
	// philly = 69.242.110.29
	$geoInformation = getGeocodeInfo($currentIP);
	// now how do we determine this...
	$banner = "nfl";
	if("United States" == $geoInformation->country)
	{
		switch($geoInformation->state)
		{
			//patriots
			case "NH" :
			case "MA" :
			case "RI" :
			case "ME" :
			case "VT" :
				$banner = "patriots";
				break;
			// giants
			case "NY" :
			case "NJ" :
			case "CT" :
				$banner = "giants";
				break;
			//steelers
			case "PA" :
				// needs to be in an areacode specified
				if(0 < strpos("814,724,878,412",$geoInformation->areacode))
					$banner = "steelers";
				break;
			// seahawks
			case "WA" :
				$banner = "seahawks";
				break;
			// florida (dolphins)
			case "FL" :
				// see if dolphins 
				if(0 < strpos("772,863,561,754,954,305,786",$geoInformation->areacode))
					$banner = "dolphins";
				break;
			// carolina panthers
			case "NC" :
			case "SC" :
				$banner = "panthers";
				break;
			//  chiefs
			case "KS" :
				$banner = "chiefs";
				break;
			// texans
			case "TX" :
				if(0 < strpos("936,409,281,832,713,979,361,512",$geoInformation->areacode))
					$banner = "texans";
				break;
			case "OH" :
				if(0 < strpos("440,216,234,330,419,567",$geoInformation->areacode))
					$banner = "browns";
				break;
			default :
				$banner = "nfl";
				break;
		}
	}
	return $banner;
	
}
?>


