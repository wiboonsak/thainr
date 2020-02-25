<?php 
	  $queryBannerBt="SELECT * FROM tbl_banner WHERE banner_position ='4' AND banner_status ='1' ";
	  $resultBannerBt = mysql_query($queryBannerBt);
?>
<div id='BTdBanner'></div>

	<SCRIPT LANGUAGE="JavaScript">
	<!--
				function getBannerBt(number){
						var quote=new Array();
						
						<?php $numpix=0; $i=1; while($topBanner=mysql_fetch_assoc($resultBannerBt)){ 
								if(substr($topBanner['banner_file_name'],-3,3)=="swf"){
									$text="<object classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0 width=468 height=100> <param name=movie value=../banner_file/".$topBanner['banner_file_name']." /> <param name=quality value=high /> <embed src=../banner_file/".$topBanner['banner_file_name']." quality=high pluginspage=http://www.macromedia.com/go/getflashplayer type=application/x-shockwave-flash width=468 height=100></embed> </object>";
								}else{
									$text="<a href='".$topBanner['link']."'><img src='../banner_file/".$topBanner['banner_file_name']."' border='0' /></a>";
								}
						?>
						 quote[<?php echo $i?>] = "<?php echo $text?>";
						<?php $i++;$numpix++; } ?>
						 
						var maxQuote = <?php echo $i-1?>;
						document.getElementById('BTdBanner').innerHTML=quote[number];
						number++;
						if(number > maxQuote){
							number=1
						}
						if(maxQuote > 1){
							setTimeout('getBannerBt('+number+')',4500);
						}
				}
			<?php if($numpix > 0){ ?>	
			getBannerBt(1);	
			<?php }?>
	//-->
	</SCRIPT>
