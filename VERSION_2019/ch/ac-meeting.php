<?php
	$thisFile= basename($PHP_SELF);
		$rowPerPage=25;
				if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}		
	$queryNews="SELECT  *  FROM `tbl_news_and_act`  WHERE  language != '3' ORDER BY  date_act DESC";
		
	$queryLimit =$queryNews." LIMIT $startRow,$rowPerPage ";
	$resultX=mysql_query($queryLimit );
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<style type="text/css">
<!--
body {
	background-color: #D7EFF9;
}

.style1 {color: #815204}
-->
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

<title>กิจกรรมสมาคมยางพาราไทย</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td height="50" align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="100%" align="center" valign="top">
       <table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
        <tr>
            <td align="left" height="40" bgcolor="#F5F5F5" style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; กิจกรรม</td>
		</tr>
        <tr>
          <td align="left" height="40" style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr align="left" valign="top">
              <td width="841" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td width="18">&nbsp;</td>
                  <td width="943" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                    <tr>
                      <td width="19">&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="23" align="right">&nbsp;</td>
                    </tr>
                    <?php $n=1; while($data=mysql_fetch_assoc($resultX)){ 
						$query="SELECT * FROM tbl_news_and_act_file WHERE news_id ='".$data['id']."' AND file_type='1' ORDER BY id ASC LIMIT 0,1 ";
				$resultPic=mysql_query($query);
				$pic=mysql_fetch_assoc($resultPic);
				if($pic['file_name']==''){
							$pic['file_name']="../../tra-no-image.jpg";
					}else{
							$pic['file_name']="../../uploadfile/thb/".$pic['file_name'];
						}
					?>
                    <tr>
                      <td height="30" align="center">&nbsp;</td>
                      <td valign="bottom" class="txt8">Date <?php GetThaiDate($data['date_act'])?></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="104" align="center">&nbsp;</td>
                      
                      <td width="136"><a href="#" onClick="windowOpener(700, 1000, 'windowName', 'detail-activity.php?ActID=<?php echo $data['id']?>')"> <img src="<?php echo $pic['file_name']?>" width="125" height="83" style="vertical-align:middle; border:none;"  class="radius5" /></a></td>
                      
                      <td width="599" align="left" valign="top" style="padding:10px; font-weight: 300;"><span style="padding-top:5px; padding-bottom:5px; padding-left:-15px; padding-right:5px;"><img src="../images/icon/24X24/105.png" alt="webboard" width="20" height="22" style="vertical-align:text-bottom"></span><a href="#" onClick="windowOpener(700, 1000, 'windowName', 'detail-activity.php?ActID=<?php echo $data['id']?>')" id="news"><?php echo $data['topic_en'];?><br>
                        </a>
                        <?php if(($n==1)&&($page==1)){ ?>
                        <img src="images/3_43.gif" alt="new" width="21" height="9" />
                        <?php } ?>
                        <br>
                        <?php 
						  $data['detail_en']=strip_tags($data['detail_en']);
						  $data['detail_en']=iconv_substr($data['detail_en'] ,0 , 200, "UTF-8")."...";
						  echo $data['detail_en'];
						 ?></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#DAD5C2">
                      <td colspan="4" ><img src="images/spacer.gif" width="1" height="1" /></td>
                    </tr>
                    <?php $n++; } ?>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                  <td width="14">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        </table>
       <p class="FontMS10">หน้า <?php  $thisFile=$thisFile."?detail=ac-meeting"; PageDisplay($queryNews,$rowPerPage,$_GET['page'],$thisFile)?><br>
      </p>
        <p>&nbsp;</p>
        <p></p>
      </td>
    </tr>
  </table>
</center>
</body>