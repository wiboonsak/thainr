<?php

// Database and Server Values
$host = 'localhost'; // Server (e.g. localhost)
$username = 'thainr_data'; // Server Username	
$password = 'thainr'; // Server Password
$db = 'thainr_data'; // Database to be created or name of existing database (Please note: Database containing dashes cannot be created)

// Connect Information - No need to edit
@mysql_connect ($host, $username, $password);
@mysql_select_db ($db);
mysql_query("SET NAMES TIS620");
mysql_query("SET character_set_results=tis620");
mysql_query("SET character_set_client=tis620");
mysql_query("SET character_set_connection=tis620");
//

?>