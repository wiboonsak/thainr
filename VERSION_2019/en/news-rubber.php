<?php 
			$rowPerPage = 20;
			$thisFile=basename($PHP_SELF);
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}		
				  if(!isset($xtype)){ $xtype=1;}else{ $xtype=$xtype;}
				  
				  //	$queryNews = "SELECT *  FROM `tbl_news`  WHERE c_type='1'  AND c_lang='1'  ORDER BY c_update DESC   ";
					 	$queryNews = "SELECT *  FROM `tbl_news_data`  WHERE   language='$lang'   ORDER BY date_act DESC   ";
					$queryLimit = $queryNews." LIMIT $startRow , $rowPerPage ";
					$resultNews =mysql_query($queryLimit );					
					//echo $query;
?>
<title>ข่าวสารจากสมาคมยางพาราไทย</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #D7EFF9;
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

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
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


<body>
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
  <tr>
    <td height="50" align="center" valign="top" ></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF" >
      <table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
        <tr align="left" valign="top">
          <td width="841" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3" align="left" height="40" bgcolor="#F5F5F5" style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; News</td>
              </tr>
            <tr>
              <td width="18" >&nbsp;</td>
              <td width="943" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                <tr>
                  <td width="36">&nbsp;</td>
                  <td width="582">&nbsp;</td>
                  <td width="143" align="right">&nbsp;</td>
                  </tr>
                <?php while($data=mysql_fetch_assoc($resultNews)){ ?>
                <tr>
                  <td height="32" align="center" class="bottom-dot"><span class="txt8"><img src="../images/icon/24X24/035.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
                  <td align="left" class="bottom-dot"><!-- <a href="#"  onclick="OpenNew('detail-news.php?ActID=<?php echo $data['id']?>','600', '700' , '200' , '10')"> -->
                    <a href="#" onClick="windowOpener(700, 1000,'windowName', 'detail-news.php?ActID=<?php echo $data['id']?>')"> <?php echo $data['topic_th'];?></a> &nbsp;
                    <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_act'],$icon)?></td>
                  <td align="center" class="bottom-dot"><?php GetEngDate($data['date_act'])?></td>
                  </tr>
                <tr bgcolor="#DAD5C2">
                  <td colspan="3" ></td>
                  </tr>
                <?php } ?>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                </table>
                <p><span class="FontMS10">Page
<?php  $thisFile=$thisFile."?detail=".$_GET['detail']; PageDisplay($queryNews,$rowPerPage,$_GET['page'],$thisFile)?>
                  </span></p></td>
              <td width="14" ></td>
              </tr>
            <tr>
              <td >&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td ></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
  </tr>
  </table>
</center>
</body>