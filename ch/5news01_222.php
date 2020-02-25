<?php
	$query="SELECT  *  FROM `tbl_news_data`  WHERE  language='$lang'   ORDER BY  date_act  DESC  LIMIT 0 , 10 ";
	$result =mysql_query($query);
?>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<table width="99%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr>
    <td width="46" height="40">&nbsp;</td>
    <td width="779">&nbsp;</td>
    <td width="150" align="right"><span class="txt8"><img src="../images/icon/30x30/002.png" width="30" height="30" alt="icon" style="vertical-align: text-bottom" /></span> <a href="?detail=news-rubber&xtype=1">新闻</a></td>
  </tr>
  <?php $n=1;  while($data=mysql_fetch_assoc($result)){ ?>
  <tr>
    <td height="25" align="center">&#8226;</td>
    <td><!--<a href="#"  onclick="OpenNew('detail-news.php?ActID=<?php echo $data['c_id']?>','600', '700' , '200' , '10')"> -->
     <a href="#" onclick="windowOpener(700, 1000, 'windowName', 'detail-news.php?ActID=<?php echo $data['id']?>')">
		<?php echo strip_tags($data['topic_th'],'<*>');?>
	</a>&nbsp;<?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_act'],$icon)?></td>
    <td align="center"><?php GetEngDate($data['date_act'])?></td>
  </tr>
  <tr bgcolor="#DAD5C2">
    <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
  </tr>
  <?php $n++; } ?>
</table>
