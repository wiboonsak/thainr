<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.font12 {font-family: "MS Sans Serif";
	font-size: 12px;
}
-->
</style>
<table width="242" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top"> 
    <td width="7"><IMG SRC="../th/images/inside/nr_05.jpg" WIDTH=7 HEIGHT=54 ALT=""></td>
    <td width="228" bgcolor="#FFFFFF"><IMG SRC="../th/images/inside/nr-en_06_06.jpg" WIDTH=228 HEIGHT=54 ALT=""></td>
    <td width="7"><IMG SRC="../th/images/inside/nr_07.jpg" WIDTH=7 HEIGHT=54 ALT=""></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><IMG SRC="../th/images/inside/nr_09.jpg" WIDTH=7 HEIGHT=193 ALT=""></td>
    <td align="center" bgcolor="#FFFFFF"><?php
// day and month name constants
// (change for internationalisation)
//$monthnames = Array("January","February","March","April","May","June","July","August","September","October","November","December");
//$shortdaynames = Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
//$longdaynames = Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

$monthnames = Array("���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");
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
	."		<td align='center'><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_prev-->'><img src=../th/images/inside/nr_13.jpg border=0></a></span></td>\n"
	."		<td align='center' ><b><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_current-->'><!--month_name-->&nbsp;<!--year--></a></span></b></td>\n"
	."		<td align='center'><span class='calendar_heading'><a class='calendar_link' href='<!--link_month_next-->'><img src=../th/images/inside/nr_15.jpg border=0></a></span></td>\n"
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
			$html_day = str_replace("<!--day-->","<a class='calendar_link' href='".$date_url."' ><div id='".$dayarray[mday]."' >".$dayarray[mday]."</div></a>",$html_day);

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
		if($day < 10) $day ="0".$day;
		if($month < 10) $month = "0".$month;
		$queryList="SELECT * FROM `cal_even` WHERE cal_date='$day' AND  cal_month='$month' AND cal_year='$year'  AND language='$lang'   ORDER BY cal_date DESC";
	//	echo $queryList."<br>";
		$resultList = mysql_query($queryList);
	}
			if($month < 10) $month = "0".$month;
	$query="SELECT * FROM `cal_even` WHERE    cal_month='$month' AND cal_year='$year'   AND language='$lang'  ORDER BY cal_date DESC";//cal_date >= '$curr_date' AND
	$result = mysql_query($query);
//	echo $query;
?>
      <table width="99%" border="0" class="font12">
        <?php
	  $numDay=0;
	  $n=1;
	   while($data=mysql_fetch_assoc($result)){ 
	  						$dDay=$data['cal_date'];
	  						if($dDay!=""){ 
								$DATE[$n]=$dDay;
								if($DATE[$n] < 10){ 
									$DATE[$n] =	substr($DATE[$n], -1, 1); 
								}
								$numDay++;
								$n++;
							 }
	 
	 if($type!='ListDate'){ 
	  ?>
        <tr>
          <td width="10" align="center" class="text-news"><img src="../control/images/icon/yellow.gif" width="10" height="10" align="absmiddle" /></td>
          <td width="2" background="images/vert_dots.gif" class="text-news"></td>
          <td width="56" nowrap="nowrap" class="text-news"><?php echo $data['cal_date']."-".$data['cal_month']."-".$data['cal_year'];?></td>
          <td width="140" align="left" class="text-news"><?php if($data['cal_header']){?>
              <a href="#"  onclick="OpenNew('detail-calendar.php?keyID=<?php echo $data['id'];?>','500', '500' , '200' , '30')"> <?php echo substr($data['cal_header'],0,30)?>... </a>
              <?php } else {  $day."-".$month."-".$year; ?>
            no activity
            <?php }?>          </td>
        </tr>
        <tr>
          <td height="1" colspan="4" bgcolor="#E6E6E6"></td>
        </tr>
        <?php } //end type?>
        <?php } //end wile?>
        <?php  if($type=='ListDate'){ 
						while($dataList=mysql_fetch_assoc($resultList)){
		?>
        <tr>
          <td width="10" align="center" class="text-news"><img src="../control/images/icon/yellow.gif" width="10" height="10" align="absmiddle" /></td>
          <td width="2" background="images/vert_dots.gif" class="text-news"></td>
          <td nowrap="nowrap" class="text-news"><?php echo $dataList['cal_date']."-".$dataList['cal_month']."-".$dataList['cal_year'];?></td>
          <td align="left" class="text-news"><?php if($dataList['cal_header']){?>
              <a href="#"  onclick="OpenNew('detail-calendar.php?keyID=<?php echo $dataList['id'];?>','500', '500' , '200' , '30')"> <?php echo substr($dataList['cal_header'],0,30)?>... </a>
              <?php } else {  $day."-".$month."-".$year; ?>
            no activity
            <?php }?>
            <a href="#" onclick="if(confirm('��ͧ���ź��Ǣ�͹�� ?')){ form1.action.value='delete';form1.delID.value='<?php echo $dataList['id']?>';form1.submit()}else{ return false;}"></a></td>
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
			for($i=0;$i<=$numDay;$i++){ 
			
			if( $oldDay != $DATE[$i]){
				 echo "<script>document.getElementById('$DATE[$i]').innerHTML ='<font class=dateActive><b>&nbsp;$DATE[$i]&nbsp;</b></font>';</script>";
			 }
			 $oldDay = $DATE[$i];
			}
?>
      <a href="?detail=ac-calendar" class="FontMS10"><strong><br />
      all activities
      </strong></a> </td>
    <td><IMG SRC="../th/images/inside/nr_11.jpg" WIDTH=7 HEIGHT=193 ALT=""></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><table width="228" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../th/images/inside/nr_23.jpg" width="122" height="53" alt="" /><a href="?detail=pr-local"><img src="../th/images/inside/nr-en_24.jpg" alt="" width="103" height="53" border="0" /></a></td>
      </tr>
      <tr>
        <td><img src="../th/images/inside/nr_33.jpg" width="122" height="32" alt="" /><img src="../th/images/inside/nr_34.jpg" width="103" height="32" alt="" /></td>
      </tr>
      <tr>
        <td><a href="?detail=situation"><img src="../th/images/inside/nr-en_36.jpg" alt="" width="122" height="45" border="0" /></a><img src="../th/images/inside/nr_37.jpg" width="103" height="45" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../th/images/inside/nr_39.jpg" width="122" height="30" alt="" /><img src="../th/images/inside/nr_40.jpg" width="103" height="30" alt="" /></td>
      </tr>
      <tr>
        <td><img src="../th/images/inside/nr_45.jpg" width="122" height="38" alt="" /><a href="?detail=stat-thai"><img src="../th/images/inside/nr-en_46.jpg" alt="" width="103" height="38" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><img src="../th/images/inside/nr_47.jpg" width=225 height=24 alt=""></td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><?php include("link_member.php"); ?></td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg">&nbsp;</td>
  </tr>
<!--  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><a href="../Career_ThaiNR.pdf" target="_blank"><img src="../images/career-thainr.gif" alt="career" width="200" height="250" border="0" /></a></td>
  </tr>
 -->  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg">&nbsp;</td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><?php include("banner.php"); ?></td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg">&nbsp;</td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><?php include("knowledge.php"); ?></td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><p>
        <!-- SiteSearch Google -->
      </p>
        <form method="get" action="http://www.google.com/custom" target="google_window">
          <table width="223" border="0" bgcolor="#ffffff">
            <tr>
              <td nowrap="nowrap" valign="top" align="center" height="32"><a href="http://www.google.com/"> <img src="http://www.google.com/logos/Logo_25wht.gif" border="0" alt="Google" align="middle" /></img></a> <br/>
                  <input type="hidden" name="domains" value="www.thainr.com" />
                </input>
                  <label for="sbi" style="display: none">��͹�ӷ���ͧ��ä���</label>
                  <input type="text" name="q" size="25" maxlength="255" value="" id="sbi" />
                </input>
              </td>
            </tr>
            <tr>
              <td align="center" nowrap="nowrap"><table>
                  <tr>
                    <td><input type="radio" name="sitesearch" value="" checked="checked" id="ss0" />
                        </input>
                        <label for="ss0" title="�������"><font size="-1" color="#000000">��纷����š</font></label></td>
                    <td><input type="radio" name="sitesearch" value="www.thainr.com" id="ss1" />
                        </input>
                        <label for="ss1" title="���� www.thainr.com"><font size="-1" color="#000000">�������䫵�</font></label></td>
                  </tr>
                </table>
                  <label for="sbb" style="display: none">�觿������ä���</label>
                  <input type="submit" name="sa" value="����" id="sbb" />
                </input>
                  <input type="hidden" name="client" value="pub-7017684679004630" />
                </input>
                  <input type="hidden" name="forid" value="1" />
                </input>
                  <input type="hidden" name="ie" value="windows-874" />
                </input>
                  <input type="hidden" name="oe" value="windows-874" />
                </input>
                  <input type="hidden" name="cof" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1" />
                </input>
                  <input type="hidden" name="hl" value="th" />
                </input></td>
            </tr>
          </table>
        </form>
      <!-- SiteSearch Google -->
        </p></td>
  </tr>
  <tr align="left" valign="top">
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><table id="Table_01" width="223" height="108" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../th/images/control/control_01.gif" width="18" height="43" alt="" /></td>
          <td><img src="../th/images/control/control_02.gif" width="111" height="43" alt="" /></td>
          <td><img src="../th/images/control/control_03.gif" width="94" height="43" alt="" /></td>
        </tr>
        <tr>
          <td><img src="../th/images/control/control_04.gif" width="18" height="29" alt="" /></td>
          <td><a href="../control/" target="_blank"><img src="../th/images/control/control_05.gif" alt="" width="111" height="29" border="0" /></a></td>
          <td><img src="../th/images/control/control_06.gif" width="94" height="29" alt="" /></td>
        </tr>
        <tr>
          <td><img src="../th/images/control/control_07.gif" width="18" height="22" alt="" /></td>
          <td><a href="http://www.thainr.com/squirrelmail/" target="_blank"><img src="../th/images/control/control_08.gif" alt="" width="111" height="22" border="0" /></a></td>
          <td><img src="../th/images/control/control_09.gif" width="94" height="22" alt="" /></td>
        </tr>
        <tr>
          <td><img src="../th/images/control/control_10.gif" width="18" height="14" alt="" /></td>
          <td><img src="../th/images/control/control_11.gif" width="111" height="14" alt="" /></td>
          <td><img src="../th/images/control/control_12.gif" width="94" height="14" alt="" /></td>
        </tr>
    </table>
    <p>&nbsp;</p></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="3" align="center" background="../th/images/inside/nr_21.jpg"><table width="225" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
        <tr align="center" valign="middle"> 
          <td width="55" height="50"><IMG SRC="../th/images/inside/nr_107.jpg" WIDTH=23 HEIGHT=21 ALT=""></td>
          <td align="left"><font color="87a631">
			<?php 
			require_once("../control/config.inc.php");	
	
			$table = "useronline2";		// Your Table of choice, ex. "online_users"
			$table2="counter";

	$SID = session_id();
	$time = time();
	$dag = date("z");
	$nu = time()-900; // Keep for 15 mins

		//$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
		//mysql_select_db($db_name) or die("Could not select database");			
			
		//check counter table 
		$query1=mysql_query("SELECT count(*) FROM $table2 ");
		$count_check=mysql_result($query1,0);
		if($count_check==0){
				mysql_query("INSERT INTO $table2 (id,nuser) VALUES ('','1') ");
		}
	
	   // Check to see if the session_id is already registerd
			$sidcheck = mysql_query("SELECT count(*) FROM $table WHERE SID='$SID'");
			$sid_check = mysql_result($sidcheck,0);

		if ($sid_check == "0") {
		// If not, the session_id will be stored in MySQL
				mysql_query("INSERT INTO $table VALUES ('$SID','$time','$dag')");	
				mysql_query("UPDATE $table2 SET nuser=nuser+1 ");
			} else {		
					// If it is, it will register a new time to the session.
				mysql_query("UPDATE $table SET time='$time' WHERE SID='$SID'");				
			}
				// This is it, this counts the users currently online	
			$count_users = mysql_query("SELECT count(*) FROM $table WHERE time>$nu AND day=$dag");
			$users_online = mysql_result($count_users,0);
			$plus = rand(1, 2);
			$users_online = $users_online+$plus;

			//total user online
			$query2 = mysql_query("SELECT nuser  FROM $table2");
			$total_user=mysql_result($query2,0);
			//echo "<br> total user -> ".$total_user;
			// This deletes old ids, so your db will not get overloaded.
				
			mysql_query("DELETE FROM $table WHERE time<$nu");
			mysql_query("DELETE FROM $table WHERE day != $dag");
?>
			
			You are Visitor no : <?php echo $total_user?><br>
              User Online :<?php echo $users_online?></font></td>
        </tr>
      </table></td>
  </tr>
  <tr align="left" valign="top" background="../th/images/inside/nr_21.jpg"> 
    <td colspan="3"><img src="../th/images/inside/nr_114.jpg" width="242" height="16" alt="" /></td>
  </tr>
</table>
