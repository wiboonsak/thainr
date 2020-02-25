<?php 
			$rowPerPage = 20;
			$thisFile=basename($PHP_SELF);
				if((!$page)||($page==1)){
							$page=1;
							$startRow=0;
					}else{
							$startRow=($page-1)*$rowPerPage;
				  }
				  if(!isset($xtype)){ $xtype=1;}else{ $xtype=$xtype;}
				  
				    $queryNews = "SELECT *  FROM `tbl_member_data`  WHERE language='2'   ORDER BY name ASC  ";
					$queryLimit = $queryNews." LIMIT $startRow , $rowPerPage ";
					$resultNews =mysql_query($queryNews );						
					//echo $query;
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
<title>TRA Membership</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_history.php"); ?></td>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
          <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-MemberCorporation.jpg" alt="history" width="370" height="100" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="47" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="449" align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10" ><table border="0" cellpadding="0" cellspacing="0">
              <col width="72">
              <col width="481">
                 <?php $a=1; mysql_data_seek($resultNews,0); 
                	while($data=mysql_fetch_assoc($resultNews)){ ?>
                      <tr height="19">
                        <td width="36" align="right" class="LR10"><?php echo $a?></td>
						  <td height="22" align="left" style="text-transform: uppercase !important"><a href="http://thainr.com/en/detail_member/member_dataen.php?&IDS=<?php echo $data['id']?>"  target="_blank"><?php echo $data['name']?>&nbsp;</a></td>
                      </tr>
                   <?php $a++;} ?>
            </table></td>
            <td width="336" align="right" valign="top" bgcolor="#FFFFFF" ><?php $query = "SELECT * FROM   `tbl_rubber_assosinate_pdf`   WHERE  lang= '".$lang."'  ";		
			
				$data=mysql_fetch_assoc(mysql_query($query));
				$detail_th = $data['detail'];
				$_POST['topic_id']=$data['id']; ?>
            <a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank"> <img src="../th/images/banner_pdf.png" width="320" height="141" border="0" align="absmiddle" style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100" 
/></a></td>
            <td width="25" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td width="449" align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10" >&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <br />
        <p align="center"><a href="#"></a></p></td>
    </tr>
  </table>
</center>
</body>