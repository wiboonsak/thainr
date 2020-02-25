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
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	background-color: #D7EFF9;
	margin: 0px;
	padding: 0px;
}
</style>


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

<title>สาส์นจากนายกสมาคม TRA PRESIDENT VIEW</title>
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
    <tr>
      <td width="80%" align="center" valign="top"><?php include("title_message.php"); ?></td>
    </tr>
      <tr>
      <td width="80%" align="center" valign="top"></td>
    </tr>
  </table>
  
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-presidentview.jpg" alt="history" width="370" height="80" /></td>
            <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
      </table>
        
        
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="46" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1241" valign="top" bgcolor="#FFFFFF">
                <?php while($message=mysql_fetch_assoc($resultMessage)){ ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="10" align="right" valign="bottom" bgcolor="#FFFFFF"><span class="FontMS10 txt8"  style="padding-right: 20px;">[ <span class="FontMS10 txt8">
                    <?php GetOnlyEngMonth($message['date_post'])?>
                    <?php if($message['date_end']!='0000-00-00'){ echo "&nbsp&nbsp-&nbsp;";GetOnlyEngMonth($message['date_end']); } ?>
                    </span> ] </span></td>
                  </tr>
                  <tr>
                    <td height="15" align="left" bgcolor="#F5F5F5" class="LR10"><img src="../th/images/inside/forms.gif" alt="icon" width="22" height="24" hspace="5"> <strong><a href="message_detail.php?MID=<?php echo $message['id']?>" target="_blank" > <?php if($message['title_en']){ echo $message['title_en'];}else{  echo $message['title_th']; }?></a></strong></td>
                  </tr>
                  <tr>
                    <td height="28" align="left" bgcolor="#F5F5F5" class="FontMS10" style="padding-right: 20px; padding-left: 50px;">
                      
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
                    </td>
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
              <td width="285" align="right" valign="top" bgcolor="#FFFFFF"  style="background-image:url(images/inside/bg-pic-message.gif); background-repeat:repeat-y; background-position:right;"><img src="../th/images/president.png" width="283" height="254"></td>
          </tr>
  </table>     
</center>
