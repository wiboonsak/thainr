<?php 
			$rowPerPage = 30;
			$thisFile=basename($PHP_SELF);
				if((!$page)||($page==1)){
							$page=1;
							$startRow=0;
					}else{
							$startRow=($page-1)*$rowPerPage;
				  }
				  if(!isset($xtype)){ $xtype=1;}else{ $xtype=$xtype;}
				  
			$queryNews = "SELECT *  FROM `tbl_misc_data`  ORDER BY date_post   DESC   ";
					$queryLimit = $queryNews." LIMIT $startRow , $rowPerPage ";
					$resultNews =mysql_query($queryLimit );						
					//echo $query;
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" /><style type="text/css">
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

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<title>ข่าวสารจากสมาคมยางพาราไทย</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg','images/inside/nr_over_55.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_news.php"); ?></td>
      <td align="center" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="134"><span class="L50"><img src="../images/keep-en.jpg" alt="Knowledge" /></span></td>
          <td background="../th/images/inside/bg-tab.gif">&nbsp;</td>
        </tr>
      </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td width="18" style="background-image: url(../th/images/inside/bg-tab-L.gif); background-repeat: repeat-y; background-position: left;"><img src="../th/images/spacer.gif" width="18" height="6" /></td>
                  <td width="1305" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                    <tr>
                      <td width="36">&nbsp;</td>
                      <td width="582">&nbsp;</td>
                      <td width="143" align="right">&nbsp;</td>
                    </tr>
                    <?php while($data=mysql_fetch_assoc($resultNews)){ ?>
                    <tr>
                      <td height="25" align="center"><span class="txt8"><img src="../images/icon/24X24/035.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
                      <td align="left"><!-- <a href="#"  onclick="OpenNew('detail-news.php?ActID=<?php echo $data['id']?>','600', '700' , '200' , '10')"> -->
                        <a href="#" onclick=" windowOpener(750, 1000, 'windowName', 'popknowledge.php?topic_id=<?php echo $data['id']?>')">
					  <?php echo $data['title_th'];?></a> &nbsp;
                        <?php  $icon="<img src=\"../th/images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_post'],$icon)?></td>
                      <td align="center"><?php GetEngDate($data['date_post'])?></td>
                    </tr>
                    <tr bgcolor="#DAD5C2">
                      <td colspan="3" ><img src="images/spacer.gif" alt="" width="1" height="1" /></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                  <td width="14" style="background-image: url(../th/images/inside/bg-tab-R.gif); background-repeat: repeat-y; background-position: right;"></td>
                </tr>
                <tr>
                  <td width="18" height="10" valign="top" align="left"><img src="../th/images/inside/bg-tab-CL.gif" alt="thai nr" width="18" height="10" /></td>
                  <td height="10" align="center" background="../th/images/inside/bg-tab-bot.gif"></td>
                  <td width="14" height="10" align="right"><img src="../th/images/inside/bg-tab-CR.gif" alt="thai nr" width="14" height="10" /></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <p class="FontMS10">Page:
            <?php  $thisFile=$thisFile."?detail=".$_GET['detail']; PageDisplay($queryNews,$rowPerPage,$_GET['page'],$thisFile)?>
        </p>
        <p class="FontMS10">&nbsp;</p>
        <p>&nbsp;</p>
         
      </td>
    </tr>
  </table>
</center>
</body>