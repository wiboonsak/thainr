<?php
include("phpgraphlib.php"); 
   	$db_host		= 'localhost';
	$db_user		= 'thainr_dbnew';
	$db_password	= 'd1PUJSh3';
	$db_name		= 'thainr_dbnew';
	$lang=1; // 1 = thai , 2 = en
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	

	$query = "SELECT * FROM tbl_rubber_offer  WHERE id = '$id' ";
	$result = mysql_query($query);
		while($data=mysql_fetch_assoc($result)){
				$p1 = $data['cake_rubber_01'];
				$p2 = $data['cake_rubber_02'];		
				$p3 = $data['STR_20_01'];
				$p4 = $data['STR_20_02'];		
				$p5 = $data['STR_5L_01'];
				$p6 = $data['STR_5L_02'];
				$p7 = $data['liquid_01'];
				$p8 = $data['liquid_02'];
				$p9 = $data['date_update'];				
				}

if(($p1 > 100) || ($p2 > 100)  || ($p3 > 100)   ||  ($p4 > 100) || ($p5 > 100) || ($p6 > 100)  || ($p7 > 100)  || ($p8 > 100) ){
			$maxYaxis=200;
	}else{
			$maxYaxis=100;
		}

$graph=new PHPGraphLib(1000,250);


$data=array("Rubber Bale Bkk"=>$p1,"Rubber Bale SK./PK."=>$p2,"STR20 BKK."=>$p3,"STR20 SK./PK."=>$p4,"STR 5L BKK"=>$p5,"STR 5L SK./PK."=>$p6,"Latex BKK"=>$p7,"Latex SK./PK."=>$p8);


		
$graph->addData($data);
$graph->setTitleColor("black"); 
$graph->setTitle("Offer Price $StartDate     ( X axis =Type , Y axis= Baht/kg. )");
$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor("black");
$graph->setDataValues(true);
$graph->setDataValueColor("black");

$graph->setXValuesHorizontal(false); 
$graph->setXValuesHorizontal(true); 

$graph->setXAxisTextColor("black"); 
$graph->setYAxisTextColor("black"); 

$graph->setLineColor("black", "black","black"); 
$graph->setRange( $maxYaxis , 10); 


$graph->setupXAxis(6, "black"); 
$graph->setupYAxis(3, "black"); 

//$graph->setGoalLine(.0025);
//$graph->setGoalLineColor("red");
$graph->createGraph();
mysql_close($link);

?>
