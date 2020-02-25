<?php
include("phpgraphlib.php"); 
   	$db_host		= 'localhost';
	$db_user		= 'thainr_dbnew';
	$db_password	= 'd1PUJSh3';
	$db_name		= 'thainr_dbnew';
	$lang=1; // 1 = thai , 2 = en
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	
	$query = "SELECT * FROM tbl_rubber_cess  WHERE id = '$id' ";
	$result = mysql_query($query);

		while($data=mysql_fetch_assoc($result)){
				$p1 = $data['1_15_price'];
				$p2 = $data['1_15_cess'];	
				$p3 = $data['16_31_price'];
				$p4 = $data['16_31_cess'];	
				//echo $p1."<br>".$p2."<br>".$p3."<br>".$p4;
				}



	$graph=new PHPGraphLib(750,250);

	$data=array("1-15 Price"=>$p1,"1-15 Cess"=>$p2,"16-31 Price"=>$p3,"16-31 Cess"=>$p4);
	$graph->addData($data);
	
	$graph->setTitleColor("blue"); 
	$graph->setTitle("CESS Price $CessMonth , $CessYear");
	$graph->setBars(false);
	//$graph->setLine(true);
	$graph->setLine(false);
	$graph->setDataPoints(true);
	$graph->setDataPointColor("blue");
	$graph->setDataValues(true);
	$graph->setDataValueColor("red");

	$graph->setXValuesHorizontal(false); 
	$graph->setXValuesHorizontal(true); 

	$graph->setXAxisTextColor("maroon"); 
	$graph->setYAxisTextColor("maroon"); 

	$graph->setLineColor("lime", "red","blue"); 

	$graph->setupXAxis(6, "red"); 
	$graph->setupYAxis(3, "red"); 

//$graph->setGoalLine(.0025);
//$graph->setGoalLineColor("red");
$graph->createGraph();

mysql_close($link);
?>