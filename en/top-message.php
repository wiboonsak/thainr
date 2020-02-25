<?php
	$queryT="SELECT * FROM tbl_top_marquee WHERE lang='$lang' ORDER BY id DESC LIMIT 0,1 ";
	$resultT = mysql_query($queryT);
	$dataT=mysql_fetch_assoc($resultT);
?>
<?php if(strlen($dataT['text']) > 6){?>
<marquee scrollamount="5" scrolldelay="<?php echo $dataT['amount']?>" width="80%"><?php echo $dataT['text']?></marquee>
<?php }?>