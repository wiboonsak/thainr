<?php

include ("config.php");

// Common Variables ///////////////////////
$ip = $_SERVER['REMOTE_ADDR'];           //
										 //
if (isset ($_SERVER['HTTP_REFERER'])) {  //
										 //
	$refer = $_SERVER['HTTP_REFERER'];   //
										 //
}										 //
								         //
$browser = $_SERVER['HTTP_USER_AGENT'];  //
										 //
$date = date ("d/m/Y");                  //
$day = date ("d");                       //
$month = date ("m");                     //
$year = date ("Y");                      //
$daysinmonth = date ("t");               //
///////////////////////////////////////////

// Insert Daily Information ///////////////
$getdaily = mysql_fetch_array (mysql_query ("SELECT * FROM stats_daily WHERE SUBSTRING(subdate, 1, 2)='$day'"));
$dailyhits = $getdaily['hits'] + 1; // New number of hits after this visit

$checkmonth = mysql_num_rows (mysql_query ("SELECT subdate FROM stats_daily WHERE SUBSTRING(subdate, 4, 2)='$month'"));

if ($checkmonth == 0) {

	mysql_query ("TRUNCATE TABLE stats_daily"); // Delete all records in table if they do not match this month
	
	for ($i = 1; $i < ($daysinmonth + 1); $i++) {
		
		if (strlen ($i) == 1) {
		
			$subdate = "0".$i."/".$month."/".$year;
		
		} else {
		
			$subdate = $i."/".$month."/".$year;
		
		}
		
		mysql_query ("INSERT INTO stats_daily (subdate, hits, uniquehits) VALUES ('$subdate', '0', '0')"); // Insert the number of days this month into the table
		
	}
	
}

$checkday = mysql_num_rows (mysql_query ("SELECT subdate FROM stats_daily WHERE SUBSTRING(subdate, 1, 2)='$day'"));

if ($checkday == 1) { // Update the number of unique visits today
	
	$countip = mysql_num_rows (mysql_query ("SELECT ip FROM stats_visitors WHERE SUBSTRING(subdate, 1, 2)='$day' AND ip='$_SERVER[REMOTE_ADDR]'")); // Obtain the number of unique IP Addresses
	$getuniquehits = mysql_fetch_array (mysql_query ("SELECT uniquehits FROM stats_daily WHERE SUBSTRING(subdate, 1, 2)='$day'"));
	
	if ($countip == 0) {
	
		$uniquehits = $getuniquehits['uniquehits'] + 1;
		
	} else {
	
		$uniquehits = $getuniquehits['uniquehits'];
		
	}
		
	mysql_query ("UPDATE stats_daily SET hits='$dailyhits', uniquehits='$uniquehits' WHERE SUBSTRING(subdate, 1, 2)='$day'"); // Update table when visited

}

// Insert Monthly Information /////////////
$getmonthly = mysql_fetch_array (mysql_query ("SELECT * FROM stats_monthly WHERE SUBSTRING(subdate, 4, 2)='$month'"));
$monthlyhits = $getmonthly['hits'] + 1;

$checkyear = mysql_num_rows (mysql_query ("SELECT subdate FROM stats_monthly WHERE SUBSTRING(subdate, 7, 4)='$year'"));

if ($checkyear == 0) {

	mysql_query ("TRUNCATE TABLE stats_monthly"); // Delete all records in table if they do not match this month
	
	for ($i = 1; $i < 13; $i++) {
		
		if (strlen ($i) == 1) {
		
			$subdate = "01/0".$i."/".$year;
		
		} else {
		
			$subdate = "01/".$i."/".$year;
		
		}
		
		mysql_query ("INSERT INTO stats_monthly (subdate, hits, uniquehits) VALUES ('$subdate', '0', '0')"); // Insert the number of days this month into the table
		
	}

}

$checkmonth = mysql_num_rows (mysql_query ("SELECT * FROM stats_monthly WHERE SUBSTRING(subdate, 4, 2)='$month'"));

if ($checkmonth == 1) { // Update the number of unique visits today
	
	$countip = mysql_num_rows (mysql_query ("SELECT ip FROM stats_visitors WHERE SUBSTRING(subdate, 1, 2)='$day' AND ip='$_SERVER[REMOTE_ADDR]'"));
	$getuniquehits = mysql_fetch_array (mysql_query ("SELECT uniquehits FROM stats_monthly WHERE SUBSTRING(subdate, 4, 2)='$month'"));
	
	if ($countip == 0) {
	
		$uniquehits = $getuniquehits['uniquehits'] + 1;
		
	} else {
	
		$uniquehits = $getuniquehits['uniquehits'];
		
	}
		
	mysql_query ("UPDATE stats_monthly SET hits='$monthlyhits', uniquehits='$uniquehits' WHERE SUBSTRING(subdate, 4, 2)='$month'"); // Update table when visited

}

// Insert Yearly Information //////////////
$getyearly = mysql_fetch_array (mysql_query ("SELECT * FROM stats_yearly WHERE SUBSTRING(subdate, 7, 4)='$year'"));
$yearlyhits = $getyearly['hits'] + 1;

$checkyear = mysql_num_rows (mysql_query ("SELECT * FROM stats_yearly WHERE SUBSTRING(subdate, 7, 4)='$year'"));

if ($checkyear == 0) {

	mysql_query ("INSERT INTO stats_yearly (subdate, hits, uniquehits) VALUES ('$date', '1', '1')");
	
} else {

	$countip = mysql_num_rows (mysql_query ("SELECT ip FROM stats_visitors WHERE SUBSTRING(subdate, 1, 2)='$day' AND ip='$_SERVER[REMOTE_ADDR]'"));
	$getuniquehits = mysql_fetch_array (mysql_query ("SELECT uniquehits FROM stats_yearly WHERE SUBSTRING(subdate, 7, 4)='$year'"));
	
	if ($countip == 0) {
	
		$uniquehits = $getuniquehits['uniquehits'] + 1;
		
	} else {
	
		$uniquehits = $getuniquehits['uniquehits'];
		
	}
		
	mysql_query ("UPDATE stats_yearly SET hits='$yearlyhits', uniquehits='$uniquehits' WHERE SUBSTRING(subdate, 7, 4)='$year'"); // Update table when visited

}

// Insert OS Information //////////////////
if (eregi ("win", $browser)) {
	
	$os = "Windows";
	
}

if (eregi ("mac", $browser)) { // If browser header contains values which contain MAC then the OS must be a MAC
							   // Add OS' as required.
	$os = "Mac";
	
}

if (eregi ("linux", $browser)) { 
	
	$os = "Linux";
	
}

if (eregi ("OS/2", $browser)) { 
	
	$os = "OS/2";
	
}

if (eregi ("BeOS", $browser)) { 
	
	$os = "BeOS";
	
}

if (eregi ("unix", $browser) | eregi ("SunOS", $browser) | eregi ("FreeBSD", $browser) | eregi ("IRIX", $browser) | eregi ("HP-UX", $browser) | eregi ("OSF", $browser) | eregi ("AIX", $browser)) { 
	
	$os = "Unix";
	
}

if (isset ($os)) {

	$oscheck = mysql_num_rows (mysql_query ("SELECT os FROM stats_os WHERE os='$os'"));
	
	if ($oscheck == 0) {
		
		mysql_query ("INSERT INTO stats_os (os, hits) VALUES ('$os', '1')");
		
	} else { // To prevent inaccurate results only IP's which are unique update the OS hits
		
		$checkunique = mysql_num_rows (mysql_query ("SELECT ip FROM stats_visitors WHERE ip='$ip'"));
		
		if ($checkunique == 0) { // If IP is unique then update the records
		
			$hitso = mysql_fetch_array (mysql_query ("SELECT hits FROM stats_os WHERE os='$os'"));
			$oshits = $hitso['hits'] + 1;
			mysql_query ("UPDATE stats_os SET hits='$oshits' WHERE os='$os'");
			
		}
		
	}
	
}

// Insert Browser Information /////////////
if (eregi ("msie", $browser)) { 
	
	$browser = "Internet Explorer";
	
}

if (eregi ("konqueror", $browser)) { 
	
	$browser = "Konqueror";
	
}

if (eregi ("icab", $browser)) { 
	
	$browser = "iCab";
	
}

if (eregi ("Firefox", $browser)) { // If the browser header contains FIREFOX then the browser must be FIREFOX
								   // Add browser's as needed
	$browser = "Firefox";
	
}

if (eregi ("mozilla", $browser)) { 
	
	$browser = "Mozilla";
	
}

if (eregi ("libwww", $browser)) { 
	
	$browser = "Lynx";
	
}

if (eregi ("netscape", $browser)) { 
	
	$browser = "Netscape";
	
}

if (eregi ("safari", $browser)) { 
	
	$browser = "Safari";
	
}

if (eregi ("AOL", $browser)) { 
	
	$browser = "AOL";
	
}

if (isset ($browser)) {

	$browsercheck = mysql_num_rows (mysql_query ("SELECT browser FROM stats_browser WHERE browser='$browser'"));
	
	if ($browsercheck == 0) {
		
		mysql_query ("INSERT INTO stats_browser (browser, hits) VALUES ('$browser', '1')");
		
	} else { // To prevent inaccurate results only IP's which are unique update the browser hits
	
		$checkunique = mysql_num_rows (mysql_query ("SELECT ip FROM stats_visitors WHERE ip='$ip'"));
		
		if ($checkunique == 0) { // If IP is unique then update the records
		
			$hitsb = mysql_fetch_array (mysql_query ("SELECT hits FROM stats_browser WHERE browser='$browser'"));
			$browserhits = $hitsb['hits'] + 1;
			mysql_query ("UPDATE stats_browser SET hits='$browserhits' WHERE browser='$browser'");
			
		}
		
	}
	
}

// Insert Visitor Information /////////////
$visitorcheck = mysql_num_rows (mysql_query ("SELECT subdate FROM stats_visitors WHERE SUBSTRING(subdate, 1, 2)='$day'")); // Check if visitor has visited today

if ($visitorcheck == 0) {

	mysql_query ("TRUNCATE TABLE stats_visitors"); // Empty table if more than a day old
	
}

$checkip = mysql_num_rows (mysql_query ("SELECT ip FROM stats_visitors WHERE ip='$ip'")); // Check if visitor is present in table

if ($checkip == 0) {

	mysql_query ("INSERT INTO stats_visitors (subdate, ip) VALUES ('$date', '$ip')"); // Insert visitor information

}

// Insert Referer Information /////////////
if (isset ($refer)) {

	$referercheck = mysql_num_rows (mysql_query ("SELECT * FROM stats_referer WHERE referer='$refer'"));
	
	if ($referercheck == 0) {
	
		mysql_query ("INSERT INTO stats_referer (referer, hits) VALUES ('$refer', '1')");
		
	} else {
	
		$getrefererhits = mysql_fetch_array (mysql_query ("SELECT * FROM stats_referer WHERE referer='$refer'"));
		
		$refererhits = $getrefererhits['hits'] + 1;
	
		mysql_query ("UPDATE stats_referer SET hits='$refererhits' WHERE referer='$refer'");
		
	}
	
}
?>
<a href="analysis/summary.php" target="_blank">view stat</a>
