<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
	if($_GET['topic_id']){ $_POST['topic_id']=$_GET['topic_id']; }else{ $_POST['topic_id']=$_POST['topic_id']; }
	$lang=$_SESSION['language'];		
	####################################################
		if($_POST['action']=='DeleteFile'){
				 @unlink($path_product.$_POST['removeFile']);
				 $query="UPDATE tbl_rubber_assosinate_pdf  SET file_name = ''   WHERE id = '".$_POST['topic_id']."' ";
				 mysql_query($query);
		}
	####################################################
			if($_POST['action']=="Add"){
							$date_update=date("Y-m-d");
							$_POST['MyTextAreaName_th']=ereg_replace ("<P>", " ", $_POST['MyTextAreaName_th']);
							$_POST['MyTextAreaName_th']=ereg_replace ("</P>", "<BR>", $_POST['MyTextAreaName_th']);
							//---FILE--------------------------------------
							if($_FILES['uploadfile']['name']!=''){
								@unlink($path_product.$_POST['removeFile']);
								 GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$Ext);
								 move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
							}else{
								$_FILES['uploadfile']['name']=$_POST['removeFile'];
							}
							//---FILE-------------------------END-------------//---FILE--------------------------------------

							if(!$_POST['topic_id']){ 
									$query = "INSERT INTO  `tbl_rubber_assosinate_pdf`  (`id` , `file_name` ,`date_update` , `lang` ) "
									." VALUES "
									." (''  ,'".$_FILES['uploadfile']['name']."' , '".$date_update."', '".$lang."' ) ";				
									mysql_query($query);
									$_POST['topic_id'] = mysql_insert_id();
							}else{
									$query = "UPDATE   `tbl_rubber_assosinate_pdf`  SET  `date_update`  = '".$date_update."' , `file_name`= '".$_FILES['uploadfile']['name']."'  WHERE id = '".$_POST['topic_id']."'  AND lang= '".$lang."'  ";
									mysql_query($query);
							}
			}		
	####################################################

	
			    $query = "SELECT * FROM   `tbl_rubber_assosinate_pdf` WHERE  `lang`='$lang'   ";		
				$data=mysql_fetch_assoc(mysql_query($query));
				$detail_th = $data['detail'];
				$_POST['topic_id']=$data['id'];
				
				
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
    <td width="96%" bgcolor="#D9D9B3">ทำเนียบสมาชิก</td>
  </tr>
  <tr>
    <td colspan="2"><table width="99%" border="0" align="center" cellpadding="10" cellspacing="2">
      <!--            <tr>
              <td>รายละเอียด (อังกฤษ) </td>
              <td><textarea cols="50" rows="6" name="MyTextAreaName_en" id="MyTextAreaName_en"></textarea>
              <script language="javascript1.2">
								editor_generate('MyTextAreaName_en');
						</script></td>
            </tr>
 -->
      <tr class="txt10-black">
        <td width="35%" align="right"><strong>ไฟล์แนบ</strong></td>
        <td width="65%"><?php if($data['file_name']){ ?>
          ไฟล์ดาวน์โหลด <a href="<?php echo $path_product.$data['file_name']?>" target="_blank"> &nbsp;&nbsp;<img src="images/black_icon/32x32/arrow_bottom.png" alt="" width="32" height="32" border="0" align="absmiddle" style="padding-left:5px;" /></a> &nbsp;&nbsp;&nbsp; <a href="#" onclick="if(confirm('ต้องการลบไฟล์นี้')){ form1.action.value='DeleteFile';form1.submit(); }else{ return false;}">[ ลบไฟล์ ]</a><br />
          <?php }?>
          <input name="uploadfile" type="file" id="uploadfile" size="28" maxlength="100" />
          <input type="hidden" name="removeFile"  value="<?php echo $data['file_name']?>"/>
           <input type="hidden" name="topic_id" value="<?php echo $_POST['topic_id'];?>" />
          <input type="hidden" name="action" />
          </td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#F7F7F7"><input type="button" name="Button" value=" <?php echo _txtBtnAddEdit?> "  onclick="form1.action.value='Add';form1.submit();" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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