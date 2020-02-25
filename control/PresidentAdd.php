<?php 
	/*require_once("config.inc.php");
	include("function.inc.php");
	$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
	mysql_select_db($db_name) or die("Could not select database");	*/
	#############################################	
	$pathSig='../sigIMG/';
	#############################################
	if($_POST['action']=='Update'){	
			if($_FILES['xfile']['name'][$_POST['nums']]!=""){
				$info =  pathinfo($_FILES['xfile']['name'][$_POST['nums']]);
					$dayFile=date("YmdHis");
					$uploadFileName =  $fileExt.$dayFile.".".$info[extension];
					$_FILES['xfile']['name'][$_POST['nums']]=$uploadFileName;	
					move_uploaded_file($_FILES['xfile']['tmp_name'][$_POST['nums']] , $pathSig.$_FILES['xfile']['name'][$_POST['nums']]);
					@unlink($pathSig.$_POST['pic']);		
			}else{
					$_FILES['xfile']['name'][$_POST['nums']]=$_POST['pic'];
			}
			$query="UPDATE tbl_ceo SET  `nameTH`= '".$_POST['textfield'][$_POST['nums']]."'  "
			." ,`nameEN`= '".$_POST['textfield2'][$_POST['nums']]."',`nameCH`= '".$_POST['textfield3'][$_POST['nums']]."' ,`SigIMG` = '".$_FILES['xfile']['name'][$_POST['nums']]."' "
			." WHERE id = '".$_POST['IDS']."' ";
			mysql_query($query);
	}
	#############################################		
	if($_POST['action']=='CheckThis'){	
			$query="UPDATE tbl_ceo SET active='1' WHERE id = '".$_POST['IDS']."' ";
			mysql_query($query);
			$query="UPDATE tbl_ceo SET active='0' WHERE id <>  '".$_POST['IDS']."' ";
			mysql_query($query);			
	}
	#############################################
	if($_POST['action']=='Delete'){		
			$query="DELETE FROM tbl_ceo WHERE id = '".$_POST['IDS']."' ";
			mysql_query($query);
	
		}
	#############################################	
	if($_POST['action']=='add'){
				if($_FILES['uploadfile']['name']!=""){
					$info =  pathinfo($_FILES['uploadfile']['name']);
					$dayFile=date("YmdHis");
					$uploadFileName =  $fileExt.$dayFile.".".$info[extension];
					$_FILES['uploadfile']['name']=$uploadFileName;
					move_uploaded_file($_FILES['uploadfile']['tmp_name'], $pathSig.$_FILES['uploadfile']['name']);
				}
				$query="INSERT INTO  `tbl_ceo`  "
				." (`id` ,`nameTH` ,`nameEN`,`nameCH` ,`SigIMG` ,`active` ) "
				." VALUES "
				." ('' ,  '".$_POST['nameTH']."',  '".$_POST['nameEN']."',  '".$_POST['nameCH']."',  '".$_FILES['uploadfile']['name']."',  '0') ";
				mysql_query($query);
				
		}
	
   $query="SELECT * FROM tbl_ceo ORDER BY id DESC ";
   $result=mysql_query($query);
   
		
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function EditTis(ids, nums , pic){
					document.form1.action.value='Update';
					document.form1.IDS.value=ids;
					document.form1.nums.value=nums;	
					document.form1.pic.value=pic;								
					document.form1.submit();										
			}
	 //----------------------------------------
	 function checkThis(ids){
		 			document.form1.action.value='CheckThis';
					document.form1.IDS.value=ids;
					document.form1.submit();	
		 }
	 //----------------------------------------
	 function deleteThis(ids){
		 	if(confirm('ต้องการลบรายการนี้')){
		 			document.form1.action.value='Delete';
					document.form1.IDS.value=ids;
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
    <td width="96%" bgcolor="#D9D9B3">เพิ่มข้อมูลนายกสมาคม
      <input name="action" type="hidden" id="action" />
          <input type="hidden" name="IDS" />
          <input type="hidden" name="nums" id="nums" />
          <input type="hidden" name="pic" id="pic" />
    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="txt10-black">
      <tr>
        <td width="146" align="right"><strong>ชื่อภาษาไทย</strong></td>
        <td width="934"><input name="nameTH" type="text" id="nameTH" size="40" maxlength="70" /></td>
      </tr>
      <tr>
        <td width="146" align="right"><strong>ชือภาษาอังกฤษ</strong></td>
        <td ><input name="nameEN" type="text" id="nameEN" size="40" maxlength="70" /></td>
      </tr>
      <tr>
        <td align="right"><strong>ชือภาษาจีน</strong></td>
        <td ><input name="nameCH" type="text" id="nameCH" size="40" maxlength="70" /></td>
      </tr>
      <tr>
        <td width="146" align="right"><strong>รูปลายเซ็น</strong></td>
        <td class="red"><input type="file" name="uploadfile" id="uploadfile" />
          <br />
          *.gif , *.png ,*.jpg ขนาดกว้าง 200 pixel ยาว 200 pixel</td>
      </tr>
      <tr>
        <td width="146" align="right">&nbsp;</td>
        <td><input type="button" name="Button" value="เพิ่มข้อมูล "  onclick="form1.action.value='add';form1.submit();"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">
    
    	<?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
		  <tr>
		    <td width="71%" ><table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
		      <tr>
		        <td width="142" align="right" bgcolor="#F3F3F3"><strong><span class="txt10-black">ชื่อภาษาไทย</span></strong></td>
		        <td width="619" bgcolor="#F3F3F3"><span class="txt10-black">
		          <input name="textfield[<?php echo $n?>]" type="text"  size="40" maxlength="70" value="<?php echo $data['nameTH']?>" />
		        </span></td>
	          </tr>
		      <tr>
		        <td width="142" align="right" bgcolor="#F3F3F3"><strong><span class="txt10-black">ชือภาษาอังกฤษ</span></strong></td>
		        <td bgcolor="#F3F3F3" ><span class="txt10-black">
		          <input name="textfield2[<?php echo $n?>]" type="text" size="40" maxlength="70" value="<?php echo $data['nameEN']?>"/>
		        </span></td>
	          </tr>
		      <tr>
		        <td align="right" bgcolor="#F3F3F3"><strong>ชือภาษาจีน</strong></td>
		        <td bgcolor="#F3F3F3" ><span class="txt10-black">
		          <input name="textfield3[<?php echo $n?>]" type="text" size="40" maxlength="70" value="<?php echo $data['nameCH']?>"/>
		        </span></td>
		        </tr>
		      <tr>
		        <td width="142" align="right" bgcolor="#F3F3F3"><strong><span class="txt10-black">รูปลายเซ็น</span></strong></td>
		        <td bgcolor="#F3F3F3" class="red"><span class="txt10-black"><img src="<?php echo $pathSig.$data['SigIMG']?>" /> <br />
		          <input type="file" name="xfile[<?php echo $n?>]"  />
		          <br />
		          *.gif , *.png ,*.jpg ขนาดกว้าง 200 pixel ยาว 200 pixel</span></td>
	          </tr>
		      <tr>
		        <td width="142" bgcolor="#F3F3F3">&nbsp;</td>
		        <td bgcolor="#F3F3F3">
                <input type="button" name="Button2" value="แก้ไขข้อมูล"  onclick="EditTis('<?php echo $data['id']?>','<?php echo $n?>','<?php echo $data['SigIMG']?>')"></td>
	          </tr>
		      <tr>
		        <td height="25" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
	          </tr>
	        </table></td>
		    <td width="29%" align="center" valign="middle" class="txt10-black" <?php if($data['active']==1){ echo "bgcolor='#D9FFD9' ";}?>>ใช้ข้อมูลนี้ 
              <input name="checkbox[<?php echo $n?>]" type="checkbox" onclick="checkThis('<?php echo $data['id']?>')" value="<?php echo $data['id']?>"  <?php if($data['active']==1) echo "checked='checked'";?>/>
            <br /><br />

            <input type="button" name="button" id="button" value=" ลบ " onclick="deleteThis('<?php echo $data['id']?>')" /></td>
	      </tr>
  </table>
  <?php $n++; } ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>