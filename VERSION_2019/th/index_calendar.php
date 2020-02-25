<?
require_once("includes/config.php");

if(!isset($installed))
{
	header("Location: install.php");
	exit;
}
else
{
	if(file_exists('install.php'))
	{
		header("Location: install.php");
		exit;
	}
}
	$monthArray = array("1"=>"มกราคม","2"=>"กุมภาพันธ์","3"=>"มีนาคม","4"=>"เมษายน", "5"=>"พฤษภาคม","6"=>"มิถุนายน","7"=>"กรกฏาคม","8"=>"สิงหาคม","9"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	
$db_connection = mysql_connect ($DBHost, $DBUser, $DBPass) OR die (mysql_error());  
$db_select = mysql_select_db ($DBName) or die (mysql_error());
$db_table = $TBL_PR . "events";

function getmicrotime(){ 
    list($usec, $sec) = explode(" ",microtime()); 
    return ((float)$usec + (float)$sec); 
} 

$time_start = getmicrotime();

IF(!isset($_GET['year'])){
    $_GET['year'] = date("Y");
}
IF(!isset($_GET['month'])){
    $_GET['month'] = date("n")+1;
}else{
		  $_GET['month']=  $_GET['month']+1;
	}

$month = addslashes($_GET['month'] - 1);
$year = addslashes($_GET['year']);

$query = "SELECT a.event_id,a.event_title, a.event_day, a.event_time , b.id NewsID , b.topic , b.is_promotion  FROM calendar_events a "
." LEFT JOIN tbl_act_data b ON a.newsID=b.id "
." WHERE a.event_month='$month' AND a. event_year='$year' ORDER BY a.event_time";
//echo $query;
$query_result = mysql_query ($query);
while ($info = mysql_fetch_array($query_result))
{
    $day = $info['event_day'];
    $event_id = $info['event_id'];
	//$event_id = $info['event_id'];
    $events[$day][] = $info['event_id'];
    //$event_info[$event_id]['0'] = substr($info['event_title'], 0, 15);<img src='images/icon/tag-blue.png' />
	if($info['is_promotion']==1){ 
	 $event_info[$event_id]['0'] = "<img src='images/icon/tag-red.png' />".$info['topic'];
	}else{
		 $event_info[$event_id]['0'] = "<img src='images/icon/tag-blue.png' />".$info['topic'];
		}
     $event_info[$event_id]['1'] = $info['event_time'];
	 
}

$todays_date = date("j");
$todays_month = date("n");

$days_in_month = date ("t", mktime(0,0,0,$_GET['month'],0,$_GET['year']));
$first_day_of_month = date ("w", mktime(0,0,0,$_GET['month']-1,1,$_GET['year']));
$first_day_of_month = $first_day_of_month + 1;
$count_boxes = 0;
$days_so_far = 0;

IF($_GET['month'] == 13){
    $next_month = 2;
    $next_year = $_GET['year'] + 1;
} ELSE {
    $next_month = $_GET['month'] + 1;
    $next_year = $_GET['year'];
}

IF($_GET['month'] == 2){
    $prev_month = 13;
    $prev_year = $_GET['year'] - 1;
} ELSE {
    $prev_month = $_GET['month'] - 1;
    $prev_year = $_GET['year'];
}



?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="images/cal.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
/*function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}*/
//-->
</script>
<script language="javascript">
			function windowOpener(windowHeight, windowWidth, windowName, windowUri)
			{
					var centerWidth = (window.screen.width - windowWidth) / 2;
					var centerHeight = (window.screen.height - windowHeight) / 2;
    				newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=yes,width=' + windowWidth +  ',height=' + windowHeight +  ',left=' +centerWidth + ',top=' + centerHeight);
					newWindow.focus();
					return newWindow.name;
		}
</script>
</head>
<div align="center"><span class="currentdate"><? //echo date ("F Y", mktime(0,0,0,$_GET['month']-1,1,$_GET['year'])); ?></span><br>
  <br>
</div>
<div align="center"><br>
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="141"><div align="right"><!--<a href="<? echo $_SERVER['PHP_SELF']."?month=$prev_month&amp;year=$prev_year"; ?>">&lt;&lt;</a> --></div></td>
      <td width="343" align="center"><div align="center">
        <select name="month" id="month" onChange="MM_jumpMenu('parent',this,0)">
          
          <?php  while($monthX=each($monthArray)){ 
				IF($month== $monthX['key']){
					$selected = "selected";
				} ELSE {
					$selected = "";
				}
		echo "<option value=\"schedual.php?month=".$monthX['key']."&amp;year=$_GET[year]\" $selected>" .$monthX['value']."</option>\n";
		?>
          
          <?php }?>
        </select>
          <select name="year" id="year" onChange="MM_jumpMenu('parent',this,0)">
		  <?
		
          $startYear=2009; for($i=1;$i<20;$i++){ 
		  	IF(($i+$startYear) == $_GET['year']){
				$selected = "selected";
			} ELSE {
				$selected = "";
			}
					$x=$i+$startYear+543;
					$valueYear=$i+$startYear;
					echo "<option value=\"schedual.php?month=$_GET[month]&amp;year=$valueYear\" $selected>$x</option>\n";
		  ?>
  <?php } ?>
          </select>
        </div></td>
      <td width="216"><div align="left"><!--<a href="schedual.php?month=$next_month&amp;year=$next_year"; ?>">&gt;&gt;</a> -->&nbsp;</div></td>
    </tr>
  </table>
  <br>
</div>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1">
        <tr class="topdays"> 
          <td height="25"><div align="center">อาทิตย์</div></td>
          <td><div align="center">จันทร์</div></td>
          <td><div align="center">อังคาร</div></td>
          <td><div align="center">พุธ</div></td>
          <td><div align="center">พฤหัสบดี</div></td>
          <td><div align="center">ศุกร์</div></td>
          <td><div align="center">เสาร์</div></td>
        </tr>
		<tr valign="top" bgcolor="#FFFFFF"> 
		<?
		for ($i = 1; $i <= $first_day_of_month-1; $i++) {
			$days_so_far = $days_so_far + 1;
			$count_boxes = $count_boxes + 1;
			echo "<td width=\"100\" height=\"100\" class=\"beforedayboxes\"></td>\n";
		}
		for ($i = 1; $i <= $days_in_month; $i++) {
   			$days_so_far = $days_so_far + 1;
    			$count_boxes = $count_boxes + 1;
			IF($_GET['month'] == $todays_month+1){
				IF($i == $todays_date){
					$class = "highlighteddayboxes";
				} ELSE {
					$class = "dayboxes";
				}
			} ELSE {
				IF($i == 1){
					$class = "highlighteddayboxes";
				} ELSE {
					$class = "dayboxes";
				}
			}
			echo "<td width=\"100\" height=\"100\" class=\"$class\">\n";
			$link_month = $_GET['month'] - 1;
			echo "<div align=\"right\"><span class=\"toprightnumber\">\n $i &nbsp;</span></div>\n";
			IF(isset($events[$i])){
				echo "<div align=\"left\"><span class=\"eventinbox\">\n";
				while (list($key, $value) = each ($events[$i])) {
					//echo "&nbsp;<a href=\"javascript:MM_openBrWindow('event.php?id=$value','','width=800,height=800 ,scrollbars=yes');\">" . $event_info[$value]['1'] . " " . $event_info[$value]['0']  . "</a>\n<br>\n";
					echo "&nbsp;<a href=\"#\" onclick=\"windowOpener('768', '950','windowName', 'event.php?id=$value');\">";
						echo "". $event_info[$value]['1'] . " " . $event_info[$value]['0']. $event_info[$event_id]['9']."</a>\n<br>\n";
				}
				echo "</span></div>\n";
			}
			echo "</td>\n";
			IF(($count_boxes == 7) AND ($days_so_far != (($first_day_of_month-1) + $days_in_month))){
				$count_boxes = 0;
				echo "</TR><TR valign=\"top\">\n";
			}
		}
		$extra_boxes = 7 - $count_boxes;
		for ($i = 1; $i <= $extra_boxes; $i++) {
			echo "<td width=\"100\" height=\"100\" class=\"afterdayboxes\"></td>\n";
		}
		$time_end = getmicrotime();
		$time = round($time_end - $time_start, 3);
		?>
		</tr>
    </table>
      
<table width="100%" border="0" cellpadding="0" cellspacing="1">
        <tr valign="top" bgcolor="#FFFFFF"> </tr>
    </table></td>
  </tr>
</table>
<p align="left">
<img src="images/icon/tag-blue.png" width="24" height="24"  style=" vertical-align:middle; padding-right:5px; padding-left:10px; "/> กิจกรรม   <img src="images/icon/tag-red.png" width="24" height="24"  style=" vertical-align:middle; padding-left:10px; padding-right:5px;"/> โปรโมชั่น <br><br>
</p>
