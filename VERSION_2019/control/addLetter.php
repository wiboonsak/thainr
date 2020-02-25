<?php 
  		 if($_GET['currentID']){
					$_POST['currentID']=$_GET['currentID'];
			}
	
	####################################################
	 if($_POST['action']=='deletePic'){ 
	 					@unlink($path_product.$_POST['deleteFile']);
						@unlink($path_product_thb.$_POST['deleteFile']);
						$query="UPDATE tbl_newsletter_data SET `images`=''  WHERE id = '".$_POST['currentID']."' ";
						mysql_query($query);
	 }
	 ####################################################
	 if($_POST['action']=='deleteFile'){ 
	 					@unlink($path_product.$_POST['deleteFile']);
						$query="UPDATE tbl_newsletter_data SET `attachfile`=''  WHERE id = '".$_POST['currentID']."' ";
						mysql_query($query);	
	 }
	####################################################	
    if($_POST['action']=='Add'){
				if($_POST['currentID']==""){
							//----------------------------images-------------------------------
							if($_FILES['uploadfile']['tmp_name']!=""){ 
								$info =  pathinfo($_FILES['uploadfile']['name']);
								$info[extension]=strtolower($info[extension]);
									if(($info[extension]=='pjpeg')  || ($info[extension]=='gif')  ||  ($info[extension]=='png')  ||  ($info[extension]=='x-png') || ($info[extension]=='jpeg') || ($info[extension]=='jpg')){
								    //GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
									move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);						
									$fileImgs=$_FILES['uploadfile']['name'];
								}
							}
							if($_FILES['uploadfile2']['tmp_name']!=""){ 
								    //GetNewFileName($_FILES['uploadfile2']['tmp_name'],$_FILES['uploadfile2']['name'],$i);
									move_uploaded_file($_FILES['uploadfile2']['tmp_name'], $path_product.$_FILES['uploadfile2']['name']);						
									$fileAttach=$_FILES['uploadfile2']['name'];
							}
								//-------------------------------------------------
								$dataAdd=date("Y-m-d H:i:s");
								$query="INSERT INTO `tbl_newsletter_data` (`id` ,`topic` ,`detail` ,`images` ,`attachfile` ,`date_add` ,`first_page`)  "
								." VALUES ('' , '".$_POST['topic']."', '".$_POST['detail']."', '".$fileImgs."', '".$fileAttach."', '".$dataAdd."', '".$_POST['first_page']."') ";     
								mysql_query($query);
								$_POST['currentID']=mysql_insert_id();
					}else{  //-------------Edit Data
							//----------------------------images-------------------------------
							if($_FILES['uploadfile']['tmp_name']!=""){ 
								$info =  pathinfo($_FILES['uploadfile']['name']);
								$info[extension]=strtolower($info[extension]);
									if(($info[extension]=='pjpeg')  || ($info[extension]=='gif')  ||  ($info[extension]=='png')  ||  ($info[extension]=='x-png') || ($info[extension]=='jpeg') || ($info[extension]=='jpg')){
								    //GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
									move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);						
									@unlink($path_product.$_POST['OLDIMG']);
									@unlink($path_product_thb.$_POST['OLDIMG']);
								}
							}else{
									$_FILES['uploadfile']['name']=$_POST['OLDIMG'];
								}
							if($_FILES['uploadfile2']['tmp_name']!=""){ 
								   // GetNewFileName($_FILES['uploadfile2']['tmp_name'],$_FILES['uploadfile2']['name'],$i);
									move_uploaded_file($_FILES['uploadfile2']['tmp_name'], $path_product.$_FILES['uploadfile2']['name']);						
									$fileAttach=$_FILES['uploadfile2']['name'];
									@unlink($path_product.$_POST['oldAttach']);
							}else{
									$fileAttach=$_POST['oldAttach'];
								}
								//-------------------------------------------------
								$dataAdd=date("Y-m-d H:i:s");
								$query="UPDATE tbl_newsletter_data SET `topic`= '".$_POST['topic']."' ,`detail`='".$_POST['detail']."' ,`images`='".$_FILES['uploadfile']['name']."' ,`attachfile`='".$fileAttach."'  ,`first_page`='".$_POST['first_page']."'   WHERE id = '".$_POST['currentID']."' ";
								mysql_query($query);
					}
		
		}	
		
		//------------------------------SELECT DATA -------------------------------//
		if($_POST['currentID']){
				$query="SELECT * FROM tbl_newsletter_data WHERE id = '".$_POST['currentID']."' ";	
				$result=mysql_query($query);
				$currentData=mysql_fetch_assoc($result);
			
		}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
			function checkForm(){
							if(document.form1.topic.value==''){
										alert('กรุณาใส่หัวข้อ');
										return false;
								}else{
									document.form1.action.value='Add';
								}
				}
		  //------------------------------images.attach
		  function DeletePic(fileName, types){
			  			if(types=='images'){
									if(confirm('ต้องการลบรูปนี้')){
												document.form1.action.value='deletePic';
												document.form1.deleteFile.value=fileName;
												document.form1.submit();
										}else{
												return false;
										}
							}else if(types=='attach'){
									if(confirm('ต้องการลบไฟล์แนบ')){
												document.form1.action.value='deleteFile';
												document.form1.deleteFile.value=fileName;
												document.form1.submit();
										}else{
												return false;
										}
							} 
			  
			  }
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return checkForm()">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">เพิ่มจดหมายข่าว
<input type="hidden" name="action" id="action" />
<input type="hidden" name="deleteFileType" id="deleteFileType" />
<input type="hidden" name="deleteFile" id="deleteFile" />
    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="txt10-black">
      <tr>
        <td width="16%" align="right"><strong>
          หัวข้อ</strong></td>
        <td width="84%"><input name="topic" type="text" id="topic" size="50"  value="<?php echo $currentData['topic']?>"/></td>
      </tr>
      <tr>
        <td align="right"><strong>รายละเอียด</strong></td>
        <td><textarea name="detail" cols="50" rows="6" id="detail"><?php echo $currentData['detail']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail');
		          </script></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EFEFEF"><strong>
          <input type="hidden" name="OLDIMG" id="OLDIMG" value="<?php echo $currentData['images']?>"  />
          ไฟล์รูป</strong></td>
        <td bgcolor="#EFEFEF" class="red">
        <?php if($currentData['images']){ 
										$n_width=180;$n_height=180;
										list($width, $height, $type, $attr) = getimagesize($path_product.$currentData['images']);
										create_thub($path_product ,$currentData['images'],$n_width,$n_height);
		?>
           <a href="<?php echo $path_product.$currentData['images']?>" target="_blank">
          <img src="<?php echo $path_product_thb.$currentData['images']?>"  style="border:none"/>
          </a>
        	<br />
           <?php }?>
          <input name="uploadfile" type="file" id="uploadfile" />
          <a href="#" onclick="DeletePic('<?php echo $currentData['images']?>','images')"><img src="images/black_icon/16x16/round_delete.png" width="16" height="16"  style="border:none; vertical-align:middle"/> ลบไฟล์รูป</a><br />
          <br />
          ** 
          jpg , png , gif กว้าง 500 สูง 500 pixel ขนาดไฟล์ไม่เกิน 2 เมกกะไบต์</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#F5F5F5"><strong>
          <input type="hidden" name="oldAttach" id="oldAttach" value="<?php echo $currentData['attachfile']?>" />
          ไฟล์แนบ</strong></td>
        <td bgcolor="#F5F5F5" class="red">
       <?php if($currentData['attachfile']){ ?>
           <a href="<?php echo $path_product.$currentData['attachfile']?>" target="_blank">
           <img src="images/black_icon/16x16/doc_lines.png" width="16" height="16" style="border:none" /> ดูไฟล์แนบ</a>
        	<br />
           <?php }?>
        <input name="uploadfile2" type="file" id="uploadfile2" />
         <a href="#" onclick="DeletePic('<?php echo $currentData['images']?>','attach')"><img src="images/black_icon/16x16/round_delete.png" width="16" height="16"  style="border:none; vertical-align:middle"/> ลบไฟล์แนบ</a><br /> 
         <br />
          **ขนาดไฟล์ไม่เกิน 5 เมกกะไบต์</td>
      </tr>
      <tr>
        <td align="right"><strong>แสดงหน้าแรก</strong></td>
        <td>
          <select name="first_page" id="first_page">
            <option value="1" <?php if($currentData['first_page']=='1'){ echo "selected";}?>>แสดงหน้าแรก</option>
            <option value="0" <?php if($currentData['first_page']=='0'){ echo "selected";}?>>ยกเลิกแสดงหน้าแรก</option>
          </select></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>
        <input type="hidden" name="currentID"  value="<?php echo $_POST['currentID']?>"/>
        <input type="submit" name="button" id="button" value="เพิ่ม / แก้ไข" /></td>
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