<?php session_start();
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
	include("../Includes/FusionCharts.php");
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	

	

//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.

?>

<HTML>
   <HEAD>
      <TITLE>Chart</TITLE> 
   <meta http-equiv="Content-Type" content="text/html; charset=windows-874"></HEAD>
<BODY>

<?php
	$query ="SELECT *   FROM   tbl_rubber_offer   WHERE date_update  =  '$StartDate'   AND language='2'  ORDER BY date_update DESC  LIMIT 0,1 ";
	$resultData = mysql_query($query);

   //Create an XML data document in a string variable
   $strXML  = "";
   $strXML .= "<chart encoding='windows-874' caption='Offer Price'  xAxisName=''  yAxisName='Unit : Bath/Kg' showValues='0'    formatNumberScale='0' showBorder='1' >";
while($data=mysql_fetch_assoc($resultData)){ 								
   $strXML .= "<set label='Rubber Bale \n bkk' value='".$data['cake_rubber_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='Rubber Bale  \n sk/pk' value='".$data['cake_rubber_02']."' />";
   $strXML .= "<set label='' value='' />";   
     $strXML .= "<set label='' value='' />";   
   $strXML .= "<set label='STR 20 \n bkk' value='".$data['STR_20_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='STR 20 \n sk/pk' value='".$data['STR_20_02']."' />";
   $strXML .= "<set label='' value='' />";      
     $strXML .= "<set label='' value='' />";   
   $strXML .= "<set label='STR 5L \n bkk' value='".$data['STR_5L_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='STR 5L \n sk/pk' value='".$data['STR_5L_02']."' />";
   $strXML .= "<set label='' value='' />";    
  $strXML .= "<set label='' value='' />";  
   $strXML .= "<set label='Latex \n bkk' value='".$data['liquid_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='Latex \n sk/pk' value='".$data['liquid_02']."' />";
   $strXML .= "<set label='' value='' />";      

}

   $strXML .= "</chart>";

   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   echo renderChartHTML("../FusionCharts/Column3D.swf", "", $strXML, "myNext", 850, 300, false);
?><br>
Chart  	<?php echo GetEngDate($StartDate); ?>
</BODY>
</HTML>
<?php mysql_close($link);?>