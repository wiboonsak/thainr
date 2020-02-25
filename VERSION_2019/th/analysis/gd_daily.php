<?php

include ("../config.php");

$month = date ("m");
$month_name = date ("F");

$result = mysql_query ("SELECT * FROM stats_daily WHERE SUBSTRING(subdate, 4, 2)='$month'");
$numrows = mysql_num_rows ($result);

if ($numrows != 0) {

	$totalrow = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS total FROM stats_daily WHERE SUBSTRING(subdate, 4, 2)='$month'"));
	
	$max = mysql_fetch_array (mysql_query ("SELECT MAX(hits + 0) AS largest FROM stats_daily"));
	$highest = ($max['largest'] / 10);
	$highest = ceil ($highest);
	$highest = $highest * 10;

	$threequarters = round ($highest * 0.75);
	$halfway = round ($highest * 0.5);
	$quarter = round ($highest * 0.25);

	header ("Content-Type: image/PNG");

	$im = imagecreate (525, 275);

	$bg = imagecolorallocate ($im, 204, 204, 204); // BG colour
	$line = imagecolorallocate ($im, 0, 0, 0); // Line colour
	$bar = imagecolorallocate ($im, 0, 153, 255); // Bar colour
	$highlight = imagecolorallocate ($im, 255, 0, 0); // Highlighted bar colour

	imagefill ($im, 0, 0, $bg);

	imageline ($im, 40, 25, 40, 225, $line); // Y-Axis
	imageline ($im, 40, 225, 510, 225, $line); // X-Axis

	imageline ($im, 35, 25, 510, 25, $line); // Line at Y = 100
	imagestring ($im, 2, 5, 17, "$highest", $line);

	imageline ($im, 35, 75, 510, 75, $line); // Line at Y = 75
	imagestring ($im, 2, 5, 68, "$threequarters", $line);

	imageline ($im, 35, 125, 510, 125, $line); // Line at Y = 50
	imagestring ($im, 2, 5, 120, "$halfway", $line);

	imageline ($im, 35, 175, 510, 175, $line); // Line at Y = 25
	imagestring ($im, 2, 5, 169, "$quarter", $line);

	imageline ($im, 40, 225, 35, 225, $line); // Line at Y = 0
	imagestring ($im, 2, 5, 219, "0", $line);

	imageline ($im, 40, 225, 40, 233, $line); //Line at X = 0

while ($myrow = mysql_fetch_array ($result)) {

		if ($myrow['hits'] != 0) {
			
			$height = round (225 - (($myrow['hits'] / $highest) * 200));
			
		} else {
		
			$height = 225;
			
		}
	
		$ximage = 40 + (15 * substr ($myrow['subdate'], 0, 2));
		imageline ($im, $ximage, 225, $ximage, 230, $line);
		imagestring ($im, 2, $ximage - 5, 235, substr ($myrow['subdate'], 0, 2), $line);
	
		if (substr ($myrow['subdate'], 0, 2) == date ("d")) {
		
			imagestring ($im, 2, $ximage - 5, 235, substr ($myrow['subdate'], 0, 2), $highlight);
			imagefilledrectangle ($im, $ximage - 2, $height, $ximage + 2, 225, $highlight);
			
		} else {
	
			imagestring ($im, 2, $ximage - 5, 235, substr ($myrow['subdate'], 0, 2), $line);
			imagefilledrectangle ($im, $ximage - 2, $height, $ximage + 2, 225, $bar);
		
		}
		
		if ($myrow['hits'] != 0) {
		
			imagestringup ($im, 2, $ximage - 7, $height - 5, $myrow['hits'], $highlight);
			
		}

	}

	imagestring ($im, 4, 180, 255, "Daily Hits in $month_name", $line);

	imagepng ($im);

}

?>