<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
	$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	//-----------------------------Date------------------------------------
	$query ="SELECT * FROM tbl_speech WHERE id = '".$_GET['MID']."' ";
	$result  = mysql_query($query);
	$message=mysql_fetch_assoc($result);
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<!--ห้ามลากดำ+ห้าม ctrl+A,C ในโค้ดเดียว -->
<script language="JavaScript1.2">
function disableselect(e){
return false
}
function reEnable(){
return true
}
//if IE4+
document.onselectstart=new Function ("return false")
//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>

<!--ห้ามคลิกขวา -->
<script language=JavaScript>
<!--
var message="Function Disabled!";
///////////////////////////////////
function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
// --> 
</script>


<link href="style.css" rel="stylesheet" type="text/css" /><title>สาส์นจากนายกสมาคม TRA PRESIDENT VIEW</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <br />
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
      <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-presidentview.jpg" alt="history" width="370" height="100" /></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="81" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="782" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="409" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="165" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFFFFF" class="LR10"><img src="../th/images/inside/forms.gif" alt="icon" width="22" height="24" hspace="5"><strong>
		  <?php if($message['title_en']==''){ echo $message['title_th'];}else{  echo $message['title_en']; }?></strong></td>
          <td align="right" valign="bottom" bgcolor="#FFFFFF" class="LR10">[ <?php GetOnlyEngMonth($message['date_post'])?> ]</td>
        </tr>
        <tr>
          <td height="56" colspan="2" align="left" bgcolor="#FFFFFF" class="FontMS10"><dd>
            <p>&nbsp;</p>
            <p>
              <?php
			  			if($message['detail_en']){ $message['detail_th'] = $message['detail_en'];}else { $message['detail_th']=$message['detail_th']; }	
						$message['detail_th']= ereg_replace("<P>", " ", $message['detail_th']);
						$message['detail_th']= ereg_replace("</P>","<br>",$message['detail_th']);
						echo  $message['detail_th'];
					?>
            </p>
            <a href="#"></a></dd></td>
        </tr>
        <tr>
          <td height="129" colspan="2" align="center" valign="bottom" bgcolor="#FFFFFF" class="FontMS10"><strong><img src="../sigIMG/<?php echo $message['signatureIMG']?>" alt="Signature" ></strong></td>
        </tr>
        <tr>
          <td height="56" colspan="2" align="center" bgcolor="#FFFFFF" class="FontMS10"><p><strong><?php echo $message['name_en']?><BR>
            TRA-PRESIDENT</strong></p></td>
        </tr>
      </table>      
      <p align="center" class="FontMS10">&nbsp;</p></td>
    <td width="50" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="80" align="center" valign="top" bgcolor="#FFFFFF"><table width="180" height="45" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="../th/images/databg2.gif" class="FontMS10"><a href="index.php?detail=message"><strong>All TRA President View </strong></a></td>
      </tr>
    </table></td>
    <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</center>

</body>