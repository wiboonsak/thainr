<?php if($action=='Send'){ 
							$dates=date("Y-m-d");
							$to  = 'tra_web@csloxinfo.com' . ', '; // note the comma
							$subject ="ข้อความติดต่อ จาก  ".$cusname;
							$message="<table width=400 border=0 cellspacing=2 cellpadding=2>
																  <tr>
																	<td width=130 height=25>&#3639;ชื่อผู้ส่งข้อความ : </td>
																	<td width=260>$cusname</td>
																  </tr>
																  <tr>
																	<td  height=25>E-mail</td>
																	<td>$cusemail</td>
																  </tr>
																			  <tr>
																	<td  height=25>โทรศัพท์</td>
																	<td>$custelephpone</td>
																  </tr>
																  <tr  height=25>
																	<td>รายละเอียด</td>
																	<td>$cusdetail</td>
																  </tr>
																</table> ";
										// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=window-874' . "\r\n";
				$headers .= 'To: สมาคมยางพาราไทย ' . "\r\n";
				$headers .= 'From: '.$cusname.'<'.$cusemail .'>' . "\r\n";
				
				mail($to, $subject,$message, $headers);
				?>
			<script language="javascript">
			alert('Message sent to Thai Rubber Association');
			//document.location='http://www.me-fi.com/thainr/th/?detail=contact';
			</script>
			<?php
	}
?><meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
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
.style10 {color: #996600}
-->
</style>
<title>สาส์นจากนายกสมาคม TRA PRESIDENT VIEW</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td height="50" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td width="877" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-contact.jpg" alt="history" width="341" height="80" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="52" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="672" align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
                <table width="80%" border="0" cellpadding="0" cellspacing="5" class="FontMS10">
                  <tr>
                    <td width="618" height="20" align="left" bgcolor="#FFFFFF" class="txt-10 style10">Please type your suggest and others message in form below : </td>
                  </tr>
                  <tr>
                    <td height="2" bgcolor="#CCCCCC" ></td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="txt-10"><table width="87%" border="0" cellpadding="2" cellspacing="0" class="FontMS10">
                      <tr>
                        <td height="10"></td>
                        <td height="10"></td>
                        </tr>
                      <tr>
                        <td width="18%" height="20" align="right"><label><span class="txt-copyright">Name : </span></label></td>
                        <td width="82%" height="20"><input name="cusname" type="text" class="input-contact" id="cusname" size="30" ></td>
                        </tr>
                      <tr>
                        <td height="20" align="right" class="txt-copyright">Telephone : </td>
                        <td height="20"><input name="cusemail" type="text" class="input-contact" id="cusemail" size="30" ></td>
                        </tr>
                      <tr>
                        <td height="20" align="right">E-Mail&nbsp; : </td>
                        <td height="20"><input name="custelephpone" type="text" class="input-contact" id="custelephpone" size="30"  ></td>
                        </tr>
                      
                      <tr>
                        <td align="right" valign="top" class="txt-copyright">Message : </td>
                        <td><textarea name="cusdetail" cols="50" rows="5" class="contact-input-2" id="cusdetail" ></textarea></td>
                        </tr>
                      <tr>
                        <td></td>
                        <td><input type="submit" name="Submit" value="  SEND  " class="FontMS10" width="60" onClick="form1.action.value='Send';form1.submit();">
                          <input name="action" type="hidden" id="action">
                          <input type="submit" name="Submit2" value=" CANCEL"  class="FontMS10" width="60"></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
              </form>
            </td>
            <td width="14" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5" class="FontMS10">
              <tr>
                <td height="5" colspan="2"  bgcolor="#CCCCCC"></td>
                </tr>
              <tr>
                <td width="46%" align="left" valign="top"><p><img src="../th/images/all.gif" alt="office" width="23" height="21"><strong>OFFICE :</strong></p>
                  <blockquote>
                    <p><strong>                        The Thai Rubber Association</strong><br>
                      45, 47 Chotivithayakun 3 Rd., <br>
                      Hatyai Songkhla Thailand 90110<br> 
                      <BR>
                      </p>
                  </blockquote></td>
                <td width="54%" align="left" valign="top"><p><img src="../th/images/btn_tel.gif" alt="telephone" width="10" height="10" hspace="5" vspace="5" align="absbottom"><strong>TELEPHONE : </strong></p>
                  <blockquote>
                    <p> <strong>TEL.&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 074-429011-2 , 074-429311<br>
                      <strong>FAX.</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 074-429312<br>
                      <strong>E-MAIL</strong>&nbsp;&nbsp; tra@csloxinfo.com<br>
                      </p>
                  </blockquote></td>
                </tr>
            </table></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td valign="top" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#FFFFFF" class="FontMS10"><a href="../images/Map-Thainr-2.jpg" target="_blank"><img src="../images/Map-Thainr-2-ss.jpg" alt="office" width="600" height="469" style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"/></a><a href="../images/Map-Thainr.jpg" target="_blank"></a></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</center>
</body>