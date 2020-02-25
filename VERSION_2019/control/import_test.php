<?php
require_once("config.inc.php");
		//	include("function.inc.php");
		//---------------------------------------------------------------------------------------------------------------------------------------------------
			//$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			//mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	
	$file = "2558_Sujin.csv"; 
    $handle = fopen($file,"r"); 
	 $n=1;
	 do { 
        if ($data[0]) { 
           // mysql_query("INSERT INTO contacts (contact_first, contact_last, contact_email) VALUES 
           //     ( 
            //        '".addslashes($data[0])."', 
           //         '".addslashes($data[1])."', 
           //         '".addslashes($data[2])."' 
           //     ) 
           // "); 
		  // echo $n." [ ".$data[0]."  ".$data[1]."  ".$data[2]."  ".$data[3]."  ".$data[4]." ".$data[5]." ]<br>";
		   $query="INSERT INTO `tbl_central_market_price`(`id`, `rubber_sheet`, `rubber_smoke_sheet`, `latex`, `rubber_scrap`, `date_data`, `note`) VALUES ('' , '".$data[1]."',  '".$data[2]."' ,  '".$data[3]."' ,  '".$data[4]."'  ,  '".$data[0]."'  ,  '".$data[5]."' )";
		    echo $n." [ ".$data[0]."  ".$data[1]."  ".$data[2]."  ".$data[3]."  ".$data[4]." ".$data[5]." ]<br>";
		   echo "<br>".$query."<hr>";
		 // mysql_query($query);
        } 
		$n++;
    } while ($data = fgetcsv($handle,1000,",","'")); 
?>