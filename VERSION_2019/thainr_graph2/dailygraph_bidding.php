<?php
include("phpgraphlib.php"); 
   	$db_host		= 'localhost';
	$db_user		= 'thainr_dbnew';
	$db_password	= 'd1PUJSh3';
	$db_name		= 'thainr_dbnew';
	$lang=1; // 1 = thai , 2 = en
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	

	

		$query = "SELECT * FROM tbl_rubber_bidding   WHERE id = '$id' ";
			$result = mysql_query($query);
				while($row=mysql_fetch_assoc($result)){
						$p1 = $row['price'];
						$title = $row['offermonth']." ".$row['offeryear']." ".$row['remark'];
						$title2 = $row['datex']." ".$row['remark'];
						$title3 = $row['remark'];
						}
	
$graph=new PHPGraphLib(550,250);
	$data=array("$title3"=>$p1);


		$graph->addData($data);
		$graph->setTitle("Bidding Price $StartDate  (Unit = USC/Kilogram) ");
		$graph->setBars(false);
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

		$graph->setRange(350,0); 

		//$graph->setGoalLine(.0025);
		//$graph->setGoalLineColor("red");
		$graph->createGraph();

mysql_close($link);
?>