<?php 
	##############################################$_SESSION['language']
		if($_POST['action']=='Add'){ 
			$_POST['detail']=ereg_replace ("<P>", "", $_POST['detail']);
			$_POST['detail']=ereg_replace ("</P>", "", $_POST['detail']);
			$_POST['detail']=ereg_replace ("char(13)", "", $_POST['detail']);		
			$_POST['detail']=ereg_replace ("\n", "", $_POST['detail']);	
			$_POST['detail']=ereg_replace ("\r", "", $_POST['detail']);									
		
				if($_POST['numberResult']==0){
					$query="INSERT INTO `tbl_top_marquee` (`id` ,`text`,`text_en` ,`lang`,`amount`,`language` ) "
					." VALUES ('' , '".$_POST['text']."' , '".$_POST['text_en']."' , '".$_SESSION['language']."', '".$_POST['amount']."', ".$_SESSION['language'].")";
					mysql_query($query);
			
				}else{ 
					$query="UPDATE  `tbl_top_marquee` SET `text` =  '".$_POST['text']."', `text_en`= '".$_POST['text_en']."' , `amount` =  '".$_POST['amount']."' ,  `lang`=".$_SESSION['language']."  ,`language`=".$_SESSION['language']." WHERE id = '".$_POST['ID']."' ";
					mysql_query($query);
				
				}
	}
	//echo $query;
	//-------------------------
	$query="SELECT * FROM tbl_top_marquee WHERE lang='".$_SESSION['language']."'  ORDER BY id DESC LIMIT 0,1 ";
	//echo $query;
	$result = mysql_query($query);
	$numberResult =mysql_num_rows($result);
	$data=mysql_fetch_assoc($result);
	if($data['amount']==0){
		$data['amount'] = 100;
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ข่าวสารความเคลื่อนไหว

    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
      <tr>
        <td><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
          <tr>
            <td width="25%"><?php echo _txtDetaulinput?></td>
            <td width="75%"><textarea name="text" cols="55" rows="10" id="text"><?php echo $data['text']?></textarea>
             <script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('text');
		          </script></td>
          </tr>
          <!--<tr>
            <td>รายละเอียด [english]</td>
            <td width="75%"><textarea name="text_en" cols="55" rows="10" id="text_en"><?php echo $data['text_en']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('text_en');
		          </script></td>
          </tr> -->
          <tr>
            <td>ความเร็ว</td>
            <td width="75%"><input name="amount" type="text" id="amount" value="<?php echo $data['amount']?>" size="6" />
              <span class="error">** ค่าปกติ 100 ค่ามากคำวิ่งจะช้าลง </span></td>
          </tr>
          <tr>
            <td><input name="action" type="hidden" id="action" />
              <input name="numberResult" type="hidden" id="numberResult" value="<?php echo $numberResult?>" />
              <input type="hidden" name="ID" value="<?php echo $data['id']?>" /></td>
            <td><input type="submit" name="Submit" value=" แก้ไขข้อมูล" onclick="document.form1.action.value='Add';" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>