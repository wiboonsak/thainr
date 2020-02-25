<?php 
		//-----------------------------Date------------------------------------
			setlocale (LC_TIME, 'th');
	    //------------------------------------
		if($_GET['currID']){ $_POST['currID']=$_GET['currID'];}
		//--------------------------------------------------------------------------
		
		//--------------------------------------------------------------------------
		if($day==""){
			$day=date("d");
		}
		if ($month==""){
			$month = date("n");
		}
		if ($year==""){
			$year = date("Y");
		}
		$currentYear=date("Y");	
		//-----------------------------------------------------------------------------		
			if($_POST['action']=='deletePic'){
				 if(file_exists($path_product."/thb/".$RmPic)){
				 			@unlink ($path_product."/thb/".$RmPic);
				 }
				 if(file_exists($path_product."/".$RmPic)){
				 			@unlink ($path_product."/".$RmPic);
				 }
				 $query = "DELETE FROM  tbl_news_data_file WHERE  file_name = '".$_POST['RmPic']."' ";
				 
				 mysql_query($query);
			}		
		//-----------------------------------------------------------------------------uploadfile
//echo $_POST['action']."<br>";
		if($_POST['action']=='Add'){
			$_POST['date_act']=$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			
			if($_FILES['uploadfile']['tmp_name']!=""){  
				 GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
				 move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
				 $files = $_FILES['uploadfile']['name'];
				 @unlink($path_product.$_POST['CurrentFile']);
			}else{
				$files = $_POST['CurrentFile'];
			}
			//-------------------------
			if($_FILES['uploadImg']['tmp_name']!=""){ 
				 $i="cv";
				 GetNewFileName($_FILES['uploadImg']['tmp_name'],$_FILES['uploadImg']['name'],$i);
				 move_uploaded_file($_FILES['uploadImg']['tmp_name'], $path_product.$_FILES['uploadImg']['name']);
				 $filesCover = $_FILES['uploadImg']['name'];
				 @unlink($path_product.$_POST['uploadImgCover']);
			}else{
				 $filesCover = $_POST['uploadImgCover'];
			}
			//---------add data--------//
			if($_POST['currID']==''){
					$query="INSERT INTO `tbl_document_data` "
					." ( `id` , `title_th` , `title_en` , `detail_th` , `detail_en` , `date_add` , `document_file_name` , `language` ,   `cover_img`  ) "
					." VALUES "
					." ('' , '".$_POST['title_th']."', '".$_POST['title_en']."', '".$_POST['detail_th']."', '".$_POST['detail_en']."',  '".$_POST['date_act']."' , '".$files."' ,  '".$_SESSION['language']."', '".$filesCover."') ";
					mysql_query($query);
					$_POST['currID'] =mysql_insert_id();
			}else{
					$query="UPDATE tbl_document_data SET "
					."  `title_th` = '".$_POST['title_th']."'  , `title_en` = '".$_POST['title_en']."'  , `detail_th` = '".$_POST['detail_th']."'  , `detail_en` = '".$_POST['detail_en']."' , `document_file_name` = '".$files."' , `date_add`  = '".$_POST['date_act']."' ,   `cover_img` = '".$filesCover."'  "
					." WHERE id = '".$_POST['currID']."' ";
					mysql_query($query);
							
			}//$_POST['currID']
			//echo $query;
					  //>>>>>>------add img 
				 // end add image------------------
					////////////////////////////// txt Image /////////////////////////////////// wth wen hiddenID
					
			}
		
		 if($_POST['currID']){
			 $query="SELECT * FROM tbl_document_data WHERE id =  '".$_POST['currID']."' ";		
			 $result=mysql_query($query);
			 $currentData =mysql_fetch_assoc($result);
			  $dateArray=explode("-",$currentData['date_add']);
			  $day=$dateArray[2];
			  $month=$dateArray[1];
			  $year=$dateArray[0];			  
			 //--------------select img--------------//
			
			
			 
			 }	
			

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function  checkForm(){
					if(document.form1.title_th.value==''){
								alert('กรุณาใส่หัวข้อ');
								return false;
						}else{
								document.form1.action.value='Add';							
							}
			}
			
		function removePic(pic){
		if(confirm('ต้องการลบไฟล์นี้')){
				document.form1.RmPic.value=pic;
				document.form1.action.value='deletePic';
				document.form1.submit();
		}else{
				return false;
			}
	}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return checkForm()">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ข้อมูลวารสาร</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
    
      <tr>
        <td align="right"><strong><?php echo _txtTopicinput?></strong></td>
        <td><input name="title_th" type="text" id="title_th" size="60" maxlength="255"  value="<?php echo $currentData['title_th']?>"/></td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtDetaulinput?></strong></td>
        <td><textarea name="detail_th" cols="40" rows="5" id="detail_th"><?php echo $currentData['detail_th']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_th');
		          </script></td>
      </tr>
     
      <!--<tr>
        <td>หัวข้อ [english]</td>
        <td><input name="topic_en" type="text" id="topic_en" size="60" maxlength="255"  value="<?php //echo $currentData['topic_en']?>"/></td>
      </tr>
      <tr>
        <td>รายละเอียด [english]</td>
        <td><textarea name="detail_en" cols="40" rows="5" id="detail_en"><?php //echo $currentData['detail_en']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_en');
		          </script></td>
      </tr> -->
      <tr>
        <td align="right"><strong><?php echo _txtDateSelect?></strong></td>
        <td><select name="sdate">
          <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
          <option value="<?php echo $value;?>" <?php if($day==$i) echo "selected";?>><?php echo $i?></option>
          <?php }?>
        </select>
          <select name="smonth">
            <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
            <option value="<?php echo $key;?>" <?php if($month==$key) echo "selected";?>><?php echo $val?></option>
            <?php } ?>
          </select>
          <select name="syear">
            <?php for($i=-3;$i<4;$i++){ 
				  				$stable=$currentYear-1;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($year==($stable+$i))  echo "selected";?>><?php echo $stable+$i+$Range543;?></option>
            <?php }?>
          </select></td>
      </tr>
      <!--<tr>
        <td>ที่มา  [english]</td>
        <td><label for="reff_en"></label>
          <input name="reff_en" type="text" id="reff_en" size="60" value="<?php echo $currentData['reff_en']?>"/></td>
      </tr> -->
	<tr>
    <td>
	
	</td>
	<td>
		<?php if($currentData['cover_img']!=''){ ?>
		<img src="<?php echo "../uploadfile/".$currentData['cover_img']?>" style="width: 180px; height: auto;">
		<?php }?>
		<input type="hidden" name="uploadImgCover" id="uploadImgCover" value="<?php echo $currentData['cover_img']?>">
	</td>
	</tr>
	<tr>
	<td align="right"><?php echo _txtFileIMG?></td>
	<td><input type="file" name="uploadImg" id="uploadImg">
		<span class="red">
			** ขนาดความกว้าง 180 pixel สูง 255 pixel</span>
		</td>
	</tr>
      <tr>
        <td align="right"><strong>
          <input type="hidden" name="action" id="action" />
         <input type="hidden" name="currID" id="currID" value="<?php echo $_POST['currID']?>" />
         <input type="hidden" name="RmPic" id="RmPic" />
          <input type="hidden" name="CurrentFile" id="CurrentFile" value="<?php echo $currentData['document_file_name']?>" />
         
         </strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtFileAndIMG?></strong></td>
        <td bgcolor="#F4F4F4" class="red"><label for="uploadfile"></label>
         <?php
			 if($currentData['document_file_name']!=''){ 
				echo "";
			 	echo "<a href='".$path_product."/".$currentData['document_file_name']."' target='_blank'><img src='text-file-icon-th.png'></a><br>";
			 }
		 ?>
          <input type="file" name="uploadfile" id="uploadfile" />
          <br />
          ** รองรับ PDF , XLSX , DOCX<br />
          ***การเลือกไฟล์แต่ละครั้งขนาดไฟล์ไม่เกิน 7 เมกกะไบต์</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#FFCC00"><input type="submit" name="button" id="button" value="<?php echo _txtBtnAddEdit?>" /></td>
        </tr>
      <tr>
        <td colspan="2">
        <!--////////////////////////// -->
        
      
                  
       <!-- /////////////////////////  --> 
        </td>
        </tr>
   
     
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>