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
<title>Thai Rubber Statistics</title>
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
      <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-statistic.jpg" alt="history" width="341" height="100" /></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="80" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="1039" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td width="35">&nbsp;</td>
          <td  align="right"><a href="#"  onClick="window.print();"><img src="printicon.png" alt="" width="50" height="50" hspace="5" border="0"></a>&nbsp;</td>
          <td width="25" align="right">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" align="center"><img src="../th/images/report-chart.gif" alt="chart" width="16" height="16" hspace="5"></td>
          <td><strong><?php echo $stat['title_en']?></strong> &nbsp;
            <?php $icon="<img src=images/3_43.gif  hspace=3 />";  $day =$stat['date_post']; GetNewIcon($day,$icon)?></td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr bgcolor="#DAD5C2">
          <td colspan="3" ><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
        </tr>
        <tr  bgcolor="#DAD5C2">
          <td colspan="3" ><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="85">&nbsp;</td>
          <td><strong><?php echo $stat['detail_en']?></strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td height="20" align="right"><?php GetEngDate($stat['date_post'])?>
            &nbsp;</td>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center"><br>
            <p>
              <?php if($stat['file_th']){ ?>
              <a href="../uploadfile/<?php echo $stat['file_th']?>" target="_blank"> <img src="../th/images/download2.gif" alt="download" width="32" height="32" hspace="5" align="absmiddle">Download file</a>
              	<script type="text/javascript">
  
               // window.location.href='../uploadfile/<?php echo $stat['file_th']?>';},2000);
				window.open('stat_download.php?filename=<?php echo $stat['file_th']?>','_blank'); 
        
</script>
              <?php }?>
            </p></td>
          <td>&nbsp;</td>
        </tr>
        <!--  <?php while($data=mysql_fetch_assoc($result)){ ?>
        <tr>
          <td height="34">&nbsp;</td>
          <td height="60" align="center"><?php if($data['is_pic']==0){ 
								if(substr($data['f_name'],-3,3)=="swf"){
									include("showswf.php");
								}else{  
			?>
              <img src="images/download2.gif" alt="download" width="32" height="32" hspace="5" align="absmiddle"> <a href="../statfile/<?php echo $data['f_name']?>" class="Saan" target="_blank">ดาวน์โหลดไฟล์เอกสาร</a> <?php echo $data['w_th']?>
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
              <?php } ?>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="1" align="center"><hr size="2" color="#CCCC99" width="80%" align="center"></td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?> -->
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