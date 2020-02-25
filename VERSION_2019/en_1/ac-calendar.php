<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>กิจกรรมสมาคมยางพาราไทย</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_activity.php"); ?></td>
      <td align="center" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" width="167"><img src="../th/images/inside/nr_en-30-2.jpg" alt="TRA CALENDAR"  width="167" height="35" border="0" ></td>
          <td background="../th/images/inside/bg-tab.gif">&nbsp;</td>
        </tr>
      </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td width="18" background="images/inside/bg-tab-L.gif">&nbsp;</td>
                <td width="943"><br>
                  <?php
// day and month name constants
// (change for internationalisation)
//$monthnames = Array("January","February","March","April","May","June","July","August","September","October","November","December");
//$shortdaynames = Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
//$longdaynames = Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

$monthnames = Array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$shortdaynames = Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
$longdaynames = Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");


// build some templates
// (change this section to alter the way the calendar looks)
$templates["calendar_section"] = "<!-- Calendar by www.pluggedout.com -->\n"

	."  <table width='98%' border='0' cellspacing='1' cellpadding='0'   class='bordercalendar'> "
	."<tr><td colspan='14'  bgcolor='#FFFFFF'>\n"
	."	<table width='100%' border='0' cellspacing='0' cellpadding='0' class='FontMS10' bgcolor='ebebeb'><tr>\n"
	."		<td align='left'><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_prev-->'><img src=../th/images/arrow1.gif border=0></a></span></td>\n"
	."		<td align='center' ><b><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_current-->'><!--month_name-->&nbsp;<!--year--></a></span></b></td>\n"
	."		<td align='right'><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_next-->'><img src=../th/images/arrow2.gif border=0></a></span></td>\n"
	."	</tr>"
	."<tr> <td colspan=3 height=7 bgcolor='#FFFFFF'></td></tr>"
	
	."</table>\n"
	
	."</td></tr>\n"
	."<tr>\n<!--calendar_day_headings--></tr>\n"
	."<tr>\n<!--calendar_days--></tr>\n"
	
	."</table>\n"; 
$templates["calendar_day_heading"] = "<td width='14%' height=30 bgcolor='#333333'  class='style1' align='center'><!--day--></td>\n";
$templates["calendar_day_empty"] = "<td  bgcolor='#ffffff' height=75 align='center'><span class='fontdate'>&nbsp;</span></td>\n";
$templates["calendar_day_on"] = "<td bgcolor=#F4F4F4 height=75  align='center' height= 20  id='<!--idDay-->'><!--day--></td>";
$templates["calendar_day_off"] = "<td   align='center' height=75 class='bordercalendar' ><!--day--></td>";
$templates["calendar_sep"] = "</tr>\n<tr>";
// DO NOT CHANGE THE CALENDAR FUNCTION (BELOW) UNLESS YOU REALLY HAVE TO
// Function    : html_calendar
// Description : Returns the html to represent the calendar.
// Arguments   : $month - Month of the year (01 to 12)
//               $year  - Year (yyyy)
// Returns     : html data
// Author      : Jonathan Beckett
// Last Change : 2005-02-12
function html_calendar2($month,$year,$detail) {

	// validate data
	if ($month==""){
		// if we have no month, make it THIS month
		$month = date("n");
	}
	
	if ($year==""){
		// if we have no year, make it THIS year
		$year = date("Y");
	}

	
	global $templates;
	global $monthnames;
	global $shortdaynames;

	define ('ADAY', (60*60*24));

	// make arrays of values representing the first of the month
	$datearray = getdate(mktime(0,0,0,$month,1,$year));
	$start = mktime(0,0,0,$month,1,$year);

	$firstdayarray = getdate($start);

	// work out the URLs for previous and next buttons
	// default
	$prev_month = $month - 1;
	$prev_year = $year;
	$next_month = $month + 1;
	$next_year = $year;

	// handle exceptions
	// end of year
	if ($month==12) {
		$prev_month = $month - 1;
		$prev_year = $year;
		$next_month = 1;
		$next_year = $year + 1;
	}
	// start of year
	if ($month==1) {
		$prev_month = 12;
		$prev_year = $year - 1;
		$next_month = $month + 1;
		$next_year = $year;
	}
	$url_next = $_SERVER["PHP_SELF"]."?detail=$detail&month=".$next_month."&year=".$next_year;
	$url_prev = $_SERVER["PHP_SELF"]."?detail=$detail&month=".$prev_month."&year=".$prev_year;


	// get template for entire calendar area
	$html = $templates["calendar_section"];

	// do the replacements
	$html = str_replace("<!--link_month_prev-->",$url_prev,$html);
	$html = str_replace("<!--link_month_current-->",$_SERVER["PHP_SELF"]."?detail=$detail&year=".$year."&month=".$month,$html);
	$html = str_replace("<!--link_month_next-->",$url_next,$html);
	
	$html = str_replace("<!--month_name-->",$datearray["month"],$html);
	$html = str_replace("<!--year-->",$year,$html);
	
	// get templates for various squares
	$t_day_heading = $templates["calendar_day_heading"];
	$t_day_empty = $templates["calendar_day_empty"];
	$t_day_on = $templates["calendar_day_on"];
	$t_day_off = $templates["calendar_day_off"];
	$t_calendar_sep = $templates["calendar_sep"];
		
	foreach($shortdaynames as $day)
	{
		$day_heading = $t_day_heading;
		$day_heading = str_replace("<!--day-->",$day,$day_heading);
		$day_headings .= $day_heading;
	}
	
	$html = str_replace("<!--calendar_day_headings-->",$day_headings,$html);

	// Create the rows of days
	for( $count=0;$count<(6*7);$count++)
	{
		$dayarray = getdate($start);
		if((($count) % 7) == 0) {
			if($dayarray['mon'] != $datearray['mon']) break;
			$html_days .= $t_calendar_sep;
		}

		if($count < $firstdayarray['wday'] || $dayarray['mon'] != $month) {
		
			$html_days .= $t_day_empty;
		
		} else {
			
			// build the html for a day within the calendar
			//$date_url = $_SERVER["PHP_SELF"]."?type=ListDate&detail=table&year=".$dayarray["year"]."&month=".$dayarray["mon"]."&day=".$dayarray["mday"];
			//$html_day = $t_day_on;
			//$html_day = str_replace("<!--day-->","<a class='calendar_link' href='".$date_url."' ><div id='".$dayarray[mday]."' >".$dayarray[mday]."</div></a>",$html_day);
			
			$date_url = $_SERVER["PHP_SELF"]."?detail=".$detail."&type=ListDate&year=".$dayarray["year"]."&month=".$dayarray["mon"]."&day=".$dayarray["mday"];
			$html_day = $t_day_on;
			$html_day = str_replace("<!--day-->","<a class='calendar_link' href='".$date_url."' ><div id='".$dayarray[mday]."' >".$dayarray[mday]."</div></a>",$html_day);
			
			$html_day = str_replace("<!--idDay-->","x".$dayarray["mday"],$html_day);  ///####  id of  TD
			
			$html_days .= $html_day;
			$start += ADAY;
			// check that day has moved on (to solve the daylight savings problem)
			$testday = getdate($start);
			if ($testday["yday"]==$dayarray["yday"]){
				$start += (ADAY/2);
			}
		}
	}
	
	// put the days into the calendar
	$html = str_replace("<!--calendar_days-->",$html_days,$html);
	
	return $html;
}
// example use (you could strip this out and include the calendar script elsewhere
print html_calendar2($_GET["month"],$_GET["year"],$_GET['detail']);

?>
                  <?php
		//-- CURRDATE
		$curDate=date("d");
		if($curDate < 10){ 
		$curDate= substr($curDate, -1, 1); 
		}
?>
                  <script language="JavaScript" type="text/javascript">
		function currdate(cDate){
			document.getElementById(''+cDate+'').innerHTML ='<font color=red><b>'+cDate+'</b></font>';
		}
		 currdate('<?php echo $curDate?>')
                  </script>
                  <?php 	// validate data
	//set color furrdate
	$curr_date=date("d");
	$curr_month=date("n");
	$curr_year=date("Y");
	if($day==""){
		$day=date("d");
	}
	if ($month==""){
		// if we have no month, make it THIS month
		$month = date("n");
	}
	
	if ($year==""){
		// if we have no year, make it THIS year
		$year = date("Y");
	}
	
	//SELECT  DATA
	if($type=='ListDate'){
		if($day < 10)  { substr($day,2,-1);}
			
		if(strlen($month) > 2 ){
		$monthx = substr($month,1);
		}else{
		$monthx =$month;			
		}
		//$queryList="SELECT * FROM `cal_even` WHERE language='$lang' AND event_day='$day' AND   event_month ='$monthx' AND event_year='$year'  ORDER BY event_day DESC";
			//$query="SELECT * FROM `cal_even` WHERE  language='$lang'   ORDER BY  event_day ,  event_month ,  event_year   DESC";
		//echo $queryList."<br>";
			$queryList="SELECT * FROM `calendar_events` WHERE event_day ='$day' AND  event_month='$month' AND event_year='$year' AND language='$lang'  ORDER BY event_day ASC";
		$resultList = mysql_query($queryList);
	}
		if(strlen($month) > 2 ){
		$monthx = substr($month,1);
		}else{
		$monthx =$month;			
		}		
		//echo "<br>>>>  month ".strlen($month)."<br>";
	//$query="SELECT * FROM `cal_even` WHERE  language='$lang' AND    event_month ='$monthx' AND event_year='$year'  ORDER BY cal_date  DESC";//cal_date >= '$curr_date' AND
	$query="SELECT * FROM `calendar_events` WHERE    event_month='$month' AND event_year='$year' AND language='$lang'  ORDER BY event_day  ASC";
	$result = mysql_query($query);
	//echo $query;
?>
                  <br>
                  <table width="99%" border="0" class="FontMS10">
                    <?php
	  $numDay=0;
	  $n=1;
	   while($data=mysql_fetch_assoc($result)){ 
	  						   $title[$n]=$data['event_title']; 						
								$DATE[$n]=$data['event_day'];
								$numDay++;
								$n++;
							
	 
	 if($type!='ListDate'){  /*
	  ?>
                    <tr>
                      <td width="24" align="center" class="text-news"><img src="../th/images/inside/nr_42.jpg" width="24" height="21" alt="icon" /></td>
                      <td width="52" align="left" nowrap="nowrap" class="MS10-board"><?php if($data['event_month']<10){ $data['event_month']="0".$data['event_month'];}  $dateX = $data['event_year']."-".$data['event_month']."-".$data['event_day'];?>
                        <?php GetThaiDate($dateX)?></td>
                      <td width="606" align="left" class="text-news"><?php if($data['event_title']){?>
                        <!--<a href="#"  onclick="OpenNew('detail-calendar.php?keyID=<?php echo $data['event_id'];?>','500', '500' , '200' , '30')"></a> -->
                        <a href="#" onClick="windowOpener(850, 750, 'windowName', 'detail-calendar.php?keyID=<?php echo $data['event_id'];?>')"> <?php echo $data['event_title'];?>... </a>
                        <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" border =0 />";
				 	$dateTopic =$data['event_year']."-".$data['event_month']."-".$data['event_day'];
			 GetNewIcon($dateTopic,$icon)?>
                        <?php } else {  $day."-".$month."-".$year; ?>
                        no activity
                        <?php }?></td>
                    </tr>
                    <tr>
                      <td height="1" colspan="3" bgcolor="#E6E6E6"></td>
                    </tr>
                    <?php */ } //end type?>
                    <?php } //end wile?>
                    <?php  if($type=='ListDate'){ 
						while($dataList=mysql_fetch_assoc($resultList)){
		?>
                    <tr>
                      <td width="24" align="center" class="text-news"><img src="../th/images/inside/nr_42.jpg" width="24" height="21" alt="icon" /></td>
                      <td width="52" align="left" nowrap="nowrap" class="MS10-board"><?php  if($data['event_month']<10){ $data['event_month']="0".$data['event_month'];}  $dateX =$dataList['event_year']."-".$dataList['event_month']."-".$dataList['event_day'];?>
                        <?php GetThaiDate($dateX);?></td>
                      <td width="606" align="left" class="text-news"><?php if($dataList['event_title']){?>
                        <a href="#" onClick="windowOpener(850, 750, 'windowName', 'detail-calendar.php?keyID=<?php echo $dataList['event_id'];?>')"> <?php echo $dataList['event_title'];?></a><a href="#"  onclick="OpenNew('detail-calendar.php?keyID=<?php echo $dataList['id'];?>','500', '500' , '200' , '30')">...
                          <?php  $icon="<img src=\"images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\"  border=0/>";
				 	$dateTopic =$dataList['event_year']."-".$dataList['event_month']."-".$dataList['event_day'];
			 GetNewIcon($dateTopic,$icon)?>
                          </a>
                        <?php } else {  $day."-".$month."-".$year; ?>
                        no activity
                        <?php }?></td>
                    </tr>
                    <tr>
                      <td height="1" colspan="3" bgcolor="#E6E6E6"></td>
                    </tr>
                    <?php } ?>
                    <?php }?>
                  </table>
                  <?php
		if(($curr_month==$month)&&($curr_year==$year)) { 
		 	echo "<script>currdate($curr_date);</script>"; 
		 }
		 ?>
                  <?php 
			for($i=0;$i<=$numDay;$i++){ 
			
			if( $oldDay != $DATE[$i]){
				$point ="x".$DATE[$i];
				 echo "<script> //document.getElementById('$point').innerHTML ='<font class=dateActive><b>&nbsp;$DATE[$i]&nbsp;</b></font>';</script>";
				 ?>
                  <script language="javascript">
				 	document.getElementById('<?php echo $point?>').style.backgroundImage =   'url(../th/images/bg-top.jpg)'; 
				  </script>
                  <?php }
			 $oldDay = $DATE[$i];
			}
			
			
			$query="SELECT MIN(event_day) AS minDay , MAX(event_day) AS maxDay,  event_id , event_title , event_month , 	

event_year 	 FROM `calendar_events`  WHERE    event_month='$month' AND event_year='$year' AND 

language='$lang'  GROUP BY newsID  ORDER BY event_day  ASC  ";
            $resultTitle=mysql_query($query);
?>
                  <br>
                  
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <?php while($topic=mysql_fetch_assoc($resultTitle)){ ?>
                  <tr>
                    <td width="10%" align="center" bgcolor="#EEEEEE"><span class="text-news"><img src="../control/images/icon/yellow.gif" width="10" height="10" align="absmiddle" /></span></td>
                    <td width="90%" height="30" align="left" bgcolor="#EEEEEE" class="h-catalog">
					<?php if($topic['minDay']==$topic['maxDay']) { ?>
                    <?php  echo $topic['minDay']."-".$topic['event_month']."-".$topic['event_year'];?>
                    <?php } else { ?>
					<?php  echo $topic['minDay']."-".$topic['event_month']."-".$topic['event_year'];?> to <?php  echo $topic['maxDay']."-".$topic['event_month']."-".$topic['event_year'];?>
                    <?php } ?>
                    :: <a href="#" onClick="windowOpener(750, 1000, 'windowName', 'detail-calendar.php?keyID=<?php echo $topic['event_id'];?>')"><?php echo $topic['event_title']?></a></td>
                  </tr>
                  <tr>
                    <td height="1" colspan="2" bgcolor="#999999"></td>
                  </tr>
                  <?php }?>
                </table>
                  </strong></td>
                <td width="14" background="images/inside/bg-tab-R.gif">&nbsp;</td>
              </tr>
              <tr>
                <td height="10" valign="top"><img src="../th/images/inside/bg-tab-CL.gif" alt="thai nr" width="18" height="10" /></td>
                <td height="10" align="center" background="images/inside/bg-tab-bot.gif"></td>
                <td height="10"><img src="../th/images/inside/bg-tab-CR.gif" alt="thai nr" width="14" height="10" /></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <p class="FontMS10"><br>
    </p>
         
      </td>
    </tr>
  </table>
</center>
</body>