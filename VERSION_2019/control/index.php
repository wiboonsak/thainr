<?php session_start();
	require_once("config.inc.php");
    $link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			
	if($_POST['adminlogin']=="1"){
		$query = "SELECT * , COUNT(id) NumUser FROM tbl_admin_user  WHERE username = '".$_POST['xlogin']."' AND   password  = '".$_POST['password']."' GROUP BY  id ";
		$result = mysql_query($query);
		$data=mysql_fetch_assoc($result);
		if($data['NumUser'] > 0){
			
			$_SESSION['admin_name']=$data['admin_name'];
			$_SESSION['admin_type']=$data['adminType'];						
			$_SESSION['admin']='AdminLogin'; 
			$_SESSION['adminID']=$data['id'];
			$_SESSION['language']=$data['language'];
			?>
			<script language="javascript">window.location='main.php';</script>
			<?php
		}else{ ?>
			<script language="javascript">alert("รหัสผ่านผิดพลาด! กรุณาลองใหม่");</script>
		<?php
		}
	}
?>
<html>
<head>
<title>Admin Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.boxinput {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #F90;
	height: 18px;
	width: 154px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
body {
	background-color: #FFF;
}
-->
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (Untitled-2) -->
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD vAlign=center align=middle>
     <FORM name="form1" action="<?php $_SERVER['PHP_SELF']?>" method="post">
<table width="429" height="197" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td colspan="4">
			<img src="images/firstpage/Untitled1_01.png" width="429" height="67" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/firstpage/Untitled1_02.png" width="177" height="22" alt=""></td>
		<td colspan="2" background="images/firstpage/Untitled1_03.png" width="154" height="21"><input name="xlogin" type="text" class="boxinput" id="xlogin" ></td>
		<td>
			<img src="images/firstpage/Untitled1_04.png" width="98" height="21" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="images/firstpage/Untitled1_05.png" width="154" height="17" alt=""></td>
		<td>
			<img src="images/firstpage/Untitled1_06.png" width="98" height="1" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/firstpage/Untitled1_07.png" width="177" height="16" alt=""></td>
		<td>
			<img src="images/firstpage/Untitled1_08.png" width="98" height="16" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/firstpage/Untitled1_09.png" width="177" height="21" alt=""></td>
		<td colspan="2" background="images/firstpage/Untitled1_10.png" width="154" height="21"><input name="password" type="password" class="boxinput" id="password"></td>
		<td>
			<img src="images/firstpage/Untitled1_11.png" width="98" height="21" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/firstpage/Untitled1_12.png" width="177" height="36" alt=""></td>
		<td colspan="2" background="images/firstpage/Untitled1_13.png" width="154" height="36">
        <input type="image" src="images/login_bt.png" onClick="document.form1.submit();">
        <INPUT type='hidden' value='1' name='adminlogin'></td>
		<td>
			<img src="images/firstpage/Untitled1_14.png" width="98" height="36" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/firstpage/Untitled1_15.png" width="177" height="34" alt=""></td>
		<td>
			<img src="images/firstpage/Untitled1_16.png" width="153" height="34" alt=""></td>
		<td colspan="2">
			<img src="images/firstpage/Untitled1_17.png" width="99" height="34" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/firstpage/spacer.gif" width="177" height="1" alt=""></td>
		<td>
			<img src="images/firstpage/spacer.gif" width="153" height="1" alt=""></td>
		<td>
			<img src="images/firstpage/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="images/firstpage/spacer.gif" width="98" height="1" alt=""></td>
	</tr>
</table>
     </FORM>
    </TD>
  </TR>
  </TBODY>
</TABLE>   
 
<!-- End Save for Web Slices -->
</body>
</html>