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
	$query ="SELECT *   FROM   tbl_rubber_offer   WHERE date_update  =  '$StartDate' AND language='1'   ORDER BY date_update DESC LIMIT 0,1 ";
	$resultData = mysql_query($query);
	$StartDate = GetThaiDate($StartDate);
   //Create an XML data document in a string variable
   $strXML  = "";
   $strXML .= "<chart encoding='windows-874' caption='�Ҥ��ʹ͢���ҧ'  xAxisName=''  yAxisName='Unit : Bath/Kg' showValues='0'    formatNumberScale='0' showBorder='1' >";
while($data=mysql_fetch_assoc($resultData)){ 								
   $strXML .= "<set label='�ҧ��͹\n���' value='".$data['cake_rubber_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='�ҧ��͹ \nʢ./��.' value='".$data['cake_rubber_02']."' />";
   $strXML .= "<set label='' value='' />";   
     $strXML .= "<set label='' value='' />";   
   $strXML .= "<set label='�ҧ�� STR 20 \n ���' value='".$data['STR_20_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='�ҧ�� STR 20 \n ʢ./��.' value='".$data['STR_20_02']."' />";
   $strXML .= "<set label='' value='' />";      
     $strXML .= "<set label='' value='' />";   
   $strXML .= "<set label='�ҧ�� STR 5L \n ���' value='".$data['STR_5L_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='�ҧ�� STR 5L \n ʢ./��' value='".$data['STR_5L_02']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='����ҧ�� \n ���' value='".$data['liquid_01']."' />";
   $strXML .= "<set label='' value='' />";    
   $strXML .= "<set label='����ҧ�� \n ʢ./��' value='".$data['liquid_02']."' />";
   $strXML .= "<set label='' value='' />";      

}

   $strXML .= "</chart>";

   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   echo renderChartHTML("../FusionCharts/Column3D.swf", "", $strXML, "myNext", 850, 300, false);
?>
</BODY>
</HTML>
<?php mysql_close($link);?>