<?php
	$thisFile= basename($PHP_SELF);
		$rowPerPage=25;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}		
	//$queryNews="SELECT  *  FROM `tbl_news_and_act` WHERE cate_id = '1'  AND language='$lang'      ORDER BY  date_act DESC ";
		$queryNews="SELECT  *  FROM `tbl_news_and_act` WHERE cate_id = '1' AND language = '3' ORDER BY  date_act DESC ";
	$queryLimit =$queryNews." LIMIT $startRow,$rowPerPage ";
	$resultXL =mysql_query($queryLimit );
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
<style type="text/css">
<!--
.style1 {color: #815204}
-->
</style>
<title>กิจกรรมสมาคมยางพาราไทย</title><body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_activity.php"); ?></td>
      <td align="center" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="160"><img src="../th/images/inside/nr-en-over_30.jpg" alt="TRA ACTIVITIES"  width="160" height="35" border="0" ></td>
          <td background="../th/images/inside/bg-tab.gif">&nbsp;</td>
        </tr>
      </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td width="841" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td width="18" background="images/inside/bg-tab-L.gif"><img src="../th/images/spacer.gif" alt="" width="18" height="6" /></td>
                <td width="943" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                  <tr>
                    <td width="15">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td width="27" align="right">&nbsp;</td>
                  </tr>
                  <?php $n=1; while($data=mysql_fetch_assoc($resultXL)){ 
						$query="SELECT * FROM tbl_news_and_act_file WHERE news_id ='".$data['id']."' AND file_type='1' ORDER BY id ASC LIMIT 0,1 ";
				$resultPic=mysql_query($query);
				$pic=mysql_fetch_assoc($resultPic);
				if($pic['file_name']==''){
							$pic['file_name']="../tra-no-image.jpg";
					}else{
							$pic['file_name']="../uploadfile/thb/".$pic['file_name'];
						}
					?>
                  <tr>
                    <td height="25" align="center">&nbsp;</td>
                    <td align="left" valign="bottom" class="txt8">Date&nbsp;
                      <?php GetEngDate($data['date_act'])?></td>
                    <td style="padding-top:5px; padding-bottom:5px; padding-left:10px; padding-right:5px;" align="left" valign="top">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="108" align="center"><span style="padding-top:5px; padding-bottom:5px; padding-left:10px; padding-right:5px;"></span></td>
                    <td width="136"><a href="#" onClick="windowOpener(700, 1000, 'windowName', 'detail-activity.php?ActID=<?php echo $data['id']?>')"> <img src="<?php echo $pic['file_name']?>" alt="" width="125" height="90" style="vertical-align:middle; border:none;" class="radius5" /></a></td>
                    <td width="590" style="padding-top:5px; padding-bottom:5px; padding-left:10px; padding-right:5px;" align="left" valign="top"><img src="../images/icon/24X24/105.png" alt="webboard" width="24" height="24" style="vertical-align:text-bottom"><a href="#" onClick="windowOpener(700, 1000, 'windowName', 'detail-activity.php?ActID=<?php echo $data['id']?>')" id="news"><strong><?php echo $data['topic_ch'];?></strong></a>&nbsp;
                      <?php if(($n==1)&&($page==1)){ ?>
                      <img src="../th/images/3_43.gif" alt="new" width="21" height="9" />
                      <?php } ?>
                      <br>
                      <br>
                      <span style="padding-top:5px; padding-bottom:5px; padding-left:10px; padding-right:5px;">
                      <?php 
						  $data['detail_en']=strip_tags($data['detail_ch']);
						  $data['detail_en']=iconv_substr($data['detail_ch'] ,0 , 500, "UTF-8")."..";
						  echo $data['detail_ch'];
						 ?>
                      </span></td>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr bgcolor="#DAD5C2">
                    <td colspan="4" ><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
                  </tr>
                  <?php $n++; } ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
                <td width="14" background="images/inside/bg-tab-R.gif">&nbsp;</td>
              </tr>
              <tr>
                <td height="10" valign="top"><img src="../th/images/inside/bg-tab-CL.gif" alt="thai nr" width="18" height="10" /></td>
                <td height="10" align="center" background="images/inside/bg-tab-bot.gif"></td>
                <td height="10"><img src="../th/images/inside/bg-tab-CR.gif" alt="thai nr" width="14" height="10" /></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <p class="FontMS10">Page:
          <?php  $thisFile=$thisFile."?detail=ac-special"; PageDisplay($queryNews,$rowPerPage,$_GET['page'],$thisFile)?>
        </p>
        <p class="FontMS10"><br></p>
         
      </td>
    </tr>
  </table>
</center>
</body>