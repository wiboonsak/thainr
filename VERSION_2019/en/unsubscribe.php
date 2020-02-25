<?php
			require_once("../control/config.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			$query="SELECT * FROM tbl_thainr_member WHERE id ='".$_GET['mID']."' ";
			$result=mysql_query($query);
			$data=mysql_fetch_assoc($result);
			if($data['id']==''){
						$txtUnsubscribe='ไม่พบ Email ของท่านในระบบ <br> หรือท่านได้ยิกเลิกจดหมายข่าวก่อนหน้านี้แล้ว';
			}else{
						$query="DELETE FROM tbl_thainr_member WHERE id ='".$_GET['mID']."' ";		
						mysql_query($query);
						$txtUnsubscribe='ระบบได้ยกเลิกจดหมายข่าวของท่านแล้ว <br> <a href="index.php">กลับหน้าหลัก</a> ';
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="price">
  <tr>
    <td height="25" bgcolor="#FFD9C6">ยกเลิกจดหมายข่าว</td>
  </tr>
  <tr>
    <td height="40" align="center" bgcolor="#FFE1C4"><?php echo $txtUnsubscribe?></td>
  </tr>
  <tr>
    <td height="40" align="center">www.thainr.com</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>