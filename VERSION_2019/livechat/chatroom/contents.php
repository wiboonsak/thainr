<?php
ob_start();
session_start();
if(!session_is_registered('user')) {
	header('Location: login.php');
	exit();
}
require '../libs/config.inc.php';
require '../libs/ajax.php'; 
require '../libs/mysql.php';
require '../libs/function.php';
require '../libs/clear_file.php';
require '../languages/lang_th.php';
require '../funcs/func_chat.php';

		////////--Clear messgage -///////////
		/*function clear_msg(){
			$messagesClear="";
				$fp = fopen($webSite['pathMsg'],'w');
				if(flock($fp,LOCK_EX)) {
					fputs($fp,$messages);
					flock($fp,LOCK_UN);
				}
				fclose($fp);
			}
		$DB->conn();
		$today=date("Y-m-d");
			//---check ROW DATA
			$query="SELECT * FROM tbl_clear_chat_log ";
			$result = mysql_query($query);
			$nrow=mysql_num_rows($result);
			 if($nrow ==0){
				 echo "1";
				$query = "INSERT INTO `tbl_clear_chat_log` "
				." (`id` ,`clear_time` ,`is_clear` )VALUES ( '', '$today', '1') ";
				mysql_query($query);
				clear_msg();
				$query = "UPDATE `tbl_clear_chat_log` SET clear_time= '".$today."' ";
				mysql_query($query);
			 }
			//-----------------------------
			$today = date("Y-m-d");
			$query = "SELECT * FROM tbl_clear_chat_log WHERE clear_time='$today'  ";
			$result=mysql_query($query);
			$row=mysql_num_rows($result);
			
				if($row < 1){
					clear_msg();
					echo "2";
				}
		
		$DB->closeconn();
	   ///////---------------------------./////////////
*/
$sajax_request_type = "GET";
sajax_init();
sajax_export("add_line", "refresh");
sajax_handle_client_request();
ob_end_flush();
?>
<html>
<head>
<title></title>
<meta http-equiv='content-type' content='text/html; charset=tis-620'>
<link rel='stylesheet' href='../css/main.css' type='text/css'>
<script language='javascript'>
<!--
<? sajax_show_javascript(); ?>

function refresh_cb(e) {
	window.frames['m'].document.getElementById('contents').innerHTML = e;
}

function refresh() {
	x_refresh(refresh_cb);
}

function add_cb(e) {
	document.getElementById('report').innerHTML = "<font color='red'>" + e + "</font>";
}

function add() {
	msg = document.getElementById('msg').value;
	x_add_line(msg,add_cb);
	document.getElementById('msg').value = '';
	refresh();
}

function chkEnter() {
	var keyPress = event.keyCode;
	if(keyPress == '13') {
		return add();
	}
}
//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width='100%' height='100%' cellpadding='0' cellspacing='0' border='0'>
<tr>
<td  height='15%' colspan='2' valign='top'>
	<table width='100%' height='100%' style="background-image: url('../images/bg_01.gif')">
	<tr>
	<td  valign='top'><img src='../images/logo.gif'></td>
	</tr>
	</table>
</td>
</tr>
<tr>
<td width='80%' height='65%' align='left' valign='top' style='padding: 10px'>
	<table width='100%' height='30' cellpadding='0' cellspacing='0' border='0' style='border-bottom: solid 1px #999999'>
	<tr>
	<td width='9'><img src='../images/bor_TL.gif'></td>
	<td style="background-image: url('../images/bor_TC.gif')">
		<table width='100%' cellpadding='0' cellspacing='0'>
		<tr>
		<td><span class='menu_en'>:: � thainr Live Chat  � ::</span></td>
		<td align='right'><input type='button' value='Log Out' class='logout' onClick="location.href='logout.php';"></td>
		</tr>
		</table>
	</td>
	<td width='9'><img src='../images/bor_TR.gif' width='9'></td>
	</tr>
	</table>

	<table width='100%' height='89%' cellpadding='0' cellspacing='0' border='0' style='border: solid 1px #999999'>
	<tr>
	<td><iframe id='m' width='100%' height='100%' frameborder='0' src='message.php' scrolling='auto'></iframe></td>
	</tr>
	</table>
</td>
<td width='20%' height='65%' align='right' valign='top' style='padding: 10px' rowspan='2'>
	<table width='100%' height='30' cellpadding='0' cellspacing='0' border='0' style='border-bottom: solid 1px #999999'>
	<tr>
	<td width='9'><img src='../images/bor_TL.gif'></td>
	<td style="background-image: url('../images/bor_TC.gif')" align='right'><span class='menu_en'>Who's Online</span></td>
	<td width='9'><img src='../images/bor_TR.gif' width='9'></td>
	</tr>
	</table>

	<table width='100%' height='93%' cellpadding='0' cellspacing='0' border='0' style='border: solid 1px #999999'>
	<tr>
	<td><iframe id='useronline' width='100%' height='100%' frameborder='0' src='user.php' scrolling='auto'></iframe></td>
	</tr>
	</table>
</td>
</tr>

<tr>
<td height='25%' valign='bottom' style='padding: 10px;'>

	<table width='100%' height='95%' cellpadding='0' cellspacing='0' border='0'>
	<form name='frm' method='post' action='#' onsubmit='add(); return false;'>

	<tr valign='top'>
	<td valign='bottom' height='80' width='*'>
	<textarea name='msg' id='msg' class='editor' style='width:100%;height:80' onkeypress='chkEnter()'></textarea>
	</td>
	<td width='120' rowspan='2' align='right'><input type='image' src='../images/send.gif' onclick='add(); return false;'></td>
	</tr>
	<tr>
	<td height='30'><div id='report' class='menu_en'>:: � thainr Live Chat  � ::</div></td>

	</tr>
	</form>
	</table>

</td>
</tr>
</table>

</body>
</html>