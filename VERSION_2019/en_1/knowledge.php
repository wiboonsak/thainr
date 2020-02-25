<?php 
		$queryKnow="SELECT * FROM tbl_misc_data ORDER BY id DESC LIMIT 0, 5 ";
	$resultKnow =mysql_query($queryKnow);
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<a href="../faq-thainr.pdf" target="_blank"><img src="../images/FAQ-en.png" width="209" height="89" border="0" style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onMouseOut="this.style.opacity=1;this.filters.alpha.opacity=100"/></a><br>
<br>
<div class="L50"><img src="../images/funknow.jpg" alt="Knowledge" width="222" height="38" /></div>
<table bgcolor="#e7e7e7" width="222" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr>
    <td height="10" valign="top" class="FontMS10">&nbsp;</td>
  </tr>
  <?php 
  		while($know=mysql_fetch_assoc($resultKnow)){ 
  ?>
 <tr>
    <td align="left" valign="top" ><img src="../images/10_14.gif" alt="icon" width="16" height="16" hspace="3" align="left" />
	   <a href="#" onclick=" windowOpener(750, 1000, 'windowName', 'popknowledge.php?topic_id=<?php echo $know['id']?>')">
	<?php echo $know['title_th']?>
	</a>&nbsp;&nbsp; <?php  $icon="<img src=\"../th/images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($know['date_post'],$icon)?></td>
  </tr>
  <tr>
    <td valign="top" class="FontMS10"><hr width="90%" /></td>
  </tr>
  <?php } ?>
  <tr>
    <td align="center" valign="top" width="100%">
    <button class="moreknowledge" type="button" onClick="window.location.href='?detail=knowledge-all'" style="cursor: pointer">View all knowledge</button> 
    </td>
  </tr>
</table>
<br>
<a href="http://www.thainr.com/Library_ThaiNR.pdf" target="_blank"><img src="../images/library.gif" width="205" height="251" border="0" style="border: none; opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100" /></a>
<!--<table width="197" height="280" border="0" cellspacing="0" cellpadding="0"  style="background-image:url(../images/weather.png); background-repeat:no-repeat; margin-left:15px; margin-top:15px;">
      <tr>
        <td height="58">&nbsp;</td>
        </tr>
      <tr>
        <td align="center"><iframe src="http://www.tmd.go.th/en/daily_forecast_forweb.php?strProvinceID=69-66-1-75-55-19-81" width="180" height="215" scrolling="no" frameborder="0" style="background-color:#FFF"></iframe></td>
        </tr>
    </table>-->