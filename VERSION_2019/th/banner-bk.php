<?php 
	  $queryBanner3="SELECT * FROM tbl_banner WHERE banner_position ='3' AND banner_status ='1' ORDER BY id DESC";
	  $resultBanner3 = mysql_query($queryBanner3);
?>
<div id='LeftBanner1'></div><img src="images/spacer.gif" width="2" height="5" />
<div id='LeftBanner2'></div><img src="images/spacer.gif" width="2" height="5" />
<div id='LeftBanner3'></div>

	<SCRIPT LANGUAGE="JavaScript">
	<!-- 
		var quote = new Array();
		var myCount=0;	

		<?php $n=1;   while($xbanner3 = mysql_fetch_assoc($resultBanner3)){ 
							if(substr($xbanner3['banner_file_name'],-3,3)=="swf"){ 
								$textBanner ="<object classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0 width=200 height=250> <param name=movie value=../banner_file/".$xbanner3['banner_file_name']." /> <param name=quality value=high /> <embed src=../banner_file/".$xbanner3['banner_file_name']." quality=high pluginspage=http://www.macromedia.com/go/getflashplayer type=application/x-shockwave-flash width=200 height=250></embed> </object>";
							
							 }else{ 
							   $textBanner ="<a href='".$xbanner3['link']."' target=_blank><img src='../banner_file/".$xbanner3['banner_file_name']."' border=0></a>";
							}
					?>
			quote[<?php echo $n?>] = "<?php echo $textBanner?>";
<?php $n++; }  echo "max=".$n;?>
	
	
		function BannerLEFT(start,max){
					
					if(start > max){
						start=1;
					}
						var n1=start;
						var n2=start+1;
						var n3 = start+2;
						start=start+3;
				if(n2>max){
						n2=1;
						n3=2
						start=3
				}
				if(n3>max){
						n3=1;
						start=2;
				}
				//	alert('start= '+start+'     ,  | n1='+n1+' ,  | n2= '+n2+' ,| n3= '+n3);	
						document.getElementById('LeftBanner1').innerHTML=quote[n1];
						document.getElementById('LeftBanner2').innerHTML=quote[n2];
						document.getElementById('LeftBanner3').innerHTML=quote[n3];	
						if(max > 3){					
						setTimeout('BannerLEFT('+start+','+max+')',4000);
						}
			}

       BannerLEFT(1,<?php echo $n-1?>);
	//-->
	</SCRIPT>