<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			
	
	$query="SELECT * FROM tbl_news_data WHERE id = '".$_GET['ActID']."' ";
	$result = mysql_query($query);
	$data=mysql_fetch_assoc($result);
	$reffer =  $data['reff'];
	$query="SELECT * FROM  `tbl_news_data_file`  WHERE  news_id =  '".$_GET['ActID']."'   ORDER BY  file_type   ";
	$result = mysql_query($query);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>TRA News</title>
<style type="text/css">
	body{
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
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-news.jpg" alt="history" width="354" height="80" /></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close.png" alt="history" width="50" height="50"></a></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="100%" valign="top" bgcolor="#FFFFFF">
       <table width="95%" align="center" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr>
          <td width="30">&nbsp;</td>
          <td  align="right"><a href="pdf_news.php?ActID=<?php echo $_GET['ActID']?>" target="_blank"><img src="pdficon.png" alt="" width="50" height="50" hspace="5" border="0"></a> <a href="#"><img src="printicon.png" alt="" width="50" height="50" onClick="window.print();" hspace="5" border="0"></a></td>
          <td width="25" align="right">&nbsp;</td>
          </tr>
        <tr>
          <td width="30" height="25" align="center"><img src="../images/icon/30x30/094.png" alt="webboard" width="30" height="30" hspace="5" vspace="3" style="vertical-align:text-bottom"></td>
          <td align="left"><strong><?php echo $data['topic_th']?></strong> &nbsp;
            <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['c_update'],$icon)?></td>
          <td align="center">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="3" ><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
          </tr>
        <tr>
          <td colspan="3" ><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
          </tr>
        <tr>
          <td width="30" height="85" >&nbsp;</td>
          <td align="left" ><br>            <?php echo $data['detail_th']?>
            
            </script>
            <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
            
            <script src="js/prototype.js" type="text/javascript"></script>
            <script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
            <script src="js/lightbox.js" type="text/javascript"></script>
            
            <link href="style.css" rel="stylesheet" type="text/css" />
            
            </td>
          <td >&nbsp;</td>
          </tr>
        
        <?php while($data=mysql_fetch_assoc($result)){ ?>
        <tr>
          <td width="30" height="34" >&nbsp;</td>
          <td height="60" align="center" >
            <?php if($data['file_type']==0){ ?>
            <a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_th']?>"><img src="../images/icon/30x30/103.png" width="30" height="30"></a><a href="../uploadfile/<?php echo $data['file_name']?>" class="Saan" target="_blank">Download File</a> <?php echo $data['w_en']?>
            <?php } else  { ?>
            <a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" rel="lightbox[roadtrip]">
              <img src="../uploadfile/thb/<?php echo $data['file_name']?>" style="border:none"></a><br>
            <?php echo $data['w_en']?>
            <?php } ?>		</td>
          <td >&nbsp;</td>
          </tr>
        <?php } ?>
        <tr>
          <td width="30" >&nbsp;</td>
          <td height="1" align="center" ><hr size="2" color="#CCCC99" width="100%" align="center"></td>
          <td >&nbsp;</td>
          </tr>
        <tr>
          <td width="30" height="34" >&nbsp;</td>
          <td height="30" ><img src="../th/images/icon_www2.gif" alt="link" width="15" height="14">&nbsp;Reference&nbsp;: <strong><?php echo $reffer;?></strong></td>
          <td >&nbsp;</td>
          </tr>
        <tr>
          <td width="30" >&nbsp;</td>
          <td height="60" align="center" ><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close-botton.png" alt="close" width="165" height="38" hspace="20" border="0"></a></td>
          <td >&nbsp;</td>
          </tr>
      </table></td>
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