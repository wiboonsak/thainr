<?php  session_start(); if($_POST['action']=='go'){ 
		   
			require_once("../control/config.inc.php");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	
			if(($_POST['xuser']=='') || ($_POST['xuser']=='')){
				echo "<script>alert('กรุณาใส่ username password');</script>";
				
			}else{
				$query="SELECT * FROM tbl_document_pass WHERE user = '".$_POST['xuser']."'  AND userpass =  '".$_POST['xpass']."'  ";
			    $result  = mysql_query($query);
				$numRows=mysql_num_rows($result);
				if($numRows==0){
					echo "<script>alert(' username และ password ผิด');</script>";
					
				}else{
					$_SESSION['loginDocument']='Yes';
					echo "<script>window.location.href='index.php?detail=journal_all';</script>";
				}
			}
}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วารสาร สมาคมยางพาราไทย [ The Journal Of TRA]</title>
<style type="text/css">
.button {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:-3px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	font-style:normal;
	height:50px;
	line-height:50px;
	width:148px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #ffffff;
}
.button:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.button:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="formx">
<input type="hidden" name="action" value="go">
<table width="800" height="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image: url(../images/journal/bg-journal-page.jpg); background-repeat: no-repeat; border: 4px #cdcdcd solid; ">
  <tbody>
    <tr>
      <td width="506" height="556" align="right">
        <table width="302" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="66" colspan="2"><img src="../images/journal/journal-page_01.png" width="463" height="66" alt=""></td>
          </tr>
          <tr>
            <td height="150" colspan="2" bgcolor="#FFFFFF" align="center">
            <input type="text" name="xuser" id="xuser" placeholder="  ระบุ Username" style="background-color: #ecf0f1; border:none; width: 80%; height: 40px; margin-bottom: 10px;"><br>
            <input type="text" name="xpass" id="xpass" placeholder="  ระบุ Password" style="background-color: #ecf0f1; border:none; width: 80%; height: 40px; "></td>
          </tr>
          <tr>
            <td width="251" height="81" align="center" valign="top" style="background-image: url(../images/journal/journal-page_03.png); background-repeat: no-repeat">
           <a href="#" class="button" onClick="document.formx.submit()">LOGIN</a></td>
            <td><a href="http://www.thainr.com/Register-TRA-E-Magazine.pdf" target="_blank"><img src="../images/journal/journal-page_04.png" alt="" width="212" height="81"></a></td>
          </tr>
      </table></td>
      <td width="294" valign="bottom"><a href="http://www.thainr.com/E_magazine/E-MAG_Mar_2018_Resize_Web.pdf" target="_blank"><img src="../images/journal/download.png" width="308" height="186" alt="" style="opacity:1;filter:alpha(opacity=100)" onmouseover="this.style.opacity=0.8;this.filters.alpha.opacity=80" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"/></a></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>
