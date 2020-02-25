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
				
$year = date ("Y");
$result = mysql_query ("SELECT * FROM stats_monthly WHERE SUBSTRING(subdate, 7, 4)='$year'");
$numrows = mysql_num_rows ($result);

if ($numrows != 0) {
				
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr align="center">
		<td width="35%" rowspan="3" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				<tr align="center">
					<td height="25" colspan="3" bgcolor="#0099FF" class="text">
						<b>Monthly Statistics For <?= date ("Y"); ?></b>
					</td>
				</tr>
				<tr align="center">
					<td width="20%" class="text" bgcolor="#999999" height="25"><b>Day</b></td>
				    <td width="40%" class="text" bgcolor="#999999" height="25"><b>Hits</b></td>
				    <td width="40%" class="text" bgcolor="#999999" height="25"><b>Visits</b></td>
				</tr>
				<?php
				
				while ($myrow = mysql_fetch_array ($result)) {
				
				?>
				<tr align="center" <?php if (substr ($myrow['subdate'], 3, 2) == date ("m")) { echo "bgcolor=\"#FF6666\""; } else {echo "bgcolor=\"#CCCCCC\""; } ?>>
					<td class="text" height="25"><?= substr ($myrow['subdate'], 3, 2); ?></td>
					<td class="text" height="25"><?= $myrow['hits']; ?></td>
					<td class="text" height="25"><?= $myrow['uniquehits']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	    <td width="65%" height="25" valign="middle" bgcolor="#0099FF" class="text">
			<b>
			<?php
			
			if (isset ($_REQUEST['type'])) {
			
				if ($_REQUEST['type'] == 'hits') {
				
					echo "Hits | <a href=\"".$_SERVER['PHP_SELF']."?type=visits\" class=\"text\">Visits</a>";
					
				}
				
				if ($_REQUEST['type'] == 'visits') {
				
					echo "<a href=\"".$_SERVER['PHP_SELF']."?type=hits\" class=\"text\">Hits</a> | Visits";
					
				}
				
			} else {
							
				echo "Hits | <a href=\"".$_SERVER['PHP_SELF']."?type=visits\" class=\"text\">Visits</a>";
			
			}
			
			?>
			</b>
		</td>
	</tr>
	<tr>
		<td height="25">&nbsp;</td>
	</tr>
	<tr align="center">
		<td width="65%" valign="top">
			<?php
			
			if (isset ($_REQUEST['type'])) {
			
				if ($_REQUEST['type'] == 'hits') {
				
					echo "<img src=\"gd_monthly.php\" alt=\"Monthly Hits\" width=\"525\" height=\"275\">";
					
				}
				
				if ($_REQUEST['type'] == 'visits') {
				
					echo "<img src=\"gd_monthly_visits.php\" alt=\"Monthly Visits\" width=\"525\" height=\"275\">";
					
				}
				
			} else {
							
				echo "<img src=\"gd_monthly.php\" alt=\"Monthly Hits\" width=\"525\" height=\"275\">";
			
			}
			
			?>
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