<?php
			//-----------------------------------------------------------------------------------------------------------------------------
/*		if($selectMonth=="selectMonth"){  
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
		if(!isset($_GET['selectY'])){ $_GET['selectY']=date("Y");}
		if(!isset($_GET['selectMonth'])){ $_GET['selectMonth']=date("m");}
		
		$selectDay= $_GET['selectY']."-".$_GET['selectMonth']."-01";
		
		$numDayOfMonth=cal_days_in_month(CAL_GREGORIAN,$_GET['selectMonth'],$_GET['selectY']);
		*/
			//-----------------------------------------------------------------------------------------------------------------------------		
		if(!isset($_GET['selectY'])){ $_GET['selectY']=date("Y");}
		if(!isset($_GET['selectMonth'])){ $_GET['selectMonth']=date("m");}
		$selectDay= $_GET['selectY']."-".$_GET['selectMonth']."-01";
		$numDayOfMonth=cal_days_in_month(CAL_GREGORIAN,$_GET['selectMonth'],$_GET['selectY']);
		$StartDate=$selectDay;
		$StopDate = $_GET['selectY']."-".$_GET['selectMonth']."-".$numDayOfMonth;
		$nameYear= $_GET['selectY']+543;
		//-----------------------------------------------------------------------------------------------------------------------------	
		$query ="SELECT *   FROM   tbl_rubber_price  WHERE (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' )  AND language='$lang'    ORDER BY date_update DESC  ";
		$resultData = mysql_query($query);
		//echo "<hr>".$query."<hr>";

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
<title>ราคาเสนอซื้อยางพารา</title>
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
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-local-price.jpg" alt="history" width="341" height="80"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="27" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="16" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td rowspan="5" align="center" valign="top" bgcolor="#FFFFFF"><form action="" name="formA" method="get">
              <table width="120" border="0" cellspacing="0" cellpadding="0" class="FontMS10 radius_news">
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
                  <td height="21" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">เลือกปี</strong></td>
                  </tr>
                <tr>
                  <td height="37" align="center"><select name="selectY">
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
                  <td height="25" align="center"><input type="submit" value="GO"></td>
                  </tr>
                </table>
              <input type="hidden" name="detail" value="<?php echo $_GET['detail']?>">
              &nbsp;
            </form>&nbsp;</td>
            <td width="257" height="30" align="center" bgcolor="#336699" class="FontMS10">&nbsp;</td>
            <td width="364" align="left" bgcolor="#336699" class="FontMS10"><span class="style1"><?php echo $monthnames2[$_GET['selectMonth']]?>&nbsp;<?php echo $nameYear ?></span></td>
            <td width="138" align="center" bgcolor="#336699" class="FontMS10"><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>"><span class="style1">[เลือกปีปัจจุบัน]</span></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#FFFFFF" class="FontMS10"><strong>หน่วย : บาท/กิโลกรัม&nbsp;
            </strong></td>
            <td rowspan="3" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#FFFFFF" class="FontMS10"></td></tr>
          <tr>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS10">
              <a href="../thainr_graph/viewchart.php?StartDate=<?php echo $StartDate?>&StopDate=<?php echo $StopDate?>&lang=<?php echo $lang?>" target="_blank" ><img src="statistics_24x24.gif" border="0"> แสดงผลในรูปแบบกราฟเส้น </a>
              
              <!--<a href="../thainr_graph2/monthly_local.php?StartDate=<?php echo $StartDate?>&StopDate=<?php echo $StopDate?>&lang=<?php echo $lang?>" target="_blank" ><img src="statistics_24x24.gif" border="0"> แสดงผลในรูปแบบกราฟเส้น </a> -->
            </td>
          </tr>
          <tr>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS10"><TABLE width="100%" border="0" cellpadding="2" cellspacing="1" class="FontMS10">
              <TBODY>
                <TR bgColor="#ffcc99">
                  <TD width="49" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>วันที่</strong></TD>
                  <TD height="20" colSpan="8" align="center" bgcolor="#694623" class="style2"><strong>ยางแผ่นดิบ</strong></DIV class="style2"></DIV class="style2"></DIV class="style2"></DIV class="style2"></TD>
                  <TD width="59" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>ยางลูกขุน</strong></TD>
                  <TD width="69" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>ขี้ยางก้อนถ้วย</strong></TD>
                  <TD width="51" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>น้ำยาง</strong></TD>
                  </TR>
                <TR>
                  <TD width="48" height="33" align="center" bgColor="#694623" class="style2"><strong>หาดใหญ่</strong></TD>
                  <TD width="60" height="33" align="center" bgColor="#694623" class="style2"><strong>คลองแงะ</strong></TD>
                  <TD width="33" height="33" align="center" bgColor="#694623" class="style2"><strong>ตรัง</strong></TD>
                  <TD width="43" height="33" align="center" bgColor="#694623" class="style2"><strong>ภูเก็ต</strong></TD>
                  <TD width="71" height="33" align="center" bgColor="#694623" class="style2"><strong>สุราษฎร์ธานี</strong></TD>
                  <TD width="54" height="33" align="center" bgColor="#694623" class="style2"><strong>ระยอง</strong></TD>
                  <TD width="68" height="33" align="center" bgColor="#694623" class="style2"><strong>อุบลราชธานี</strong></TD>
                  <TD width="47" align="center" bgcolor="#694623" class="style2"><strong>เฉลี่ย</strong></TD>
                  </TR>
                <?php $count=0; while($data=mysql_fetch_assoc($resultData)){ 
									if(!$dateUpdate){
										$arrayDate= explode("-",$data['date_update']);
										if(($arrayDate[2]!="00")&&($arrayDate[1]!="00")&&($arrayDate[0]!="0000")){ 
										$dateUpdate= $arrayDate[2]."/".$arrayDate[1]."/".($arrayDate[0]+543);
										}
								}
								if($data['p1']!="0.00"){ $count=$count+1;}
								if($data['p2']!="0.00"){ $count=$count+1;}
								if($data['p3']!="0.00"){ $count=$count+1;}
								if($data['p4']!="0.00"){ $count=$count+1;}
								if($data['p5']!="0.00"){ $count=$count+1;}	
								if($data['p6']!="0.00"){ $count=$count+1;}	
								if($data['p7']!="0.00"){ $count=$count+1;}	
								
				?>
                <TR bgColor="#66cccc">
                  <TD height="29" align="center">
                    <!--<a href="#" onClick="window.open('showchart.php?StartDate=<?php echo $data['date_update'];?>&id=<?php echo $data['id']?>');"><img src="statistics_24x24.gif" height="34" border="0"><?php  if(substr($data['date_update'],8,2) >= 10) {  echo substr($data['date_update'],8,2);}else { echo  substr($data['date_update'],9,1);}?></a> -->
                    <a href="#" onClick="window.open('../thainr_graph2/dailygraph_local.php?StartDate=<?php echo $data['date_update'];?>&id=<?php echo $data['id']?>');"><img src="statistics_24x24.gif" height="34" border="0"><?php  if(substr($data['date_update'],8,2) >= 10) {  echo substr($data['date_update'],8,2);}else { echo  substr($data['date_update'],9,1);}?></a>				  </TD>
                  <TD height="29" align="center"><?php echo $data['p1'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p2'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p3'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p4'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p5'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p6'];?></TD>
                  <TD height="29" align="center" bgcolor="#66cccc"><?php echo $data['p7'];?></TD>
                  <TD height="29" align="center">
                    <?php  $resultSum =($data['p1']+$data['p2']+$data['p3']+$data['p4']+$data['p5']+$data['p6']+$data['p7']) / $count;
				  		echo 	number_format( $resultSum, 2, '.', '');
				  ?>				  </TD>
                  <TD height="29" align="center"><?php echo $data['p8'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p9'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p10'];?></TD>
                  </TR>
                <?php $count=0; } ?>
                <TR>
                  <TD borderColor="#cccccc" colSpan="12" height="28"><p><strong>หมายเหตุ :   </strong>ราคายางตลาดท้องถิ่นของประเทศไทย   ที่ปรากฏทางจอภาพแสดงให้เห็น   แต่ละวัน   เป็นราคาที่สมาคมยางพาราไทย   ได้สอบถามจากบริษัทสมาชิก    2-5 บริษัท/วัน<br>
                    <strong>ที่มา : </strong>สมาคมยางพาราไทย<strong><br>
                    Update : </strong><?php echo $dateUpdate;?></p></TD>
                  </TR>
                </TBODY>
            </TABLE></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10"><br>
              <?php /*?> <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
			  เลือกปี  
			    <select name="selectY">
						<?php
						$kons = 8;
						 for($i=1;$i < 11 ; $i++){ 
						 $xyear=$dateArray[0]+($i-$kons)+543;
						 $eyear = $dateArray[0]+($i-$kons);
						 ?>
								<option value="<?php echo ($i-$kons)?>" <?php if($dateArray[0]==$eyear) { echo "selected";}?>>
								<?php echo $xyear?></option>
						<?php } ?>
		        </select> 
			    &nbsp;
				<input name="chooseyear" type="hidden" >
		        <input type="button" name="Button" value=" ตกลง " onClick="form1.chooseyear.value='select';form1.submit(); ">
		        <br>
			<!--  <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract"?>"><img src="images/pre.gif" alt="prev <?php echo $nameYear -1?>" width="16" height="16" hspace="5" border="0" align="absbottom"> </a> -->
                <?php   while (list($key, $value) = each($monthnames2)) {  ?>
                <?php echo "<a href='".$_SERVER['PHP_SELF']."?detail=$detail&selectmonth=$key'>$value</a>"; ?>
                <?php if($key!="12"){ echo "|";} ?>
                <?php 	}	?>
            <!--<a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Add"?>"> <img src="images/next.gif" alt="next <?php echo $nameYear+1?>" width="16" height="16" hspace="5" border="0" align="absbottom"> </a> -->
			</form>
			<?php */?>
              </td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
       
      </td>
    </tr>
  </table>
</center>
</body>