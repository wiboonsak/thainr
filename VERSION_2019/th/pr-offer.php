<?php
			//-----------------------------------------------------------------------------------------------------------------------------
	//	if($selectMonth=="selectMonth"){  
		//		$selectmonth=  $ChMonth;  $selectyear=  $ChYear; 
	//	}
		//-----------------------------------------------------------------------------------------------------------------------------	
	/*	$currMonth = date("m",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));
		$currYear = date("Y",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
		$currdate = date("d",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
		
		if($currdate > 28){
			$rangDate=5;
		}else{
			$rangDate=0;
		}
		
		if($yearPlus=='subtract'){
					$_SESSION['yearVarOffer']=$_SESSION['yearVarOffer']-1;
		}else if($yearPlus=='Add'){
					$_SESSION['yearVarOffer']=$_SESSION['yearVarOffer']+1;
		}else if($yearPlus=='Nothing'){
			$_SESSION['yearVarOffer']=0;
		}
		//-------------select year from select box
		if($chooseyear=="select"){
			$_SESSION['yearVarOffer'] = $_SESSION['yearVarOffer']+$selectY;
		}
		

		if($_GET['selectmonth']){
			 $rangeMonth= $_GET['selectmonth']-$currMonth;
		}else{
			$rangeMonth= 0;
		}
		 $rangeYear= $_SESSION['yearVarOffer'];	
		 selectY selectMonth
	*/	
		
		
	
		//$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		
	//	$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
			//	$dateArray = explode("-",$today);
		//		$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
			//	$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		
		///echo "Range= ".$rangeYear." StartDate >>  ".$StartDate."   >>>  StopDate ".$StopDate;
		//-----------------------------------------------------------------------------------------------------------------------------	
	if(!isset($_GET['selectY'])){ $_GET['selectY']=date("Y");}
		if(!isset($_GET['selectMonth'])){ $_GET['selectMonth']=date("m");}
		
		$selectDay= $_GET['selectY']."-".$_GET['selectMonth']."-01";
		
		$numDayOfMonth=cal_days_in_month(CAL_GREGORIAN,$_GET['selectMonth'],$_GET['selectY']);
			$StartDate=$selectDay;
		$StopDate = $_GET['selectY']."-".$_GET['selectMonth']."-".$numDayOfMonth;
		$nameYear= $_GET['selectY']+543;
	
//-----------------------------------------------------------------------------------------------------------------------------			
		$query ="SELECT * FROM   tbl_rubber_offer  WHERE (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' ) AND language='$lang'  ORDER BY date_update DESC  ";
		$resultData = mysql_query($query);
//	echo "<hr>".$query."<hr>";

		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		//$nameYear = $YName+543;
		///echo "<br>nameYear>>>".$nameYear;
		$nameMonth = $monthnames2[$dateArray[1]];

		 	
		
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>ราคาเสนอขายยางพารา</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td width="877" height="50" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-offerprice.jpg" alt="history" width="341" height="80"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="120" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="120" rowspan="3" align="center" valign="top" bgcolor="#FFFFFF"><form action="" name="formA" method="get">
              <table width="120" border="0" cellspacing="0" cellpadding="0"  class="FontMS10 radius_news">
                <tr>
                  <td height="25" align="center" bgcolor="#6A8A09"><strong class="txt-white">เลือกเดือน</strong></td>
                  </tr>
                <tr>
                  <td height="35" align="center"><select name="selectMonth" id="selectMonth">
                    <?php   while (list($key, $value) = each($monthnames2)) { ?>
                    <option value="<?php echo $key?>" <?php if($_GET['selectMonth']==$key){ echo "selected"; }?>><?php echo $value?></option>
                    <?php } ?>
                    </select></td>
                  </tr>
                <tr>
                  <td height="10" align="center"></td>
                  </tr>
                <tr>
                  <td height="21" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">เลือกปี</strong></td>
                  </tr>
                <tr>
                  <td height="33" align="center"><select name="selectY">
                    <?php
						$currentYear=date("Y");
						$startYear=2000;
						$range=$currentYear-$startYear;
						 for($i=0;$i <= $range ; $i++){ 
						
						 ?>
                    <option value="<?php echo $currentYear-$i?>" <?php if($_GET['selectY']==($currentYear-$i)) { echo "selected";}?>> <?php echo ($currentYear-$i)+543?></option>
                    <?php } ?>
                    </select></td>
                  </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="center"><input type="submit" value="GO"></td>
                  </tr>
                </table>
              <br>
              <input type="hidden" name="detail" value="<?php echo $_GET['detail']?>">
              &nbsp;
            </form></td>
            <td width="268" height="30" align="center" bgcolor="#336699" class="style2 FontMS10">&nbsp;</TD>
            <td width="277" align="left" bgcolor="#336699" class="style2 FontMS10"><span class="style1"><?php echo $monthnames2[$_GET['selectMonth']]?> &nbsp;<?php echo $nameYear ?></span></TD>
            <td width="137" align="center" bgcolor="#336699" class="style2 FontMS10"><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>"><span class="style1">[เลือกปีปัจจุบัน]</span></a></TD>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#FFFFFF" class="FontMS10"><strong>หน่วย :   บาท/กิโลกรัม&nbsp; </strong></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS10"><TABLE width="100%" height="75" border="0" cellPadding="3" cellSpacing="2" class="FontMS10">
              <TBODY>
                <TR>
                  <TD width="9%" rowSpan="2" align="center" bgColor="#694623" class="style2"><strong>
                    วันที่</strong></TD>
                  <TD height="30" colSpan="2" align="center" bgColor="#694623" class="style2"><strong>
                    ยางลูกขุน</strong></TD>
                  <TD colSpan="2" align="center" bgColor="#694623" class="style1">
                    ยางแท่ง
                    STR 20</TD>
                  <TD colSpan="2" align="center" bgColor="#694623" class="style1">
                    ยางแท่ง
                    STR 5L</TD>
                  <TD colSpan="2" align="center" bgColor="#694623" class="style1">
                    น้ำยางข้น</TD>
                  </TR>
                <TR>
                  <TD width="10%" height="24" align="center" bgColor="#694623" class="style2"><strong>กทม.</strong></TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">สข./ภก.</TD>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style1">กทม.</TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">สข./ภก.</TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">กทม.</TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">สข./ภก.</TD>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style1">กทม.</TD>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style1">สข./ภก.</TD>
                  </TR>
                <?php while($data=mysql_fetch_assoc($resultData)){ 
									if(!$dateUpdate){
										$arrayDate= explode("-",$data['date_update']);
										if(($arrayDate[2]!="00")&&($arrayDate[1]!="00")&&($arrayDate[0]!="0000")){ 
										$dateUpdate= $arrayDate[2]."/".$arrayDate[1]."/".($arrayDate[0]+543);
										}
								}
				?>
                <TR>
                  <TD bgColor="#66cccc" height="30" align="center">
                    <!-- <a href="#" onClick="window.open('showchartOffer.php?StartDate=<?php echo $data['date_update'];?>');">
				  <img src="statistics_24x24.gif" border="0"> -->
                    <a href="#" onClick="window.open('../thainr_graph2/dailygraph_offer.php?StartDate=<?php echo $data['date_update'];?>&id=<?php echo $data['id']?>');">
                      <img src="statistics_24x24.gif" border="0">
                      <?php  if(substr($data['date_update'],8,2) >= 10) {  echo substr($data['date_update'],8,2);}else { echo  substr($data['date_update'],9,1);}?>
                    </a>				  </TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['cake_rubber_01']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['cake_rubber_02']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['STR_20_01']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['STR_20_02']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['STR_5L_01']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['STR_5L_02']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['liquid_01']?></TD>
                  <TD bgColor="#66cccc" height="30" align="left"><?php echo $data['liquid_02']?></TD>
                  </TR>
                <?php }?>
                <TR borderColor="#ffffff">
                  <TD colSpan="9"><br>
                    <p>&nbsp;</p>
                    <p><strong>ที่มา :  </strong>สมาคมยางพาราไทย<BR>
                      <strong>หมายเหตุ</strong> : ราคายาง FOB ที่ปรากฏทางจอภาพแสดงให้เห็นแต่ละวัน เป็นราคาที่สมาคมยางพาราไทยได้สอบถามจากบริษัทสมาชิก 2-5 บริษัท/วัน<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; กทม. =  กรุงเทพมหานคร<BR>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; สข./ภก. = สงขลา/ภูเก็ต</p></TD>
                  </TR>
                <TR borderColor="#ffffff">
                  <TD colSpan="9" height="23"><p align="left"><strong>Update : </strong><?php echo $dateUpdate;?></p></TD>
                  </TR>
                </TBODY>
            </TABLE></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="120" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10">
              <p>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1"></form>
              </p>
              </td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="120" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
       
      </td>
    </tr>
  </table>
</center>
</body>