<?php if($_SESSION['loginDocument']!='Yes'){
		
	echo "<script>alert('กรุณาเข้าสู่ระบบก่อนจะดาวโหลดวารสาร'); window.location.href='journal.php';</script>";
	
	}
	// webboard 
	$queryNews = "SELECT *  FROM `tbl_document_data`  ORDER BY date_add DESC LIMIT 0,15  ";
	
	$resultNews =mysql_query($queryNews );			

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="ajaxtabs/tabcontent.css" />
<script type="text/javascript" src="ajaxtabs/tabcontent.js">
<!--


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

//-->//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>วารสาร สมาคมยางพาราไทย [ The Journal Of TRA]</title>
<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td width="261" align="left" valign="top"><img src="images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td  align="right" valign="top"><img src="images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu.php"); ?></td>
      <td align="center" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="18" background="../images/b-2.gif"><img src="../images/b-1.gif" width="18" height="34"></td>
          <td background="../images/b-2.gif"><?php include("top-message.php"); ?></td>
          <td width="18"><img src="../images/b-3.gif" width="18" height="34"></td>
        </tr>
      </table>
       <br><?php include("top-banner.php"); ?>
       <table width="95%" border="0" cellspacing="0" cellpadding="0">
         <tr>
	      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
	      <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-journal.png" alt="history" width="370" height="100"></td>
	      <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
	      </tr>
	    </table>
	  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    
	    <tr align="left" valign="top">
	      <td width="841" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	        <tr>
	          <td width="18" ><img src="images/spacer.gif" width="18" height="6" /></td>
	          <td width="943" align="left">
				  <table width="100%">
				  	<tr>
						<?php $n=1;$col=4; while($data=mysql_fetch_assoc($resultNews)){ ?>
						<td width="180" align="center">
						 <a href="opendl2.php?file=<?php echo $data['document_file_name']?>&fileid=<?php echo $data['id']?>">
						<?php if($data['cover_img']!=''){ ?>
						<img src="<?php echo "../uploadfile/".$data['cover_img'];?>" style="width: 180px; height: 255px; border: none">
						<?php }else{ echo '<img src="../images/no-img.jpg" style="border:none">';}?>
							</a>	
						<p> <a href="opendl2.php?file=<?php echo $data['document_file_name']?>&fileid=<?php echo $data['id']?>"> <?php echo $data['title_th'];?></a>
							</p>
						</td> 
						<?php  if($n==$col){ echo "</tr><td>";$n=0; } $n++; }?>
					</tr>
				  </table>
				  
				  
				  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
	            <tr>
	              <td width="36">&nbsp;</td>
	              <td width="582">&nbsp;</td>
	              <td width="143" align="right">&nbsp;</td>
	              </tr>
	            <?php while($data=mysql_fetch_assoc($resultNews)){ ?>
	            <tr>
	              <td height="25" align="center"><span class="txt8"><img src="../images/icon/24X24/035.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
	              <td align="left"><!--<a href="#"  onclick="OpenNew('detail-news.php?ActID=<?php echo $data['c_id']?>','600', '700' , '200' , '10')"> -->
	                <a href="#" onClick="windowOpener(700, 1000, 'windowName', 'document_details.php?ActID=<?php echo $data['id']?>')"> <?php echo $data['title_th'];?></a> &nbsp;
	                <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_add'],$icon)?></td>
	              <td align="center"><?php GetThaiDate($data['date_add'])?></td>
	              </tr>
	            <tr bgcolor="#DAD5C2">
	              <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
	              </tr>
	            <?php } ?>
	            <tr>
	              <td>&nbsp;</td>
	              <td>&nbsp;</td>
	              <td>&nbsp;</td>
	              </tr>
	            </table>
				
				
				
				</td>
	          <td width="14" >&nbsp;</td>
	          </tr>
	        <tr>
	          <td height="10" valign="top">&nbsp;</td>
	          <td height="10" align="center" ></td>
	          <td height="10">&nbsp;</td>
	          </tr>
	        </table></td>
	      </tr>
	    </table>
	  <p>&nbsp;</p>
<?php include("mid-banner.php"); ?>
<br>

<!--
   <table width="1100" height="440" border="0" align="center" cellpadding="0" cellspacing="0"  style="background-image:url(../Annual_2017/bg-annual-2017-video4-th.jpg); background-repeat:no-repeat">
     <tr>
       <td width="551" height="111" align="left" valign="top">&nbsp;</td>
       <td width="549" align="left" valign="top">&nbsp;</td>
     </tr>
     <tr>
       <td align="center" valign="top"><iframe src="../Annual_2017/dinner/slide/index.html"  width="500" height="290" frameborder="0"  scrolling="no"></iframe></td>
       <td width="549" align="center" valign="top"><iframe src="../Annual_2017/golf/slide/index.html"  width="500" height="290"  frameborder="0"  scrolling="no"></iframe></td>
     </tr>
   </table>
-->

   <p>
     
     <!-- <p><iframe src="../activity-2013/Dinner-1.html" width="784" height="451" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe></p>
        <p></p>
       <p><iframe src="../activity-2013/Golf.html" width="784" height="510" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe></p>
       <p></p>  
          <p><iframe src="../activity-2013/ARBC.html" width="784" height="451" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe></p>
       -->
     
   </p>

          
  <!------WEBBOARD-------><!------WEBBOARD------->      
        
<!--<iframe src="../column.html" width="100%" height="800" frameborder="0" align="left" marginheight="0" marginwidth="0" scrolling="no"></iframe> --></td>
    </tr>
  </table>
</center>
</body>