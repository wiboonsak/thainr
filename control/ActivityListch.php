<?php 
    $rowPerPage=20;
			if((!$_POST['page'])||($_POST['page']==1)){
						$_POST['page']=1;
						$startRow=0;
			}else{
					$startRow=($_POST['page']-1)*$rowPerPage;
			}	
	####################################################
	if($_POST['cate_id']==''){ $_POST['cate_id']=1;}
	####################################################
	//echo $_POST['action'];
	if($_POST['action']=='Delete'){
			 $query="SELECT * FROM `tbl_news_and_act_file` WHERE  `news_id` =  '".$_POST['IDS']."'  ORDER BY  file_type  ASC, id ASC";
			 //echo $query."<br>";
			 $resultPic=mysql_query($query);
			 while($file=mysql_fetch_assoc($resultPic)){
				 		@unlink($path_product.$file['file_name']);
						@unlink($path_product_thb.$file['file_name']);						 
				 }
			$query="DELETE FROM `tbl_news_and_act_file` WHERE  `news_id` =  '".$_POST['IDS']."' ";
			mysql_query($query);
			 //echo $query."<br>";
			$query="DELETE FROM `tbl_news_and_act`  WHERE  `id` =  '".$_POST['IDS']."' AND `language` =  '".$_SESSION['language']."' ";
			mysql_query($query);	
			// echo $query."<br>";		 
		}
		
	
	####################################################	
	   if($_POST['cate_id']!=''){
				//$query="SELECT * FROM   `tbl_news_and_act` WHERE  `cate_id` ='".$_POST['cate_id']."' AND language= '".$_SESSION['language']."' ORDER BY id DESC";
				$query="SELECT * FROM   `tbl_news_and_act` WHERE  `cate_id` ='".$_POST['cate_id']."' AND `language` =  '".$_SESSION['language']."' ORDER BY date_act DESC";
				$queryLimit= $query." LIMIT $startRow , $rowPerPage "	;			
				$result=mysql_query($queryLimit);

				$resultBrowse2=mysql_query($query);		
				$xrow=mysql_num_rows($resultBrowse2);
				$totalPage=ceil($xrow/$rowPerPage);		
			}		
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function deleteThis(ids){
					if(confirm('ต้องการลบหัวข้อนี้ ?')){
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
    <td width="96%" bgcolor="#D9D9B3">รายชื่อข่าวสาร กิจกรรม

    
      <select name="cate_id" id="cate_id" onchange="document.form1.submit()">
        <option value="0">---- <?php echo _txtSelectCagegory?>-----</option>
        <option value="1" <?php if($_POST['cate_id']=='1') echo "selected";?>><?php echo _txtTraOther?></option>
        <option value="2" <?php if($_POST['cate_id']=='2') echo "selected";?>><?php echo _txtTraMeeting?></option>
      </select>
      <input type="hidden" name="page" />
      <input type="hidden" name="IDS" />
      <input type="hidden" name="action" />
      </td>
  </tr>
  <tr>
    <td colspan="2">
    <?php if($_POST['cate_id']!=''){?>
    <table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td width="5%" bgcolor="#E1E1E1">&nbsp;</td>
        <td width="79%" align="center" bgcolor="#E1E1E1">หัวข้อ</td>
        <td width="8%" align="center" bgcolor="#E1E1E1">แก้ไข</td>
        <td width="8%" align="center" bgcolor="#E1E1E1">ลบ</td>
      </tr>
      <?php while($data=mysql_fetch_assoc($result)){ ?>
      <tr>
        <td align="center" bgcolor="#EFEFEF"><img src="images/black_icon/16x16/2x2_grid.png" width="16" height="16" /></td>
        <td bgcolor="#EFEFEF">
		<?php echo $data['topic_ch']?><br />
        <?php // echo $data['topic_en']?>
        </td>
        <td align="center" bgcolor="#EFEFEF"><a href="main.php?work=ActivityAddch&currID=<?PHP echo $data['id']?>"><img src="images/black_icon/16x16/doc_edit.png" width="16" height="16" style="border:none" /></a></td>
        <td align="center" bgcolor="#EFEFEF"><a href="#" onclick="deleteThis('<?php echo $data['id']?>')"><img src="images/black_icon/16x16/round_delete.png" width="16" height="16"  style="border:none"  /></a></td>
      </tr>
      <?php } ?>      
    </table>
     <?php } ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">หน้า : 
    	<?php  for($i=1;$i<= $totalPage ; $i++){ ?>
        
        <?php  if($_POST['page']==$i){ echo "<strong>[ ";} ?>
         <a href="#" onclick="document.form1.page.value='<?php echo $i?>';document.form1.submit()">
		 <?php   echo $i;?>
         </a>
		<?php  if($_POST['page']==$i){ echo " ] </strong>";}?>
        
        <?php }?>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>