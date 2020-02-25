<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td align="center" class="text" height="25">
			<a href="daily.php" class="text">Daily</a> | <a href="monthly.php" class="text">Monthly</a> | <a href="yearly.php" class="text">Yearly</a> | <a href="referers.php" class="text">Referers</a> | <a href="summary.php" class="text">Summary</a>
		</td>
	</tr>
</table>
<br>
<?php

include ("../config.php");

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

$result = mysql_query ("SELECT * FROM stats_yearly");
$numrows = mysql_num_rows ($result);

$result2 = mysql_query ("SELECT * FROM stats_history");

if ($numrows != 0) {

?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="50%" colspan="2" align="right" valign="top">
			<table width="75%"  border="0" cellspacing="0" cellpadding="2">
				<?php
				
				while ($myrow = mysql_fetch_array ($result2)) {
				
				?>
				<tr>
					<td width="40%" height="25" class="text"><b><?= $myrow['title']; ?></b></td>
					<td width="60%" height="25" class="text"><?= $myrow['hits']; ?> <i>(<?= $myrow['subdate']; ?>)</i></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	    <td width="50%" colspan="2" align="left" valign="top">
			<table width="75%"  border="0" cellspacing="0" cellpadding="2">
        	<?php
				
			$topreferer = mysql_query ("SELECT * FROM stats_referer ORDER BY (hits + 0) DESC LIMIT 1");
			$referrows = mysql_num_rows ($topreferer);
			$getreferer = mysql_fetch_array ($topreferer);
			
			$total = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_yearly"));
			$total2 = mysql_fetch_array (mysql_query ("SELECT SUM(uniquehits) AS visits FROM stats_yearly"));
			
			$day = date ("d");
			$current = mysql_fetch_array (mysql_query ("SELECT * FROM stats_daily WHERE SUBSTRING(subdate, 1, 2)='$day'"));
				
			if ($referrows != 0) {
			?>
        		<tr>
        			<td width="40%" height="25" colspan="2" class="text"><b>Top Referer</b></td>
        		</tr>
				 <tr>
        			<td width="40%" height="25" class="text"><?= $getreferer['referer']; ?></td>
					<td width="40%" height="25" class="text"><?= $getreferer['hits']; ?></td>
        		</tr>
				 <tr>
        			<td width="40%" height="25" class="text" colspan="2">&nbsp;</td>
        		</tr>
			<?php } ?>
				<tr bgcolor="#CCCCCC">
        			<td width="40%" height="25" class="text"><b>Total Hits</b></td>
        			<td width="60%" height="25" class="text"><?= $total['hits']; ?></td>
        		</tr>
				<tr bgcolor="#CCCCCC">
        			<td width="40%" height="25" class="text"><b>Total Visits</b></td>
        			<td width="60%" height="25" class="text"><?= $total2['visits']; ?></td>
        		</tr>
				<tr bgcolor="#FF6666">
        			<td width="40%" height="25" class="text"><b>Current Daily Hits</b></td>
        			<td width="60%" height="25" class="text"><?= $current['hits']; ?></td>
        		</tr>
				<tr bgcolor="#FF6666">
        			<td width="40%" height="25" class="text"><b>Current Daily Visits</b></td>
        			<td width="60%" height="25" class="text"><?= $current['uniquehits']; ?></td>
        		</tr>
        	</table>
		</td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center">&nbsp;</td>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td align="right" valign="top">
			<table width="50%" border="0" cellpadding="3" cellspacing="0">
			<?php

			$ostotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os")); // Obtain total OS hits

			$windowstotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os WHERE os='Windows'"));
			$windows_hits = $windowstotal['hits'];
			$windows = round (($windows_hits / $ostotal['hits']) * 100); // Calculate OS' percentage of the total hits. ROUND to prevent decimals

			$mactotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os WHERE os='Mac'"));
			$mac_hits = $mactotal['hits'];
			$mac = round (($mac_hits / $ostotal['hits']) * 100);

			$linuxtotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os WHERE os='Linux'"));
			$linux_hits = $linuxtotal['hits'];
			$linux = round (($linux_hits / $ostotal['hits']) * 100);

			$os2total = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os WHERE os='OS/2'"));
			$os2_hits = $os2total['hits'];
			$os2 = round (($os2_hits / $ostotal['hits']) * 100);

			$beostotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os WHERE os='BeOS'"));
			$beos_hits = $beostotal['hits'];
			$beos = round (($beos_hits / $ostotal['hits']) * 100);

			$unixtotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_os WHERE os='Unix'"));
			$unix_hits = $unixtotal['hits'];
			$unix = round (($unix_hits / $ostotal['hits']) * 100);

			?>
				<tr align="center" bgcolor="#3399FF" class="text">
					<td colspan="2" width="75%" height="25"><b>Operating System</b></td>
					<td width="25%"><b>% Hits</b></td>
				</tr>
				<tr class="text">
					<td width="25%" align="center" height="25"><img src="../images/windows.gif" width="35" height="35"></td>
					<td width="50%">Windows</td>
					<td width="25%" align="center"><?= $windows ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/mac.gif" width="35" height="35"></td>
					<td>Mac</td>
					<td align="center"><?= $mac ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/linux.gif" width="35" height="35"></td>
					<td>Linux</td>
					<td align="center"><?= $linux ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/os2.gif" width="35" height="35"></td>
					<td>OS/2</td>
					<td align="center"><?= $os2 ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/beos.gif" width="35" height="35"></td>
					<td>BeOS</td>
					<td align="center"><?= $beos ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/unix.gif" width="35" height="35"></td>
					<td>Unix</td>
					<td align="center"><?= $unix ?>%</td>
				</tr>
			</table>
		</td>
	    <td width="5">&nbsp;</td>
	    <td width="5">&nbsp;</td>
	    <td align="left" valign="top">
		    <table width="50%"  border="0" cellpadding="3" cellspacing="0">
			<?php

			$browsertotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser")); // Total browser hits

			$ietotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Internet Explorer'"));
			$ie_hits = $ietotal['hits'];
			$ie = round (($ie_hits / $browsertotal['hits']) * 100); // Calculate browsers percentage of the total hits. ROUND to prevent decimals

			$konquerortotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Konqueror'"));
			$konqueror_hits = $konquerortotal['hits'];
			$konqueror = round (($konqueror_hits / $browsertotal['hits']) * 100);

			$icabtotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='iCab'"));
			$icab_hits = $icabtotal['hits'];
			$icab = round (($icab_hits / $browsertotal['hits']) * 100);

			$firefoxtotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Firefox'"));
			$firefox_hits = $firefoxtotal['hits'];
			$firefox = round (($firefox_hits / $browsertotal['hits']) * 100);

			$mozillatotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Mozilla'"));
			$mozilla_hits = $mozillatotal['hits'];
			$mozilla = round (($mozilla_hits / $browsertotal['hits']) * 100);

			$lynxtotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Lynx'"));
			$lynx_hits = $lynxtotal['hits'];
			$lynx = round (($lynx_hits / $browsertotal['hits']) * 100);

			$netscapetotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Netscape'"));
			$netscape_hits = $netscapetotal['hits'];
			$netscape = round (($netscape_hits / $browsertotal['hits']) * 100);

			$safaritotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='Safari'"));
			$safari_hits = $safaritotal['hits'];
			$safari = round (($safari_hits / $browsertotal['hits']) * 100);

			$aoltotal = mysql_fetch_array (mysql_query ("SELECT SUM(hits) AS hits FROM stats_browser WHERE browser='AOL'"));
			$aol_hits = $aoltotal['hits'];
			$aol = round (($aol_hits / $browsertotal['hits']) * 100);

			?>
				<tr align="center" bgcolor="#3399FF" class="text">
					<td colspan="2" width="75%" height="25"><b>Browser</b></td>
					<td width="25%"><b>% Hits</b></td>
				</tr>
				<tr class="text">
					<td width="25%" align="center"><img src="../images/ie.gif" width="35" height="35"></td>
					<td width="50%">Internet Explorer </td>
					<td width="25%" align="center"><?= $ie ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/konqueror.gif" width="35" height="35"></td>
					<td>Konqueror</td>
					<td align="center"><?= $konqueror ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/icab.gif" width="35" height="35"></td>
					<td>iCab</td>
					<td align="center"><?= $icab ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/firefox.gif" width="35" height="35"></td>
					<td>Firefox</td>
					<td align="center"><?= $firefox ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/mozilla.gif" width="35" height="35"></td>
					<td>Mozilla</td>
					<td align="center"><?= $mozilla ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/lynx.gif" width="35" height="35"></td>
					<td>Lynx</td>
					<td align="center"><?= $lynx ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/netscape.gif" width="35" height="35"></td>
					<td>Netscape</td>
					<td align="center"><?= $netscape ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/safari.gif" width="35" height="35"></td>
					<td>Safari</td>
					<td align="center"><?= $safari ?>%</td>
				</tr>
				<tr class="text">
					<td align="center"><img src="../images/aol.gif" width="35" height="35"></td>
					<td>AOL</td>
					<td align="center"><?= $aol ?>%</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php } else { ?>
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="text" align="center" height="25">ERROR: No Statistics</td>
	</tr>
</table>
<?php } ?>