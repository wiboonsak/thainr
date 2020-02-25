<?php

	if($_GET['currentID']){$_POST['currentID']=$_GET['currentID'];}
	
	##############################################################################
	if($_POST['action']=='Add'){
		if($_POST['currentID']==''){ 
		
				  if($_FILES['bank_logo']['name']){ 
					GetNewFileName($_FILES['bank_logo']['tmp_name'],$_FILES['bank_logo']['name'],$i);
					move_uploaded_file($_FILES['bank_logo']['tmp_name'], $path_product.$_FILES['bank_logo']['name']);
				  }
		
				$query="INSERT INTO  `tbl_bank_book` (`id` ,`bank_name` ,`bank_account` ,`bank_number` "
				." ,`bank_account_type` ,`bank_banch` ,`bank_logo` ,`bank_use` "
				." ,`bank_name_en` ,`bank_account_en` ,`bank_banch_en` ,`bank_account_type_en`) "
				." VALUES "
				." ( '' , '".$_POST['bank_name']."', '".$_POST['bank_account']."', '".$_POST['bank_number']."' "
				." , '".$_POST['bank_account_type']."', '".$_POST['bank_banch']."', '".$_FILES['bank_logo']['name']."', '".$_POST['bank_use']."'  "
				." , '".$_POST['bank_name_en']."', '".$_POST['bank_account_en']."', '".$_POST['bank_banch_en']."', '".$_POST['bank_account_type_en']."' ) ";
				mysql_query($query);
				?>
                <script language="javascript">
                		window.location.href='main.php?work=<?php echo $_GET['work']?>';
                </script>
                <?php
		}else{
			
				 if($_FILES['bank_logo']['name']){ 
					GetNewFileName($_FILES['bank_logo']['tmp_name'],$_FILES['bank_logo']['name'],$i);
					move_uploaded_file($_FILES['bank_logo']['tmp_name'], $path_product.$_FILES['bank_logo']['name']);
				 	@unlink($path_product.$_POST['OldLogo']);
				  }else {
					  $_FILES['bank_logo']['name']=$_POST['OldLogo'];
					  }
			
			
			    $query="UPDATE `tbl_bank_book` SET   "
				." `bank_name`= '".$_POST['bank_name']."'  ,`bank_account`='".$_POST['bank_account']."'  ,`bank_number` ='".$_POST['bank_number']."'  " 
				." ,`bank_account_type`= '".$_POST['bank_account_type']."'  ,`bank_banch`= '".$_POST['bank_banch']."'  ,`bank_logo`= '".$_FILES['bank_logo']['name']."'  ,`bank_use`='".$_POST['bank_use']."'    "
				." ,`bank_name_en`= '".$_POST['bank_name_en']."'  ,`bank_account_en`='".$_POST['bank_account_en']."'  ,`bank_banch_en`= '".$_POST['bank_banch_en']."'  ,`bank_account_type_en`='".$_POST['bank_account_type_en']."'  "
				
				." WHERE id =  '".$_POST['currentID']."' ";
				mysql_query($query);
				?>
                <script language="javascript">
                		window.location.href='main.php?work=<?php echo $_GET['work']?>';
                </script>
                <?php
			}
		
	}
  ###############################################################################
	if($_POST['action']=='delete'){
			$query=" DELETE FROM  `tbl_bank_book`  WHERE id='".$_POST['KEY']."'  ";
			mysql_query($query);
		
	}	
  ###############################################################################
		if($_GET['currentID']){
					$query="SELECT  *  FROM  tbl_bank_book   WHERE id = '".$_POST['currentID']."'  ORDER BY id DESC ";
					$result=mysql_query($query);
					$currentData=mysql_fetch_assoc($result);
			}
		$query="SELECT * FROM `tbl_bank_book` ORDER BY id DESC  ";
		$resultData=mysql_query($query);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	function deleteThis(ids,boxStatus){
		
		      if(boxStatus=='rent'){
				       alert('ไม่สามารถลบข้อมูลนี้ได้ เพราะยังมีข้อมูล member ใช้งาน \n \r กรุณาเข้าไปลบ member ก่อนจะทำการลบ mailbox ');
					   return false;
				  }else{ 
			 	     if(confirm('ต้องการลบรายการนี้ ?')){
							document.form1.currID.value=ids;	
							document.form1.action.value='Delete';
							document.form1.submit();
						}else{
								return false;
						}
				} 
			}
</script>
<script language="JavaScript">
<!--
	function toDelete(id,act,pic){
		 if(confirm('ต้องการลบหัวข้อนี้ ?')){
		 		document.form2.action.value='delete';
				document.form2.KEY.value=id;
				document.form2.removeImage.value=pic;	
				document.form2.submit();
		 }else{
		 		return false();
		 }
	}

	function CheckForm(){  //bank_banch
					if((document.form1.bank_name.value=='')||(document.form1.bank_name_en.value=='')){
								alert('ใส่ชื่อธนาคาร');
								return false
						}else if((document.form1.bank_banch.value=='')||(document.form1.bank_banch_en.value=='')){
							alert('ใส่สาขาธนาคาร');
								return false
						}else  if((document.form1.bank_account.value=='')||(document.form1.bank_account_en.value=='')){
							alert('ชื่อบัญชีธนาคาร ');
								return false
						}else  if((document.form1.bank_account_type.value=='')||(document.form1.bank_account_type_en.value=='')){
							alert('ประเภทบัญชีธนาคาร ');
								return false								
		}else  if(document.form1.bank_number.value==''){
							alert('หมายลเขบัญชีธนาคาร ');
								return false										
								
						}else{
							document.form1.action.value='Add';
							}
		}
		
		function deleteThis2(ids){
					if(confirm('ต้องการลบหัวข้อนี้ ?')){
						document.form2.action.value='delete';
						document.form2.KEY.value=ids;
						document.form2.submit();
				 }else{
						return false;
				 }
		}
//-->
</script>

</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" onSubmit="return CheckForm()" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
    
  
  <tr>
    <td class="kbank"><table width="100%" border="0" bgcolor="#F7F7F7" class="MsoNormal">
    <tr>
        <td class="txt10-black">&nbsp;</td>
        <td class="txt10-black">ภาษาไทย</td>
        <td class="txt10-black">ภาษาอังกฤษ</td>
      </tr>
     <tr>
         <td class="txt10-black">ชื่อธนาคาร</td>
         <td width="33%" class="txt10-black"><input name="bank_name" type="text" id="bank_name" size="40" maxlength="255"  value="<?php echo $currentData['bank_name']?>"/></td>
         <td width="44%" class="txt10-black"><input name="bank_name_en" type="text" id="bank_name_en" size="40" maxlength="255"   value="<?php echo $currentData['bank_name_en']?>"/></td>
       </tr> 
     
     <tr>
        <td width="23%" class="txt10-black">ชื่อสาขา</td>
        <td width="33%" class="txt10-black"><input name="bank_banch" type="text" id="bank_banch" size="40" maxlength="255"  value="<?php echo $currentData['bank_banch']?>" /></td>
        <td width="44%" class="txt10-black"><input name="bank_banch_en" type="text" id="bank_banch_en" size="40" maxlength="255"  value="<?php echo $currentData['bank_banch_en']?>" /></td>
      </tr>
       <tr>
                <td class="txt10-black">ชื่อบัญชี</td>
                <td width="33%" class="txt10-black"><input name="bank_account" type="text" id="bank_account" size="40" maxlength="255" value="<?php echo $currentData['bank_account']?>"/></td>
                <td width="44%" class="txt10-black"><input name="bank_account_en" type="text" id="bank_account_en" size="40" maxlength="255" value="<?php echo $currentData['bank_account_en']?>"/></td>
          </tr>
       

      <tr>
        <td class="txt10-black">ประเภทบัญชี</td>
        <td class="txt10-black"><input name="bank_account_type" type="text" id="bank_account_type" size="40" maxlength="255"  value="<?php echo $currentData['bank_account_type']?>"/></td>
        <td class="txt10-black"><input name="bank_account_type_en" type="text" id="bank_account_type_en" size="40" maxlength="255"   value="<?php echo $currentData['bank_account_type_en']?>" /></td>
      </tr>
            <tr>
        <td class="txt10-black">หมายเลขบัญชี</td>
        <td class="txt10-black"><input name="bank_number" type="text" id="bank_number" size="40" maxlength="255"   value="<?php echo $currentData['bank_number']?>"/></td>
        <td class="txt10-black">&nbsp;</td>
      </tr>
      <tr>
        <td class="txt10-black">logo ธนาคาร</td>
        <td colspan="2" class="txt10-black">
        <?php if($currentData['bank_logo']){?>
        <img src="<?php echo $path_product.$currentData['bank_logo']?>" /><br />
        <?php }?>
        <input type="hidden" name="OldLogo" value="<?php echo $currentData['bank_logo']?>" />
        <input name="bank_logo" type="file" id="bank_logo" /></td>
      </tr>
      <tr>
        <td class="txt10-black">ใช้งานหน้าเวป</td>
        <td colspan="2" class="txt10-black"><label for="bank_use"></label>
          <select name="bank_use" id="bank_use">
            <option value="1" <?php if($currentData['bank_use']==1) echo "selected";?>>ใช้งาน</option>
            <option value="0"  <?php if($currentData['bank_use']==0) echo "selected";?>>ยกเลิกใช้งาน</option>
          </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><input type="submit" name="Submit" value="  Add / edit  "  /></td>
      </tr>
      <tr>
        <td colspan="3"><span class="txt10-black"><span class="art_title">
        <input name="ids" type="hidden" id="ids" />
        <input name="currentID" type="hidden" id="currentID"  value="<?php echo $_POST['currentID']?>"/>
        <input name="action" type="hidden" id="action" />
        </span></span></td>
        </tr>
      <tr>
        <td colspan="3">
        
        <table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
         <?php while($data=mysql_fetch_assoc($resultData)){ ?> 
          <tr>
            <td width="39%" height="25" bgcolor="#E8E8E8" style="padding-left:20px;"><?php echo $data['bank_name']?></td>
            <td width="25%" bgcolor="#E8E8E8"><?php echo $data['bank_name_en']?></td>
            <td width="17%" align="center" bgcolor="#E8E8E8"><?php if($currentData['bank_use']==1){  echo "ใช้งาน"; }else{ echo "ไม่ใช้งาน"; }?></td>
            <td width="9%" align="center" bgcolor="#E8E8E8"><a href="main.php?work=<?php echo $_GET['work']?>&currentID=<?php echo $data['id']?>">edit</a></td>
            <td width="10%" align="center" bgcolor="#E8E8E8"><a href="#" onClick="deleteThis2('<?php echo $data['id']?>')">delete</a></td>
          </tr>
          <tr>
            <td colspan="5"><hr size="1" color="#666666" noshade="noshade" width="100%" /></td>
            </tr>
          <?php  }?>
        </table>
        
        </td>
        </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  </table>
</form>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form2">
		<input type="hidden" name="action" />
        <input type="hidden" name="KEY" />
</form>
</body>
</html>