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
	
	$query="SELECT * FROM `tbl_news_and_act_file` WHERE  news_id = '".$_GET['ActID']."' AND file_type='1'   ORDER BY picSort ASC , id ASC ";
	//echo $query;
	$resultFILE = mysql_query($query);
	
	$query="SELECT * FROM `tbl_news_and_act_file` WHERE  news_id = '".$_GET['ActID']."' AND file_type='2'   ORDER BY picSort ASC ,  id ASC ";
	//echo $query;
	$resultFILE2 = mysql_query($query);	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<style type="text/css">
body {
	padding: 0px;
	margin: 0px;
}
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
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>

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
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
      <td colspan="4" valign="top">
	   <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tr>
          <td width="26" valign="top">&nbsp;</td>
          <td align="left"><img src="../images/h-title/h-activities.jpg" alt="history" width="354" height="80" /></td>
          <td width="26" valign="top"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close.png" alt="history" width="50" height="50"></a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="10" valign="top" >&nbsp;</td>
      <td width="20" >&nbsp;</td>
      <td valign="top"><br>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
        <tr>
          <td width="35">&nbsp;</td>
          <td >&nbsp;</td>
          <td width="25" align="right">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" align="center"><span class="txt8"><img src="../images/icon/24X24/048.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
          <td align="left"><strong><?php echo $data['topic_en']?></strong> &nbsp;
            <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['c_update'],$icon)?></td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" ><img src="../../th/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td colspan="3" ><img src="../../th/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="85">&nbsp;</td>
          <td align="left"><br><?php echo $data['detail_en']?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="60" colspan="3"><table width="100%" border="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <?php $n=1; while($data=mysql_fetch_assoc($resultFILE)){ ?>
              <td align="center"><a href="../../uploadfile/<?php echo $data['file_name']?>" class="Saan" title="<?php echo $data['w_en']?>" rel="lightbox[roadtrip]"> <img src="../../uploadfile/thb/<?php echo $data['file_name']?>" alt=""  class="radius5"></a> <br>
                <span class="txt8"><?php echo $data['w_en']?></span><br><br></td>
              <?php if($n==5){ echo "</tr><tr>"; $n=0;}?>
              <?php $n++; } ?>
              </tr>
            <tr>
              <td align="left">&nbsp;</td>
              </tr>
            <tr>
              <td align="left"><table width="100%" border="0">
                <tr>
                  <?php $n=1; while($data=mysql_fetch_assoc($resultFILE2)){ ?>
                  <td align="center" ><a href="../../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_en']?>"> </a><a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_th']?>"><img src="../images/icon/30x30/103.png" width="30" height="30"></a> <a href="../../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_en']?>"> Download file</a> <br>
                    <span class="product"><?php echo $data['w_en']?></span></td>
                  <?php if($n==4){ echo "</tr><tr>"; $n=0;}?>
                  <?php $n++; } ?>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
              </tr>
          </table></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="1" align="center"><hr size="2" color="#CCCC99" width="100%" align="center"></td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td height="60" align="center"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close-botton.png" alt="close" width="165" height="38" hspace="20" border="0"></a></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td width="20">&nbsp;</td>
    </tr>
  </table>
</center>

<!--
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
<style>
   img {
    -webkit-filter: grayscale(100%); /* Chrome, Safari, Opera */
     
   }
   body{
    -webkit-filter: grayscale(100%); /* Chrome, Safari, Opera */
   }
 </style>
 -->
 
</body>