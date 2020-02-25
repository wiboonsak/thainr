<?php 
//---------update download fileid
require_once("../control/config.inc.php");
mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
$query="UPDATE tbl_document_data SET countDownload=countDownload+1 WHERE id ='".$_GET['fileid']."' ";
mysql_query($query);
mysql_close();

// Don't timeout when downloading large files 
@ignore_user_abort(); 
@set_time_limit(0); 

// Get list name 
$name = $_GET['file']; 
$file = "prefix_$name.tar.gz"; 
$file =  $_GET['file']; 
$fullfile = "../uploadfile/" . $file; 
// Make sure list is set and file exists 
if((!$name) or (!file_exists($fullfile))) { 
die("File wasnt set or it didnt exist"); 
} 

// Create the pointer to our file and open it as read-only binary data 
$fp = fopen($fullfile,'rb'); 

// Send headers telling browser to download our passed data 
header("Content-Type: application/octet-stream"); 
header("Pragma: no-cache"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Length: " . filesize($fullfile)); 
header("Accept-Ranges: bytes"); 
header("Content-Disposition: attachment; filename=\"$file\""); 

// Here comes the data 
while (!feof($fp)) {
echo(@fgets($fp, 8192));
}
fclose ($fp);
exit();
?>