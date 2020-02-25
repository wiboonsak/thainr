<?php

$day = date ("d");
$month = date ("m");
$year = date ("Y"); 

if ($day != '01') {

	$initial = $day - 1;
	
	if (strlen ($initial) == 1) {
		
		$previous = "0".$initial;
		$subdate = "0".$initial."/".$month."/".$year;
		
	} else {
		
		$previous = $initial;
		$subdate = $initial."/".$month."/".$year;
		
	}
	
	
	$history = mysql_query ("SELECT * FROM stats_daily WHERE SUBSTRING(subdate, 1, 2)='$previous'");
	$historyrows = mysql_num_rows ($history);
	$historyhits = mysql_fetch_array ($history);
	
	$history_large = mysql_query ("SELECT * FROM stats_history WHERE title='Largest Daily Hits'");
	$history_large_rows = mysql_num_rows ($history_large);
	$history_large_hits = mysql_fetch_array ($history_large);
	
	if ($history_large_rows == 0) {
	
		mysql_query ("INSERT INTO stats_history (title, hits, subdate) VALUES ('Largest Daily Hits', '0', '$subdate')");
		
		$history_large_rows = 1;
		
	}
	
	if (($historyrows == 1 && $history_large_rows == 1) && ($historyhits['hits'] > $history_large_hits['hits'])) {
	
		mysql_query ("UPDATE stats_history SET hits='$historyhits[hits]', subdate='$subdate' WHERE title='Largest Daily Hits'");
		
	}
	
	$history_small = mysql_query ("SELECT * FROM stats_history WHERE title='Smallest Daily Hits'");
	$history_small_rows = mysql_num_rows ($history_small);
	$history_small_hits = mysql_fetch_array ($history_small);
	
	if ($history_small_rows == 0) {
	
		mysql_query ("INSERT INTO stats_history (title, hits, subdate) VALUES ('Smallest Daily Hits', '10000000000', '$subdate')");
		
		$history_small_rows = 1;
		$history_small_hits['hits'] = 10000000000;
		
	}
	
	if (($historyrows == 1 && $history_small_rows == 1) && ($historyhits['hits'] < $history_small_hits['hits'])) {
	
		mysql_query ("UPDATE stats_history SET hits='$historyhits[hits]', subdate='$subdate' WHERE title='Smallest Daily Hits'");
		
	}
	
	$history_largeu = mysql_query ("SELECT * FROM stats_history WHERE title='Largest Daily Visits'");
	$history_largeu_rows = mysql_num_rows ($history_largeu);
	$history_largeu_hits = mysql_fetch_array ($history_largeu);
	
	if ($history_largeu_rows == 0) {
	
		mysql_query ("INSERT INTO stats_history (title, hits, subdate) VALUES ('Largest Daily Visits', '0', '$subdate')");
		
		$history_largeu_rows = 1;
	
	}
	
	if (($historyrows == 1 && $history_largeu_rows == 1) && ($historyhits['uniquehits'] > $history_largeu_hits['hits'])) {
	
		mysql_query ("UPDATE stats_history SET hits='$historyhits[uniquehits]', subdate='$subdate' WHERE title='Largest Daily Visits'");
		
	}
	
	$history_smallu = mysql_query ("SELECT * FROM stats_history WHERE title='Smallest Daily Visits'");
	$history_smallu_rows = mysql_num_rows ($history_smallu);
	$history_smallu_hits = mysql_fetch_array ($history_smallu);
	
	if ($history_smallu_rows == 0) {
	
		mysql_query ("INSERT INTO stats_history (title, hits, subdate) VALUES ('Smallest Daily Visits', '10000000000', '$subdate')");
		
		$history_smallu_rows = 1;
		$history_smallu_hits['hits'] = 10000000000;
		
	}
	
	if (($historyrows == 1 && $history_smallu_rows == 1) && ($historyhits['uniquehits'] < $history_smallu_hits['hits'])) {
	
		mysql_query ("UPDATE stats_history SET hits='$historyhits[uniquehits]', subdate='$subdate' WHERE title='Smallest Daily Visits'");
		
	}
	
}

?>