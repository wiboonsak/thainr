<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
	####################################################
	if($_POST['action']=='Delete'){
			$query = "DELETE  FROM tbl_speech WHERE id =  '".$_POST['IDS']."'  ";
			mysql_query($query);
	}
	
	$query="SELECT * FROM tbl_speech WHERE  `language`= '".$_SESSION['language']."'  ORDER BY date_post DESC ";
	$queryLimit = $query." LIMIT $startRow, $rowPerPage ";
	$result =mysql_query($queryLimit);
	
	$resultBrowse2=mysql_query($query);		
	$xrow=mysql_num_rows($resultBrowse2);
	$totalPage=ceil($xrow/$rowPerPage);			

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
    <td width="96%" bgcolor="#D9D9B3">ข้อมูลสารจากนายกสมาคมทั้งหมด</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
    
      <?php while($data=mysql_fetch_assoc($result)){ ?>
      <tr class="txt10-black">
        <td width="4%" align="center"><img src="images/icon/green.gif" width="10" height="10" align="absmiddle" /></td>
        <td width="81%">&nbsp;<?php echo $data['title_th']?></td>
        <td width="8%" align="center" bgcolor="#FBFFE6"><a href="main.php?work=PresidentNote&IDS=<?php echo $data['id']?>" >แก้ไข</a></td>
        <td width="7%" align="center" bgcolor="#FFE4CA"><a href="#" onclick="if(confirm('ต้องการลบหัวข้อนี้')){ form2.action.value='Delete'; form2.IDS.value='<?php echo $data['id']?>';form2.submit();} else {  return false; }">ลบ</a></td>
      </tr>
      <tr>
        <td colspan="4" height="1" bgcolor="#C4C4C4"></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="4">&nbsp;
          <?php  
		  
		  
		  //PageDisplay($query,$rowPerPage,$page,$thisFile);?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">หน้า&nbsp;<?php 

	
		for($i=1;$i<=$totalPage;$i++){ ?>
        <a href="main.php?work=<?php echo $_GET['work']?>&page=<?php echo $i?>" >
              <?php	        	if($i==$_GET['page'])echo "<b><font size='+1'> ";
									         	echo  $i." ";
									          	if($i==$_GET['page'])echo "</font></b>";
										?>
              </a>
    <?php 	}  ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form><form action="<?php $_SERVER['PHP_SELF']?>" name="form2" method="post">
	<input type="hidden" name="action" />
	<input type="hidden" name="IDS" />
</form>
</body>
</html>