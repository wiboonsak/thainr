<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	//-----------------------------Date------------------------------------
	$query ="SELECT * FROM tbl_speech WHERE id = '".$_GET['MID']."' ";
	$result  = mysql_query($query);
	$message=mysql_fetch_assoc($result);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<script type="text/JavaScript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
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
<body>
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-presidentview.jpg" alt="history" width="370" height="80"></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close.png" alt="history" width="50" height="50"></a></td>
    </tr>
  </table>
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="782" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="409" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="165" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class="LR10"><img src="images/inside/forms.gif" alt="icon" width="22" height="24" hspace="5"><strong><?php echo $message['title_th']?></strong></td>
          <td align="right" valign="bottom" bgcolor="#FFFFFF" class="LR10">[ <span class="FontMS10">
            <?php GetOnlyEngMonth($message['date_post'])?><?php if($message['date_end']!='0000-00-00'){ echo "&nbsp&nbsp-&nbsp;";GetOnlyEngMonth($message['date_end']); } ?>
          </span> ]</td>
        </tr>
        <tr>
          <td height="56" colspan="2" bgcolor="#FFFFFF" class="FontMS10"><dd>
            <p>&nbsp;</p>
            <p>
              <?php
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
          <td height="56" colspan="2" align="center" bgcolor="#FFFFFF" class="FontMS10"><strong><?php echo $message['name_th']?><BR>
            President</strong></td>
        </tr>
      </table>      
      <p align="center" class="FontMS10">&nbsp;</p></td>
    <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="80" align="center" valign="top" bgcolor="#FFFFFF">
     <table width="248" height="56" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="images/1389382_03.png" class="FontMS10"><a href="index.php?detail=message" style="color: #FFFFFF"><strong>All President View</strong></a></td>
      </tr>
    </table></td>
    <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</center>
</body><?php mysql_close($link);?>
