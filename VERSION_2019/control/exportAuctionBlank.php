<?php
require_once("config.inc.php");
			include("function.inc.php");
//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
	$dateArray = explode("_" , $_GET['day']);
		$startDate=$dateArray[0];
		$EndDate=$dateArray[1];	
  $query="SELECT *     FROM tbl_central_market_price   WHERE  date_data >='".$startDate."'  AND   date_data <='".$EndDate."'   ORDER BY  date_data ASC ";
	// echo  "<br>".$query;
  $result=mysql_query($query);
	  

$fileName="ราคายางตลาดกลาง_".$_GET['day'].".xls";

header("Content-Type: application/vnd.ms-excel");
//header('Content-Disposition: attachment; filename="BabyBorn.xls"');#ชื่อไฟล์	

header('Content-Disposition: attachment; filename="'.$fileName.'" ');#ชื่อไฟล์	

?><html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<table width="100%" border="1" bordercolor="#666363" cellpadding="0" cellspacing="0" class="txt10-black">
  <tr>
    <td height="33" align="center" bgcolor="#D9D9B3"><strong>วันที่</strong></td>
    <td height="33" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นดิบ</strong></td>
    <td width="17%" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นรมควันชั้น</strong></td>
    <td width="20%" align="center" bgcolor="#D9D9B3"><strong>น้ำยางสด ณ โรงงาน</strong></td>
    <td width="11%" align="center" bgcolor="#D9D9B3"><strong>เศษยาง(100%)</strong></td>
    <td align="center" bgcolor="#D9D9B3"><strong>หมายเหตุ</strong></td>
  </tr>
  <?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
  <tr>
    <td width="9%" align="center" bgcolor="#FFFFFF"><?php GetThaiDate($data['date_data'])?></td>
    <td width="15%" align="center" bgcolor="#FFFFFF"><?php echo $data['rubber_sheet']?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data['rubber_smoke_sheet']?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data['latex']?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data['rubber_scrap']?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $data['note']?></td>
  </tr>
  <?php $n++; } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
