<?php 
	require_once("config.inc.php");
				$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");

$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################

		$dayArray =explode("_", $_GET['day']);	
		$StartDate=$dayArray[0];  $StopDate=$dayArray[1];
		$monthArray= explode("-", $dayArray[0]);
		
		$query="SELECT * FROM `tbl_rubber_offer`    WHERE (date_update   BETWEEN  '$StartDate'  AND  '$StopDate' )   ORDER BY  date_update  ";
		$result =mysql_query($query);
	
	$fileName="ราคาเสนอขาย_".$_GET['day'].".xls";

header("Content-Type: application/vnd.ms-excel");
//header('Content-Disposition: attachment; filename="BabyBorn.xls"');#ชื่อไฟล์	

header('Content-Disposition: attachment; filename="'.$fileName.'" ');#ชื่อไฟล์	

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="http://www.thainr.com/control/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style1 {color: #FFFFFF;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
  <tr>
    <td height="30" colspan="9" align="center" bgcolor="#E4E4CB">
		ราคาเสนอขาย &nbsp; <?php echo $monthnames2[$monthArray[1]]." ".($monthArray[0]+543)?></td>
  </tr>
  <tr>
    <td width="8%" rowspan="2" align="center" bgcolor="#E4E4CB">วันที่</td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>ยางก้อน</strong></td>
    <td colspan="2" align="center" bgcolor="#E9E9E9"><strong>ยางแท่ง
      STR 20</strong></td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>ยางแท่ง
      STR 5L</strong></td>
    <td colspan="2" align="center" bgcolor="#E9E9E9"><strong>น้ำยางข้น</strong></td>
  </tr>
  <tr>
    <td width="10%" align="center" bgcolor="#D7D7D7"><strong>กทม.</strong></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>สข./ภก.</strong></td>
    <td width="9%" align="center" bgcolor="#E9E9E9"><strong>กทม.</strong></td>
    <td width="11%" align="center" bgcolor="#F4F4F4"><strong>สข./ภก.</strong></td>
    <td width="11%" align="center" bgcolor="#D7D7D7"><strong>กทม.</strong></td>
    <td width="11%" align="center" bgcolor="#CCCCCC"><strong>สข./ภก.</strong></td>
    <td width="8%" align="center" bgcolor="#E9E9E9"><strong>กทม.</strong></td>
    <td width="11%" align="center" bgcolor="#F4F4F4"><strong>สข./ภก.</strong></td>
  </tr>
  <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
  <tr>
    <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo substr($data['date_update'],8,2)?></td>
    <td align="center" bgcolor="#D7D7D7" class="txt10-black">&nbsp;&nbsp;<?php echo $data['cake_rubber_01']?></td>
    <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['cake_rubber_02']?></td>
    <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['STR_20_01']?></td>
    <td align="center" bgcolor="#F4F4F4" class="txt10-black"><?php echo $data['STR_20_02']?></td>
    <td align="center" bgcolor="#D7D7D7" class="txt10-black"><?php echo $data['STR_5L_01']?></td>
    <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['STR_5L_02']?></td>
    <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['liquid_01']?></td>
    <td align="center" bgcolor="#F4F4F4" class="txt10-black"><?php echo $data['liquid_02']?></td>
  </tr>
  <tr>
    <td height="1" colspan="9" bgcolor="#C4C4C4"></td>
  </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>