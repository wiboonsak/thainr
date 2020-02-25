<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  
	$newsletterQ="SELECT * FROM   `tbl_newsletter_data` WHERE  first_page='1'  ORDER BY id DESC LIMIT 0, 1";
	$resultLetter=mysql_query($newsletterQ);
	$letterData=mysql_fetch_assoc($resultLetter);
	
?>
<link href="style.css" rel="stylesheet" type="text/css">
<table width="225" border="0" cellpadding="0" cellspacing="0" class="radius5">
  <tr>
    <td height="25" align="left" valign="top" class="txt10-black"><img src="images/h-newsletter-en.png" width="193" height="95" style="margin-left:-15px;" /></td>
  </tr>
  <tr>
    <td height="25"   align="center" valign="top" ><table width="205" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" bgcolor="#FFFFFF" class="FontMS10">
          <table width="210" border="0" cellpadding="5" cellspacing="0">
           <tr>
             <td height="24" align="center" bgcolor="#ccddb1" class="txt-white-radius">Newsletter Example</td>
           <tr>
                <td align="center"><strong><?php echo $letterData['topic']?></strong></td>
              <tr>
            <tr>
              <td align="center"><p ><?php if($letterData['images']!=''){
				echo "<a href='../uploadfile/".$letterData['images']."' target='_blank'>";
				echo "<img src='../uploadfile/thb/".$letterData['images']."' border='0'>";
		}?></p></td>
              </tr>
              
                <td align="center" >
                <a href="#" onclick="windowOpener(650, 1000, 'windowName', '../th/register_member.php?MF=1')"><img src="images/newsletter.jpg" alt="Newsletter" width="215" height="43" style="opacity:1;filter:alpha(opacity=100)" onmouseover="this.style.opacity=0.7;this.filters.alpha.opacity=70"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"/></a><a href="#" onClick="windowOpener(650, 750, 'windowName', 'register_member.php?MF=1')"></a></td>
            </table>
          </td>
      </tr>
    </table></td>
  </tr>
</table><br />