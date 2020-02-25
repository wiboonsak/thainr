<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
		//--------------------------------------------------------------------------
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
	####################################################
	if($_POST['action']=='Add'){
				$_POST['date_act']=$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];	
				if($_POST['currID']==''){ 	
					if($_FILES['uploadfile']['tmp_name']!=""){ 
					    GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
						move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
					}
					$query="INSERT INTO `tbl_misc_data` (`id` ,`title_th` ,`title_en` ,`detail_th` ,`detail_en` ,`file_th` ,`file_en` ,`statistic_type` ,  `date_post` , `language`   ) "
					." VALUES  "
					." ( '' , '".$_POST['title_th']."', '".$_POST['title_en']."', '".$_POST['detail_th']."', '".$_POST['detail_en']."', '".$_FILES['uploadfile']['name']."', '".$_FILES['uploadfile']['name']."', '".$StatType."' , '".$_POST['date_act']."'  , '".$_SESSION['language']."') ";
					mysql_query($query);
					$_POST['currID']=mysql_insert_id();
				}else if($_POST['currID']){
							//------------------------------------
							if($_FILES['uploadfile']['tmp_name']!=""){ 
								GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
								move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
								@unlink($path_product.$_POST['oldFileName']);
							}else{
								$_FILES['uploadfile']['name']=$_POST['oldFileName'];
							}
							//------------------------------------		
							$query="UPDATE tbl_misc_data SET  `title_th`='".$_POST['title_th']."'  ,`title_en`= '".$_POST['title_en']."'  ,`detail_th`='".$_POST['detail_th']."' ,`detail_en`='".$_POST['detail_en']."'   "
							." ,`file_th`='".$_FILES['uploadfile']['name']."'  ,`file_en`='".$_FILES['uploadfile']['name']."' , `date_post`='".$_POST['date_act']."'  WHERE id = '".$_POST['currID']."' ";	
						mysql_query($query);			
				}
				
		}
	####################################################	
    if($_POST['currID']){
					$query="SELECT * FROM tbl_misc_data WHERE id = '".$_POST['currID']."' ";
					$result=mysql_query($query);
					$currentData =mysql_fetch_assoc($result);
  				$dateArray=explode("-",$currentData['date_post']);
			  $day=$dateArray[2];
			  $month=$dateArray[1];
			  $year=$dateArray[0];			
		}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function checkForm(){
						if((document.form1.title_th.value=='')){
									alert('กรุณาใส่หัวข้อ');
									return false;
							}else{
									document.form1.action.value='Add';
								}
			}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return checkForm();">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ระบบเก็บมาฝาก

    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td width="16%" align="right"><strong><?php echo _txtTopicinput?></strong></td>
        <td width="84%"><input name="title_th" type="text" id="title_th" size="40" maxlength="255"  value="<?php echo $currentData['title_th']?>"/></td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtDetaulinput?></strong></td>
        <td><label for="detail_th"></label>
          <textarea name="detail_th" cols="40" rows="5" id="detail_th"><?php echo $currentData['detail_th']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_th');
		          </script></td>
      </tr>
      <!--<tr>
        <td>หัวข้อ [english]</td>
        <td><input name="title_en" type="text" id="title_en" size="40" maxlength="255" value="<?php echo $currentData['title_en']?>"/></td>
      </tr>
      <tr>
        <td>รายละเอียด [english]</td>
        <td><textarea name="detail_en" cols="40" rows="5" id="detail_en"><?php echo $currentData['detail_en']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_en');
		          </script></td>
      </tr> <tr> -->
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
            <?php for($i=0;$i<4;$i++){ 
				  				$stable=$currentYear-1;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($year==($stable+$i))  echo "selected";?>><?php echo $stable+$i+$Range543;?></option>
            <?php }?>
          </select></td>
      </tr>
      <tr>
        <td align="right"><strong>ไฟล์แนบ</strong></td>
        <td>
        <?php if($currentData['file_th']){ ?>
        <a href="<?php echo $path_product.$currentData['file_th']?>" target="_blank">
        <img src="images/black_icon/16x16/doc_lines.png" width="16" height="16" style="border:none; vertical-align:middle; padding-right:5px;" />view file</a>
<?php }?>
        <input name="uploadfile" type="file" /></td>
      </tr>
     
      <tr>
        <td><input type="hidden" name="currID" id="currID" value="<?php echo $_POST['currID']?>" />
          <input type="hidden" name="action" id="action" />
          <input name="oldFileName" type="hidden" id="oldFileName" value="<?php echo $currentData['file_th']?>" /></td>
        <td><input type="submit" name="button" id="button" value="<?php echo _txtBtnAddEdit?>" /></td>
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