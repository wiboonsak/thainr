<?php 
	require_once("config.inc.php");
				$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");

$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################

		$dayArray =explode("_", $_GET['day']);	
		$StartDate=$dayArray[0];  $StopDate=$dayArray[1];
		$monthArray= explode("-", $dayArray[0]);
		
		$query="SELECT * FROM `tbl_rubber_bidding`    WHERE (datex  BETWEEN  '$StartDate'  AND  '$StopDate' )  ORDER BY  datex ";
		$result =mysql_query($query);


$fileName="ราคารับซื้อยาง_".$_GET['day'].".xls";

header("Content-Type: application/vnd.ms-excel");
//header('Content-Disposition: attachment; filename="BabyBorn.xls"');#ชื่อไฟล์	

header('Content-Disposition: attachment; filename="'.$fileName.'" ');#ชื่อไฟล์	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <td colspan="3" align="center" bgcolor="#E4E4CB">ราคารับซื้อยาง
      <?php echo $monthnames2[$monthArray[1]]." ".($monthArray[0]+543)?></td>
  </tr>
  <tr class="txt10-black">
    <td width="12%" align="center" bgcolor="#E4E4CB">วันที่</td>
    <td width="27%" align="center" bgcolor="#E4E4CB">ราคา</td>
    <td width="46%" align="center" bgcolor="#E4E4CB">เดือนส่งมอบ</td>
  </tr>
  <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
  <tr>
    <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo substr($data['datex'],8,2)?></td>
    <td bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo $data['price'];?></td>
    <td bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo $monthnames2[$data['offermonth']]?> <?php echo $data['offeryear']+543;?> (<?php echo $data['remark'];?>)</td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#C4C4C4"></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>