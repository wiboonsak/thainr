<?php
			//-----------------------------------------------------------------------------------------------------------------------------
	/*	if($selectMonth=="selectMonth"){  
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
					$_SESSION['yearVarCess']=$_SESSION['yearVarCess']-(1+$plus);
		}else if($yearPlus=='Add'){
					$_SESSION['yearVarCess']=$_SESSION['yearVarCess']+(1+$plus);
		}else if($yearPlus=='Nothing'){
			$_SESSION['yearVarCess']=0;
		}
		
		if($selectmonth){
			 $rangeMonth= $selectmonth-$currMonth;
		}else{
			$rangeMonth= 0;
		}
		 $rangeYear= $_SESSION['yearVarCess'];	
		
				$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		///echo "numDayOfMonth".$numDayOfMonth."<br>";
		$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")-$rangDate+$rangeYear));
				$dateArray = explode("-",$today);
				$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
				$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		
		$CessYear  =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		///echo "Range= ".$rangeYear." StartDate >>  ".$StartDate."   >>>  StopDate ".$StopDate;
		*/
					//-----------------------------------------------------------------------------------------------------------------------------	
	    if(!isset($_GET['selectY'])){ $_GET['selectY']=date("Y");}
		if(!isset($_GET['selectMonth'])){ $_GET['selectMonth']=date("m");}
		
		//$selectDay= $_GET['selectY']."-".$_GET['selectMonth']."-01";
		
		//$numDayOfMonth=cal_days_in_month(CAL_GREGORIAN,$_GET['selectMonth'],$_GET['selectY']);
		//$StartDate=$selectDay;
		//$StopDate = $_GET['selectY']."-".$_GET['selectMonth']."-".$numDayOfMonth;
		$nameYear= $_GET['selectY'];
		$CessYear=$_GET['selectY'];
		
		//-----------------------------------------------------------------------------------------------------------------------------	
		
		//$query="SELECT * FROM `tbl_rubber_cess`    WHERE cess_year  = '$CessYear '   AND language='$lang'   ORDER BY  cess_month  ";
				$query="SELECT * FROM `tbl_rubber_cess`    WHERE cess_year  = '$CessYear'  ORDER BY  cess_month  ";
		$result =mysql_query($query);
	  // echo "<br>".$query;
		//-----------------------------------------------------------------------------------------------------------------------------		

		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		//$nameYear = $YName+543;
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
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td  align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_price.php"); ?></td>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
          <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-cess.jpg" alt="history" width="500" height="100" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="9" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="13" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="100" rowspan="4" align="center" valign="top" nowrap="nowrap" bgcolor="#FFFFFF" class="FontMS10"><form action="" name="formA" method="get">
              <table width="120" border="0" cellspacing="0" cellpadding="0" class="FontMS10 radius_news">
                <tr class="FontMS10 radius_news">
                  <td height="30" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">Select year</strong></td>
                </tr>
                <tr>
                  <td height="41" align="center"><select name="selectY">
                    <?php
						$currentYear=date("Y");
						$startYear=1999;
						$range=$currentYear-$startYear;
						 for($i=0;$i <= $range ; $i++){ 
						
						 ?>
                    <option value="<?php echo $currentYear-$i?>" <?php if($_GET['selectY']==($currentYear-$i)) { echo "selected";}?>> <?php echo ($currentYear-$i)?></option>
                    <?php } ?>
                  </select></td>
                </tr>
                <tr>
                  <td align="center"><input type="submit" value="GO"></td>
                </tr>
            </table>
              <input type="hidden" name="detail" value="<?php echo $_GET['detail']?>">
              <br>
  &nbsp;
            </form></td>
            <td height="45"  align="center" bgcolor="#336699" class="FontMS10"><span class="style1">Rubber Price Basis For Cess Calculation  <?php echo $nameYear ?><br>unit : Baht/Kilogram</span></td>
            <td width="129" align="right" bgcolor="#336699" class="FontMS10"><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>"><span class="style1">[Current Year]</span></a>&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#FFFFFF" class="FontMS10"><!--<p>
			<img src="../th/images/graph.jpg" alt="Graph" width="128" height="128" align="absmiddle"> <br>
              แสดงผลในรูปแบบกราฟ</p>-->            </td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left" bgcolor="#FFFFFF" class="FontMS10"><TABLE width="100%" height="146" border="0" cellPadding="2" cellSpacing="1" class="FontMS10">
              <TBODY>
                <TR>
                  <TD width="25%" rowSpan="2" bgColor="#694623" align="center" class="style1">Month</TD>
                  <TD height="32" colSpan="2" bgColor="#694623" align="center" class="style1">1-15</TD>
                  <TD colSpan="2" bgColor="#694623" align="center" class="style1">16-31</TD>
                  </TR>
                <TR>
                  <TD width="17%" height="29" bgColor="#694623"align="center" class="style1">Price</TD>
                  <TD width="18%" bgColor="#694623"align="center" class="style1">Cess</TD>
                  <TD width="19%" bgColor="#694623" align="center" class="style1">Price</TD>
                  <TD width="21%" bgColor="#694623"align="center" class="style1">Cess</TD>
                  </TR>
                <?php while($data=mysql_fetch_assoc($result)){ 
									if(!$dateUpdate){
										$arrayDate= explode("-",$data['date_update']);
										if(($arrayDate[2]!="00")&&($arrayDate[1]!="00")&&($arrayDate[0]!="0000")){ 
										$dateUpdate= $arrayDate[2]."/".$arrayDate[1]."/".($arrayDate[0]+543);
										}
								}
					?>
                <TR>
                  <TD bgColor="#66CCCC" height="27" align="center">
                    <!--<a href="#" onClick="window.open('showchartcess.php?CessMonth=<?php echo $data['cess_month']?>&CessYear=<?php echo $data['cess_year'];?>&id=<?php echo $data['id']?>');"> -->
                    <!--<a href="#" onClick="window.open('../thainr_graph2/dailygraph_cess.php?CessMonth=<?php echo $data['cess_month']?>&CessYear=<?php echo $data['cess_year'];?>&id=<?php echo $data['id']?>');">
					  <img src="../th/statistics_24x24.gif" border="0"></a> -->
                    <?php echo $monthnames2[$data['cess_month']]?>
                    
                    </TD>
                  <TD bgColor="#66CCCC"align="center"><?php echo $data['1_15_price']?><?php echo $data['115pmark']?></TD>
                  <TD bgColor="#66CCCC"align="center"><?php echo $data['1_15_cess']?><?php echo $data['115cmark']?></TD>
                  <TD bgColor="#66CCCC" align="center"><?php echo $data['16_31_price']?><?php echo $data['1631pmark']?></TD>
                  <TD bgColor="#66CCCC" align="center"><?php echo $data['16_31_cess']?><?php echo $data['1631pcess']?></TD>
                  </TR>
                <?php } ?>
                <TR>
                  <TD colSpan="5" height="53"><p><strong>Remark :</strong><br>
                    *  &nbsp; would be effective payment date 16-31 May 2007.<BR>
                    **  would be effective payment date 1-15 April 2007.<BR>
                    <BR>
                    <strong>Source :  </strong>ORRAF.<br>
                    <strong>Update : </strong><?php echo $dateUpdate;?><br>
                    </p></TD>
                  </TR>
                </TBODY>
            </TABLE></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="68" colspan="2" align="center" valign="bottom" bgcolor="#FFFFFF" class="FontMS10"><a href="#" onClick="window.print();"><img src="../th/images/print_page.gif" alt="print" width="62" height="15" border="0"></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="48" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="center" valign="bottom" bgcolor="#FFFFFF" class="FontMS10">
            <!--<p><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract&plus=0"?>"><img src="../th/images/pre.gif" alt="next" width="16" height="16" hspace="5" border="0" align="absbottom"></a> <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract&plus=1"?>"> <?php echo ($CessYear-2);?></a> | <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract&plus=0"?>"> <?php echo ($CessYear-1);?></a> | <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract&plus=0"?>"> <strong><?php echo ($CessYear);?></strong></a> | <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Add&plus=0"?>"	> <?php echo ($CessYear+1);?></a> | <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Add&plus=1"?>"> <?php echo ($CessYear+2);?></a> | <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Add&plus=0"?>"> <img src="../th/images/next.gif" alt="next" width="16" height="16" hspace="5" border="0" align="absbottom"> </a></p>  -->            </td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
         
      </td>
    </tr>
  </table>
</center>
</body>