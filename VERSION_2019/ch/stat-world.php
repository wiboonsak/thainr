<?php
			$rowPerPage = 20;
			$thisFile=basename($PHP_SELF);
				if((!$_GET['page'])||($_GET['page']==1)){
							$_GET['page']=1;
							$startRow=0;
					}else{
							$startRow=($_GET['page']-1)*$rowPerPage;
				  }
	
	
	$queryMessage="SELECT *  FROM `tbl_rubber_statistic`   WHERE statistic_type ='world'     ORDER BY  date_post DESC   ";
	$queryLimit = $queryMessage." LIMIT $startRow , $rowPerPage ";
	$resultMessage =mysql_query($queryLimit );
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>ราคาเสนอซื้อยางพารา</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td width="877" height="50" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF" ><img src="../images/h-title/h-world-statistic.jpg" alt="history" width="341" height="80"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?php while($stat=mysql_fetch_assoc($resultMessage)) { ?>
          <tr>
            <td width="99" height="22" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="1518" height="32" align="left" bgcolor="#FFFFFF" class="FontMS10"><img src="images/report-chart.gif" alt="chart" width="16" height="16" hspace="5"> 
              <!--<a href="#" onClick="windowOpener(850, 1000, 'windowName', 'detail-stat.php?statID=<?php //echo $stat['id']?>')">-->
              <a href="http://www.thainr.com/uploadfile/<?php echo $stat['file_th']?>" target="_blank"><?php echo $stat['title_th']?> </a>
              <?php $icon="<img src=images/3_43.gif  hspace=3 />";  $day =$stat['date_post']; GetNewIcon($day,$icon)?>
            </td>
            <td width="51" height="22" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <?php } ?>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="126" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#F8F8F8" class="FontMS10"><span class="cat_desc"> หน้า
              <?php   $thisFile=$thisFile."?detail=".$_GET['detail']; PageDisplay($queryMessage,$rowPerPage,$page,$thisFile);?>
            </span></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>       
      </td>
    </tr>
  </table>
</center>
</body>