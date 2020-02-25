<?php
include '../../control/config.inc.php';
  $link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
   mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
   
	if($_GET['IDS']){ $_POST['IDS']=$_GET['IDS']; }
	if($_POST['IDS']!=''){ 
		$query = "SELECT * FROM tbl_member_data WHERE id = '".$_POST['IDS']."' ";
		$result = mysql_query($query);
		$data =mysql_fetch_assoc($result);
	}
?>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
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
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css" />
<title><?php echo $data['name']?>Membership</title>
<body >
<center>
  <table width="95%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
          <td align="left" background="../../images/h-title/h-message_bg.gif"><img src="../../images/h-title/h-MemberCorporation.jpg" alt="history" width="370" height="100"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
        </tr>
      </table>
  <table width="95%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
    <tr>
      <td width="9">&nbsp;</td>
      <td width="13" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="804" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
      <td width="24" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><span class="FontMS10"><img src="../../th/images/icon_www2.gif" alt="icon" width="15" height="14" hspace="5"><strong><?php echo $data['name']?></strong></span></td>
      <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><table width="80%" align="center" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td height="25">&nbsp;</td>
          <td height="25"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="150" height="25"><div align="right"><strong>Office</strong></div></td>
          <td height="25"></td>
          <td><p><?php echo $data['Office']?></p></td>
        </tr>
        <tr>
          <td height="34" bgcolor="#EAEAEA"><p align="right"><strong>Telephone </strong></p></td>
          <td height="34" bgcolor="#EAEAEA"></td>
          <td  bgcolor="#EAEAEA"><p align="left"><?php echo $data['Telephone']?></p></td>
        </tr>
        <tr>
          <td height="24"><p align="right"><strong>Fax </strong></p></td>
          <td width="10" height="24"></td>
          <td ><p align="left"><?php echo $data['Fax']?></p></td>
        </tr>
        <tr>
          <td height="25" valign="center" bgcolor="#EAEAEA"><p align="right"><strong>E-Mail </strong></p></td>
          <td width="10" height="25" bgcolor="#EAEAEA"></td>
          <td  bgcolor="#EAEAEA"><p align="left"><A href="mailto:<?php echo $data['E-Mail']?>"><?php echo $data['E-Mail']?></A></p></td>
        </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
        </tr>
        <tr>
          <td height="25"><p align="right"><strong>Website </strong></p></td>
          <td height="25"></td>
          <td ><p align="left"><A href="<?php echo $data['Website']?>" target="_blank"><?php echo $data['Website']?></A></p></td>
        </tr>
          <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
        </tr>
        <tr>
          <td height="25"><p align="right"><strong>Executives </strong></p></td>
          <td height="25"></td>
          <td ><p align="left"><?php echo $data['Executives']?></p></td>
        </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
        </tr>
        <tr>
          <td height="25"><p align="right"><strong>Contact person </strong></p></td>
          <td height="25"></td>
          <td><p><?php echo $data['Contact_person']?></p></td>
        </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
        </tr>
        <tr>
          <td height="21" valign="top"><p align="right"><strong>Products/Capacity </strong></p></td>
          <td height="21"></td>
          <td valign="middle"><p><?php echo $data['Products/Capacity']?></p></td>
        </tr>

        <tr>
          <td height="17" valign="top">&nbsp;</td>
          <td height="17"></td>
          <td valign="middle">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>      </td>
      <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</center>
</body>