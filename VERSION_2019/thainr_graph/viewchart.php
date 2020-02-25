<HTML>
<BODY bgcolor="#FFFFFF">

<?php
//include charts.php to access the InsertChart function
include "charts.php";
echo InsertChart ( "charts.swf", "charts_library", "data.php?StartDate=$StartDate&StopDate=$StopDate", 1000, 1200 );
?>
</BODY>
</HTML>

