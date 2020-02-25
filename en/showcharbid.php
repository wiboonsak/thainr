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
	$query ="SELECT * FROM  `tbl_rubber_bidding`    WHERE datex    =  '$StartDate'   AND language='2' AND id ='$id' LIMIT 0,1 ";
	$resultData = mysql_query($query);

  $n=1;
while($data=mysql_fetch_assoc($resultData)){ 	
		$topic[$n]= $data['remark'];
		$price[$n]=$data['price'];			
  $n++;
}  
 //Create an XML data document in a string variable
   $strXML  = "";
   $strXML .= "<chart encoding='windows-874' caption='Bidding Price'  xAxisName='$StartDate'  yAxisName='' showValues='0'    formatNumberScale='0' showBorder='1' >";
	for($i=1;$i<$n;$i++){   
  $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='".$topic[$i]." \n $StartDate ' value='".$price[$i]."' />";
   $strXML .= "<set label='' value='' />";    
	}
	 $strXML .= "</chart>";
   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   echo renderChartHTML("../FusionCharts/Column3D.swf", "", $strXML, "myNext", 600, 320, false);
?>
</BODY>
</HTML>
<?php mysql_close($link);?>