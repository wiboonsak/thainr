<?php 
		//-----------------------------Date------------------------------------
			setlocale (LC_TIME, 'th');
	    //------------------------------------
		if($_GET['currID']){ $_POST['currID']=$_GET['currID'];}
		//--------------------------------------------------------------------------
		
		//--------------------------------------------------------------------------
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
		//-----------------------------------------------------------------------------		
			if($_POST['action']=='deletePic'){
				 if(file_exists($path_product."/thb/".$RmPic)){
				 			@unlink ($path_product."/thb/".$RmPic);
				 }
				 if(file_exists($path_product."/".$RmPic)){
				 			@unlink ($path_product."/".$RmPic);
				 }
				 $query = "DELETE FROM  tbl_news_data_file WHERE  file_name = '".$_POST['RmPic']."' ";
				 
				 mysql_query($query);
			}		
		//-----------------------------------------------------------------------------
		if($_POST['action']=='Add'){
			$_POST['date_act']=$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
					if($_POST['currID']==''){
						
						 $query="INSERT INTO `tbl_news_data` "
										    ." ( `id` , `topic_th` , `topic_en` , `detail_th` , `detail_en` , `date_act`, `cate_id` , `reff`, `reff_en`, `language`) "
											." VALUES "
											." ('' , '".$_POST['topic_th']."', '".$_POST['topic_en']."', '".$_POST['detail_th']."', '".$_POST['detail_en']."',  '".$_POST['date_act']."' ,  '".$_POST['cate_id']."' ,  '".$_POST['reff']."' ,  '".$_POST['reff_en']."' ,  '".$_SESSION['language']."') ";
								mysql_query($query);
								$_POST['currID'] =mysql_insert_id();
						}else{
							$query="UPDATE tbl_news_data SET "
							."  `topic_th`= '".$_POST['topic_th']."'  , `topic_en`='".$_POST['topic_en']."'  , `detail_th`='".$_POST['detail_th']."'  , `detail_en`= '".$_POST['detail_en']."'  , `date_act`='".$_POST['date_act']."' , `cate_id` = '".$_POST['cate_id']."'  "
							." , `reff` ='".$_POST['reff']."'  , `reff_en`= '".$_POST['reff_en']."' "
							." WHERE id = '".$_POST['currID']."' ";
							mysql_query($query);
							
					  }//$_POST['currID']
					  //>>>>>>------add img 
					if($_POST['currID']){
						 for($i=0;$i<count($_FILES["uploadfile"]["name"]);$i++)
							{
								if($_FILES['uploadfile']['tmp_name'][$i]!=""){ 
								$info =  pathinfo($_FILES['uploadfile']['name'][$i]);
								$info[extension]=strtolower($info[extension]);
									if(($info[extension]=='pjpeg')  || ($info[extension]=='gif')  ||  ($info[extension]=='png')  ||  ($info[extension]=='x-png') || ($info[extension]=='jpeg') || ($info[extension]=='jpg')){
									$_POST['file_type']=1;
								}else{
									$_POST['file_type']=2;
								}
								//-------------------------------------------------
								   GetNewFileName($_FILES['uploadfile']['tmp_name'][$i],$_FILES['uploadfile']['name'][$i],$i);
									move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $path_product.$_FILES['uploadfile']['name'][$i]);
								//------------------------------------------------
								$query=" INSERT INTO `tbl_news_data_file` ( `id` , `w_th` , `w_en`, `file_name` , `news_id` , `file_type`, `origin_name_th`  ) "
														."	VALUES "
														." ( '', '".$_POST['w_th']."', '".$_POST['w_en']."', '".$_FILES['uploadfile']['name'][$i]."', '".$_POST['currID']."', '".$_POST['file_type']."','".$_POST['origin_file_name'][$i]."') ";
								
											mysql_query($query);
								}
							}
					} // end add image------------------
					////////////////////////////// txt Image /////////////////////////////////// wth wen hiddenID
					for($i=1;$i < $_POST['hiddenLoops'];$i++){
						     $query="UPDATE tbl_news_data_file SET    `w_th`='".$_POST['wth'][$i]."'     , `w_en` ='".$_POST['wen'][$i]."'  WHERE id ='".$_POST['hiddenID'][$i]."'  ";	
							 mysql_query($query)					;
							
						}
			}
		
		 if($_POST['currID']){
			 $query="SELECT * FROM tbl_news_data WHERE id =  '".$_POST['currID']."' ";		
			 $result=mysql_query($query);
			 $currentData =mysql_fetch_assoc($result);
			  $dateArray=explode("-",$currentData['date_act']);
			  $day=$dateArray[2];
			  $month=$dateArray[1];
			  $year=$dateArray[0];			  
			 //--------------select img--------------//
			 $query="SELECT * FROM `tbl_news_data_file` WHERE  `news_id` =  '".$_POST['currID']."'  ORDER BY  file_type  ASC, id ASC";
			 $resultPic=mysql_query($query);
			
			 
			 }	
			

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function  checkForm(){
					if(document.form1.cate_id.value=='0'){
								alert('กรุณาเลือกหมวดข่าว');
								return false;
						}else{
								document.form1.action.value='Add';							
							}
			}
			
		function removePic(pic){
		if(confirm('ต้องการลบไฟล์นี้')){
				document.form1.RmPic.value=pic;
				document.form1.action.value='deletePic';
				document.form1.submit();
		}else{
				return false;
			}
	}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return checkForm()">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">เพิ่มข่าวสาร</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td width="13%" align="right"><strong><?php echo _txtSelectCagegory?></strong></td>
        <td width="87%"><select name="cate_id" id="cate_id">
          <option value="0">---- <?php echo _txtSelectCagegory?>-----</option>
          <option value="1" <?php if($currentData['cate_id']=='1') echo "selected";?>><?php echo _txtRubberNews?></option>
          <option value="2" <?php if($currentData['cate_id']=='2') echo "selected";?>><?php echo _txtAutomobileNews?></option>
          <option value="3" <?php if($currentData['cate_id']=='3') echo "selected";?>><?php echo _txtEconomicNews?></option>          
        </select></td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtTopicinput?></strong></td>
        <td><input name="topic_th" type="text" id="topic_th" size="60" maxlength="255"  value="<?php echo $currentData['topic_th']?>"/></td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtDetaulinput?></strong></td>
        <td><textarea name="detail_th" cols="40" rows="5" id="detail_th"><?php echo $currentData['detail_th']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_th');
		          </script></td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtReff?> </strong></td>
        <td><label for="reff"></label>
          <input name="reff" type="text" id="reff" size="60" value="<?php echo $currentData['reff']?>"/></td>
      </tr>
      <!--<tr>
        <td>หัวข้อ [english]</td>
        <td><input name="topic_en" type="text" id="topic_en" size="60" maxlength="255"  value="<?php echo $currentData['topic_en']?>"/></td>
      </tr>
      <tr>
        <td>รายละเอียด [english]</td>
        <td><textarea name="detail_en" cols="40" rows="5" id="detail_en"><?php echo $currentData['detail_en']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_en');
		          </script></td>
      </tr> -->
      <tr>
        <td align="right"><strong><?php echo _txtDateSelect?></strong></td>
        <td><select name="sdate">
          <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
          <option value="<?php echo $value;?>" <?php if($day==$i) echo "selected";?>><?php echo $i?></option>
          <?php }?>
        </select>
          <select name="smonth">
            <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
            <option value="<?php echo $key;?>" <?php if($month==$key) echo "selected";?>><?php echo $val?></option>
            <?php } ?>
          </select>
          <select name="syear">
            <?php for($i=-3;$i<4;$i++){ 
				  				$stable=$currentYear-1;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($year==($stable+$i))  echo "selected";?>><?php echo $stable+$i+$Range543;?></option>
            <?php }?>
          </select></td>
      </tr>
      <!--<tr>
        <td>ที่มา  [english]</td>
        <td><label for="reff_en"></label>
          <input name="reff_en" type="text" id="reff_en" size="60" value="<?php echo $currentData['reff_en']?>"/></td>
      </tr> -->
      <tr>
        <td align="right"><strong>
          <input type="hidden" name="action" id="action" />
         <input type="hidden" name="currID" id="currID" value="<?php echo $_POST['currID']?>" />
         <input type="hidden" name="RmPic" id="RmPic" />
         </strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong><?php echo _txtFileAndIMG?></strong></td>
        <td bgcolor="#F4F4F4" class="red"><label for="uploadfile[]"></label>
          <input type="file" name="uploadfile[]" id="uploadfile[]"  multiple="multiple"/>
          <br />
          **การเลือกไฟล์ได้ครั้งหละหลายไฟล์ รองรับ jpg ,gif, png<br />
          ***การเลือกไฟล์แต่ละครั้งขนาดไฟล์รวมกันไม่เกิน 8 เมกกะไบต์</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#FFCC00"><input type="submit" name="button" id="button" value="<?php echo _txtBtnAddEdit?>" /></td>
        </tr>
      <tr>
        <td colspan="2">
        <!--////////////////////////// -->
        <table width="" border="0" cellpadding="0" cellspacing="0" bgcolor="">
                        <tr>
                          <td width="16"><?php  if($_POST['currID']){ ?>
                              <table width="" border="0" cellpadding="5" cellspacing="5">
                                <tr>
                                  <?php 
    		$col=3;$n=1;$num=1;
			$n_width=180;$n_height=180;
			$max_x =200;
			$max_y =200;
				while($pic = mysql_fetch_assoc($resultPic)){
					
   						echo "<td bgcolor='#F8F8F8' nowarp height=25  align ='center' valign='bottom'> "; 
						
						$info =  pathinfo($path_product."/".$pic['file_name']);
						//echo $info[extension];
						$info[extension]=strtolower($info[extension]);
						if(($info[extension]=='pjpeg')  || ($info[extension]=='gif')  ||  ($info[extension]=='png')  ||  ($info[extension]=='x-png') || ($info[extension]=='jpeg') || ($info[extension]=='jpg')){
									 if(!file_exists($path_photo."/thb/".$path_product.$pic['file_name'])){ 
										list($width, $height, $type, $attr) = getimagesize($path_product.$pic['file_name']);
										create_thub($path_product."/",$pic['file_name'],$n_width,$n_height);
									 }		
									echo "<a href='".$path_product."/".$pic['file_name']."'  target='_blank'>";
									echo  "<img src='".$path_product."/thb/".$pic['file_name']."' border =0>";
									echo  "</a>";
									echo "<br> ";
						}else{
								echo "<a href='".$path_product."/".$pic['file_name']."'  target='_blank'>";
								echo "<img src='images/black_icon/48x48/doc_empty.png' /><br>";
								echo  $pic['oldFilename'];	
								echo  "</a>";
								echo "<br> ";
							}
							echo "<br>"._txtFileDesc." <br> <input type='text' size='30' name='wth[".$num."]' value='".$pic['w_th']."'> ";
							//echo "<br>คำบรรยายอังกฤษ <br> <input type='text' size='30' name='wen[".$num."]' value='".$pic['w_en']."'>";
							echo "<input type='hidden' name='hiddenID[".$num."]' value='".$pic['id']."' > ";
							echo "<br><a href=# onclick=removePic('".$pic['file_name']."'); >";
						    echo "<img src='images/20x20_trash.gif' border=0 align =absmiddle hspace='5' vspace='5' />&nbsp;ลบ";
						   echo "</a></td> ";
					if($n==$col){ echo "</tr>\n"; $n=0;};	
					 $n++; $num++;
				}
			?>
                                </tr>
                            </table></td>
                        </tr>
                      </table>
       <?php }?>
                  
       <!-- /////////////////////////  --> 
        </td>
        </tr>
     <tr>
        <td colspan="2" align="center" bgcolor="#FFCC00">
        <input type="hidden" name="hiddenLoops"  value="<?php echo $num?>"/>
<!--        <input type="submit" name="button" id="button" value="<?php echo _txtBtnAddEdit?>" /></td>-->
        </tr>
     
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>