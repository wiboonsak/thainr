<?php
			$rowPerPage = 20;
			$thisFile=basename($PHP_SELF);
				if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
	$queryMessage="SELECT *  FROM `tbl_speech` WHERE 1 AND language='$lang' ORDER BY  date_post DESC    ";
	$queryLimit = $queryMessage." LIMIT $startRow , $rowPerPage ";
	$resultMessage =mysql_query($queryLimit );
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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



<!--ห้ามลากดำ+ห้าม ctrl+A,C ในโค้ดเดียว -->
<script language="JavaScript1.2">
function disableselect(e){
return false
}
function reEnable(){
return true
}
//if IE4+
document.onselectstart=new Function ("return false")
//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>

<!--ห้ามคลิกขวา -->
<script language=JavaScript>
<!--
var message="Function Disabled!";
///////////////////////////////////
function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
// --> 
</script>


<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #815204}
#apDiv1 {
	position:absolute;
	left:874px;
	top:487px;
	width:349px;
	height:211px;
	z-index:1;
}
-->
</style>
<title>สาส์นจากนายกสมาคม TRA PRESIDENT VIEW</title>
<div id="apDiv1"><img src="../th/images/president.png" width="411" height="302"></div>
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu.php"); ?></td>
      <td align="center" valign="top"><?php include("title_message.php"); ?>
        <br>
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
            <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-presidentview.jpg" alt="history" width="370" height="100" /></td>
            <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
          </tr>
        </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="30" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="577" valign="top" bgcolor="#FFFFFF">
                <?php while($message=mysql_fetch_assoc($resultMessage)){ ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="10" align="right" valign="bottom" bgcolor="#FFFFFF"><span class="FontMS10 txt8">[ <span class="FontMS10 txt8">
                    <?php GetOnlyEngMonth($message['date_post'])?>
                    <?php if($message['date_end']!='0000-00-00'){ echo "&nbsp&nbsp-&nbsp;";GetOnlyEngMonth($message['date_end']); } ?>
                    </span> ]</span></td>
                  </tr>
                  <tr>
                    <td height="15" align="left" bgcolor="#F5F5F5" class="LR10"><img src="../th/images/inside/forms.gif" alt="icon" width="22" height="24" hspace="5"> <strong><a href="message_detail.php?MID=<?php echo $message['id']?>" target="_blank" > <?php if($message['title_en']){ echo $message['title_en'];}else{  echo $message['title_th']; }?></a></strong></td>
                  </tr>
                  <tr>
                    <td height="28" align="left" bgcolor="#F5F5F5" class="FontMS10"><dd>
                        <?php
							if($message['detail_en']){ 
									 $message['detail_th'] = $message['detail_en'];
							 }else{
									 $message['detail_th'] = $message['detail_th'];							 			
							 }
							$message['detail_th']= ereg_replace("<P>", " ", $message['detail_th']);
							$message['detail_th']= ereg_replace("</P>","<br>",$message['detail_th']);
							 
							$checktitle=strlen($message['detail_th']);
							if($checktitle > 500){
									$message['detail_th']=substr($message['detail_th'], 0, 500)."...";
								}else{
									$message['detail_th']=$message['detail_th'];
								}
							 
							echo $message['detail_th'];
					?>
                    </dd></td>
                  </tr>
                  <tr>
                    <td height="10" align="left" bgcolor="#F5F5F5" class="FontMS10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ <a href="message_detail.php?MID=<?php echo $message['id']?>" target="_blank" >more...</a>] &nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20" align="right" class="FontMS10"><hr></td>
                  </tr>
                </table>
                <div align="center" class="FontMS9">
                <?php } ?>
                <br>
Page <span class="cat_desc">
<?php   $thisFile=$thisFile."?detail=message"; PageDisplay($queryMessage,$rowPerPage,$_GET['page'],$thisFile);?>
</span>
                </div>
                <p>&nbsp;</p></td>
              <td width="283" align="right" valign="top" bgcolor="#FFFFFF"  style="background-image:url(images/inside/bg-pic-message.gif); background-repeat:repeat-y; background-position:right;">&nbsp;</td>
          </tr>
  </table>
        <br />
           
        </td>
    </tr>
  </table>
</center>
