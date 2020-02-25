<?php session_start();
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			//-----------------------------Date------------------------------------
			$monthnames2 =  Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
	
	
	$lang=2;


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:::  THE THAI  RUBBER ASSOCIATION</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script language="javascript">
function OpenNew(URL,width, height , left , top) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width="+ width +",height="+height+",left = "+left+",top ="+ top +"');");
}
</script> 
<script language="javascript">
			function windowOpener(windowHeight, windowWidth, windowName, windowUri)
			{
					var centerWidth = (window.screen.width - windowWidth) / 2;
					var centerHeight = (window.screen.height - windowHeight) / 2;
    				newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=yes,width=' + windowWidth +  ',height=' + windowHeight +  ',left=' +centerWidth + ',top=' + centerHeight);
					newWindow.focus();
					return newWindow.name;
		}
</script>
</head>

<body>
<center>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      	<td width="100%" ><?php include("top.php"); ?></td>
    </tr>
    <tr>
      	<td width="100%" >
			<?php  
				if($detail) {
				$s_page=$detail.".php";
				include($s_page);
				}else{
				include('main.php');
				}
			?>
   		</td>
    </tr>
    <tr>
      	<td width="100%" ><?php include("footer.php"); ?></td>
    </tr>
  </tbody>
</table>

</center>
</body>
</html><?php mysql_close($link);?>