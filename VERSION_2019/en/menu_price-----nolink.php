<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="style.css" rel="stylesheet" type="text/css" />
  <table width="242" border="0" cellpadding="0" cellspacing="0">
    <tr align="left" valign="top">
      <td colspan="3"><img src="images/inside/h-l-price.gif" width=242 height=54 alt=""></td>
    </tr>
    <tr align="left" valign="top">
      <td width="7" align="left" bgcolor="#D6EEF8"><IMG SRC="images/inside/nr_09.jpg" WIDTH=7 HEIGHT=193 ALT=""></td>
      <td width="228" align="center" bgcolor="#FFFFFF"><table width="90%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="#"><img src="images/link-synthetic.gif" alt="Activity" width="205" height="48" vspace="5" border="0" /></a></td>
        </tr>
        <tr>
          <td><a href="#"><img src="images/link-offerprice.gif" alt="Activity" width="205" height="48" vspace="5" border="0" /></a></td>
        </tr>
        <tr>
          <td><a href="#"><img src="images/link-bidding.gif" alt="Activity" width="205" height="48" vspace="5" border="0" /></a></td>
        </tr>
        <tr>
          <td><a href="#"><img src="images/link-local.gif" alt="Activity" width="205" height="48" vspace="5" border="0" /></a><a href="?detail=ac-calendar"></a></td>
        </tr>
        <tr>
          <td><a href="#"><img src="images/link-cess.gif" alt="Activity" width="205" height="67" vspace="5" border="0" /></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td width="7" align="left" bgcolor="#D6EEF8"><IMG SRC="images/inside/nr_11.jpg" WIDTH=7 HEIGHT=193 ALT=""></td>
    </tr>
  </table>
  <table width="242" border="0" cellspacing="0" cellpadding="0">

    <tr align="left" valign="top">
      <td width="242" align="center" background="images/inside/nr_21.jpg"><table width="228" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/inside/nr_23.jpg" width=122 height=53 alt=""><a href="?detail=pr-local"><img src="images/inside/nr_24.jpg" alt="" width=103 height=53 border="0"></a></td>
          </tr>
          <tr>
            <td><img src="images/inside/nr_33.jpg" width=122 height=32 alt=""><img src="images/inside/nr_34.jpg" width=103 height=32 alt=""></td>
          </tr>
          <tr>
            <td><a href="?detail=situation"><IMG SRC="images/inside/nr_36.jpg" ALT="" WIDTH=122 HEIGHT=45 border="0"></a><IMG SRC="images/inside/nr_37.jpg" WIDTH=103 HEIGHT=45 ALT=""></td>
          </tr>
          <tr>
            <td><IMG SRC="images/inside/nr_39.jpg" WIDTH=122 HEIGHT=30 ALT=""><IMG SRC="images/inside/nr_40.jpg" WIDTH=103 HEIGHT=30 ALT=""></td>
          </tr>
          <tr>
            <td><IMG SRC="images/inside/nr_45.jpg" WIDTH=122 HEIGHT=38 ALT=""><a href="?detail=stat-thai"><IMG SRC="images/inside/nr_46.jpg" ALT="" WIDTH=103 HEIGHT=38 border="0"></a></td>
          </tr>
      </table></td>
    </tr>
    <tr align="left" valign="top">
      <td align="center" background="images/inside/nr_21.jpg"><img src="images/inside/nr_47.jpg" width=225 height=24 alt=""></td>
    </tr>
    <tr align="left" valign="top">
      <td align="center" background="images/inside/nr_21.jpg"><?php include("link_member.php"); ?></td>
    </tr>
    <tr align="left" valign="top">
      <td align="center" background="images/inside/nr_21.jpg"><table width="225" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
          <tr align="center" valign="middle">
            <td width="55" height="50"><IMG SRC="images/inside/nr_107.jpg" WIDTH=23 HEIGHT=21 ALT=""></td>
            <td align="left"> <?php 
			require_once("../control/config.inc.php");	
	
			$table = "useronline2";		// Your Table of choice, ex. "online_users"
			$table2="counter";

	$SID = session_id();
	$time = time();
	$dag = date("z");
	$nu = time()-900; // Keep for 15 mins

		//$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
		//mysql_select_db($db_name) or die("Could not select database");			
			
		//check counter table 
		$query=mysql_query("SELECT count(*) FROM $table2 ");
		$count_check=mysql_result($query,0);
		if($count_check==0){
				mysql_query("INSERT INTO $table2 (id,nuser) VALUES ('','1') ");
		}
	
	   // Check to see if the session_id is already registerd
			$sidcheck = mysql_query("SELECT count(*) FROM $table WHERE SID='$SID'");
			$sid_check = mysql_result($sidcheck,0);

		if ($sid_check == "0") {
		// If not, the session_id will be stored in MySQL
				mysql_query("INSERT INTO $table VALUES ('$SID','$time','$dag')");	
				mysql_query("UPDATE $table2 SET nuser=nuser+1 ");
			} else {		
					// If it is, it will register a new time to the session.
				mysql_query("UPDATE $table SET time='$time' WHERE SID='$SID'");				
			}
				// This is it, this counts the users currently online	
			$count_users = mysql_query("SELECT count(*) FROM $table WHERE time>$nu AND day=$dag");
			$users_online = mysql_result($count_users,0);
			$plus = rand(1, 2);
			$users_online = $users_online+$plus;

			//total user online
			$query = mysql_query("SELECT nuser  FROM $table2");
			$total_user=mysql_result($query,0);
			//echo "<br> total user -> ".$total_user;
			// This deletes old ids, so your db will not get overloaded.
				
			mysql_query("DELETE FROM $table WHERE time<$nu");
			mysql_query("DELETE FROM $table WHERE day != $dag");


?>
		  <font color="87a631">You are Visitor no : <?php echo $total_user?><br>
            User Online : <?php echo $users_online;?></font></td>
          </tr>
      </table></td>
    </tr>
    <tr align="left" valign="top" background="images/inside/nr_21.jpg">
      <td><img src="images/inside/nr_114.jpg" width="242" height="16" alt="" /></td>
    </tr>
  </table>
