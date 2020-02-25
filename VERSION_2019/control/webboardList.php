<?php 
    $rowPerPage=20;
			if((!$_POST['page'])||($_POST['page']==1)){
						$_POST['page']=1;
						$startRow=0;
			}else{
					$startRow=($_POST['page']-1)*$rowPerPage;
			}	
  	     ####################################################
		 if($_POST['action']=='topic'){
					$query="DELETE FROM tbl_webboard_question  WHERE id='".$_POST['key']."'  ";
					mysql_query($query);
					$query="DELETE FROM tbl_webboard_ans  WHERE Qid='".$_POST['key']."'   ";
					mysql_query($query);
			}		
  	     ####################################################
		$queryBoard="SELECT id, question FROM  tbl_webboard_question WHERE topic_type ='".$_GET['topic_type']."'   ORDER BY id DESC   ";
		$queryBoardLimit=$queryBoard." LIMIT $startRow,  $rowPerPage ";
		//echo $queryBoardLimit;
		$resultBoard=mysql_query($queryBoardLimit);		
		
			$resultBrowse2=mysql_query($queryBoard);		
			$xrow=mysql_num_rows($resultBrowse2);
			$totalPage=ceil($xrow/$rowPerPage);		

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function delBoard(dtype,BID){
				if(confirm('ต้องการลบ ?')){
						document.form1.action.value=dtype;
						document.form1.key.value=BID;			
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
    <td width="96%" bgcolor="#D9D9B3"><?php if($_GET['topic_type']==1){  echo _txtWebboardList1; }else { echo _txtWebboardList2; }?> 
      <input name="KEY" type="hidden" id="KEY" />
      <input name="action" type="hidden" id="action" />
       <input type="hidden" name="page" value="<?php echo $_POST['page']?>" />
       <input type="hidden" name="key" />
    </td>
  </tr>
  <tr>
    <td colspan="2"><table class="tableborder_full" height="30" cellspacing="0" cellpadding="0" 
      width="100%" border="0">
      <tbody>
        <tr>
         
        <?php 
					$bg1="#f2f2f2";
					$bg2="#FFFFFF";
				 while($webboard=mysql_fetch_assoc($resultBoard)){
					$bgc = ($bgc==$bg2) ? $bg1 : $bg2;
	?>
        <tr>
          <td width="549" bgcolor="<?php echo $bgc;?>" >&nbsp;&nbsp; <a href="javascript:popUp('howxBoard.php?BID=<?php echo $webboard['id']?>')" class="board"  ></a>
          <a href="#" onclick="windowOpener(650, 650, 'windowName', 'howxBoard.php?BID=<?php echo $webboard['id']?>')">
           <?php echo $webboard['question'];?> </a></td>
          <td width="37" bgcolor="<?php echo $bgc;?>" ><input name="Submit22" type="button" class="buttonDel" value=" ลบ " onclick="delBoard('topic','<?php echo $webboard['id'];?>')" /></td>
        </tr>
        <?php } ?>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><span class="txt10-black">หน้า :
        <?php  for($i=1;$i<= $totalPage ; $i++){ ?>
        <?php  if($_POST['page']==$i){ echo "<strong>[ ";} ?>
        <a href="#" onclick="document.form1.page.value='<?php echo $i?>';document.form1.submit()">
        <?php   echo $i;?>
        </a>
        <?php  if($_POST['page']==$i){ echo " ] </strong>";}?>
        <?php }?>
    </span></td>
  </tr>
</table>
</form>
</body>
</html>