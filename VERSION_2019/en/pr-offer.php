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
		if($selectmonth){
			 $rangeMonth= $selectmonth-$currMonth;
		}else{
			$rangeMonth= 0;
		}
		 $rangeYear= $_SESSION['yearVarOffer'];	
		
		$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		///echo "numDayOfMonth".$numDayOfMonth."<br>";
		$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
				$dateArray = explode("-",$today);
				$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
				$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		*/
		///echo "Range= ".$rangeYear." StartDate >>  ".$StartDate."   >>>  StopDate ".$StopDate;
		
			//-----------------------------------------------------------------------------------------------------------------------------	
	    if(!isset($_GET['selectY'])){ $_GET['selectY']=date("Y");}
		if(!isset($_GET['selectMonth'])){ $_GET['selectMonth']=date("m");}
		
		$selectDay= $_GET['selectY']."-".$_GET['selectMonth']."-01";
		
		$numDayOfMonth=cal_days_in_month(CAL_GREGORIAN,$_GET['selectMonth'],$_GET['selectY']);
		$StartDate=$selectDay;
		$StopDate = $_GET['selectY']."-".$_GET['selectMonth']."-".$numDayOfMonth;
		$nameYear= $_GET['selectY'] ;
		//-----------------------------------------------------------------------------------------------------------------------------	
		//$query ="SELECT * FROM   tbl_rubber_offer  WHERE (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' )  AND language='$lang' ORDER BY date_update DESC  ";
		$query ="SELECT * FROM   tbl_rubber_offer  WHERE (date_update  BETWEEN  '$StartDate'  AND  '$StopDate' )   ORDER BY date_update DESC  ";		
		$resultData = mysql_query($query);
		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
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
      <td width="877" height="50" align="right" valign="top" bgcolor="#FFFFFF"></td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-offerprice.jpg" alt="history" width="341" height="80" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="12" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="100" rowspan="4" align="center" valign="top" bgcolor="#FFFFFF"  class="FontMS10"><form action="" name="formA" method="get">
              <table width="120" border="0" cellspacing="0" cellpadding="0" class="FontMS10 radius_news">
                <tr class="FontMS10 radius_news">
                  <td height="25" align="center" bgcolor="#6A8A09"><strong class="txt-white">Select month</strong></td>
                  </tr>
                <tr>
                  <td height="37" align="center"><select name="selectMonth" id="selectMonth">
                    <?php   while (list($key, $value) = each($monthnames2)) { ?>
                    <option value="<?php echo $key?>" <?php if($_GET['selectMonth']==$key){ echo "selected"; }?>><?php echo $value?></option>
                    <?php } ?>
                    </select></td>
                  </tr>
                <tr class="FontMS10 radius_news">
                  <td height="25" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">Select year</strong></td>
                  </tr>
                <tr>
                  <td height="37" align="center"><select name="selectY" id="selectY">
                    <?php
						$currentYear=date("Y");
						$startYear=2000;
						$range=$currentYear-$startYear;
						 for($i=0;$i <= $range ; $i++){ 
						
						 ?>
                    <option value="<?php echo $currentYear-$i?>" <?php if($_GET['selectY']==($currentYear-$i)) { echo "selected";}?>> <?php echo ($currentYear-$i)?></option>
                    <?php } ?>
                    </select></td>
                  </tr>
                </table>
              <br>
              <input type="hidden" name="detail" value="<?php echo $_GET['detail']?>">
              &nbsp;
              <input type="submit" value="GO">
              <br>
              <br>
            </form></td>
            <td width="232" height="30" align="center" bgcolor="#336699" class="style2 FontMS10">&nbsp;</TD>
            <td width="335" align="left" bgcolor="#336699" class="style2 FontMS10"><span class="style1"><?php echo $monthnames2[$_GET['selectMonth']]?> <?php echo $nameYear ?></span></TD>
            <td width="138" align="center" bgcolor="#336699" class="style2 FontMS10"><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>"><span class="style1">[Current Year]</span></a></TD>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10"><!--<img src="../th/images/graph.jpg" alt="Graph" width="128" height="128" align="absmiddle"><br>
แสดงผลในรูปแบบกราฟ --></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right" bgcolor="#FFFFFF" class="FontMS10"><strong> Unit : Baht/Kilogram&nbsp; </strong></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS10"><TABLE width="100%" height="75" border="0" cellPadding="3" cellSpacing="2" class="FontMS10">
              <TBODY>
                <TR>
                  <TD width="8%" rowSpan="2" align="center" bgColor="#694623" class="style2"><strong>Date</strong></TD>
                  <TD height="30" colSpan="2" align="center" bgColor="#694623" class="style2"><strong>RSS Bale 3</strong></TD>
                  <TD colSpan="2" align="center" bgColor="#694623" class="style1">STR20</TD>
                  <TD colSpan="2" align="center" bgColor="#694623" class="style1">STR 5L</TD>
                  <TD colSpan="2" align="center" bgColor="#694623" class="style1">Latex</TD>
                  </TR>
                <TR>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style2"><strong>BKK.</strong></TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">SK./PK.</TD>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style1">BKK.</TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">SK./PK.</TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">BKK.</TD>
                  <TD width="12%" height="24" align="center" bgColor="#694623" class="style1">SK./PK.</TD>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style1">BKK</TD>
                  <TD width="11%" height="24" align="center" bgColor="#694623" class="style1">SK./PK.</TD>
                  </TR>
                <?php while($data=mysql_fetch_assoc($resultData)){ 
									if(!$dateUpdate){
										$arrayDate= explode("-",$data['date_update']);
										if(($arrayDate[2]!="00")&&($arrayDate[1]!="00")&&($arrayDate[0]!="0000")){ 
										$dateUpdate= $arrayDate[2]."/".$arrayDate[1]."/".($arrayDate[0]);
										}
								}
				?>
                <TR>
                  <TD bgColor="#66cccc" height="30" align="center">
                    <!-- <a href="#" onClick="window.open('showchartOffer.php?StartDate=<?php echo $data['date_update'];?>');"> -->
                    <a href="#" onClick="window.open('../thainr_graph2/dailygraph_offer.php?StartDate=<?php echo $data['date_update'];?>&id=<?php echo $data['id']?>');">
                      <img src="../th/statistics_24x24.gif" border="0">
                      <?php  if(substr($data['date_update'],8,2) >= 10) {  echo substr($data['date_update'],8,2);}else { echo  substr($data['date_update'],9,1);}?>
                      </a>
                    </TD>
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
                  <TD colSpan="9"><p>&nbsp;</p>
                    <p><strong>Source : </strong>The Thai Rubber Association<BR>
                      <strong>Remark : </strong>This FOB price, is the prices that TRA inquired from 2-5 members/day.<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BKK. = Bangkok<BR>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SK/PKT = Songkhla/Phuket</p></TD>
                  </TR>
                <TR borderColor="#ffffff">
                  <TD colSpan="9" height="23"><p align="left"><strong>Update : </strong><?php echo $dateUpdate;?></p></TD>
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
        </table>
        
      </td>
    </tr>
  </table>
</center>
</body>