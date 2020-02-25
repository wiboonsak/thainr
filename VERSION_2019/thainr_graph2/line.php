<?php 
include("config.inc.php"); 
include("phpgraphlib.php"); 

	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	

	$query = "SELECT * FROM tbl_rubber_price WHERE date_update = '2007-11-12'  AND language ='1' ";
	$result = mysql_query($query);
		//$data_array =array();
		while($data=mysql_fetch_assoc($result)){
					
					$data_p1=$data['p1'];
					$data_p2=$data['p2'];
					$data_p3=$data['p3'];
					$data_p4=$data['p4'];
					$data_p5=$data['p5'];
					$data_p6=$data['p6'];
					$data_p7=$data['p7'];
					$data_p8=$data['p8'];
	
		}


$graph=new PHPGraphLib(650,200);
$data=array("1"=>$data_p1,"2"=>$data_p2,"3"=>$data_p3,"4"=>$data_p4,"5"=>$data_p5,"6"=>$data_p6,"7"=>$data_p7,"8"=>$data_p8);
;

$graph->addData($data);
$graph->setTitle("Local Price ");
$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor("blue");
$graph->setDataValues(true);
$graph->setDataValueColor("green");
$graph->setGoalLine(.0025);

$graph->setXValuesHorizontal(false); 
$graph->setXValuesHorizontal(true); 

//$graph->setGoalLineColor("red");
$graph->createGraph();

/*
$graph=new PHPGraphLib(650,200);
$data=array("1"=>.0032,"2"=>.0028,"3"=>.0021,"4"=>.0033,"5"=>.0034,"6"=>.0031,"7"=>.0036,"8"=>.0027,"9"=>.0024,"10"=>.0021,"11"=>.0026,"12"=>.0024,"13"=>.0036,"14"=>.0028,"15"=>.0025);
$graph->addData($data);
$graph->setTitle("PPM Per Container");
$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor("blue");
$graph->setDataValues(true);
$graph->setDataValueColor("green");
$graph->setGoalLine(.0025);
//$graph->setGoalLineColor("red");
$graph->createGraph();*/
?>