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


<title>ข่าวสารจากสมาคมยางพาราไทย</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
	
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
	font-family: 'Sarabun', sans-serif;
}
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

	
<body>
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" >&nbsp;</td>
      <td align="left"><img src="../images/h-title-2019/h-news.jpg" alt="history" width="354" height="79"></td>
		<td width="26" align="right" valign="top"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close.png" alt="history" width="50" height="50"></a></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td >&nbsp;</td>
      <td valign="top" >&nbsp;</td>
      <td align="right" valign="top" >&nbsp;</td>
    </tr>
    <tr>
      <td width="50" >&nbsp;</td>
      <td valign="top" >
         
         <table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
          <tr>
            <td>&nbsp;</td>
            <td  align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td width="35">&nbsp;</td>
            <td  align="right"><a href="pdf_news.php?ActID=<?php echo $_GET['ActID']?>" target="_blank"><img src="pdficon.png" width="50" height="50" hspace="5" border="0"></a> <a href="#"><img src="printicon.png" width="50" height="50" hspace="5" border="0" onClick="window.print();"></a></td>
            <td width="25" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td height="43" align="center"><img src="images/blogicon.gif" width="16" height="16" alt="icon" /></td>
            <td><strong><?php echo $data['topic_th']?></strong> &nbsp;
            <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['c_update'],$icon)?></td>
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
            <td><br><?php echo $data['detail_th']?>
            
            <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
            </td>
            <td>&nbsp;</td>
          </tr>
		  		  <?php while($data=mysql_fetch_assoc($result)){ ?>
          <tr>
            <td height="34">&nbsp;</td>
            <td align="center">
			<?php if($data['file_type']==0){ ?>
			<a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_th']?>"><img src="../images/icon/30x30/103.png" width="30" height="30"></a> <a href="../uploadfile/<?php echo $data['file_name']?>" class="Saan" target="_blank">Download file</a> <?php echo $data['w_th']?>
			<?php } else  { ?>
            <a href="../uploadfile/<?php echo $data['file_name']?>" rel="lightbox[roadtrip]">
			<img src="../uploadfile/thb/<?php echo $data['file_name']?>" style="border:none" class="radius5"></a><br>
			<span class="txt8"><?php echo $data['w_th']?></span><br><br>
			<?php } ?>			</td>
            <td>&nbsp;</td>
          </tr>
		  <?php } ?>
          <tr>
            <td>&nbsp;</td>
            <td height="1" align="center"><hr size="2" color="#CCCC99" width="100%" align="center"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="34">&nbsp;</td>
            <td height="30"><img src="images/icon_www2.gif" alt="link" width="15" height="14">&nbsp;Source&nbsp;: <strong><?php echo $reffer;?></strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="60" align="center"><a href="#"  onClick="window.close();"><img src="../images/h-title-2019/close-botton.png" alt="close" width="165" height="38" hspace="20" border="0"></a></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="10">&nbsp;</td>
            <td height="10" align="center">&nbsp;</td>
            <td height="10">&nbsp;</td>
          </tr>
      </table>
      <p>&nbsp;</p></td>
      <td width="20" align="right" valign="top" >&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
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