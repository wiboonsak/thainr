<?php
			//-----------------------------------------------------------------------------------------------------------------------------
		if($selectMonth=="selectMonth"){  
				$selectmonth=  $ChMonth;  $selectyear=  $ChYear; 
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		$currMonth = date("m",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));
		$currYear = date("Y",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
		$currdate = date("d",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
		if($currdate > 28){
			$rangDate=5;
		}else{
			$rangDate=0;
		}
		if($yearPlus=='subtract'){
					$_SESSION['yearVarLocal']=$_SESSION['yearVarLocal']-1;
		}else if($yearPlus=='Add'){
					$_SESSION['yearVarLocal']=$_SESSION['yearVarLocal']+1;
		}else if($yearPlus=='Nothing'){
					$_SESSION['yearVarLocal']=0;
		}
		//-------------select year from select box
		if($chooseyear=="select"){
		//	echo $chooseyear."  selectY".$selectY."<br>";
			$_SESSION['yearVarLocal'] = $_SESSION['yearVarLocal']+$selectY;
		}
			//	echo "$ _ SESSION [' yearVarOffer ']  >> ".$_SESSION['yearVarOffer']."   selectY  >>".$selectY;
		if($selectmonth){
			 $rangeMonth= $selectmonth-$currMonth;
		}else{
			$rangeMonth= 0;
		}
		 $rangeYear= $_SESSION['yearVarLocal'];	
		
		$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		///echo "numDayOfMonth".$numDayOfMonth."<br>";
		$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
				$dateArray = explode("-",$today);
				$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
				$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		
		//echo "Range= ".$rangeYear." StartDate >>  ".$StartDate."   >>>  StopDate ".$StopDate;
		//-----------------------------------------------------------------------------------------------------------------------------	
		$query ="SELECT *   FROM   tbl_rubber_price  WHERE (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' )  AND language='$lang'    ORDER BY date_update DESC  ";
		$resultData = mysql_query($query);
		//echo "<hr>".$query."<hr>";

		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		$nameYear = $YName+543;
		///echo "<br>nameYear>>>".$nameYear;
		$nameMonth = $monthnames2[$dateArray[1]];

?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<style type="text/css">
<!--
body {
	background-color: #D7EFF9;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>ราคาเสนอซื้อยางพารา</title>
<style type="text/css">
<!--
.style4 {
	font-size: 36px;
	color: #006699;
}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_price.php"); ?></td>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="76"><img src="images/inside/h-title_01.gif" alt="message" width="76" height="56"></td>
          <td align="left" background="images/inside/h-message_bg.gif"><img src="images/inside/h-price-local_02.gif" alt="history" width="388" height="56"></td>
          <td width="26"><img src="images/inside/h-message_09.gif" alt="message" width="26" height="56"></td>
        </tr>
      </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="9">&nbsp;</td>
            <td width="7" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="713" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="15" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="9" rowspan="3">&nbsp;</td>
            <td rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF" class="FontMS10"><p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p class="style4">UNDER CONSTRUCTION</p>
              <p><strong>ท่านสามารถตรวจสอบราคาได้ที่&nbsp;&nbsp; <a href="http://www.rubberthai.com/rubberthai/" target="_blank">http://www.rubberthai.com/rubberthai/</a>&nbsp;
              </strong></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
            <td rowspan="3" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF" class="FontMS10"></td></tr>
          <tr>
            <td align="left" bgcolor="#FFFFFF" class="FontMS10">			</td>
          </tr>
        </table>
        <p class="FontMS10"><br>
      </p>
        <p></p>
      </td>
    </tr>
  </table>
</center>
</body>