<?php
ob_start();
session_start();

require '../libs/config.inc.php';
require '../libs/clear_file.php';
require '../libs/ajax.php'; 
require '../libs/mysql.php';
require '../libs/function.php';
require '../funcs/func_chat.php';



$sajax_request_type = "GET";
sajax_init();
sajax_export("chk_login");
sajax_handle_client_request();
ob_end_flush();
?>
<html>
<head>
<title>Login to Chat Room</title>
<meta http-equiv='content-type' content='text/html; charset=tis-620'>
<script language='javascript'>
<!--
<? sajax_show_javascript(); ?>

function chkPwd_cb(e) {
	if(e == 1) {
		document.getElementById("report").innerHTML = 'Vertify ...';
		window.setTimeout("location.href='contents.php';",3000);
	}
	else {
		document.getElementById("report").innerHTML = e;
		document.getElementById("send").disabled = false;
	}
}

function chkPwd() {
	name = document.getElementById("name").value;
	x_chk_login(name,chkPwd_cb);
	document.getElementById("name").value = '';
	document.getElementById("send").disabled = true;
}

//-->
</script>
</head>
<body>
<table width="449" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
  <tr>
    <td><img src="../../th/images/chat/chat_01.gif" width="126" height="49" alt=""></td>
    <td><img src="../../th/images/chat/chat_02.gif" width="48" height="49" alt=""></td>
    <td><img src="../../th/images/chat/chat_03.gif" width="96" height="49" alt=""></td>
    <td><img src="../../th/images/chat/chat_04.gif" width="179" height="49" alt=""></td>
  </tr>
  <tr>
    <td valign="top"><img src="../../th/images/chat/chat_05.gif" width="126" height="104" alt=""></td>
    <td colspan="3" valign="bottom" background="../../th/images/chat/chat_06.gif"><table width='78%' height=''>
      <form name='frm' method='post' action='#' onSubmit='chkPwd(); return false;'>
        <tr>
          <td height="24" valign="bottom"><input name='name' type='text' id='name' size="40"></td>
        </tr>
        <tr>
          <td align="center"><input type='submit' name='send' id='send' value="    เข้าระบบ    " onClick='chkPwd(); return false'>
            <div id='report' style='color:red'></div></td>
        </tr>
      </form>
    </table></td>
  </tr>
  <tr>
    <td><img src="../../th/images/chat/chat_11.gif" width="126" height="18" alt=""></td>
    <td><img src="../../th/images/chat/chat_12.gif" width="48" height="18" alt=""></td>
    <td valign="bottom"><img src="../../th/images/chat/chat_13.gif" width="96" height="14" alt=""></td>
    <td><img src="../../th/images/chat/chat_14.gif" width="179" height="18" alt=""></td>
  </tr>
</table>
</body>
</html>