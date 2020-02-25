<?php 
  /*  $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage; currID
			}	*/

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
	   //---------------------------- syear smonth sdate
	   $_POST['date_add']=$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
	   //----------------------------
				if($_FILES['pdf_file']['tmp_name']!=""){ 
				$i='info';
				$info =  pathinfo($_FILES['pdf_file']['name']);
				$info[extension]=strtolower($info[extension]);
				//echo $info[extension];
					if($info[extension]=='pdf'){ 
						$txtPDFwarning ='';
						$pdfFileName =  GetNewFileNameII($_FILES['pdf_file']['tmp_name'],$_FILES['pdf_file']['name'],$i);
						move_uploaded_file($_FILES['pdf_file']['tmp_name'], $path_product.$pdfFileName);
						if($_POST['oldPdf']!=''){ 
							unlink($path_product.$_POST['oldPdf']);
						}
						
					}else{
						$txtPDFwarning ='กรุณาเลือกไฟล์ pdf';	
					}
				}else{
					$pdfFileName=$_POST['oldPdf'];
				}
        //------------------------------	   
	    if($_POST['currID']==''){
			$query="INSERT INTO tbl_information_data (id, category_id, title_th, title_en, title_cn, detail_th, detail_en, detail_cn, pdf_file, refference_data, date_add, date_update) VALUES ('', '".$_POST['category_id']."', '".$_POST['title_th']."', '".$_POST['title_en']."', '".$_POST['title_cn']."', '".$_POST['detail_th']."', '".$_POST['detail_en']."', '".$_POST['detail_cn']."', '".$pdfFileName."', '".$_POST['refference_data']."', '".$_POST['date_add']."', CURRENT_TIMESTAMP);";
			mysql_query($query);
			//echo $query;
			$_GET['currID'] = mysql_insert_id();
		}else{
			$query="UPDATE tbl_information_data SET category_id='".$_POST['category_id']."' , title_th='".$_POST['title_th']."', title_en='".$_POST['title_en']."', title_cn='".$_POST['title_cn']."' , detail_th = '".$_POST['detail_th']."', detail_en='".$_POST['detail_en']."' , detail_cn = '".$_POST['detail_cn']."', pdf_file='".$pdfFileName."', refference_data='".$_POST['refference_data']."' , date_add='".$_POST['date_add']."' WHERE id ='".$_POST['currID']."'  ";
			mysql_query($query);
		}//end if currid
	   //echo $query;
   }
  //---------------------------------------------------------

	if($_GET['currID']){ $_POST['currID']=$_GET['currID'];}
		
	 if($_POST['currID']){
			 $query="SELECT * FROM tbl_information_data WHERE id =  '".$_POST['currID']."' ";		
			 $result=mysql_query($query);
			 $currentData =mysql_fetch_assoc($result);
		 	 
		      $dateArray=explode("-",$currentData['date_add']);
			  $day=$dateArray[2];
			  $month=$dateArray[1];
			  $year=$dateArray[0];
		 
		     $CateGoryID = $currentData['category_id'];
		 }	
			
   //------------------------------------
		$query="SELECT * FROM tbl_information_category  "
						."  WHERE category_statis ='1' AND main_cate_id='0'   ORDER BY id ASC "
				        ." ";
        $resultCate = mysql_query($query);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="40" height="30" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="1573" bgcolor="#D9D9B3">ข้อมูลวิชาการ</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">
	  <table width="100%" class="txt10-black">
		  <tr>
		  <td width="12%" height="45"><strong>หมวดข้อมูล</strong></td>  
		  <td width="88%" height="45">
			     <select id="category_id" name="category_id" style="height: 30px;">
			         <option value="x" >---เลือกหมวดข้อมูล--</option>
					 <?php while($cate = mysql_fetch_assoc( $resultCate)){ ?>
					    <option value="<?php echo $cate['id']?>" <?php if($cate['id']==$CateGoryID){ echo "selected"; }?> ><?php echo $cate['cate_name_th']?></option>
					 	<?php 
					 		$query="SELECT *  FROM tbl_information_category   "
							."  WHERE  main_cate_id ='".$cate['id']."' AND category_statis ='1'  ORDER BY id ASC "
				        	." ";
							$resultSub = mysql_query($query);	
							while($sub=mysql_fetch_assoc($resultSub)){ 
					    ?>
					     <option style=" padding:5px 3px;" value="<?php echo $sub['id']?>" <?php if($sub['id']==$CateGoryID){ echo "selected"; }?> >&nbsp;&nbsp;&nbsp;<?php echo $sub['cate_name_th']?></option>
					 <?php }?>
					 <?php }?>
			     </select>
			  </td>  
		</tr>
		<tr>
		  <td width="12%" height="45"><strong>หัวข้อภาษาไทย</strong></td>  
		  <td width="88%" height="45"><input name="title_th" type="text" id="title_th" size="120" style="height: 30px;" value="<?php echo $currentData['title_th']?>"></td>  
		</tr>
		<tr>
		  <td height="45"><strong>หัวข้อภาษาอังกฤษ</strong></td>  
		  <td height="45"><input name="title_en" type="text" id="title_en" size="120" style="height: 30px;" value="<?php echo $currentData['title_en']?>"></td>  
		</tr>
		 <tr>
		  <td height="45"><strong>ไฟล์ PDF</strong></td>  
		  <td height="45"><input name="pdf_file" type="file" style="height: 30px;" id="pdf_file">
		  pdf file : <a href="<?php echo $path_product.$currentData['pdf_file']?>" target="_blank"><?php echo $currentData['pdf_file']?></a>
			<?php if($txtPDFwarning!=''){?><span style="color: red"><?php echo '<br>'.$txtPDFwarning?></span><?php }?>
		    <input type="hidden" name="oldPdf" id="oldPdf" value="<?php echo $currentData['pdf_file']?>"> 
		 </td>  
		</tr> 
		   <tr>
		  <td height="45"><strong>แหล่งที่มา</strong></td>  
		  <td height="45"><input name="refference_data" type="text" id="refference_data" size="120" style="height: 30px;"  value="<?php echo $currentData['refference_data']?>"></td>  
		</tr>
		   <tr>
		     <td height="45"><strong>วันที่</strong></td>
		     <td height="45">
				 <select name="sdate" style="height: 30px;" >
          <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
          <option value="<?php echo $value;?>" <?php if($day==$i) echo "selected";?>><?php echo $i?></option>
          <?php }?>
        </select>
          <select name="smonth" style="height: 30px;" >
            <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
            <option value="<?php echo $key;?>" <?php if($month==$key) echo "selected";?>><?php echo $val?></option>
            <?php } ?>
          </select>
          <select name="syear" style="height: 30px;" >
            <?php for($i=-3;$i<4;$i++){ 
				  				$stable=$currentYear-1;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($year==($stable+$i))  echo "selected";?>><?php echo $stable+$i+$Range543;?></option>
            <?php }?>
          </select>
				</td>
	      </tr>
		   <tr>
		     <td height="45">&nbsp;</td>
		     <td height="45"> <input type="hidden" name="action" id="action" />
        		 <input type="hidden" name="currID" id="currID" value="<?php echo $_POST['currID']?>" />
        		 <input type="hidden" name="RmPic" id="RmPic" />
				 
				 <button type="button" onClick="correctForm()" style="height: 30px; width: 100px;">ตกลง</button>&nbsp;</td>
	      </tr> 
	  </table>  
	  
	  
	  
	</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
	
<script>
	function correctForm(){
	  var title_th = $('#title_th').val()	
	  var title_en = $('#title_en').val()
	  
	  if(title_th==''){
		  alert('กรุณาใส่หัวข้อภาษาไทย');
	  }else if(title_en==''){
		 alert('กรุณาใส่หัวข้อภาษาอังกฤษ'); 
	  }else{
		 document.form1.action.value='Add';
		 document.form1.submit(); 
	  }
	}
</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	