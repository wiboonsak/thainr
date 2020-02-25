<?php 
	$queryKnow="SELECT * FROM tbl_misc ORDER BY id DESC LIMIT 0, 10 ";
	$resultKnow =mysql_query($queryKnow);
?><meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="style.css" rel="stylesheet" type="text/css" />
<p><a href="../faq-thainr.doc" target="_blank"><img src="../images/FAQ-en.png" width="209" height="89" border="0" style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onMouseOut="this.style.opacity=1;this.filters.alpha.opacity=100"/></a></p>
<div class="L50"><img src="../images/funknow.gif" alt="Knowledge" width="157" height="58" /></div>
<table style="background-image:url(../images/bg-know.gif); background-repeat:no-repeat; background-position:center middle;" width="222" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr>
    <td height="40" valign="top" class="FontMS10">&nbsp;</td>
  </tr>
  <?php 
  		while($know=mysql_fetch_assoc($resultKnow)){ 
  ?>
 <tr>
    <td align="left" valign="top" ><img src="../images/10_14.gif" alt="icon" width="16" height="16" hspace="3" align="left" />
	<a href="#" onclick="OpenNew('../th/popknowledge.php?topic_id=<?php echo $know['id']?>','750', '500' , '200' , '100')">
	<?php echo $know['tile']?>
	</a></td>
  </tr>
  <tr>
    <td valign="top" class="FontMS10"><hr width="90%" /></td>
  </tr>
  <?php } ?>
  <tr>
    <td height="20" valign="top" class="FontMS10">&nbsp;</td>
  </tr>
</table>
<table width="197" height="280" border="0" cellspacing="0" cellpadding="0"  style="background-image:url(../images/weather.png); background-repeat:no-repeat; margin-left:15px; margin-top:15px;">
      <tr>
        <td height="58">&nbsp;</td>
        </tr>
      <tr>
        <td align="center"><iframe src="http://www.tmd.go.th/en/daily_forecast_forweb.php?strProvinceID=69-66-1-75-55-19-81" width="180" height="215" scrolling="no" frameborder="0" style="background-color:#FFF"></iframe></td>
        </tr>
    </table>