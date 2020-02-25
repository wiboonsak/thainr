<?php 
  require_once("config.inc.php");
				$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");

$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################

    	$CessYear  = $_GET['CessYear'];	
		//-----------------------------------------------------------------------------------------------------------------------------		
		$query="SELECT * FROM `tbl_rubber_cess`    WHERE cess_year  = '$CessYear'  ORDER BY  cess_month  ";
		$result =mysql_query($query);
		$CessYear=$CessYear+543;

$fileName="CESS_".$CessYear.".xls";

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
    <td colspan="5" align="center" bgcolor="#E4E4CB">CESS
      <?php echo $CessYear?></td>
  </tr>
  <tr>
    <td width="16%" rowspan="2" align="center" bgcolor="#E4E4CB">เดือน</td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>1-15</strong></td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>16-31</strong></td>
  </tr>
  <tr class="txt10-black">
    <td width="15%" align="center" bgcolor="#D7D7D7" class="txt10-black"><strong>ราคา</strong></td>
    <td width="18%" align="center" bgcolor="#E9E9E9" class="txt10-black"><strong>Cess</strong></td>
    <td width="19%" align="center" bgcolor="#D7D7D7" class="txt10-black"><strong>ราคา</strong></td>
    <td width="19%" align="center" bgcolor="#E9E9E9"><strong>Cess</strong></td>
  </tr>
  <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
  <tr>
    <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo $monthnames2[$data['cess_month']]?></td>
    <td align="center" bgcolor="#D7D7D7" class="txt10-black">&nbsp;<?php echo $data['1_15_price']?><?php echo $data['115pmark']?></td>
    <td align="center" bgcolor="#E9E9E9" class="txt10-black">&nbsp;<?php echo $data['1_15_cess']?><?php echo $data['115cmark']?></td>
    <td align="center" bgcolor="#D7D7D7" class="txt10-black">&nbsp;<?php echo $data['16_31_price']?><?php echo $data['1631pmark']?></td>
    <td align="center" bgcolor="#E9E9E9" class="txt10-black">&nbsp;<?php echo $data['16_31_cess']?><?php echo $data['1631pcess']?></td>
  </tr>
  
  <?php } ?>
  
</table>
</body>
</html>