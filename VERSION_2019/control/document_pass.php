<?php 
   
	####################################################
	//echo $_POST['action'];
	if($_POST['action']=='AddData'){
			if($_POST['IDS']==''){
				$query="INSERT INTO `tbl_document_pass` (`id`, `user`, `userpass`) VALUES (NULL, '".$_POST['user']."', '".$_POST['userpass']."') ";
				mysql_query($query);
				$data['id']=mysql_insert_id();
			}else{
				$query="UPDATE tbl_document_pass SET `user` = '".$_POST['user']."' , `userpass` = '".$_POST['userpass']."' ";
				mysql_query($query);
			}
			 
	}
		
	
	####################################################	
	  $query="SELECT * FROM `tbl_document_pass` ";
	  $result = mysql_query($query);
	  $data = mysql_fetch_assoc($result);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function deleteThis(ids , filename){
					if(confirm('ต้องการลบหัวข้อนี้ ?')){
								document.form1.action.value='Delete';
								document.form1.IDS.value=ids;
						        document.form1.filename.value=filename;
								document.form1.submit();
						}else{
								return false;
							}
			
			}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ตั้ง username password ระบบวารสาร

    
      <input type="hidden" name="page" />
      <input type="hidden" name="IDS" value="<?php echo $data['id']?>" />
      <input type="hidden" name="action" value="AddData" />
      <input type="hidden" name="filename" id="filename" />
      </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black"><table width="100%" border="0">
      <tbody>
        <tr>
          <td width="26%" align="right">username</td>
          <td width="74%"><input name="user" type="text" id="user"  value="<?php echo $data['user']?>" size="30" maxlength="50"></td>
        </tr>
        <tr>
          <td align="right">password</td>
          <td><input name="userpass" type="text" id="userpass" value="<?php echo $data['userpass']?>" size="30" maxlength="32"></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><button type="submit"> ตกลง </button></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>