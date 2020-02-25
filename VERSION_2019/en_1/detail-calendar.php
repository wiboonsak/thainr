<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			//-----------------------------Date------------------------------------
			$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
	
	$lang=1;
	
	$pathCalendar = "../calendar_file";
	$query = "SELECT * FROM `calendar_events`  WHERE event_id = '".$_GET['keyID']."' ";
	$result =mysql_query($query);
	$data = mysql_fetch_assoc($result);
	
	$query="SELECT * FROM  `calendar_event_data` WHERE id = '".$data['newsID']."' ";
	$result =mysql_query($query);
	$topicData=mysql_fetch_assoc($result);
	
	$dateDiff = DateDiff($topicData['date_start'],$topicData['date_end']);
	
	
	$query="SELECT * FROM `calendar_events_file` WHERE news_id = '".$topicData['id']."' ORDER BY file_type";
	$resultFile =mysql_query($query);
	
	
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
<link href="style.css" rel="stylesheet" type="text/css" />
<title>กิจกรรมสมาคมยางพาราไทย</title>
<style type="text/css">
<!--
.style1 {
	color: #006699;
	font-weight: bold;
}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
      <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-calendar.jpg" alt="history" width="370" height="100" /></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="782" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
          <tr>
            <td width="35">&nbsp;</td>
            <td width="676">&nbsp;</td>
            <td width="25" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td height="25" align="center"><img src="../th/images/blogicon.gif" width="16" height="16" alt="icon" /></td>
            <td>&nbsp;<?php echo $topicData['event_title']?></td>
			<td align="center">&nbsp;</td>
          </tr>
          <tr bgcolor="#DAD5C2">
            <td colspan="3" ><img src="../th/images/spacer.gif" width="1" height="1" /></td>
          </tr>
          <tr  bgcolor="#DAD5C2">
            <td colspan="3" ><img src="../th/images/spacer.gif" width="1" height="1" /></td>
          </tr>
          <tr>
            <td height="42">&nbsp;</td>
            <td>&nbsp;<?php echo $topicData['event_desc']?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;
			</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php $n=1; while($file=mysql_fetch_assoc($resultFile)){ ?>
              <img src="../control/images/black_icon/16x16/download.png" width="16" height="16">&nbsp;&nbsp; <a href="../uploadfile/<?php echo $file['file_name']?>" target="_blank">Download File<?php echo $n?></a><br>
              <?php $n++; }?>
&nbsp;&nbsp; </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td bgcolor="#F7F7F7">&nbsp;</td>
            <td align="right" bgcolor="#F7F7F7">
			<?php //$dayPost = $data['cal_year']."-".$data['cal_month']."-".$data['cal_date'];   GetThaiDate($dayPost);?>	
            <?php if($dateDiff > 0){ ?>
			<?php GetEngDate($topicData['date_start']);?> &nbsp;-&nbsp; <?php GetEngDate($topicData['date_end']);?>
            <?php }else{ GetEngDate($topicData['date_start']);  } ?>
            
            		</td><td bgcolor="#F7F7F7">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="60" align="center"><a href="#"  onClick="window.close();"><img src="../th/images/close.gif" alt="close" width="26" height="26" hspace="20" border="0">close windows</a></td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
      <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</center>

</body>