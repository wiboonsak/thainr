<?php
			//-----------------------------------------------------------------------------------------------------------------------------
	/*	if($selectMonth=="selectMonth"){  
				$selectmonth=  $ChMonth;  $selectyear=  $ChYear; 
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		$currMonth = date("m",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));
		$currYear = date("Y",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
			$currMonth = date("m",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));
		if($selectmonth){
			 $rangeMonth= $selectmonth-$currMonth;
		}else{
			$rangeMonth= 0;
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
			//echo $chooseyear."  selectY".$selectY."<br>";
			$_SESSION['yearVarLocal'] = $_SESSION['yearVarLocal']+$selectY;
		}
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
		
		///echo "Range= ".$rangeYear." StartDate >>  ".$StartDate."   >>>  StopDate ".$StopDate;
		*/
				//-----------------------------------------------------------------------------------------------------------------------------		
		if(!isset($_GET['selectY'])){ $_GET['selectY']=date("Y");}
		if(!isset($_GET['selectMonth'])){ $_GET['selectMonth']=date("m");}
		$selectDay= $_GET['selectY']."-".$_GET['selectMonth']."-01";
		$numDayOfMonth=cal_days_in_month(CAL_GREGORIAN,$_GET['selectMonth'],$_GET['selectY']);
		$StartDate=$selectDay;
		$StopDate = $_GET['selectY']."-".$_GET['selectMonth']."-".$numDayOfMonth;
		$nameYear= $_GET['selectY'];
		//-----------------------------------------------------------------------------------------------------------------------------	
		//$query ="SELECT *   FROM   tbl_rubber_price  WHERE  (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' ) AND language='$lang' ORDER BY date_update DESC  ";
		$query ="SELECT *   FROM   tbl_rubber_price  WHERE  (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' ) ORDER BY date_update DESC  ";		
		$resultData = mysql_query($query);
		//echo "<hr>".$query."<hr>";

		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		//$nameYear = $YName;
		///echo "<br>nameYear>>>".$nameYear;
		$nameMonth = $monthnames2[$dateArray[1]];

		 	
		
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-local-price.jpg" alt="history" width="341" height="80" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="100" rowspan="4" align="center" valign="top" nowrap="nowrap" bgcolor="#FFFFFF"  class="FontMS10"><form action="" name="formA" method="get">
              <table width="120" border="0" cellspacing="0" cellpadding="0"  class="FontMS10 radius_news">
                <tr class="FontMS10 radius_news">
                  <td height="25" align="center" bgcolor="#6A8A09"><strong class="txt-white">Select month</strong></td>
                  </tr>
                <tr align="center">
                  <td height="35"><select name="selectMonth" id="selectMonth">
                    <?php   while (list($key, $value) = each($monthnames2)) { ?>
                    <option value="<?php echo $key?>" <?php if($_GET['selectMonth']==$key){ echo "selected"; }?>><?php echo $value?></option>
                    <?php } ?>
                    </select></td>
                  </tr>
                <tr class="FontMS10 radius_news">
                  <td height="24" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">Select year</strong></td>
                  </tr>
                <tr align="center">
                  <td height="35"><select name="selectY" id="selectY">
                    <?php
						$currentYear=date("Y");
						$startYear=2000;
						$range=$currentYear-$startYear;
						 for($i=0;$i <= $range ; $i++){ 
						
						 ?>
                    <option value="<?php echo $currentYear-$i?>" <?php if($_GET['selectY']==($currentYear-$i)) { echo "selected";}?>> <?php echo ($currentYear-$i);?></option>
                    <?php } ?>
                    </select></td>
                  </tr>
                <tr align="center">
                  <td height="35"><input type="submit" value="GO"></td>
                  </tr>
                </table>
              <br>
              <input type="hidden" name="detail" value="<?php echo $_GET['detail']?>">
              &nbsp;
            </form></td>
            <td width="243" height="30" align="center" bgcolor="#336699" class="FontMS10">&nbsp;</td>
            <td width="409" align="left" bgcolor="#336699" class="FontMS10"><span class="style1"><?php echo $monthnames2[$_GET['selectMonth']]?> <?php echo $nameYear ?></span></td>
            <td width="147" align="center" bgcolor="#336699" class="FontMS10"><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>"><span class="style1">[Current Year]</span></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#FFFFFF" class="FontMS10"><!--<img src="../th/images/graph.jpg" alt="Graph" width="128" height="128" align="absmiddle"><br>
แสดงผลในรูปแบบกราฟ -->
            <strong>Unit : Baht/Kilogram&nbsp;</strong></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS10"><a href="../thainr_graph/viewchart.php?StartDate=<?php echo $StartDate?>&StopDate=<?php echo $StopDate?>&lang=<?php echo $lang?>" target="_blank" ><img src="../th/statistics_24x24.gif" border="0"> Line graph </a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS10"><TABLE width="100%" border="0" cellpadding="2" cellspacing="1" class="FontMS10">
              <TBODY>
                <TR bgColor="#ffcc99">
                  <TD width="29" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>Date</strong></TD>
                  <TD height="20" colSpan="8" align="center" bgcolor="#694623" class="style2"><strong>USS</strong>
                    </DIV class="style2">
                    </DIV class="style2">
                    </DIV class="style2">
                    </DIV class="style2"></TD>
                  <TD width="64" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>RSS Bale 3</strong></TD>
                  <TD width="82" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>Cup Lump</strong></TD>
                  <TD width="43" rowSpan="2" align="center" bgcolor="#694623" class="style2"><strong>Field Latex</strong></TD>
                  </TR>
                <TR>
                  <TD width="59" height="33" align="center" bgColor="#694623" class="style2"><strong>Hat yai</strong></TD>
                  <TD width="62" height="33" align="center" bgColor="#694623" class="style2"><strong>Khlong Nga</strong></TD>
                  <TD width="40" height="33" align="center" bgColor="#694623" class="style2"><strong>Trang</strong></TD>
                  <TD width="40" height="33" align="center" bgColor="#694623" class="style2"><strong>Phuket</strong></TD>
                  <TD width="80" height="33" align="center" bgColor="#694623" class="style2"><strong>Surat-thani</strong></TD>
                  <TD width="42" height="33" align="center" bgColor="#694623" class="style2"><strong>Rayong</strong></TD>
                  <TD width="81" height="33" align="center" bgColor="#694623" class="style2"><strong>Ubon-ratchatani</strong></TD>
                  <TD width="40" align="center" bgcolor="#694623" class="style2"><strong>average</strong></TD>
                  </TR>
                <?php $count=0; while($data=mysql_fetch_assoc($resultData)){ 
									if(!$dateUpdate){
										$arrayDate= explode("-",$data['date_update']);
										if(($arrayDate[2]!="00")&&($arrayDate[1]!="00")&&($arrayDate[0]!="0000")){ 
										$dateUpdate= $arrayDate[2]."/".$arrayDate[1]."/".($arrayDate[0]);
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
                    <!--<a href="#" onClick="window.open('showchart.php?StartDate=<?php echo $data['date_update'];?>&id=<?php echo $data['id']?>');"><img src="../th/statistics_24x24.gif" border="0">  <?php  if(substr($data['date_update'],8,2) >= 10) {  echo substr($data['date_update'],8,2);}else { echo  substr($data['date_update'],9,1);}?></a> -->
                    <a href="#" onClick="window.open('../thainr_graph2/dailygraph_local.php?StartDate=<?php echo $data['date_update'];?>&id=<?php echo $data['id']?>');"><img src="statistics_24x24.gif" height="34" border="0"><?php  if(substr($data['date_update'],8,2) >= 10) {  echo substr($data['date_update'],8,2);}else { echo  substr($data['date_update'],9,1);}?></a></TD>
                  <TD height="29" align="center"><?php echo $data['p1'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p2'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p3'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p4'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p5'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p6'];?></TD>
                  <TD height="29" align="center" bgcolor="#66cccc"><?php echo $data['p7'];?></TD>
                  <TD height="29" align="center"><?php  $resultSum =($data['p1']+$data['p2']+$data['p3']+$data['p4']+$data['p5']+$data['p6']+$data['p7']) / $count;
				  		echo 	number_format( $resultSum, 2, '.', '');
				  ?>	 </TD>
                  <TD height="29" align="center"><?php echo $data['p8'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p9'];?></TD>
                  <TD height="29" align="center"><?php echo $data['p10'];?></TD>
                  </TR>
                <?php $count=0; } ?>
                <TR>
                  <TD borderColor="#cccccc" colSpan="12" height="28"><p><strong>Remark : </strong>This Local price, is the prices that TRA inquired from 2-5 members/day.<br>
                    <strong>Source : </strong>The Thai Rubber Association<strong><br>
                      Update : </strong><?php echo $dateUpdate;?></p></TD>
                  </TR>
                </TBODY>
            </TABLE></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="64" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10"><a href="#" onClick="window.print();"><img src="../th/images/print_page.gif" alt="print" width="62" height="15" border="0"></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" align="center" bgcolor="#FFFFFF"  class="FontMS9"> <p>
              </p></td>
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