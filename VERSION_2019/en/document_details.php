<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
	$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			
	
	$query="SELECT * FROM  tbl_document_data WHERE id = '".$_GET['ActID']."' ";
	$result = mysql_query($query);
	$data=mysql_fetch_assoc($result);
	
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
<title>วารสาร สมาคมยางพาราไทย [ The Journal Of TRA]</title>
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
 <p>&nbsp;</p>
 <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
      <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-journal.png" alt="history" width="370" height="100"></td>
      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
    </tr>
  </table>
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
          <tr>
            <td width="35">&nbsp;</td>
            <td  align="right">&nbsp;</td>
            <td width="25" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td height="25" rowspan="4" align="center" valign="top"><img src="images/blogicon.gif" width="16" height="16" alt="icon" /></td>
            <td><strong><?php echo $data['title_th']?></strong> &nbsp;
            <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_add'],$icon)?>
			 <hr>
			 </td>
			<td rowspan="4" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="174" valign="top"><?php echo $data['detail_th']?></td>
          </tr>
          <tr>
            <td>
            ดาวโหลดเอกสาร : <?php if($data['document_file_name']!=''){ ?>
              <a href="opendl2.php?file=<?php echo $data['document_file_name']?>&fileid=<?php echo $data['id']?>">
            	<img src="images/download2.gif" alt="download" width="32" height="32" hspace="5" align="absmiddle"></a>
            <?php }else{ ?>
            		ยังไม่มีเอกสารดาวโหลด
            <?php }?>
            </td>
          </tr>
          <tr>
            <td height="26" align="right"><?php GetThaiDate($data['date_add'])?>&nbsp;</td>
          </tr>
         
        
		  		  <?php while($data=mysql_fetch_assoc($result)){ ?>
		  <?php } ?>
          <tr>
            <td >&nbsp;</td>
            <td height="60" align="center" ><a href="#"  onClick="window.close();"><img src="images/close.gif" alt="close" width="26" height="26" hspace="20" border="0">close windows</a></td>
            <td >&nbsp;</td>
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