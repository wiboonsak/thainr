<?php
	$query="SELECT *  FROM `tbl_speech` WHERE language='$lang' ORDER BY  id DESC  LIMIT 0 , 1 ";
	$result =mysql_query($query);
	$speech = mysql_fetch_assoc($result);
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style.css" rel="stylesheet" type="text/css" />


<center>

<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="left">&nbsp;</td>
  </tr> 
</table>
<table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4;
box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
  <tr>
    <td height="35" align="left" bgcolor="#F5F5F5" style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; PRESIDENT VIEW      	
      </td>
  </tr>
  <tr>
    <td width="24%" height="40"  class="h-catalog">&nbsp;&nbsp;&nbsp;<?php echo $speech['title_th']?></td>
  </tr>
  <tr>
    <td height="168" colspan="2" align="center" class="FontMS10" >	
	<table width="90%" border="0" cellspacing="0" cellpadding="0" style="padding:20px 0px;">
  <tr>
    <td>
		  <MARQUEE  onmouseover=this.stop() 
                                onmouseout=this.start() scrollAmount=2 
                                scrollDelay=100 direction=up height=160 width="100%">
<div align="left" class="style1">
					<?php 						
					$speech['detail_th']= ereg_replace("<P>", " ", $speech['detail_th']);
					$speech['detail_th']= ereg_replace("</P>","<br>",$speech['detail_th']); 
					echo $speech['detail_th'];?></div>
</MARQUEE>
	</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td height="39" colspan="2" align="right" style="font-size:9pt">Monthly of <?php GetOnlyEngMonth($speech['date_post'])?><?php if($speech['date_end']!='0000-00-00'){ echo "&nbsp&nbsp-&nbsp;";GetOnlyEngMonth($speech['date_end']); } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
    </tr>
</table>
</center>
