<?php
include '../../control/config.inc.php';
  $link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
   mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
   mysql_query("SET NAMES 'tis-620' ");
	if($_GET['IDS']){ $_POST['IDS']=$_GET['IDS']; }
	if($_POST['IDS']!=''){ 
		$query = "SELECT * FROM tbl_member_data WHERE id = '".$_POST['IDS']."' ";
		$result = mysql_query($query);
		$data =mysql_fetch_assoc($result);
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
body {
	background-color: #ffffff;
	margin: 0;
	padding: 0;
}
</style>

<script type="text/JavaScript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<title><?php echo $data['name']?>Membership</title>
<body >
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="26" valign="top" >&nbsp;</td>
          <td align="left" ><img src="../../images/h-title/h-MemberCorporation.jpg" alt="history" width="334" height="80"></td>
          <td width="26" valign="top" ><a href="#"  onClick="window.close();"><img src="../../images/h-title-2019/close.png" alt="history" width="50" height="50"></a></td>
        </tr>
      </table>
  <p>&nbsp;</p>
  <table width="90%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4;
box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
    <tr>
      <td height="10" valign="top" >&nbsp;</td>
    </tr>
    <tr>
      <td height="36" ><span class="FontMS10"><img src="../../images/icon/24X24/093.png" alt="icon" width="24" height="24" hspace="5"><strong><?php echo $data['name']?></strong></span></td>
    </tr>
    <tr>
      <td ><table width="80%" align="center" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td height="25">&nbsp;</td>
          <td height="25"></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td width="150" height="35"><div align="right"><strong>สำนักงาน</strong></div></td>
          <td height="35"></td>
          <td height="35"><p><?php echo $data['Office']?></p></td>
          </tr>
        <tr>
          <td height="35" bgcolor="#EAEAEA"><p align="right"><strong>โทรศัพท์ </strong></p></td>
          <td height="35" bgcolor="#EAEAEA"></td>
          <td height="35"  bgcolor="#EAEAEA"><p align="left"><?php echo $data['Telephone']?></p></td>
          </tr>
        <tr>
          <td height="35"><p align="right"><strong>โทรสาร </strong></p></td>
          <td width="10" height="35"></td>
          <td height="35" ><p align="left"><?php echo $data['Fax']?></p></td>
          </tr>
        <tr>
          <td height="35" valign="center" bgcolor="#EAEAEA"><p align="right"><strong>อีเมล์ </strong></p></td>
          <td width="10" height="35" bgcolor="#EAEAEA"></td>
          <td height="35"  bgcolor="#EAEAEA"><p align="left"><A href="mailto:<?php echo $data['E-Mail']?>"><?php echo $data['E-Mail']?></A></p></td>
          </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
          </tr>
        <tr>
          <td height="25"><p align="right"><strong>เว็บไซต์ </strong></p></td>
          <td height="25"></td>
          <td ><p align="left"><A href="<?php echo $data['Website']?>" target="_blank"><?php echo $data['Website']?></A></p></td>
          </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
          </tr>
        <tr>
          <td height="25" valign="top"><p align="right"><strong>ผู้บริหาร </strong></p></td>
          <td height="25"></td>
          <td valign="top"><p align="left"><?php echo $data['Executives']?></p></td>
          </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
          </tr>
        <tr>
          <td height="25" valign="top"><p align="right"><strong>บุคคลติดต่อ </strong></p></td>
          <td height="25"></td>
          <td valign="top"><p><?php echo $data['Contact_person']?></p></td>
          </tr>
        <tr>
          <td height="25" colspan="3"><hr width="100%"></td>
          </tr>
        <tr>
          <td height="21" valign="top"><p align="right"><strong>ผลผลิต/กำลังการผลิต </strong></p></td>
          <td height="21"></td>
          <td valign="top"><p><?php echo $data['Products/Capacity']?></p></td>
          </tr>
        
        <tr>
          <td height="17" valign="top">&nbsp;</td>
          <td height="17"></td>
          <td valign="middle">&nbsp;</td>
          </tr>
        </table>
      <p>&nbsp;</p>      </td>
    </tr>
  </table>
</center>
</body>