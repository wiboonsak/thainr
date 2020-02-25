<?php
	$query="SELECT  *  FROM `tbl_news`  WHERE c_type='2'  AND c_lang='2'  ORDER BY  c_update DESC  LIMIT 0 , 5 ";
	$result =mysql_query($query);
	
	$query="SELECT  *  FROM `tbl_news_data`  WHERE cate_id ='2'  AND language='$lang'  ORDER BY  date_act  DESC  LIMIT 0 , 5 ";
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
    <td width="52" height="40">&nbsp;</td>
    <td width="805">&nbsp;</td>
    <td width="251" align="right"><span class="txt8"><img src="../images/icon/30x30/002.png" width="30" height="30" alt="icon" style="vertical-align: text-bottom" /></span><a href="?detail=news-industry">All Automobile Industry News</a></td>
  </tr>
  <?php $n=1;  while($data=mysql_fetch_assoc($result)){ ?>
  <tr>
    <td height="25" align="center"><span class="txt8"><img src="../images/icon/24X24/035.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
    <td><a href="#" onclick="windowOpener(700, 1000, 'windowName', 'detail-news.php?ActID=<?php echo $data['id']?>')">
		<?php echo strip_tags($data['topic_th'],'<*>');?>
	
	</a>&nbsp;<?php  $icon="<img src=\"../th/images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
			 GetNewIcon($data['date_act'],$icon)?></td>
    <td align="center"><? //=$data['c_update']?><?php GetEngDate($data['date_act'])?></td>
  </tr>
  <tr bgcolor="#DAD5C2">
    <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
  </tr>
  <?php $n++; } ?>
</table>
