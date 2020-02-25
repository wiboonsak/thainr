<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  
	$newsletterQ="SELECT * FROM   `tbl_newsletter_data` WHERE  first_page='1'  ORDER BY id DESC LIMIT 0, 1";
	$resultLetter=mysql_query($newsletterQ);
	$letterData=mysql_fetch_assoc($resultLetter);
	
?>
<link href="style.css" rel="stylesheet" type="text/css">
<br />
<table width="215" border="0" cellpadding="0" cellspacing="0" class="radius5">
  <tr>
    <td height="95" align="left" valign="top" class="txt10-black"><img src="images/h-newsletter-th.png" width="193" height="95" style="margin-left:-12px;" /></td>
  </tr>
  <tr>
    <td height="25"   align="center" valign="top" ><table width="205" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10">
          <table width="210" border="0" cellpadding="5" cellspacing="0">
           <tr>
             <td height="30" align="center" bgcolor="#ccddb1" class="txt-white-radius">ตัวอย่างวารสารฉบับปัจจุบัน</td>
           <tr>
                <td height="25" align="center"><strong><?php echo $letterData['topic']?></strong></td>
              <tr>
            <tr>
              <td height="150" align="center"><p style="width:150px" class="radius_news"><?php if($letterData['images']!=''){
				echo "<a href='../uploadfile/".$letterData['images']."' target='_blank'>";
				echo "<img src='../uploadfile/thb/".$letterData['images']."' border='0'>";
		}?></p></td>
              </tr>
                <td height="53" align="center" >
                <a href="#" onClick="windowOpener(650, 1000, 'windowName', 'register_member.php?MF=1')">
                <img src="images/newsletter.jpg" alt="" width="152" height="43" style="opacity:1;filter:alpha(opacity=100)" onmouseover="this.style.opacity=0.7;this.filters.alpha.opacity=70"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"/></a></td>
            </table>
          </td>
      </tr>
    </table></td>
  </tr>
</table><br />