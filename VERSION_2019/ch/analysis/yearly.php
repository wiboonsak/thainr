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
				
$result = mysql_query ("SELECT * FROM stats_yearly");
$numrows = mysql_num_rows ($result);

if ($numrows != 0) {

?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center">
			<table width="50%" border="0" cellspacing="0" cellpadding="2">
				<tr align="center" bgcolor="#CCCCCC">
					<td width="20%" class="text" height="25"><b>Year</b></td>
				    <td width="40%" class="text" height="25"><b>Hits</b></td>
				    <td width="40%" class="text" height="25"><b>Visits</b></td>
				</tr>
				<?php
									
				while ($myrow = mysql_fetch_array ($result)) {
				
				?>
				<tr align="center">
					<td height="25" class="text"><?= substr ($myrow['subdate'], 6, 4); ?></td>
				    <td height="25" class="text"><?= $myrow['hits']; ?></td>
				    <td height="25" class="text"><?= $myrow['uniquehits']; ?></td>
				</tr>
				<?php } ?>
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