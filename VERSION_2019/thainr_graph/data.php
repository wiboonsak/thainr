<?php session_start();

include("../control/config.inc.php");
		$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
		mysql_select_db($db_name) or die("Could not select database");	
		$query="SELECT * FROM tbl_rubber_price  WHERE date_update BETWEEN '$StartDate' AND '$StopDate' AND language='$lang' "
					 ." ORDER BY date_update ASC ";
					 //echo $query."<BR>";
		$result = mysql_query($query);
			$n=1;
			while($data=mysql_fetch_assoc($result)){
			$date_array=explode("-",$data['date_update']);	
					$date = $date_array[2];
					 if($date < 10 ){
							$date=substr($date,-1,1);
					 }
					$point['P1'][$date]=$data['p1'];
					$point['P2'][$date]=$data['p2'];
					$point['P3'][$date]=$data['p3'];
					$point['P4'][$date]=$data['p4'];
					$point['P5'][$date]=$data['p5'];
					$point['P6'][$date]=$data['p6'];
					$point['P7'][$date]=$data['p7'];
					$point['P8'][$date]=$data['p8'];
					$point['P9'][$date]=$data['p9'];
					$point['P10'][$date]=$data['p10'];
					//echo "$ point [ 'P1' ][ $date ] =  ".$point['P1'][$date]."<br>";
			$n++;
			}
			
	/*	for($i=1;$i<=31;$i++){

				if($point['P1'][$i]==""){ $point['P1'][$i]=0;}else { $point['P1'][$i]=$point['P1'][$i]; }
				if($point['P2'][$i]==""){ $point['P2'][$i]=0;}else { $point['P2'][$i]=$point['P2'][$i]; }		
				if($point['P3'][$i]==""){ $point['P3'][$i]=0;}else { $point['P3'][$i]=$point['P3'][$i]; }				
				if($point['P4'][$i]==""){ $point['P4'][$i]=0;}else { $point['P4'][$i]=$point['P4'][$i]; }
				if($point['P5'][$i]==""){ $point['P5'][$i]=0;}else { $point['P5'][$i]=$point['P5'][$i]; }
				if($point['P6'][$i]==""){ $point['P6'][$i]=0;}else { $point['P6'][$i]=$point['P6'][$i]; }	
				if($point['P7'][$i]==""){ $point['P7'][$i]=0;}else { $point['P7'][$i]=$point['P7'][$i]; }	
				if($point['P8'][$i]==""){ $point['P8'][$i]=0;}else { $point['P8'][$i]=$point['P8'][$i]; }
				if($point['P9'][$i]==""){ $point['P9'][$i]=0;}else { $point['P9'][$i]=$point['P9'][$i]; }
				if($point['P10'][$i]==""){ $point['P10'][$i]=0;}else { $point['P10'][$i]=$point['P10'][$i]; }
		}*/

$p11 =  $point['P1'][1];  $p12 = $point['P1'][2]; $p13 = $point['P1'][3];  $p14 = $point['P1'][4]; $p15 = $point['P1'][5]; 
$p16 =  $point['P1'][6];  $p17 = $point['P1'][7]; $p18 = $point['P1'][8];  $p19 = $point['P1'][9]; $p110 = $point['P1'][10]; 
$p111 =  $point['P1'][11];  $p112 = $point['P1'][12]; $p113 = $point['P1'][13];  $p114 = $point['P1'][14]; $p115 = $point['P1'][15]; 
$p116 =  $point['P1'][16];  $p117 = $point['P1'][17]; $p118 = $point['P1'][18];  $p119 = $point['P1'][19]; $p120 = $point['P1'][20]; 
$p121 =  $point['P1'][21];  $p122 = $point['P1'][22]; $p123 = $point['P1'][23];  $p124 = $point['P1'][24]; $p125 = $point['P1'][25]; 
$p126 =  $point['P1'][26];  $p127 = $point['P1'][27]; $p128 = $point['P1'][28];  $p129 = $point['P1'][29]; $p130 = $point['P1'][30]; 
$p131 =  $point['P1'][31];  

$p21 =  $point['P2'][1];  $p22 = $point['P2'][2]; $p23 = $point['P2'][3];  $p24 = $point['P2'][4]; $p25 = $point['P2'][5]; 
$p26 =  $point['P2'][6];  $p27 = $point['P2'][7]; $p28 = $point['P2'][8];  $p29 = $point['P2'][9]; $p210 = $point['P2'][10]; 
$p211 =  $point['P2'][11];  $p212 = $point['P2'][12]; $p213 = $point['P2'][13];  $p214 = $point['P2'][14]; $p215 = $point['P2'][15]; 
$p216 =  $point['P2'][16];  $p217 = $point['P2'][17]; $p218 = $point['P2'][18];  $p219 = $point['P2'][19]; $p220 = $point['P2'][20]; 
$p221 =  $point['P2'][21];  $p222 = $point['P2'][22]; $p223 = $point['P2'][23];  $p224 = $point['P2'][24]; $p225 = $point['P2'][25]; 
$p226 =  $point['P2'][26];  $p227 = $point['P2'][27]; $p228 = $point['P2'][28];  $p229 = $point['P2'][29]; $p230 = $point['P2'][30]; 
$p231 =  $point['P2'][31];  

$p31 =  $point['P3'][1];  $p32 = $point['P3'][2]; $p33 = $point['P3'][3];  $p34 = $point['P3'][4]; $p35 = $point['P3'][5]; 
$p36 =  $point['P3'][6];  $p37 = $point['P3'][7]; $p38 = $point['P3'][8];  $p39 = $point['P3'][9]; $p310 = $point['P3'][10]; 
$p311 =  $point['P3'][11];  $p312 = $point['P3'][12]; $p313 = $point['P3'][13];  $p314 = $point['P3'][14]; $p315 = $point['P3'][15]; 
$p316 =  $point['P3'][16];  $p317 = $point['P3'][17]; $p318 = $point['P3'][18];  $p319 = $point['P3'][19]; $p320 = $point['P3'][20]; 
$p321 =  $point['P3'][21];  $p322 = $point['P3'][22]; $p323 = $point['P3'][23];  $p324 = $point['P3'][24]; $p325 = $point['P3'][25]; 
$p326 =  $point['P3'][26];  $p327 = $point['P3'][27]; $p328 = $point['P3'][28];  $p329 = $point['P3'][29]; $p330 = $point['P3'][30]; 
$p331 =  $point['P3'][31];  

$p41 =  $point['P4'][1];  $p42 = $point['P4'][2]; $p43 = $point['P4'][3];  $p44 = $point['P4'][4]; $p45 = $point['P4'][5]; 
$p46 =  $point['P4'][6];  $p47 = $point['P4'][7]; $p48 = $point['P4'][8];  $p49 = $point['P4'][9]; $p410 = $point['P4'][10]; 
$p411 =  $point['P4'][11];  $p412 = $point['P4'][12]; $p413 = $point['P4'][13];  $p414 = $point['P4'][14]; $p415 = $point['P4'][15]; 
$p416 =  $point['P4'][16];  $p417 = $point['P4'][17]; $p418 = $point['P4'][18];  $p419 = $point['P4'][19]; $p420 = $point['P4'][20]; 
$p421 =  $point['P4'][21];  $p422 = $point['P4'][22]; $p423 = $point['P4'][23];  $p424 = $point['P4'][24]; $p425 = $point['P4'][25]; 
$p426 =  $point['P4'][26];  $p427 = $point['P4'][27]; $p428 = $point['P4'][28];  $p429 = $point['P4'][29]; $p430 = $point['P4'][30]; 
$p431 =  $point['P4'][31];  

$p51 =  $point['P5'][1];  $p52 = $point['P5'][2]; $p53 = $point['P5'][3];  $p54 = $point['P5'][4]; $p55 = $point['P5'][5]; 
$p56 =  $point['P5'][6];  $p57 = $point['P5'][7]; $p58 = $point['P5'][8];  $p59 = $point['P5'][9]; $p510 = $point['P5'][10]; 
$p511 =  $point['P5'][11];  $p512 = $point['P5'][12]; $p513 = $point['P5'][13];  $p514 = $point['P5'][14]; $p515 = $point['P5'][15]; 
$p516 =  $point['P5'][16];  $p517 = $point['P5'][17]; $p518 = $point['P5'][18];  $p519 = $point['P5'][19]; $p520 = $point['P5'][20]; 
$p521 =  $point['P5'][21];  $p522 = $point['P5'][22]; $p523 = $point['P5'][23];  $p524 = $point['P5'][24]; $p525 = $point['P5'][25]; 
$p526 =  $point['P5'][26];  $p527 = $point['P5'][27]; $p528 = $point['P5'][28];  $p529 = $point['P5'][29]; $p530 = $point['P5'][30]; 
$p531 =  $point['P5'][31];  

$p61 =  $point['P6'][1];  $p62 = $point['P6'][2]; $p63 = $point['P6'][3];  $p64 = $point['P6'][4]; $p65 = $point['P6'][5]; 
$p66 =  $point['P6'][6];  $p67 = $point['P6'][7]; $p68 = $point['P6'][8];  $p69 = $point['P6'][9]; $p610 = $point['P6'][10]; 
$p611 =  $point['P6'][11];  $p612 = $point['P6'][12]; $p613 = $point['P6'][13];  $p614 = $point['P6'][14]; $p615 = $point['P6'][15]; 
$p616 =  $point['P6'][16];  $p617 = $point['P6'][17]; $p618 = $point['P6'][18];  $p619 = $point['P6'][19]; $p620 = $point['P6'][20]; 
$p621 =  $point['P6'][21];  $p622 = $point['P6'][22]; $p623 = $point['P6'][23];  $p624 = $point['P6'][24]; $p625 = $point['P6'][25]; 
$p626 =  $point['P6'][26];  $p627 = $point['P6'][27]; $p628 = $point['P6'][28];  $p629 = $point['P6'][29]; $p630 = $point['P6'][30]; 
$p631 =  $point['P6'][31];  

$p71 =  $point['P7'][1];  $p72 = $point['P7'][2]; $p73 = $point['P7'][3];  $p74 = $point['P7'][4]; $p75 = $point['P7'][5]; 
$p76 =  $point['P7'][6];  $p77 = $point['P7'][7]; $p78 = $point['P7'][8];  $p79 = $point['P7'][9]; $p710 = $point['P7'][10]; 
$p711 =  $point['P7'][11];  $p712 = $point['P7'][12]; $p713 = $point['P7'][13];  $p714 = $point['P7'][14]; $p715 = $point['P7'][15]; 
$p716 =  $point['P7'][16];  $p717 = $point['P7'][17]; $p718 = $point['P7'][18];  $p719 = $point['P7'][19]; $p720 = $point['P7'][20]; 
$p721 =  $point['P7'][21];  $p722 = $point['P7'][22]; $p723 = $point['P7'][23];  $p724 = $point['P7'][24]; $p725 = $point['P7'][25]; 
$p726 =  $point['P7'][26];  $p727 = $point['P7'][27]; $p728 = $point['P7'][28];  $p729 = $point['P7'][29]; $p730 = $point['P7'][30]; 
$p731 =  $point['P7'][31];  

$p81 =  $point['P8'][1];  $p82 = $point['P8'][2]; $p83 = $point['P8'][3];  $p84 = $point['P8'][4]; $p85 = $point['P8'][5]; 
$p86 =  $point['P8'][6];  $p87 = $point['P8'][7]; $p88 = $point['P8'][8];  $p89 = $point['P8'][9]; $p810 = $point['P8'][10]; 
$p811 =  $point['P8'][11];  $p812 = $point['P8'][12]; $p813 = $point['P8'][13];  $p814 = $point['P8'][14]; $p815 = $point['P8'][15]; 
$p816 =  $point['P8'][16];  $p817 = $point['P8'][17]; $p818 = $point['P8'][18];  $p819 = $point['P8'][19]; $p820 = $point['P8'][20]; 
$p821 =  $point['P8'][21];  $p822 = $point['P8'][22]; $p823 = $point['P8'][23];  $p824 = $point['P8'][24]; $p825 = $point['P8'][25]; 
$p826 =  $point['P8'][26];  $p827 = $point['P8'][27]; $p828 = $point['P8'][28];  $p829 = $point['P8'][29]; $p830 = $point['P8'][30]; 
$p831 =  $point['P8'][31];  

$p91 =  $point['P9'][1];  $p92 = $point['P9'][2]; $p93 = $point['P9'][3];  $p94 = $point['P9'][4]; $p95 = $point['P9'][5]; 
$p96 =  $point['P9'][6];  $p97 = $point['P9'][7]; $p98 = $point['P9'][8];  $p99 = $point['P9'][9]; $p910 = $point['P9'][10]; 
$p911 =  $point['P9'][11];  $p912 = $point['P9'][12]; $p913 = $point['P9'][13];  $p914 = $point['P9'][14]; $p915 = $point['P9'][15]; 
$p916 =  $point['P9'][16];  $p917 = $point['P9'][17]; $p918 = $point['P9'][18];  $p919 = $point['P9'][19]; $p920 = $point['P9'][20]; 
$p921 =  $point['P9'][21];  $p922 = $point['P9'][22]; $p923 = $point['P9'][23];  $p924 = $point['P9'][24]; $p925 = $point['P9'][25]; 
$p926 =  $point['P9'][26];  $p927 = $point['P9'][27]; $p928 = $point['P9'][28];  $p929 = $point['P9'][29]; $p930 = $point['P9'][30]; 
$p931 =  $point['P9'][31];  

$p101 =  $point['P10'][1];  $p102 = $point['P10'][2]; $p103 = $point['P10'][3];  $p104 = $point['P10'][4]; $p105 = $point['P10'][5]; 
$p106 =  $point['P10'][6];  $p107 = $point['P10'][7]; $p108 = $point['P10'][8];  $p109 = $point['P10'][9]; $p1010 = $point['P10'][10]; 
$p1011 =  $point['P10'][11];  $p1012 = $point['P10'][12]; $p1013 = $point['P10'][13];  $p1014 = $point['P10'][14]; $p1015 = $point['P10'][15]; 
$p1016 =  $point['P10'][16];  $p1017 = $point['P10'][17]; $p1018 = $point['P10'][18];  $p1019 = $point['P10'][19]; $p1020 = $point['P10'][20]; 
$p1021 =  $point['P10'][21];  $p1022 = $point['P10'][22]; $p1023 = $point['P10'][23];  $p1024 = $point['P10'][24]; $p1025 = $point['P10'][25]; 
$p1026 =  $point['P10'][26];  $p1027 = $point['P10'][27]; $p1028 = $point['P10'][28];  $p1029 = $point['P10'][29]; $p1030 = $point['P10'][30]; 
$p1031 =  $point['P10'][31];  




//include charts.php in your script
include "charts.php";
//include charts.php in your script


$chart [ 'chart_data' ] = array (array ( "",   "1", "2", "3", "4",   "5", "6", "7", "8",   "9", "10", "11", "12",   "13", "14", "15", "16",   "17", "18", "19", "20",   "21", "22", "23", "24",   "25", "26", "27", "28",   "29", "30", "31" ),array ( "Hatyai",  $p11, $p12, $p13, $p14,  $p16, $p16, $p17, $p18,  $p19, $p120, $p121, $p122,  $p123, $p124, $p125, $p126,  $p127, $p128, $p129, $p130,$p131  ),array ( "Klong Nga",  $p21, $p22, $p23, $p24,  $p26, $p26, $p27, $p28,  $p29, $p220, $p221, $p222,  $p223, $p224, $p225, $p226,  $p227, $p228, $p229, $p230,$p231 ),array ( "Trang",  $p31, $p32, $p33, $p34,  $p36, $p36, $p37, $p38,  $p39, $p320, $p321, $p322,  $p323, $p324, $p325, $p326,  $p327, $p328, $p329, $p330,$p331),array ( "Phuket",  $p41, $p42, $p43, $p44,  $p46, $p46, $p47, $p48,  $p49, $p420, $p421, $p422,  $p423, $p424, $p425, $p426,  $p427, $p428, $p429, $p430,$p431  ),array ( "Surat thani",  $p51, $p52, $p53, $p54,  $p56, $p56, $p57, $p58,  $p59, $p520, $p521, $p522,  $p523, $p524, $p525, $p526,  $p527, $p528, $p529, $p530,$p531 ),array ( "Rayong",  $p61, $p62, $p63, $p64,  $p66, $p66, $p67, $p68,  $p69, $p620, $p621, $p622,  $p623, $p624, $p625, $p626,  $p627, $p628, $p629, $p630,$p631  ),array ( "Ubon-ratchatani",  $p71, $p72, $p73, $p74,  $p76, $p76, $p77, $p78,  $p79, $p720, $p721, $p722,  $p723, $p724, $p725, $p726,  $p727, $p728, $p729, $p730,$p731  ),array ( "RSS Bale 3",  $p81, $p82, $p83, $p84,  $p86, $p86, $p87, $p88,  $p89, $p820, $p821, $p822,  $p823, $p824, $p825, $p826,  $p827, $p828, $p829, $p830,$p831  ),array ( "Cup Lump",  $p91, $p92, $p93, $p94,  $p96, $p96, $p97, $p98,  $p99, $p920, $p921, $p922,  $p923, $p924, $p925, $p926,  $p927, $p928, $p929, $p930,$p931  ),array ( "Field Latex",  $p101, $p102, $p103, $p104,  $p106, $p106, $p107, $p108,  $p109, $p1020, $p1021, $p1022,  $p1023, $p1024, $p1025, $p1026,  $p1027, $p1028, $p1029, $p1030,$p1031  )
                                );


//change the chart to a bar chart
$chart [ 'chart_type' ] = "Line";

$chart[ 'series_color' ] = array ( "FFFF99", "9933FF", "FFBBDD","FF9900","FF00FF", "00FFFF","FFFF00","0000FF","00FF00","FF0000" ); 

 $chart[ 'axis_ticks' ] = array ( 'value_ticks'=>false, 'category_ticks'=>true, 'major_thickness'=>1, 'minor_thickness'=>1, 'minor_count'=>1, 'major_color'=>"000000", 'minor_color'=>"66FF00" ,'position'=>"inside" );

$chart[ 'axis_category' ] = array (  'size'=>11, 'color'=>"FFFFFF", 'alpha'=>90, 'skip'=>0 ,'orientation'=>"horizontal" ); 

$chart[ 'axis_value' ] = array ( 'min'=>0, 'size'=>10, 'color'=>"FFFFFF", 'alpha'=>100, 'steps'=>90, 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'show_min'=>true );

$chart[ 'legend_label' ] = array ( 'layout'=>"horizontal", 'bullet'=>"line", 'font'=>"arial", 'bold'=>true, 'size'=>13, 'color'=>"ffffff", 'alpha'=>100 );

/*------ */
$chart[ 'chart_rect' ] = array ( 'x'=>120, 'y'=>125, 'width'=>800, 'height'=>1000, 'positive_color'=>"EBEBD6", 'positive_alpha'=>80, 'negative_color'=>"D2FFD2",  'negative_alpha'=>10 );


//$chart[ 'chart_value' ] = array ( 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'position'=>"cursor", 'hide_zero'=>true, 'as_percentage'=>false, 'font'=>"arial", 'bold'=>true, 'size'=>12, 'color'=>"ffffff", 'alpha'=>75 );


//send the new chart data to the charts.swf flash file */
SendChartData ( $chart );
 
?>
