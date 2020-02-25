<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
	if(!isset($_SESSION['KEY_GROUP'])){ $_SESSION['KEY_GROUP']=$rand = substr(str_shuffle('ABCDEFGHIJKLMNPQRSTUVWXYZ123456789'),0,4); }
	//$_SESSION['KEY_GROUP']=$rand = substr(str_shuffle('ABCDEFGHIJKLMNPQRSTUVWXYZ123456789'),0,4);
	####################################################
	if($_POST['action']=='AddMember'){
				for ($i=0; $i<sizeof($chkbox); $i++) {
 						$query=" INSERT INTO `tbl_member_temp` ( `id` ,`memberID` ,`keyGroup`) VALUES ( '' , '".$chkbox[$i]."', '".$_SESSION['KEY_GROUP']."')  ";
							mysql_query($query);
				}
				if($i>0){
							?>
                            <script language="javascript">
                            		window.location.href='main.php?work=newsletterFrom';
                            </script>
                            <?php
					}
		}
	####################################################	
	$query="SELECT * FROM  `tbl_thainr_member` ORDER BY id DESC ";		
	$resultMember=mysql_query($query);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type='text/javascript'>
function checkAll(id)
{
	elm=document.getElementsByTagName('input');
	for(i=0; i<elm.length ;i++){
		 if(elm[i].id==id){
				elm[i].checked = true ;
		  }
	   }
	 
}

function uncheckAll(id)
{
	elm=document.getElementsByTagName('input');
	for(i=0; i<elm.length ;i++){
		 if(elm[i].id==id){
				elm[i].checked = false ;
		  }
	   }
}
//-----------------------------------------
function validate(){
		var chks = document.getElementsByName('chkbox[]');
		var hasChecked = false;
		for (var i = 0; i < chks.length; i++){
				if (chks[i].checked){
							hasChecked = true;
						break;
						}
				}
		if (hasChecked == false)
				{
					alert("กรุณาเลือกอย่างน้อย 1 รายชื่อ.");
					return false;
			}
		document.form1.action.value='AddMember';
		
	}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return validate()">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ส่งจดหมาย

    
      <input type="hidden" name="action" id="action" /></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">กรุณาเลือกรายชื่อสมาชิก</td>
  </tr>
  <tr>
    <td colspan="2"><input type='button' value='เลือกทั้งหมด' onclick="checkAll('chkbox')">
<input type='button' value='ยกเลิกการเลือก' onclick="uncheckAll('chkbox')"></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black"><table width="100%" border="0" cellspacing="1" cellpadding="1">
     <?php while($data=mysql_fetch_assoc($resultMember)){ ?>
      <tr class="txt10-black">
        <td width="7%" height="22" align="center" bgcolor="#EAEAEA"><input type='checkbox' name='chkbox[]' id='chkbox' value="<?php echo $data['id']?>" ></td>
        <td width="93%" bgcolor="#EAEAEA" class="txt10-black"><?php echo $data['name']?></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="ขั้นตอนต่อไป" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>