<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.font12 {font-family: "MS Sans Serif";
	font-size: 12px;
}
-->
</style>
<table width="242" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr align="left" valign="top">
    <td colspan="3"><img src="images/inside/h-l-activity.gif" width="242" height="54" alt="" /></td>
  </tr>
  <tr align="left" valign="top">
    <td width="7" align="left" bgcolor="#D6EEF8"><img src="images/inside/nr_09.jpg" width="7" height="193" alt="" /></td>
    <td width="228" align="center" bgcolor="#FFFFFF"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="?detail=ac-meeting"><img src="images/link-ac-meeting.gif" alt="Activity" width="205" height="48" vspace="10" border="0" /></a></td>
      </tr>
      <tr>
        <td><a href="?detail=ac-special"><img src="images/link-ac-other.gif" alt="Activity" width="205" height="48" vspace="5" border="0" /></a></td>
      </tr>
      <tr>
        <td><a href="?detail=ac-calendar"><img src="images/link-ac-calendar.gif" alt="Activity" width="210" height="48" vspace="10" border="0" /></a></td>
      </tr>
      <tr>
        <td align="center"><?php
// day and month name constants
// (change for internationalisation)
//$monthnames = Array("January","February","March","April","May","June","July","August","September","October","November","December");
//$shortdaynames = Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
//$longdaynames = Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

$monthnames = Array("มกราคม","กุมพาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$shortdaynames = Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
$longdaynames = Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");


// build some templates
// (change this section to alter the way the calendar looks)
$templates["calendar_section"] = "<!-- Calendar by www.pluggedout.com -->\n"
	//."<style>\n"
	//.".calendar_heading{font-family:Arial;font-size:11px;font-weight:bold;}\n"
//	.".calendar_day_heading{font-family:Arial;font-size:11px;}\n"
//	.".calendar_day_off{font-family:Arial;font-size:11px;}\n"
//	.".calendar_day_on{font-family:Arial;font-size:11px;}\n"
//	.".calendar_link{font-family:Arial;fony-size:11px;text-decoration:none;}\n"
//	."</style>\n"
	."  <table width='100%' border='0' cellspacing='1' cellpadding='0' > "
	."<tr><td colspan='14'  bgcolor='#FFFFFF'>\n"
	."	<table width='100%' border='0' cellspacing='0' cellpadding='0' class='FontMS10' bgcolor='ebebeb'><tr>\n"
	."		<td align='center'><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_prev-->'><img src=images/inside/nr_13.jpg border=0></a></span></td>\n"
	."		<td align='center' ><b><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_current-->'><!--month_name-->&nbsp;<!--year--></a></span></b></td>\n"
	."		<td align='center'><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_next-->'><img src=images/inside/nr_15.jpg border=0></a></span></td>\n"
	."	</tr>"
	."<tr> <td colspan=3 height=7 bgcolor='#FFFFFF'></td></tr>"
	
	."</table>\n"
	
	."</td></tr>\n"
	."<tr>\n<!--calendar_day_headings--></tr>\n"
	."<tr>\n<!--calendar_days--></tr>\n"
	
	."</table>\n"; 
$templates["calendar_day_heading"] = "<td width=55 height=25 bgcolor='#a6a6a6'  class='fontdate' align='center'><!--day--></td>\n";
$templates["calendar_day_empty"] = "<td  bgcolor='#ffffff' align='center'><span class='fontdate'>&nbsp;</span></td>\n";
$templates["calendar_day_on"] = "<td bgcolor=#F2F2F2   align='center' class='bordercalendar'   height= 20 ><!--day--></td>";
$templates["calendar_day_off"] = "<td   align='center' class='bordercalendar' ><!--day--></td>";
$templates["calendar_sep"] = "</tr>\n<tr>";
// DO NOT CHANGE THE CALENDAR FUNCTION (BELOW) UNLESS YOU REALLY HAVE TO
// Function    : html_calendar
// Description : Returns the html to represent the calendar.
// Arguments   : $month - Month of the year (01 to 12)
//               $year  - Year (yyyy)
// Returns     : html data
// Author      : Jonathan Beckett
// Last Change : 2005-02-12
function html_calendar($month,$year,$detail) {

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
			//$html_day = str_replace("<!--day-->","<a class='calendar_link' href='".$date_url."' ><div id='".$dayarray[mday]."' >".$dayarray[mday]."</div></a>",$html_day);
$html_day = str_replace("<!--day-->","<div id='".$dayarray[mday]."' class='calendar_link' >".$dayarray[mday]."</div>",$html_day);
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
print html_calendar($_GET["month"],$_GET["year"],$_GET['detail']);

?>
<?php
		//-- CURRDATE
		$curDate=date("d");
		if($curDate < 10){ 
		$curDate= substr($curDate, -1, 1); 
		}
?>
      <script language="javascript">
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
		//if($day < 10) $day ="0".$day;
		//if($month < 10) $month = "0".$month;
		$queryList="SELECT * FROM `calendar_events` WHERE event_day ='$day' AND  event_month='$month' AND event_year='$year' AND language='$lang'  ORDER BY event_day ASC";
		//echo $queryList."<br>";
		$resultList = mysql_query($queryList);
	}
	//if($month < 10) $month = "0".$month;
	$query="SELECT * FROM `calendar_events` WHERE    event_month='$month' AND event_year='$year' AND language='$lang'  ORDER BY event_day  ASC";//event_day >= '$curr_date' AND
	$result = mysql_query($query);
	//echo "2".$query;
?>
    
      <table width="99%" border="0" class="font12">
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
          <td width="10" align="center" class="text-news"><img src="../control/images/icon/yellow.gif" width="10" height="10" align="absmiddle" /></td>
          <td width="2" background="images/vert_dots.gif" class="text-news"></td>
          <td width="56" nowrap="nowrap" class="text-news"><?php echo $data['event_day']."-".$data['event_month']."-".$data['event_year'];?></td>
          <td width="140" align="left" class="text-news"><?php if($data['event_title']){?>
             <!-- <a href="#"  onclick="OpenNew('detail-calendar.php?keyID=<?php echo $data['event_id'];?>','500', '500' , '200' , '30')">  -->
               <a href="#" onClick="windowOpener(750, 1000, 'windowName', 'detail-calendar.php?keyID=<?php echo $data['event_id'];?>')"> 
			  <?php echo substr($data['event_title'],0,80)?>... </a>
              <?php } else {  $day."-".$month."-".$year; ?>
            no activity
            <?php }?>		  </td>
        </tr>
        <tr>
          <td height="1" colspan="4" bgcolor="#E6E6E6"></td>
        </tr>
        <?php */ } //end type?>
        <?php } //end wile?>
        <?php  if($type=='ListDate'){ 
						while($dataList=mysql_fetch_assoc($resultList)){
		?>
        <tr>
          <td width="10" align="center" class="text-news"><img src="../control/images/icon/yellow.gif" width="10" height="10" align="absmiddle" /></td>
          <td width="2" background="images/vert_dots.gif" class="text-news"></td>
          <td nowrap="nowrap" class="text-news"><?php echo $dataList['event_day']."-".$dataList['cal_month']."-".$dataList['cal_year'];?></td>
          <td align="left" class="text-news"><?php if($dataList['cal_header']){?>
              <a href="#"  onclick="OpenNew('detail-calendar.php?keyID=<?php echo $dataList['id'];?>','500', '500' , '200' , '30')">
			   <?php echo substr($dataList['cal_header'],0,30)?>... </a>
              <?php } else {  $day."-".$month."-".$year; ?>
            no activity
          <?php }?>            <a href="#" onclick="if(confirm('ต้องการลบหัวข้อนี้ ?')){ form1.action.value='delete';form1.delID.value='<?php echo $dataList['id']?>';form1.submit()}else{ return false;}"></a></td>
        </tr>
        <tr>
          <td height="1" colspan="4" bgcolor="#E6E6E6"></td>
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
			  //echo "numDay >>> ".$numDay;
			for($i=0;$i<=$numDay;$i++){ 
			
			if( $oldDay != $DATE[$i]){
				 echo "<script>document.getElementById('$DATE[$i]').innerHTML ='<a href=\'#\' title=\'$title[$i]\'><font  color=\'#FFCC00\'><strong>$DATE[$i]</strong></font></a>';</script>";
			 }
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
                    <td width="90%" align="left" bgcolor="#EEEEEE" class="h-catalog">
					<?php if($topic['minDay']==$topic['maxDay']) { ?>
                    <?php  echo $topic['minDay']."-".$topic['event_month']."-".$topic['event_year'];?>
                    <?php } else { ?>
					<?php  echo $topic['minDay']."-".$topic['event_month']."-".$topic['event_year'];?> ถึง <?php  echo $topic['maxDay']."-".$topic['event_month']."-".$topic['event_year'];?>
                    <?php } ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" bgcolor="#EEEEEE"><a href="#" onClick="windowOpener(750, 1000, 'windowName', 'detail-calendar.php?keyID=<?php echo $topic['event_id'];?>')"></a></td>
                    <td align="left" bgcolor="#EEEEEE"><a href="#" onClick="windowOpener(750, 1000, 'windowName', 'detail-calendar.php?keyID=<?php echo $topic['event_id'];?>')"><?php echo $topic['event_title']?></a></td>
                  </tr>
                  <tr>
                    <td height="1" colspan="2" bgcolor="#999999"></td>
                  </tr>
                  <?php }?>
                </table>
      <br><a href="?detail=ac-calendar" class="txt-white-blue-radius">คลิกดูปฏิทินกิจกรรมทั้งหมด</a><br><br><br></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="7" align="left" bgcolor="#D6EEF8"><img src="images/inside/nr_11.jpg" width="7" height="193" alt="" /></td>
  </tr>
</table>
<table width="242" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top"> 
    <td width="242" align="center" background="images/inside/nr_21.jpg">&nbsp;</td>
  </tr>
  <tr align="left" valign="top"> 
    <td align="center" background="images/inside/nr_21.jpg"><?php // include("link_member.php"); ?></td>
  </tr>
  <tr align="left" valign="top"> 
    <td align="center" background="images/inside/nr_21.jpg"></td>
</tr>
  <tr align="left" valign="top"> 
    <td align="center" background="images/inside/nr_21.jpg">&nbsp;</td>
  </tr>
  <tr align="left" valign="top" background="images/inside/nr_21.jpg"> 
    <td><img src="images/inside/nr_114.jpg" width="242" height="16" alt="" /></td>
  </tr>
</table>
