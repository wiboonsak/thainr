<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	
	//-----------------------------Data----------------------------
	$query = "SELECT * FROM tbl_stat WHERE c_id = '$statID' ";
	$result =mysql_query($query);
	$stat =mysql_fetch_assoc($result);
	
	$query="SELECT * FROM  `tbl_stat_file`  WHERE  news_id = '$statID'  ORDER BY  is_pic   ";
	$result = mysql_query($query);
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
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
<title> ∂‘µ‘¬“ßæ“√“</title>
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
      <td width="76"><img src="images/inside/h-title_01.gif" alt="message" width="76" height="56"></td>
      <td width="290" align="left" background="images/inside/h-message_bg.gif"><img src="images/inside/h-thai-stat_02.gif" alt="history" width="290" height="56"></td>
      <td background="images/inside/h-message_bg.gif">&nbsp;</td>
      <td width="26"><img src="images/inside/h-message_09.gif" alt="message" width="26" height="56"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="10" valign="top"><img src="images/spacer.gif" width="10" height="10"></td>
      <td width="20" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="782" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
          <tr>
            <td width="35">&nbsp;</td>
            <td width="676">&nbsp;</td>
            <td width="25" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td height="25" align="center"><img src="images/report-chart.gif" alt="chart" width="16" height="16" hspace="5"></td>
            <td><strong><?php echo $stat['c_detail']?></strong> &nbsp;
            <?php $icon="<img src=images/3_43.gif  hspace=3 />";  $day =$stat['c_update']; GetNewIcon($day,$icon)?></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr bgcolor="#DAD5C2">
            <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
          </tr>
          <tr  bgcolor="#DAD5C2">
            <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
          </tr>
          <tr>
            <td height="85">&nbsp;</td>
            <td><strong><?php echo $stat['c_detail2']?></strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center"><br>
                <br>
                <p>&nbsp;</p>            </td><td>&nbsp;</td>
          </tr>
		  		  <?php while($data=mysql_fetch_assoc($result)){ ?>
          <tr>
            <td height="34">&nbsp;</td>
            <td height="60" align="center">
			<?php if($data['is_pic']==0){ 
								if(substr($data['f_name'],-3,3)=="swf"){
									include("showswf.php");
								}else{  
			?>
			<img src="images/download2.gif" alt="download" width="32" height="32" hspace="5" align="absmiddle">
			<a href="../statfile/<?php echo $data['f_name']?>" class="Saan" target="_blank">¥“«πÏ‚À≈¥‰ø≈Ï‡Õ° “√</a> <?php echo $data['w_th']?>
			<?php 
								 }  //end if swf
			
							} else  { 
			
			?>
			<table height="84" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
              <tr>
                <td width="8"><img src="images/corner/b1.gif" width="11" height="9"></td>
                <td height="9" background="images/corner/b2.gif"></td>
                <td width="11"><img src="images/corner/b3.gif" width="11" height="9"></td>
              </tr>
              <tr>
                <td width="8" height="64" background="images/corner/b8.gif"><img src="images/corner/b8.gif" width="11" height="1"></td>
                <td align="center" bgcolor="#FFFFFF" class="txt1"><p><img src="../statfile/<?php echo $data['f_name']?>"></p>
                    <p class="style1"><?php echo $data['w_th']?></p></td>
                <td width="11" background="images/corner/b4.gif"><img src="images/corner/b4.gif" width="11" height="1"></td>
              </tr>
              <tr>
                <td width="8"><img src="images/corner/b7.gif" width="11" height="11"></td>
                <td height="11" background="images/corner/b6.gif"><img src="images/corner/b6.gif" width="1" height="11"></td>
                <td width="11"><img src="images/corner/b5.gif" width="11" height="11"></td>
              </tr>
            </table>
			<br>
			<?php } ?>			</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="1" align="center"><hr size="2" color="#CCCC99" width="80%" align="center"></td>
            <td>&nbsp;</td>
          </tr>
		  <?php } ?>
          <tr>
            <td>&nbsp;</td>
            <td height="60" align="center"><a href="#"  onClick="window.close();"><img src="images/close.gif" alt="close" width="81" height="13" hspace="20" border="0"></a></td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
      <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</center>
</body><?php mysql_close($link);?>