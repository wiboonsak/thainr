<?php 
    $rowPerPage=20;
			if((!$_POST['page'])||($_POST['page']==1)){
						$_POST['page']=1;
						$startRow=0;
			}else{
					$startRow=($_POST['page']-1)*$rowPerPage;
			}	
	####################################################
	//if($_POST['cate_id']==''){ $_POST['cate_id']=1;}
	####################################################
	//echo $_POST['action'];
	if($_POST['action']=='Delete'){
			 $query="SELECT * FROM `tbl_news_data_file` WHERE  `news_id` =  '".$_POST['IDS']."'  ORDER BY  file_type  ASC, id ASC";
			 //echo $query."<br>";
			 $resultPic=mysql_query($query);
			 while($file=mysql_fetch_assoc($resultPic)){
				 		@unlink($path_product.$file['file_name']);
						@unlink($path_product_thb.$file['file_name']);						 
				 }
			$query="DELETE FROM `tbl_news_data_file` WHERE  `news_id` =  '".$_POST['IDS']."' ";
			mysql_query($query);
			 //echo $query."<br>";
			$query="DELETE FROM `tbl_news_data`  WHERE  `id` =  '".$_POST['IDS']."' ";
			mysql_query($query);	
			// echo $query."<br>";		 
		}
	//--------------------------------------------------	
	 $query="SELECT * FROM tbl_information_category  "
						."  WHERE category_statis ='1' AND main_cate_id='0'   ORDER BY id ASC "
				        ." ";
     $resultCate = mysql_query($query);
     
	####################################################	
	   if($_POST['cate_id']!=''){
				$query="SELECT * FROM   `tbl_news_data` WHERE  `cate_id` ='".$_POST['cate_id']."'  AND language= '".$_SESSION['language']."' ORDER BY date_act DESC";
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
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="30" height="30" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td height="30" bgcolor="#D9D9B3">เลือกหมวดรายชื่อข้อมูลวิชาการ &nbsp;

    
      <select id="category_id" name="category_id" onChange="listData(this.value)"  style="height: 30px;" >
       <?php while($cate = mysql_fetch_assoc( $resultCate)){ ?>
        <option value="<?php echo $cate['id']?>" <?php if($cate['id']==$CateGoryID){ echo "selected"; }?> ><?php echo $cate['cate_name_th']?></option>
        <?php 
			$query="SELECT *  FROM tbl_information_category   "
			."  WHERE  main_cate_id ='".$cate['id']."' AND category_statis ='1'  ORDER BY id ASC "
			." ";
			$resultSub = mysql_query($query);	
			while($sub=mysql_fetch_assoc($resultSub)){ 
		?>
        <option style=" padding:5px 3px;" value="<?php echo $sub['id']?>" <?php if($cate['id']==$CateGoryID){ echo "selected"; }?> >&nbsp;&nbsp;&nbsp;<?php echo $sub['cate_name_th']?></option>
        <?php }?>
        <?php }?>
      </select>
      <input type="hidden" name="page" id="page" />
		
      <input type="hidden" name="CurrPage" id="CurrPage" value="1" />
      <input type="hidden" name="CurrCate" id="CurrCate"/>
      <input type="hidden" name="rowPerpage" id="rowPerpage" value="30"/>
		
      <input type="hidden" name="IDS" />
      <input type="hidden" name="action" />
      </td>
  </tr>
  <tr>
    <td colspan="2">
      <div id="showData"></div>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">
		<div id="showPage"></div>		
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>

<script>
	function setnumpaget(numbers){
		
		$('#CurrPage').val(numbers);
		var cateID = $('#category_id option:selected').val();
		listData(cateID);
	}
	//-----------------------------
	function deleteThis(dataID,title,pdf_file){
		if(confirm('ต้องการลบ '+title+' ?')){
			$.post('infomation_process.php', { part:"deleteINFO" , dataID:dataID , pdf_file:pdf_file },function(data){
				var cateID = $('#category_id option:selected').val();
				listData(cateID);
			})
		}else{
			return false;
		}
	}
	//-----------------------
	function listData(cateID){
		 
		   var CurrPage = $('#CurrPage').val();
		   var CurrCate = $('#CurrCate').val();
		   var rowPerpage = $('#rowPerpage').val();
		  
		//console.log('CurrCate==>'+CurrCate+' cateID=>'+cateID+' ::CurrPage=>'+CurrPage)
		
		 if(CurrCate!=cateID){
			 $('#CurrPage').val('1');
			 $('#CurrCate').val(cateID)
			 var selectPage =1;
			 var selectCategory = cateID;
		 }else{
			 var selectPage=CurrPage;
			 var selectCategory = CurrCate;
		 }
		
		  $('#CurrPage').val(selectPage);
		
		//console.log('listData->  CurrPage->'+selectPage+' CurrCate->'+selectCategory+' rowPerpage->'+rowPerpage);
		
		$.post('infomation_process.php', { part:"listInfomation" , selectPage : selectPage , selectCategory:selectCategory , rowPerpage:rowPerpage }, function(data){
			  $('#showData').empty();
			  $('#showData').html(data);
			 
			  ListPages(cateID)
		})
		
		

	}
	//--------------------------------
	function ListPages(cateID){
		var CurrPage = $('#CurrPage').val();
		 var rowPerpage = $('#rowPerpage').val();
		$.post('infomation_process.php', { part:"ListPages" , cateID : cateID , CurrPage : CurrPage , rowPerpage:rowPerpage },function(data){
			    $('#showPage').empty();
				$('#showPage').html(data);
			
		})
	}
	//--------------------------------
	$(document).ready(function(){
		
		var cateID = $('#category_id option:selected').val();
		
		listData(cateID);
		ListPages(cateID);
	})	
</script>

















