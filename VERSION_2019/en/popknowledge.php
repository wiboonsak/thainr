<?php
require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			//-----------------------------Date------------------------------------
			$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
	
		$queryKnow="SELECT * FROM tbl_misc_data WHERE id = '".$_GET['topic_id']."' ";
		$resultKnow =mysql_query($queryKnow);
		$data=mysql_fetch_assoc($resultKnow);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $data['tile']?></title>
<style type="text/css">
<!--
body {
	margin-left: 5px;
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
	background-color: #D7EFF9;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
        <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-knowledge.jpg" alt="history" width="370" height="100" /></td>
        <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="8%" align="right"><img src="../images/icon/30x30/google_talk_30_2.png" width="30" height="30" /></td>
    <td width="92%" class="FontMs12">&nbsp;<strong><?php echo $data['title_th']?></strong> <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_post'],$icon)?></td>
  </tr>
  <tr>
    <td colspan="2" align="right" class="Saan"><hr size="1" color="#E8E8E8" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="50"><blockquote class="FontMS10"><?php echo $data['detail_th']?></blockquote></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td >
    <!--	   	
   	<iframe src="https://docs.google.com/gview?url=	http://www.thainr.com/uploadfile/20180219103747.pdf&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>
    	
    http://www.thainr.com/uploadfile/<?php //echo $data['file_th']?>-->
    
    <embed src=" http://www.thainr.com/uploadfile/<?php echo $data['file_th']?>" type="application/pdf" width="100%" height="700px" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="Saan">
	 <?php if($data['file_th']){ ?> 
	  <a href="../uploadfile/<?php echo $data['file_th']?>" target="_blank">
	File download <img src="images/download2.gif" width="32" height="32" border="0" align="absbottom" /></a>
	<?php } ?>	</td>
  </tr>
   <tr>
    <td colspan="2" align="right" class="Saan"><hr size="1" color="#E8E8E8" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="font-family: 'Times New Roman', Times, serif; font-size:10pt;"><?php GetThaiDate($data['date_post'])?> : www.thainr.com</td>
  </tr>
</table>

</body>
</html>
<?php mysql_close($link);?>