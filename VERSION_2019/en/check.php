<?php
	header("Content-Type: text/plain; charset=utf-8");
			header("Cache-Control: no-cache,must-revalidate");
			header("Prdgma : no-cache");
require_once("../control/config.inc.php");
 $link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			 mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
$username = strtolower($_POST['username']);
//$username = mysql_escape_string($username);


$query="SELECT * FROM tbl_thainr_member  WHERE email = '".$username."'  ";
$result = mysql_query($query);
$num = mysql_num_rows($result);
echo $num;
mysql_close();
?>
