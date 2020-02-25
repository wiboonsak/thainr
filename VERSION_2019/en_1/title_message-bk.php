<?php
	$query="SELECT *  FROM `tbl_speech` WHERE language='$lang' ORDER BY  id DESC  LIMIT 0 , 1 ";
	$result =mysql_query($query);
	$speech = mysql_fetch_assoc($result);
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
.style1 {color: #815204}
-->
</style>
<title>สาส์นจากนายกสมาคม TRA PRESIDENT VIEW</title><body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="340" height="92" valign="bottom" background="../th/images/inside/nr_08_01.jpg" class="txt-h-ms">
	<?php if($speech['title_en']){ echo  $speech['title_en'];}else { echo $speech['title_th']; }?>
	</td>
    <td background="../th/images/inside/nr_08_02.jpg">&nbsp;</td>
    <td width="304" align="right"><img src="../th/images/inside/nr-en_08_03.jpg" width="304" height="92" /></td>
  </tr>
</table>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="168"colspan="2" align="center" bgcolor="#FFFFFF" class="FontMS10" style="background-image:url(../th/images/inside/nr_19.jpg); background-repeat:no-repeat;">	  
	<table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<MARQUEE  onmouseover=this.stop() 
                                onmouseout=this.start() scrollAmount=2 
                                scrollDelay=100 direction=up height=160>
<div class="style1"><?php 	
					if($speech['detail_en']){ $speech['detail_th'] = $speech['title_en'];}else { $speech['title_th']=$speech['detail_th']; }			
					$speech['detail_th']= ereg_replace("<P>", " ", $speech['detail_th']);
					$speech['detail_th']= ereg_replace("</P>","<br>",$speech['detail_th']); 
					echo $speech['detail_en'];?></div>
</MARQUEE>
	</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td width="10%" height="24" ><img src="../th/images/inside/nr_26.jpg" alt="thainr" width="310" height="24" /></td>
    <td width="90%" align="right" valign="top" background="../th/images/inside/bg-bot-talk.gif" class="FontMS10"><?php GetOnlyEngMonth($speech['date_post'])?>      &nbsp;&nbsp;&nbsp;&nbsp; </td>
  </tr>
</table>
</center>
</body>