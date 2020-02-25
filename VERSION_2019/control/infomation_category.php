<?php 
    $rowPerPage=20;
			/*if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	*/
	####################################################

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
	.cateName {
		border: 1px solid #ccc!important;
	}
	
</style>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="3%" height="30" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="97%" bgcolor="#D9D9B3">หมวดข้อมูลวิชาการ</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">
	   <table width="100%"  class="txt10-black">
		 
		  <tr>
		     <td width="8%" align="right"><strong>กรอกชื่อหมวด
             [ภาษาไทย]</strong></td>
		     <td width="26%"><input name="cate_name_th" type="text" id="cate_name_th" size="50" style="height: 30px;"></td> 
			  <td width="8%" align="right"><strong>กรอกชื่อหมวด<br />
[ภาษาอังกฤษ]</strong></td>
		     <td width="26%"><input name="cate_name_en" type="text" id="cate_name_en" size="50" style="height: 30px;"></td>
		     <td width="11%" align="right"><strong>เพิ่มในหมวด&nbsp;</strong></td>
		     <td width="13%">
			    <select id="main_cate_id" name="main_cate_id"  style="height: 30px;">
				   <option value="0">--เป็นหมวดหลัก--</option>
				</select>
			  </td>
		     <td ><button type="button" id="btnAdd" onClick="AddCate(0,0)"  style="height: 30px; width: 100px;">ตกลง</button></td>
		    
		  </tr>
		</table>  
	  
	  
	</td>
  </tr>
  <tr>
    <td colspan="2">
	   <div id="showData"></div>  
	</td>
  </tr>
</table>
	<?php
	?>
</form>
</body>
</html>
 <script>
	//------------------------------ DeleteCate(dataID,cType) main  sub 
	 function DeleteCate(dataID,cType){
		  if(cType=='main'){
			  var txtWarning = 'ต้องการลบหมวดนี้และหมวดย่อย ?';
		  }else if(cType=='sub'){
			  var txtWarning = 'ต้องการลบหมวดนี้ ?';
		  }
		 
		 if(confirm(txtWarning)){
			$.post('infomation_process.php', { part : "DeleteCate" , dataID:dataID , cType:cType  }, function(data){
				if(data=='1'){
					listcategory('all');
				}else{
					alert('ไม่สามารถลบข้อมูลได้');
				}
			})	  
		 }
	 }
	//------------------------------ name_th name_en
	 function UpdateName(dataID){
		 var name_th = $('#name_th'+dataID).val();
		 var name_en = $('#name_en'+dataID).val();
		 console.log('name_th->'+name_th+' name_en->'+name_en);
		 
		 $.post('infomation_process.php',{ part : "updateCate" , name_th:name_th , name_en:name_en , dataID:dataID }
			   ,function(data){
			 if(data=='1'){
				 alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
			 }else{
				 alert('ไม่สามารถแก้ไขข้อมูลได้');
			 }
		 })
	 }
	//------------------------------ 
    function AddCate(cate_lv, main_cate_id){
		var cate_name_th  =$('#cate_name_th').val();
		var cate_name_en  =$('#cate_name_en').val();
		var main_cate_id  =$('#main_cate_id').val();
		if((cate_name_th=='') && (cate_name_en=='')){
			alert('กรุณาใส่ชื่อหมวดทั้งสองภาษา');
			return false;
		}else{
			$.post('infomation_process.php', { part : "AddCate" ,cate_name_th:cate_name_th , cate_name_en:cate_name_en , cate_lv:cate_lv , main_cate_id:main_cate_id   },function(data){
				console.log(data);
				if(data=='1'){
					listcategory('all');
					getMainCategory(0);
					$('#cate_name_th').val('');
					$('#cate_name_en').val('');
				}
			})
		}
	    	
	}
	 //-----------------------------------------------
	 function listcategory(mainCate){
			$.post('infomation_process.php', { part : "listCate" , mainCate : mainCate },function(data){
				   	$('#showData').empty();
					$('#showData').html(data);
		 })
	 }
	 //---------------------------------------------------
	 function getMainCategory(mainCateID){
		 $('#main_cate_id').find('option').remove();
		 $.post('infomation_process.php', { part : "getMainCategory" , mainCateID : mainCateID },function(data){
				
					$('#main_cate_id').append(data);
		 })
		 
		
	 }
	 //---------------------------------------------------
	 $(document).ready(function(){
				listcategory('all');
		        getMainCategory(0);
			})			   
				   
     //-------------------
 </script>




















