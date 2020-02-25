<?php 
		//-----------------------------------------------------------------------------------------------------------------------------
		if($selectMonth=="selectMonth"){  
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
					$_SESSION['yearVar']=$_SESSION['yearVar']-1;
		}else if($yearPlus=='Add'){
					$_SESSION['yearVar']=$_SESSION['yearVar']+1;
		}else if($yearPlus=='Nothing'){
			$_SESSION['yearVar']=0;
		}
		//echo "$ yearVar >>".$_SESSION['yearVar']."<br>";
				//-------------select year from select box
		if($chooseyear=="select"){
			//echo $chooseyear."  selectY".$selectY."<br>";
			$_SESSION['yearVar'] = $_SESSION['yearVar']+$selectY;
		}
		if($selectmonth){
			 $rangeMonth= $selectmonth-$currMonth;
		}else{
			$rangeMonth= 0;
		}
		 $rangeYear= $_SESSION['yearVar'];		
		 	
		
		$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		///echo "numDayOfMonth".$numDayOfMonth."<br>";
		$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
				$dateArray = explode("-",$today);
				$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
				$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		
		///echo "Range= ".$rangeYear." StartDate >>  ".$StartDate."   >>>  StopDate ".$StopDate;
		//-----------------------------------------------------------------------------------------------------------------------------		
		//$query ="SELECT * FROM   tbl_rubber_bidding  WHERE (datex  BETWEEN  '$StartDate'  AND  '$StopDate' ) AND language='$lang' ORDER BY datex DESC  ";
		$query ="SELECT * FROM   tbl_rubber_bidding  WHERE (datex  BETWEEN  '$StartDate'  AND  '$StopDate' )  ORDER BY datex DESC  ";		
		$resultData = mysql_query($query);
		///echo "<hr>".$query."<hr>";

		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		$nameYear = $YName;
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
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_price.php"); ?></td>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
          <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-bidding-price.jpg" alt="history" width="341" height="100" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="12" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="110" align="center" bgcolor="#336699" class="FontMS10">&nbsp;</td>
            <td width="441" align="center" bgcolor="#336699" class="FontMS10"><span class="style1"><?php echo $nameMonth?> <?php echo $nameYear ?></span></td>
            <td width="138" align="center" bgcolor="#336699" class="FontMS10"><a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>"><span class="style1">[Current Year]</span></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10"><!--<img src="../th/images/graph.jpg" alt="Graph" width="128" height="128" align="absmiddle"><br>
แสดงผลในรูปแบบกราฟ --></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="right" bgcolor="#FFFFFF" class="FontMS10"><strong> Unit : USC/Kilogram&nbsp; </strong></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10"><TABLE width="96%" border="0" cellpadding="2" cellspacing="1" class="FontMS10">
              <TR>
                <TD width="25%" rowspan="2" align="center"  bgColor="#694623"><span class="style1">Date</span><span class="style2"></span></TD>
                <TD height="30" colspan="2" align="center"  bgColor="#694623"><span class="style1">RSS3</span></TD>
              </TR>
              <TR>
                <TD width="31%" height="30" align="center"  bgColor="#694623"><span class="style2"><strong>Price</strong></span></TD>
                <TD width="38%" height="30" align="center"  bgColor="#694623"><span class="style2"><strong>Shipment</strong></span></TD>
              </TR>
              <?php while($data=mysql_fetch_assoc($resultData)){ 
									if(!$dateUpdate){
										$arrayDate= explode("-",$data['datex']);
										if(($arrayDate[2]!="00")&&($arrayDate[1]!="00")&&($arrayDate[0]!="0000")){ 
										$dateUpdate= $arrayDate[2]."/".$arrayDate[1]."/".($arrayDate[0]);
										}
								}
				?>
              <TR>
                <TD  bgColor="#66cccc" height="38" align="center">
			<!--	<a href="#" onClick="window.open('showcharbid.php?StartDate=<?php echo $data['datex'];?>&id=<?php echo $data['id']?>');"> -->
				<!-- <a href="#" onClick="window.open('../thainr_graph2/dailygraph_bidding.php?StartDate=<?php echo $data['datex'];?>&id=<?php echo $data['id']?>');">
				   <img src="../th/statistics_24x24.gif" border="0"></a>      -->
				<?php  if(substr($data['datex'],8,2) >= 10) {  echo substr($data['datex'],8,2);}else { echo  substr($data['datex'],9,1);}?>           </TD>
                <TD  bgColor="#66cccc" height="38" align="center"><?php echo Xprice($data['price'])?></TD>
                <TD  bgColor="#66cccc" height="38" align="center"><?php echo $monthnames2[$data['offermonth']]?> <?php echo $data['offeryear']+543;?><BR>
                  ( <?php echo $data['remark'];?> ) </TD>
              </TR>
              <?php } ?>
              <TR>
                <TD width="25%" height="119" colSpan="4" align="left" borderColor="#ffffff"><p><strong>Remark : </strong>This bidding price, is the prices that TRA inquired from 2-5 members/day.<br>
                        <strong>Source : </strong>The Thai Rubber Association<strong><br>
                          Update : </strong><?php echo $dateUpdate;?></p></TD>
              </TR>
            </TABLE></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="64" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="center" bgcolor="#FFFFFF" class="FontMS10"><a href="#" onClick="window.print();"><img src="../th/images/print_page.gif" alt="print" width="62" height="15" border="0"></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" align="center" bgcolor="#FFFFFF" class="FontMS10">             <p>
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
                select year 
                <select name="selectY">
                  <?php
						$kons = 8;
						 for($i=1;$i < 11 ; $i++){ 
						 $xyear=$dateArray[0]+($i-$kons);
						 $eyear = $dateArray[0]+($i-$kons);
						 ?>
                  <option value="<?php echo ($i-$kons)?>" <?php if($dateArray[0]==$eyear) { echo "selected";}?>>
                  <?php echo $xyear?></option>
                  <?php } ?>
                </select> 
                &nbsp;
                <input name="chooseyear" type="hidden" >
                <input type="button" name="Button" value=" Submit" onClick="form1.chooseyear.value='select';form1.submit(); ">
                <br>
                <!--<a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract"?>"> <img src="../th/images/pre.gif" alt="prev <?php echo $nameYear -1?>" width="16" height="16" hspace="5" border="0" align="absbottom" > </a> -->
                <?php   while (list($key, $value) = each($monthnames2)) {  ?>
                <?php echo "<a href='".$_SERVER['PHP_SELF']."?detail=$detail&selectmonth=$key'>$value</a>"; ?>
                <?php if($key!="12"){ echo "|";} ?>
                <?php 	}	?>
            <!--  <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Add"?>"> <img src="../th/images/next.gif" alt="next <?php echo $nameYear+1?>" width="16" height="16" hspace="5" border="0" align="absbottom"> </a> --></form></p></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="3" align="left" bgcolor="#FFFFFF" class="FontMS9">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <p class="FontMS10"><br>
      </p>
         
      </td>
    </tr>
  </table>
</center>
</body>