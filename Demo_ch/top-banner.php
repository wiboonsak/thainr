<?php 
	  $queryBannerTop="SELECT * FROM tbl_banner WHERE banner_position ='1' AND banner_status ='1' ";
	  $resultBannerTop = mysql_query($queryBannerTop);
?>
<div id='TopBanner'></div>

	<SCRIPT LANGUAGE="JavaScript">
	<!--
				function getBanner(number){
						var quote=new Array();
						
						<?php $numpix=0; $i=1; while($topBanner=mysql_fetch_assoc($resultBannerTop)){ 
								if(substr($topBanner['banner_file_name'],-3,3)=="swf"){
									$text="<object classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0 width=734 height=184> <param name=movie value=../banner_file/".$topBanner['banner_file_name']." /> <param name=quality value=high /> <embed src=../banner_file/".$topBanner['banner_file_name']." quality=high pluginspage=http://www.macromedia.com/go/getflashplayer type=application/x-shockwave-flash width=734 height=184></embed> </object>";
								}else{
									$text="<a href='http://".$topBanner['link']."' target='_blank'><img src='../banner_file/".$topBanner['banner_file_name']."' border='0' /></a>";
								}
						?>
						 quote[<?php echo $i?>] = "<?php echo $text?>";
						<?php $i++;$numpix++; } ?>
						 
						var maxQuote = <?php echo $i-1?>;
						document.getElementById('TopBanner').innerHTML=quote[number];
						number++;
						if(number > maxQuote){
							number=1
						}
						if(maxQuote > 1){
							setTimeout('getBanner('+number+')',12500);
						}
				}
			<?php if($numpix > 0){ ?>	
			getBanner(1);	
			<?php }?>
	//-->
	</SCRIPT>
