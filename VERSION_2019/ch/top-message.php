<?php
$useragent = $_SERVER['HTTP_USER_AGENT'];
//echo "useragent= ".$useragent."<br>";
if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'IE';
} elseif (preg_match( '|Opera ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		$browser_version=$matched[1];
		$browser = 'Opera';
} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'Firefox';
} elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'Chrome';
} else {
        // browser not recognized!
    //$browser_version = 0;
    //$browser= 'other';
}

//print "browser: $browser";
?>
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<?php
	$queryT="SELECT * FROM tbl_top_marquee WHERE lang='$lang' ORDER BY id DESC LIMIT 0,1 ";
	$resultT = mysql_query($queryT);
	$dataT=mysql_fetch_assoc($resultT);
?>
<?php if(strlen($dataT['text']) > 6){ 
			if ($browser == 'Chrome')
			?>
			<marquee scrollamount="5" scrolldelay="<?php echo $dataT['amount']?>" width="90%"  style="font-family: 'Sarabun', sans-serif; margin-left: 100px; z-index: 0 !important;"><?php echo $dataT['text']?></marquee>		
	<?php }else if(($browser = 'IE')||($browser = 'Firefox')){ {?>
				 <script language="JavaScript1.2">
			
			/*
			Cross browser Marquee script- ? Dynamic Drive (www.dynamicdrive.com)
			For full source code, 100's more DHTML scripts, and Terms Of Use, visit http://www.dynamicdrive.com
			Credit MUST stay intact
			*/
			//Specify the marquee's width (in pixels)
			var marqueewidth="650px"
			//Specify the marquee's height
			var marqueeheight="25px"
			//Specify the marquee's marquee speed (larger is faster 1-10)
			var marqueespeed=2
			//configure background color:
			var marqueebgcolor=""
			//Pause marquee onMousever (0=no. 1=yes)?
			var pauseit=1
			
			//Specify the marquee's content (don't delete <nobr> tag)
			//Keep all content on ONE line, and backslash any single quotations (ie: that\'s great):
			
			var marqueecontent='<nobr><?php echo addslashes($dataT['text'])?></nobr>'
			
			
			////NO NEED TO EDIT BELOW THIS LINE////////////
			marqueespeed=(document.all)? marqueespeed : Math.max(1, marqueespeed-1) //slow speed down by 1 for NS
			var copyspeed=marqueespeed
			var pausespeed=(pauseit==0)? copyspeed: 0
			var iedom=document.all||document.getElementById
			if (iedom)
			document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+marqueecontent+'</span>')
			var actualwidth=''
			var cross_marquee, ns_marquee
			
			function populate(){
			if (iedom){
			cross_marquee=document.getElementById? document.getElementById("iemarquee") : document.all.iemarquee
			cross_marquee.style.left=parseInt(marqueewidth)+8+"px"
			cross_marquee.innerHTML=marqueecontent
			actualwidth=document.all? temp.offsetWidth : document.getElementById("temp").offsetWidth
			}
			else if (document.layers){
			ns_marquee=document.ns_marquee.document.ns_marquee2
			ns_marquee.left=parseInt(marqueewidth)+8
			ns_marquee.document.write(marqueecontent)
			ns_marquee.document.close()
			actualwidth=ns_marquee.document.width
			}
			lefttime=setInterval("scrollmarquee()",20)
			}
			window.onload=populate
			
			function scrollmarquee(){
			if (iedom){
			if (parseInt(cross_marquee.style.left)>(actualwidth*(-1)+8))
			cross_marquee.style.left=parseInt(cross_marquee.style.left)-copyspeed+"px"
			else
			cross_marquee.style.left=parseInt(marqueewidth)+8+"px"
			
			}
			else if (document.layers){
			if (ns_marquee.left>(actualwidth*(-1)+8))
			ns_marquee.left-=copyspeed
			else
			ns_marquee.left=parseInt(marqueewidth)+8
			}
			}
			
			if (iedom||document.layers){
			with (document){
			document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
			if (iedom){
			write('<div style="position:relative;width:'+marqueewidth+';height:'+marqueeheight+';overflow:hidden">')
			write('<div style="position:absolute;width:'+marqueewidth+';height:'+marqueeheight+';background-color:'+marqueebgcolor+'" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">')
			write('<div id="iemarquee" style="position:absolute;left:0px;top:0px"></div>')
			write('</div></div>')
			}
			else if (document.layers){
			write('<ilayer width='+marqueewidth+' height='+marqueeheight+' name="ns_marquee" bgColor='+marqueebgcolor+'>')
			write('<layer name="ns_marquee2" left=0 top=0 onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed"></layer>')
			write('</ilayer>')
			}
			document.write('</td></table>')
			}
			}
			</script>
	<?php }?>


<!--<marquee scrollamount="5" scrolldelay="<?php //echo $dataT['amount']?>" width="650"><?php //echo $dataT['text']?></marquee> -->
<?php }?>