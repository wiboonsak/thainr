<?php
			require_once("config.inc.php");
			include("function.inc.php");
		$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");


			if($_POST['action']=='topic'){
					$query="DELETE FROM tbl_webboard_question  WHERE id='".$_POST['key']."'  ";
					mysql_query($query);
					$query="DELETE FROM tbl_webboard_ans  WHERE Qid='".$_POST['key']."'   ";
					mysql_query($query);
			}
			if($_POST['action']=='ans'){
				$query="DELETE FROM tbl_webboard_ans  WHERE id='".$_POST['key']."'  ";
					mysql_query($query);
			}

			$query="SELECT * FROM   tbl_webboard_question  WHERE id='".$_GET['BID']."'  ";
			$result=mysql_query($query);
			$dataB=mysql_fetch_assoc($result);
			$query="SELECT * FROM tbl_webboard_ans  WHERE Qid='$BID'  ORDER BY id DESC ";
			$resultAns=mysql_query($query);
?>
<html>
<head>
<title>Webboard</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	margin-left: 1px;
	margin-top: 10px;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
		function delBoard(dtype,BID){
				if(confirm('ต้องการลบ ?')){
						document.form1.action.value=dtype;
						document.form1.key.value=BID;			
						document.form1.submit();			
				}else{
					return false;
				}
		}
</script>
</head>
<body  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="640" border="0" align="center" cellpadding="0" cellspacing="0" class="txt10-black">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" background="images/main/index-pink_58.jpg" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font11">
      <tr align="left" valign="middle">
        <td height="20" colspan="2" bgcolor="#FFFFEA">
		
		  <span class="txt10-black"><a href="#" onClick="delBoard('topic','<?php echo $BID?>')">	<img src="images/black_icon/16x16/delete.png" width="16" height="16" border="0"></a>&nbsp;<strong><?php echo $dataB['question']?></strong></span></td>
        </tr>
      <tr align="left" valign="middle">
        <td width="10" rowspan="2">&nbsp;</td>
        <td width="540" height="10" align="left" bgcolor="#F4F4F4"><span class="txt10-black"><?php echo $dataB['detail']?></span></td>
      </tr>
      <tr align="left" valign="middle">
        <td height="10" align="left" bgcolor="#F4F4F4"><span class="txt10-black">โดยคุณ : <?php echo $dataB['user']?>&nbsp;&nbsp;</span></td>
      </tr>
      <tr align="left" valign="middle">
        <td height="30" colspan="2" class="txt10-brown"><span class="txt10-brown">คำตอบกระทู้นี้ : </span></td>
        </tr>
		<?php  $bg1="#F4F4F4";$bg2="#F3EAF4"; 
						while($Ans=mysql_fetch_assoc($resultAns)){
						$bgc=($bgc==$bg2)?$bg1:$bg2;
						?>
      <tr align="left" valign="middle" bgcolor="<?php echo $bgc?>">
        <td bgcolor="#FFE3D7">
		  <span class="txt10-black"><a href="#" onClick="delBoard('ans','<?php echo $Ans['id']?>')">
		<img src="images/black_icon/16x16/delete.png" width="16" height="16" border="0">
		  </a>
		  </span></td>
        
		<td height="20" align="left"><span class="txt10-black">&nbsp;<?php echo $Ans['answer']?></span></td>
      </tr>
      <tr align="left" valign="middle" bgcolor="<?php echo $bgc?>">
        <td>&nbsp;</td>
        <td height="20" align="left"><span class="txt10-black">&nbsp;ตอบโดย : <?php echo $Ans['post_by']?></span></td>
      </tr>
	  <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<div align="center"><br>
  <input name="Button" type="button" class="buttonDel" value="ปิดหน้าต่างนี้" onClick="window.close();">
</div>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
		<input name="action" type="hidden">
		<input name="BID" type="hidden" id="BID" value="<?php echo $_GET['BID']?>">
		<input name="key" type="hidden">
</form>
<div align="center"><br>
</div>
</body>
</html>
<?php mysql_close($link);?>
