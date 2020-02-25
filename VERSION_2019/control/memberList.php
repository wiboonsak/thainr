<?php 
    $rowPerPage=30;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
			####################################################			
		if($_POST['action']=='HistoryThis')	{
					$query="DELETE FROM  tbl_thainr_member  WHERE id='".$_POST['ID']."' ";	
					
					mysql_query($query);
			}
	####################################################
	$query="SELECT * FROM tbl_thainr_member ORDER BY id DESC  ";
	$queryLimit= $query." LIMIT $startRow , $rowPerPage "	;			
				$result=mysql_query($queryLimit);
				//echo $query;
				
				$resultBrowse2=mysql_query($query);		
				$xrow=mysql_num_rows($resultBrowse2);
				$totalPage=ceil($xrow/$rowPerPage);		

			

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
			function historyThis(ids){
					if(confirm('ต้องการลบ? ')){
								document.form1.action.value='HistoryThis';
								document.form1.ID.value=ids;
								document.form1.submit();
						}else{
									return false;
							}
				
				}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr class="txt10-green">
    <td width="4%" height="30" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ข้อมูลรายชื่อสมาชิก

    
      <input type="hidden" name="action" id="action" />
      <input type="hidden" name="ID" id="ID" />
      <span class="txt10-black">
    <!--  <input type="submit" name="button" id="button" value="  ส่งออกรายชื่อเป็นไฟล์ Excel  " onclick="windowOpener(750, 750, '2', 'member_export.php')"/> -->
      </span></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr class="txt10-black">
        <td width="24%" height="30" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>ชื่อ-นามสกุล</strong></td>
        <td width="14%" height="30" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>หน่วยงาน</strong></td>
        <td width="15%" height="30" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>อาชีพ</strong></td>
        <td width="16%" height="30" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>ประเทศ</strong></td>
        <td width="15%" height="30" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>อีเมล์</strong></td>
        <td width="10%" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>วันทีสมัคร</strong></td>
        <td width="6%" height="30" align="center" nowrap="nowrap" bgcolor="#DBDBDB"><strong>ลบ</strong></td>
      </tr>
      <?php while($data=mysql_fetch_assoc($result)){ ?>
      <tr class="txt10-black">
        <td height="25" nowrap="nowrap" bgcolor="#EFEFEF">&nbsp;<?php echo $data['name']?></td>
        <td height="25" nowrap="nowrap" bgcolor="#EFEFEF"><?php echo $data['organize']?></td>
        <td height="25" nowrap="nowrap" bgcolor="#EFEFEF"><?php echo $data['occupation']?></td>
        <td height="25" nowrap="nowrap" bgcolor="#EFEFEF">&nbsp;<?php echo $data['country']?></td>
        <td height="25" nowrap="nowrap" bgcolor="#EFEFEF">&nbsp;<?php echo $data['email']?></td>
        <td height="25" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><?php echo substr($data['date_regis'],0,10)?></td>
        <td height="25" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><a href="#" onclick="historyThis('<?php echo $data['id']?>')">
          <img src="images/black_icon/16x16/round_delete.png" width="16" height="16" style="border:none"/></a></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td height="87" colspan="2" valign="bottom" class="txt10-black">&nbsp;
      หน้า :
      <?php $thisFile= "main.php?work=".$_GET['work']; PageDisplay($query,$rowPerPage,$_GET['page'],$thisFile)?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>