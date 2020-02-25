<?php
	include("phpgraphlib.php"); 
   	$db_host		= 'localhost';
	$db_user		= 'thainr_dbnew';
	$db_password	= 'd1PUJSh3';
	$db_name		= 'thainr_dbnew';
	$lang=1; // 1 = thai , 2 = en
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	

	$query = "SELECT *  FROM tbl_rubber_price WHERE id = '$id' ";
	$result = mysql_query($query);
		while($data=mysql_fetch_assoc($result)){
				$p1 = $data['p1'];
				$p2 = $data['p2'];		
				$p3 = $data['p3'];
				$p4 = $data['p4'];		
				$p5 = $data['p5'];
				$p6 = $data['p6'];
				$p7 = $data['p7'];
				$p8 = $data['p8'];
				$p9 = $data['p9'];				
				$p10 = $data['p10'];				
				}
$graph=new PHPGraphLib(1300,400);

$data=array("USS(Hatyai)"=>$p1,"USS(Khlong Nga)"=>$p2,"USS(Trang)"=>$p3,"USS(Phuket)"=>$p4,"USS(Surat-thani)"=>$p5," USS(Rayong)"=>$p6,"USS(Ubon-ratchatani)"=>$p7," RSS Bale 3"=>$p8," Cup Lump"=>$p9," Field Latex"=>$p10);

if(($p1 > 100) || ($p2 > 100)  || ($p3 > 100)   ||  ($p4 > 100) || ($p5 > 100) || ($p6 > 100)  || ($p7 > 100)  || ($p8 > 100) || ($p9 > 100) || ($p10 > 100)){
			$maxYaxis=200;
	}else{
			$maxYaxis=100;
		}

$graph->addData($data);

$graph->setTitleColor("black"); 
$graph->setTitle("Local Price $StartDate   ( X axis =Type , Y axis= Baht/kg. )");

/*$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor("blue");
$graph->setDataValues(true);
$graph->setDataValueColor("red");

$graph->setXValuesHorizontal(false); 
$graph->setXValuesHorizontal(true); 

$graph->setXAxisTextColor("maroon"); 
$graph->setYAxisTextColor("maroon"); 

$graph->setLineColor("lime", "red","blue"); 
$graph->setRange($maxYaxis ,10); 

$graph->setupXAxis(5, "red"); 
$graph->setupYAxis(2, "red"); 
*/

$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor("black");
$graph->setDataValues(true);
$graph->setDataValueColor("gray");

$graph->setXValuesHorizontal(false); 
$graph->setXValuesHorizontal(true); 

$graph->setXAxisTextColor("black"); 
$graph->setYAxisTextColor("black"); 

$graph->setLineColor("black", "gray","black"); 
$graph->setRange($maxYaxis ,10); 

$graph->setupXAxis(5, "gray"); 
$graph->setupYAxis(2, "gray"); 


//$graph->setGoalLine(.0025);
//$graph->setGoalLineColor("red");


$graph->createGraph();
mysql_close($link);

?>
