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

	//-----------------------------Data----------------------------
	$query = "SELECT * FROM tbl_rubber_statistic WHERE id = '".$_GET['statID']."' ";
	$result =mysql_query($query);
	$stat =mysql_fetch_assoc($result);
	
	//$query="SELECT * FROM  `tbl_stat_file`  WHERE  news_id = '$statID'  ORDER BY  is_pic   ";
	//$result = mysql_query($query);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>สถิติยางพารา</title>
<style type="text/css">
<!--
.style1 {
	color: #006699;
	font-weight: bold;
}
.Iframe1
{
    border-style:none;
    width:100%;
    height:100%;
    overflow:none;
}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
      <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-statistic.jpg" alt="history" width="341" height="100"></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td width="24">&nbsp;</td>
          <td height="650" valign="top">
          <!--vvvvvvvvvvvvvv -->
          
          <iframe src="http://docs.google.com/gview?url=http://www.thainr.com/uploadfile/<?php echo $stat['file_th']?>&embedded=true" class="Iframe1" frameborder="0"></iframe>
          
          <!--vvvvvvvvvvvvvv -->
          </td>
          <td width="25" align="right">&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td height="60" align="center"><a href="#"  onClick="window.close();"><img src="images/close.gif" alt="close" width="26" height="26" hspace="20" border="0">close windows</a></td>
          <td>&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>
 
</center>
</body><?php mysql_close($link);?>