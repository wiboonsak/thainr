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

<link href="style.css" rel="stylesheet" type="text/css" />
<title>Activities</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>

<style type="text/css">
	body {
		margin: 0px;
		padding: 0px;			
	}
	.style1 {
	color: #006699;
	font-weight: bold;
	}
</style>

<body>
<center>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-activities.jpg" alt="history" width="354" height="80" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close.png" alt="history" width="50" height="50"></a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="10" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="20" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="top" bgcolor="#EBEBEB"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td width="35" bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF" >&nbsp;</td>
          <td width="25" align="right" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" align="center" bgcolor="#FFFFFF"><span class="txt8"><img src="../images/icon/24X24/048.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
          <td align="left" bgcolor="#FFFFFF"><strong><?php echo $data['topic_en']?></strong> &nbsp;
            <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['c_update'],$icon)?></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr bgcolor="#DAD5C2">
          <td colspan="3" ><img src="../th/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr  bgcolor="#DAD5C2">
          <td colspan="3" ><img src="../th/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="85">&nbsp;</td>
          <td align="left"><br>            <?php echo $data['detail_en']?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="60" colspan="3"><table width="100%" border="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <?php $n=1; while($data=mysql_fetch_assoc($resultFILE)){ ?>
              <td align="center"><a href="../uploadfile/<?php echo $data['file_name']?>" class="Saan" title="<?php echo $data['w_en']?>" rel="lightbox[roadtrip]"> <img src="../uploadfile/thb/<?php echo $data['file_name']?>" alt=""  class="radius5"></a> <br>
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
                  <td align="center" bgcolor="#EBEBEB"><a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_en']?>"> </a><a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_th']?>"><img src="../images/icon/30x30/103.png" width="30" height="30"></a><a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_en']?>"> Download file</a> <br>
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
          <td height="60" align="center"><a href="#" onClick="window.close();"><img src="../images/h-title-2019/close-botton.png" alt="close" width="165" height="38" hspace="20" border="0"></a></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
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