<?php
	$query="SELECT  *  FROM `tbl_news`   ORDER BY  c_id DESC  LIMIT 0 , 5 ";
	$result =mysql_query($query);
?>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr>
    <td width="46" height="40">&nbsp;</td>
    <td width="779">&nbsp;</td>
    <td width="150" align="right"><img src="images/inside/nr_42.jpg" alt="icon" width="24" height="21" /><a href="?detail=news-rubber">&#3586;&#3656;&#3634;&#3623;&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</a></td>
  </tr>
  <?php $n=1;  while($data=mysql_fetch_assoc($result)){ ?>
  <tr>
    <td height="25" align="center"><img src="images/inside/nr_42.jpg" width="24" height="21" alt="icon" /></td>
    <td><a href="#"  onclick="OpenNew('detail-news.php?ActID=<?php echo $data['c_id']?>','600', '700' , '200' , '10')">
		<?php echo $data['c_detail'];?>
	</a>&nbsp;<?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['c_update'],$icon)?></td>
    <td align="center"><?php GetThaiDate($data['c_update'])?></td>
  </tr>
  <tr bgcolor="#DAD5C2">
    <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
  </tr>
  <?php $n++; } ?>
</table>
