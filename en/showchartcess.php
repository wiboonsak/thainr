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
	$query ="SELECT * FROM `tbl_rubber_cess`    WHERE  id ='$id'  AND language='2' ";
	
	$resultData = mysql_query($query);
   //Create an XML data document in a string variable
   $strXML  = "";
   $strXML .= "<chart encoding='windows-874' caption='Rubber Price Basis For Cess Calculation '  xAxisName=''  yAxisName='' showValues='0'    formatNumberScale='0' showBorder='1' >";
while($data=mysql_fetch_assoc($resultData)){ 	
			
   $strXML .= "<set label='1-15 \n Price' value='".$data['1_15_price']."' />";
   $strXML .= "<set label='1-15 \n Cess' value='".$data['1_15_cess']."' />";
   $strXML .= "<set label='' value='' />";   
   $strXML .= "<set label='16-31 \n Price' value='".$data['16_31_price']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='16-31 \n Cess' value='".$data['16_31_cess']."' />";
   $strXML .= "<set label='' value='' />";      

}

   $strXML .= "</chart>";

   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   echo renderChartHTML("../FusionCharts/Column3D.swf", "", $strXML, "myNext", 700, 320, false);
?>
</BODY>
</HTML>
<?php mysql_close($link);?>