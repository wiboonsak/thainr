<?php 	require_once("config.inc.php");
				$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");

 	$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################
		//-----------------------------------------------------------------------------------------------------------------------------
		if(isset($_POST['selectMonth'])){  $_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear'];  }

		//-----------------------------------------------------------------------------------------------------------------------------
		if($_POST['selectMonth']=="selectMonth"){  
				$_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear']; 
		}
		//-----------------------------------------------------------------------------------------------------------------------------	

		//$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		//$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		//		$dateArray = explode("-",$today);
		//		$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
		//		$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		//-----------------------------------------------------------------------------------------------------------------------------	
		$dayArray =explode("_", $_GET['day']);	
		$StartDate=$dayArray[0];  $StopDate=$dayArray[1];
		$monthArray= explode("-", $dayArray[0]);
		
		$query="SELECT * FROM `tbl_rubber_price`    WHERE (date_update   BETWEEN  '$StartDate'  AND  '$StopDate' )  ORDER BY  date_update  ";
		$result =mysql_query($query);
	

$fileName="ราคายางในตลาดท้องถิ่น_".$_GET['day'].".xls";

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
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="txt10-black">
    <tr>
      <td rowspan="3">&nbsp;</td>
      <td colspan="11" align="center" bgcolor="#E4E4CB" class="txt10-black">
			ราคายางในตลาดท้องถิ่น  <?php echo $monthnames2[$monthArray[1]]." ".($monthArray[0]+543)?>
		</td>
      <td align="center" bgcolor="#FFFFFF" class="txt10-black">&nbsp;</td>
    </tr>
    <tr>
      <td width="4%" rowspan="2" align="center" bgcolor="#E4E4CB">วันที่</td>
      <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>ยางแผ่นดิบ</strong></td>
      <td width="10%" rowspan="2" align="center" bgcolor="#E9E9E9"><strong>ยางลูกขุน</strong></td>
      <td width="11%" rowspan="2" align="center" bgcolor="#CCCCCC"><strong>ขี้ยางก้นถ้วย</strong></td>
      <td width="7%" rowspan="2" align="center" bgcolor="#E9E9E9"><strong>น้ำยาง</strong></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td width="7%" align="center" bgcolor="#CCCCCC"><strong>หาดใหญ่</strong></td>
      <td width="9%" align="center" bgcolor="#CCCCCC"><strong>คลองแงะ</strong></td>
      <td width="6%" align="center" bgcolor="#CCCCCC"><strong>ตรัง</strong></td>
      <td width="8%" align="center" bgcolor="#CCCCCC"><strong>ภูเก็ต</strong></td>
      <td width="10%" align="center" bgcolor="#CCCCCC"><strong>สุราษฎร์ธานี</strong></td>
      <td width="7%" align="center" bgcolor="#CCCCCC"><strong>ระยอง</strong></td>
      <td width="11%" align="center" bgcolor="#CCCCCC"><strong>อุบลราชธานี</strong></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
    <tr>
      <td width="2%" align="center">&nbsp;</td>
      <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo substr($data['date_update'],8,2)?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p1'];?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p2'];?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p3'];?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p4'];?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p5'];?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p6'];?></td>
      <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p7'];?></td>
      <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['p8'];?></td>
      <td align="center" bgcolor="#D7D7D7" class="txt10-black"><?php echo $data['p9'];?></td>
      <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['p10'];?></td>
      <td align="center" bgcolor="#FFFFFF" class="txt10-black">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="13" height="1" bgcolor="#C4C4C4"></td>
    </tr>
    <?php } ?>
  
  </table>

</body>
</html>