<?php 
		//------------------------------------------------------------------------
			if($_GET['currentID']){
					$_POST['currentID']=$_GET['currentID'];
			}

	
		$currentDate=date("d");
		$currentMonth= date("m");
		$currentMonthname= date("m");			
		$currentYear= date("Y");	
		
		$currentDate2=date("d");
		$currentMonth2= date("m");
		$currentMonthname2= date("m");			
		$currentYear2= date("Y");			
			//------------------------------------------------------------------------
			if($_GET['currentID']){
					$_POST['currentID']=$_GET['currentID'];
			}
			
			//----------------------------------------------------------------------
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}
	####################################################			
		if($_POST['action']=='deletePic'){
				 if(file_exists($path_product."/thb/".$RmPic)){
				 			@unlink ($path_product."/thb/".$RmPic);
				 }
				 if(file_exists($path_product."/".$RmPic)){
				 			@unlink ($path_product."/".$RmPic);
				 }
				 $query = "DELETE FROM  calendar_events_file WHERE  file_name = '".$_POST['RmPic']."' ";
				 mysql_query($query);
			}					
				
	####################################################
	if($_POST['action']=='Add'){
				  $_POST['sdate']=$_POST['stopYear']."-".$_POST['stopMonth']."-".$_POST['stopDay'];
				  $_POST['sdate2'] = $_POST['stopYear2']."-".$_POST['stopMonth2']."-".$_POST['stopDay2'];	
				if($_POST['currentID']=="") {
							#-------------------------------------------------------------------------------------------
							$query="INSERT INTO `calendar_event_data` "
							." (`id` ,`event_title` ,`event_title_en` ,`event_desc` ,`event_desc_en` ,`date_start` ,`date_end` ,`event_pic`,`language` ) "
							." VALUES "
							." (  '' , '".$_POST['event_title']."' , '".$_POST['event_title_en']."' ,'".$_POST['event_desc']."' , '".$_POST['event_desc_en']."' , '".$_POST['sdate']."', '".$_POST['sdate2']."', 'event_pic'  , '".$_SESSION['language']."') ";
							//echo $query."<br>";
					     mysql_query($query);
					 		$_POST['currentID']=mysql_insert_id();
							#-------------------------------------------------------------------------------------------
							$dateCurrentDiff=DateDiff(date("Y-m-d"),$_POST['sdate']);
							$dateDiff = DateDiff($_POST['sdate'],$_POST['sdate2'] );
							//if($dateDiff!=$_POST['Current_dateDiff']){ 
							$query="DELETE   FROM    `calendar_events`  WHERE  `newsID` = '".$_POST['currentID']."'  ";
							//echo $query." <<1  >>dateDiff>>".$dateDiff;
							mysql_query($query);
							
							for($i=0;$i <= $dateDiff;$i++){ 
									$dateAdd=date("Y-n-j",  mktime (0,0,0,date("m"),  date("d")+$dateCurrentDiff+$i,  date("Y")));
									$dateArray=explode("-",$dateAdd);
									$query="INSERT INTO  `calendar_events` (`event_id` ,`event_day` ,`event_month` ,`event_year` ,`event_time` ,`event_title` ,`event_desc` ,`event_pic` ,`newsID`,`event_title_en` ,`event_desc_en`,`language` ) "
									." VALUES "
									." ('' , '".$dateArray[2]."', '".$dateArray[1]."', '".$dateArray[0]."' , '', '".$_POST['event_title']."',  '".$_POST['event_desc']."', '', '".$_POST['currentID']."', '".$_POST['event_title_en']."' ,  '".$_POST['event_desc_en']."' , '".$_SESSION['language']."')  ";		
									mysql_query($query);
									//echo "<br>".$query."<br>";					
								//}
							}
				  
				}else if($_POST['currentID']){
							#-------------------------------------------------------------------------------------------
							$query="UPDATE `calendar_event_data` "
							."  SET `event_title`='".$_POST['event_title']."' ,`event_title_en`='".$_POST['event_title_en']."' ,`event_desc`='".$_POST['event_desc']."' ,`event_desc_en`= '".$_POST['event_desc_en']."' ,`date_start`= '".$_POST['sdate']."' ,`date_end`= '".$_POST['sdate2']."' WHERE id = '".$_POST['currentID']."' ";
					     mysql_query($query);
					 	
							#-------------------------------------------------------------------------------------------
				  			$dateCurrentDiff=DateDiff(date("Y-m-d"),$_POST['sdate']);
							$dateDiff = DateDiff($_POST['sdate'],$_POST['sdate2'] );
							
							//if($dateDiff!=$_POST['Current_dateDiff']){ 
							$query="DELETE FROM    calendar_events WHERE  newsID = '".$_POST['currentID']."'  ";
							mysql_query($query);
							///echo $query." <<2  >>dateDiff>>".$dateDiff;
							for($i=0;$i <= $dateDiff;$i++){ 
									$dateAdd=date("Y-n-j",  mktime (0,0,0,date("m"),  date("d")+$dateCurrentDiff+$i,  date("Y")));
									$dateArray=explode("-",$dateAdd);
									$query="INSERT INTO  `calendar_events` (`event_id` ,`event_day` ,`event_month` ,`event_year` ,`event_time` ,`event_title` ,`event_desc` ,`event_pic` ,`newsID`,`event_title_en` ,`event_desc_en` ,`language`) "
									." VALUES "
									." ('' , '".$dateArray[2]."', '".$dateArray[1]."', '".$dateArray[0]."','', '".$_POST['event_title']."',  '".$_POST['event_desc']."',  '', '".$_POST['currentID']."', '".$_POST['event_title_en']."' ,  '".$_POST['event_desc_en']."', '".$_SESSION['language']."' )  ";	
									mysql_query($query);
									//echo "<br>".$query."<br>";			
									
							//}
					 }
				}
				  //>>>>>>------add img 
					if($_POST['currentID']){
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
								//echo "<br>".$_FILES['uploadfile']['name'][$i]."<br>";
								//------------------------------------------------
								$query=" INSERT INTO `calendar_events_file` ( `id` , `w_th` , `w_en`, `file_name` , `news_id` , `file_type`, `origin_name_th`  ) "
														."	VALUES "
														." ( '', '".$_POST['w_th']."', '".$_POST['w_en']."', '".$_FILES['uploadfile']['name'][$i]."', '".$_POST['currentID']."', '".$_POST['file_type']."','".$_POST['origin_file_name'][$i]."') ";
											mysql_query($query);
								
							}
					  	}
					} // end add image------------------

	}
	
		 if($_POST['currentID']){		
				 //--------------select img--------------//
				 $query="SELECT * FROM `calendar_event_data` WHERE id =  '".$_POST['currentID']."' ";
				 $result=mysql_query($query);
				 $currentData=mysql_fetch_assoc($result);
				 $dateStartArray=explode("-",$currentData['date_start']);
				$currentDate= $dateStartArray[2];
				$currentMonth= $dateStartArray[1];
				$currentYear= $dateStartArray[0];	
				$dateStopArray=explode("-",$currentData['date_end']);
				$currentDate2=$dateStopArray[2];
				$currentMonth2= $dateStopArray[1];
				$currentYear2= $dateStopArray[0];
				
				$Current_dateDiff = DateDiff($currentData['date_start'],$currentData['date_end'] );
				 //--------------select img--------------//
			 $query="SELECT * FROM `calendar_events_file` WHERE  `news_id` =  '".$_POST['currentID']."'  ORDER BY  file_type  ASC, id ASC";
			 $resultPic=mysql_query($query);
		 }
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	function removePic(pic){
		if(confirm('ต้องการลบรุปนี้')){
				document.form1.RmPic.value=pic;
				document.form1.action.value='deletePic';
				document.form1.submit();
		}else{
				return false;
			}
	}
	
	 function removeYT(pic){
		if(confirm('ต้องการลบวีดีโอนี้')){
				document.form1.RmPic.value=pic;
				document.form1.action.value='deleteYT';
				document.form1.submit();
		}else{
				return false;
			}
	}
	  function removePic(pic){
		if(confirm('ต้องการลบรุปนี้')){
				document.form1.RmPic.value=pic;
				document.form1.action.value='deletePic';
				document.form1.submit();
		}else{
				return false;
			}
	}	
	
	function checkThisForm(){
				if(document.form1.event_title.value==''){
							alert('กรุณาใส่หัวข้อ');
							return false;
					//}else if(document.form1.event_title_en.value==''){
					//		alert('กรุณาใส่หัวข้ออังกฤษ');
					//		return false;
					}else{
							document.form1.action.value='Add';
						}
					
		}
	
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return checkThisForm();">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">เพิ่มปฏิทินกิจกรรม

    
      <input type="hidden" name="currentID" id="currentID" value="<?php echo $_POST['currentID']?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td width="19%" height="0" align="right"><?php echo _txtTopicinput?></td>
        <td><input name="event_title" type="text" id="event_title" size="50" value="<?php echo $currentData['event_title']?>" />          </td>
      </tr>
    <!--  <tr>
        <td height="-1" align="right">หัวข้อกิจกรรม[english]</td>
        <td><input name="event_title_en" type="text" id="event_title_en" size="50" value="<?php echo $currentData['event_title_en']?>" />        </td>
      </tr> -->

      <tr>
        <td height="4" align="right"><?php echo _txtDetaulinput?></td>
        <td>          <textarea name="event_desc" cols="55" rows="15" id="event_desc"><?php echo $currentData['event_desc']?></textarea><script language="javascript1.2" type="text/javascript">
 			 generate_wysiwyg('event_desc');
		  </script></td>
        </tr>
     <!-- <tr>
        <td height="5" align="right">รายละเอียด[english]</td>
        <td><textarea name="event_desc_en" cols="55" rows="15" id="event_desc_en"><?php echo $currentData['event_desc_en']?></textarea><script language="javascript1.2">
 			 generate_wysiwyg('event_desc_en');
		</script>        </td>
      </tr> -->
            <tr>
        <td height="1" align="right">วันเริ่มกิจกรรม</td>
        <td>วัน
            <select name="stopDay" id="stopDay">
              <?php for($i=1;$i<=31;$i++){ 
							if($i<10){ $i= "0".$i;}	
				?>
              <option value="<?php echo $i?>" <?php if($currentDate==$i) echo "selected";?>><?php echo $i?></option>
              <?php } ?>
            </select>
          เดือน
          <select name="stopMonth" id="stopMonth">
            <?php
		if($_POST['stopMonth']){  $currentMonth=$_POST['stopMonth'];}
		reset($monthnames2); 
		while($month=each($monthnames2)){ ?>
            <option value="<?php echo $month['key']?>" <?php if($currentMonth==$month['key']) echo "selected";?>><?php echo $month['value']?></option>
            <?php }?>
          </select>
          ปี
          <select name="stopYear" id="stopYear">
            <?php
  if($_POST['stopYear']){ $currentYear=$_POST['stopYear']; }
  $startYear=2009; for($i=1;$i<20;$i++){ ?>
            <option value="<?php echo $startYear+$i?>"<?php if($startYear+$i==$currentYear) echo "selected";?>><?php echo ($startYear+$i)+$Range543?></option>
            <?php } ?>
          </select>        </td>
        </tr>
      <tr>
        <td height="0" align="right">วันสิ้นสุดกิจกรรม</td>
        <td>วัน
            <select name="stopDay2" id="stopDay2">
              <?php for($i=1;$i<=31;$i++){ 
							if($i<10){ $i= "0".$i;}	
				?>
              <option value="<?php echo $i?>" <?php if($currentDate2==$i) echo "selected";?>><?php echo $i?></option>
              <?php } ?>
            </select>
          เดือน
          <select name="stopMonth2" id="stopMonth2">
            <?php
		if($_POST['stopMonth']){  $currentMonth=$_POST['stopMonth'];}
		reset($monthnames2); 
		while($month=each($monthnames2)){ ?>
            <option value="<?php echo $month['key']?>" <?php if($currentMonth2==$month['key']) echo "selected";?>><?php echo $month['value']?></option>
            <?php }?>
          </select>
          ปี
          <select name="stopYear2" id="stopYear2">
            <?php
  if($_POST['stopYear']){ $currentYear=$_POST['stopYear']; }
  $startYear=2009; for($i=1;$i<20;$i++){ ?>
            <option value="<?php echo $startYear+$i?>"<?php if($startYear+$i==$currentYear2) echo "selected";?>><?php echo ($startYear+$i)+$Range543?></option>
            <?php } ?>
          </select>
          <input name="Current_dateDiff" type="hidden" id="Current_dateDiff" value="<?php echo $Current_dateDiff?>" /></td>
        </tr>
      <tr>
        <td height="-1" colspan="2" align="right"><table class="tableborder_full" height="251" cellspacing="0" cellpadding="0"  width="100%" border="0">
          <tbody>
            <tr>
              <td class="txt10-brown" valign="middle" nowrap="nowrap" 
          height="28" colspan="2"  background="images/bgcategory01.png"><img src="images/icon24_modules.gif" alt="" width="24" height="22" align="absmiddle" />เพิ่มไฟล์รูปภาพเพิ่มเติม</td>
            </tr>
            <tr>
              <td height="40" bgcolor="#f0f0f0" class="NAV_URL">&nbsp;</td>
              <td bgcolor="#f0f0f0" class="txt10-black">หากท่านต้องการเพิ่มไฟล์รูปภาพ ทำได้โดยกดปุ่ม Browse เพื่อทำการเลือกไฟล์ภาพ จากนั้นกดปุ่มเพิ่มรูปภาพ/ไฟล์&nbsp;&nbsp; โดยระบบสามารถเพิ่มไฟล์ได้ไม่จำกัด&nbsp; และรูปภาพควรมีขนาดไม่เกิน  กว้าง 800 สูง 600 pixel 
                (รองรับไฟล์&nbsp; .jpg &nbsp; .gif &nbsp; );</td>
            </tr>
            <tr>
              <td width="40" height="30" bgcolor="#f0f0f0" class="NAV_URL">&nbsp;</td>
              <td width="608" bgcolor="#f0f0f0" class="NAV_URL"><?php echo _txtFileAndIMG?>
                <input name="uploadfile[]" type="file" id="uploadfile[]" size="20" maxlength="50" multiple="multiple" /></td>
            </tr>
            <tr>
              <td height="5" bgcolor="#f0f0f0" class="NAV_URL"></td>
              <td bgcolor="#f0f0f0" class="NAV_URL"></td>
            </tr>
            <tr>
              <td height="5" colspan="2" bgcolor="#FFFFFF" class="NAV_URL"><!-- ////////////// -->
                <table width="" border="0" cellpadding="0" cellspacing="0" bgcolor="">
                  <tr>
                    <td><?php if($_POST['currentID']){ ?>
                      <table width="" border="0" cellpadding="5" cellspacing="5">
                        <tr>
                          <?php 
    		$col=3;$n=1;
			$n_width=200;$n_height=200;
			$max_x =130;
			$max_y =130;
				while($pic = mysql_fetch_assoc($resultPic)){
					
   						echo "<td bgcolor='#F8F8F8' nowarp height=25  align ='center' valign='bottom'> "; 
						
						$info =  pathinfo($path_product."/".$pic['file_name']);
						//echo $info[extension]." | ".$pic['file_name'];
						$info[extension]=strtolower($info[extension]);
						if(($info[extension]=='pjpeg')  || ($info[extension]=='gif')  ||  ($info[extension]=='png')  ||  ($info[extension]=='x-png') || ($info[extension]=='jpeg') || ($info[extension]=='jpg')){
									 //if(!file_exists($path_photo."/thb/".$path_product.$pic['file_name'])){ 
										list($width, $height, $type, $attr) = getimagesize($path_product.$pic['file_name']);
										create_thub($path_product."/",$pic['file_name'],$n_width,$n_height);
									// }		
									echo "<a href='".$path_product."/".$pic['file_name']."'  target='_blank'>";
									echo  "<img src='".$path_product."/thb/".$pic['file_name']."' border =0>";
									echo  "</a>";
									echo "<br> ";
						}else{
								echo "<a href='".$path_product."/".$pic['file_name']."'  target='_blank'>";
								echo "<img src='images/MyDocuments.png' width='130' height='130' /><br>";
								echo  $pic['oldFilename'];	
								echo  "</a>";
								echo "<br> ";
							}
							echo "<a href=# onclick=removePic('".$pic['file_name']."'); >";
						    echo "<img src='images/20x20_trash.gif' border=0 align =absmiddle hspace='5' vspace='5' />&nbsp;ลบ";
						   echo "</a></td> ";
					if($n==$col){ echo "</tr>\n"; $n=0;};	
					 $n++; 
				}
			?>
                        </tr>
                      </table>
                      <?php }?></td>
                  </tr>
                </table></td>
            </tr>
          </tbody>
        </table></td>
        </tr>
    
      <tr>
        <td height="25" colspan="2" align="center"><input type="hidden" name="RmPic" />
          <input name="Submit" type="submit"  value="<?php echo _txtBtnAddEdit?> "  />          <input name="action" type="hidden" id="action"  />            </td>
        </tr>
      <tr>
        <td height="25" colspan="2" align="left">&nbsp;</td>
      </tr>
  </table></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>