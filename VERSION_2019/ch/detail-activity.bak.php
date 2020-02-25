<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			//-----------------------------Date------------------------------------
			$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	
	$query="SELECT * FROM tbl_news_and_act WHERE id = '".$_GET['ActID']."' ";
	$result = mysql_query($query);
	$data=mysql_fetch_assoc($result);
	
	$query="SELECT * FROM `tbl_news_and_act_file` WHERE  news_id = '".$_GET['ActID']."' AND file_type='1'   ORDER BY  id ASC ";
	//echo $query;
	$resultFILE = mysql_query($query);
	
	$query="SELECT * FROM `tbl_news_and_act_file` WHERE  news_id = '".$_GET['ActID']."' AND file_type='2'   ORDER BY  id ASC ";
	//echo $query;
	$resultFILE2 = mysql_query($query);	
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

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>กิจกรรมสมาคมยางพาราไทย [ TRA Activities ]</title>
<style type="text/css">
<!--
.style1 {
	color: #006699;
	font-weight: bold;
}
-->
</style>
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
      <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-activities.jpg" alt="history" width="354" height="100"></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
      <td   valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td width="35">&nbsp;</td>
          <td >&nbsp;</td>
          <td width="25" align="right">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" align="center"><img src="images/inside/nr_42.jpg" width="24" height="21" alt="icon" /></td>
          <td><strong><?php echo $data['topic_th']?></strong> &nbsp;
              <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['c_update'],$icon)?>          </td>
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
          <td><br><?php echo $data['detail_th']?> </td>
          <td>&nbsp;</td>
        </tr><tr>
      
        
          <td height="60" colspan="3">
            <table width="100%" border="0">
              <tr>
                <?php $n=1; while($data=mysql_fetch_assoc($resultFILE)){ ?>
                <td align="center" valign="bottom">
            <a href="../uploadfile/<?php echo $data['file_name']?>" class="Saan" title="<?php echo $data['w_th']?>" rel="lightbox[roadtrip]">
              <img src="../uploadfile/thb/<?php echo $data['file_name']?>" class="radius5"></a>
            <br>
            <span class="txt8" style="padding:2px; margin:2px;"><?php echo $data['w_th']?></span><br></td>
            <?php if($n==5){ echo "</tr><tr>"; $n=0;}?>
			<?php $n++; } ?>        
            </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
            </table>
               <table width="100%" border="0">
              <tr>
                <?php $n=1; while($data=mysql_fetch_assoc($resultFILE2)){ ?>
                <td align="center" bgcolor="#EBEBEB">
            <a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_th']?>">
             <img src="images/download2.gif" width="32" height="32"> Download file</a>
            <br>
            <span class="product"><?php echo $data['w_th']?></span></td>
            <?php if($n==4){ echo "</tr><tr>"; $n=0;}?>
			<?php $n++; } ?>        
            </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
            </table>         
            
              </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="30" align="center"><a href="#"  onClick="window.close();"><img src="images/close.gif" alt="close" width="26" height="26" hspace="10" border="0">close windows</a></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</center>
</body><?php mysql_close($link);?>