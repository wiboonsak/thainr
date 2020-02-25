<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
	//---------------------------------------------------------------------------------------------------------------------------------------------------

	$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
	mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			
	
	$query="SELECT * FROM tbl_information_data WHERE id = '".$_GET['ActID']."' ";
	$result = mysql_query($query);
	$data=mysql_fetch_assoc($result);

	$lang = $_GET['lang'];
    
    if($lang==''){
		$lang=1;
	}


    if($lang=='1'){
		$titleSub = $data['title_th'];
	}else if($lang=='2'){
		$titleSub = $data['title_en'];
	}else if($lang=='3'){
		$titleSub = $data['title_en'];

	}

	//$query="SELECT * FROM  `tbl_news_data_file`  WHERE  news_id =  '".$_GET['ActID']."'   ORDER BY  file_type   ";
	//$result = mysql_query($query);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
body {
	/*-webkit-filter: grayscale(100%);*/
	margin: 0px;
	padding: 0px;
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
<title>ข้อมูลวิชาการ</title>
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
 <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
      <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-infomation.jpg" alt="history" width="400" height="100"></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
    </tr>
  </table>
  -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
          <tr>
            <td width="35" height="40" align="center"><span class="txt8"><img src="../images/icon-infomation.jpg" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
            <td height="40"><strong><?php echo $titleSub?></strong> &nbsp;
            <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_add'],$icon)?></td>
			<td width="25" height="40" align="center">&nbsp;</td>
          </tr>
          <tr bgcolor="#DAD5C2">
            <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
          </tr>
          <tr  bgcolor="#DAD5C2">
            <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
          </tr>
		  		 
          <tr>
            <td bgcolor="#ebebeb">&nbsp;</td>
            <td align="center" bgcolor="#ebebeb">&nbsp;</td>
            <td bgcolor="#ebebeb">&nbsp;</td>
          </tr>
          <tr>
                    <td bgcolor="#ebebeb">&nbsp;</td>
                    <td align="center" bgcolor="#ebebeb">
                  		<object type="application/pdf" data="http://www.thainr.com/uploadfile/<?php echo $data['pdf_file']?>" width="100%" height="650" ></object>
                    </td>
                    <td bgcolor="#ebebeb">&nbsp;</td>
          </tr>
		 
          <tr>
            <td height="34" bgcolor="#ebebeb">&nbsp;</td>
            <td height="30" bgcolor="#ebebeb">&nbsp;</td>
            <td bgcolor="#ebebeb">&nbsp;</td>
          </tr>
          <tr>
            <td height="17" bgcolor="#ebebeb">&nbsp;</td>
            <td height="13" bgcolor="#ebebeb"><strong>ที่มา: </strong><?php echo $data['refference_data'];?></td>
            <td rowspan="2" bgcolor="#ebebeb">&nbsp;</td>
          </tr>
          <tr>
            <td height="17" bgcolor="#ebebeb">&nbsp;</td>
            <td height="17" bgcolor="#ebebeb"><strong>วันที่: </strong>
				<?php if($lang='1'){ echo GetThaiDate($data['date_add']); }else{ echo GetEngDate($data['date_add']);} ?>
			</td>
          </tr>
          <tr>
            <td bgcolor="#ebebeb">&nbsp;</td>
            <td height="60" align="center" bgcolor="#ebebeb"><a href="#"  onClick="window.close();"><img src="images/close.gif" alt="close" width="26" height="26" hspace="20" border="0">close windows</a></td>
            <td bgcolor="#ebebeb">&nbsp;</td>
          </tr>
      </table></td>
      <td width="20" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
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