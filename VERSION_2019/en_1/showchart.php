<?php session_start();
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
	include("../Includes/FusionCharts.php");
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	

	$lang=2;

//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.

?>

<HTML>
   <HEAD>
      <TITLE>Chart</TITLE> 
   <meta http-equiv="Content-Type" content="text/html; charset=windows-874"></HEAD>
<BODY>

<?php
	$query ="SELECT  *   FROM   tbl_rubber_price  WHERE date_update  =  '$StartDate'  AND language='2' AND id = '$id' ORDER BY date_update DESC  LIMIT 0 , 1 ";
	$resultData = mysql_query($query);
   //Create an XML data document in a string variable
   $strXML  = "";
   $strXML .= "<chart encoding='windows-874' caption='local price'  xAxisName=''  yAxisName='Unit : Bath/Kg' showValues='0'    formatNumberScale='0' showBorder='1' >";
while($data=mysql_fetch_assoc($resultData)){ 								
   $strXML .= "<set label='Hat yai' value='".$data['p1']."' />";
   $strXML .= "<set label='Khlong Nga' value='".$data['p2']."' />";
   $strXML .= "<set label='Trang' value='".$data['p3']."' />";
   $strXML .= "<set label='Phuket' value='".$data['p4']."' />";
   $strXML .= "<set label='Surat-thani' value='".$data['p5']."' />";
   $strXML .= "<set label='Rayong' value='".$data['p6']."' />";
   $strXML .= "<set label='Ubon-ratchatani' value='".$data['p7']."' />";
   $strXML .= "<set label='average' value='".round((($data['p1']+$data['p2']+$data['p3']+$data['p4']+$data['p5']+$data['p6']) / 6),2)."' />";
   $strXML .= "<set label='RSS Bale 3' value='".$data['p8']."' />";
   $strXML .= "<set label='Cup Lump' value='".$data['p9']."' />";
   $strXML .= "<set label='Field Latex' value='".$data['p10']."' />";
}

   $strXML .= "</chart>";

   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   echo renderChartHTML("../FusionCharts/Column3D.swf", "", $strXML, "myNext", 850, 300, false);
  
?><br>
Chart   
<?php GetEngDate($StartDate);?>
</BODY>
</HTML>
<?php mysql_close($link);?>