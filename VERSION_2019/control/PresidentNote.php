<?php 
	 $stable=2007;
	 $currentYear=date("Y");
	 $rangeYear = ($currentYear-$stable)+6;
	
	//-------------------------
	
	if($_GET['IDS']){ $_POST['IDS']=$_GET['IDS']; }
	
	$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	
		$monthnames3 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	if($_POST['action']=='add'){
		$today=date("Y-m-d");
		$today =$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
		$today2 =$_POST['syear2']."-".$_POST['smonth2']."-".$_POST['sdate2'];
				if($_POST['IDS']==''){ 
				
						 $query = "INSERT INTO `tbl_speech` ( `id` , `title_en` , `title_th` , `detail_en` , `detail_th` ,`name_ch` , `date_post`  "
						 ." , `signatureIMG`	, `name_en` , 	`name_th`, `date_end` , `language`)  "
									." VALUES "
									." ( '', '".$_POST['title_en']."', '".$_POST['title_th']."' , '".$_POST['detail_en']."', '".$_POST['detail_th']."', '".$_POST['name_ch']."', '$today' "
									."  ,  '".$_POST['signatureIMG']."', '".$_POST['name_en']."' , '".$_POST['name_th']."' , '$today2' ,  '".$_SESSION['language']."' ) ";
									mysql_query($query);
									//echo $query;
									$_POST['IDS'] = mysql_insert_id();
								
				}else{ 
				
						$query = "UPDATE   `tbl_speech`  SET " 
						."  `title_en` =  '".$_POST['title_en']."',  `title_th`  =  '".$_POST['title_th']."' , `date_post` = '$today'  ,  "
						."   `detail_en` =  '".$_POST['detail_en']."',  `detail_th` = '".$_POST['detail_th']."' "
						."  , `signatureIMG`=	 '".$_POST['signatureIMG']."' , `name_en`= '".$_POST['name_en']."'  , `name_ch`= '".$_POST['name_ch']."' , 	`name_th`= '".$_POST['name_th']."'   "
						."  , `date_end` = '".$today2."' WHERE id =  '".$_POST['IDS']."' ";
						mysql_query($query);
						//echo $query;
				}
				//echo $query;
	}
	
	if($_POST['IDS']){ 
		$query= "SELECT * FROM tbl_speech  WHERE id =  '".$_POST['IDS']."' ";
		$result = mysql_query($query);
		$data =mysql_fetch_assoc($result);
		$detail_th = $data['detail_th'];
		$detail_en = $data['detail_en'];
		$dateArray = explode("-",$data['date_post']);
		$day = $dateArray[2];
		$month = $dateArray[1];		
		$year = $dateArray[0];		
		
		$dateArray2 = explode("-",$data['date_end']);
		$day2 = $dateArray2[2];
		$month2 = $dateArray2[1];		
		$year2 = $dateArray2[0];		
	}
	
	if($day==""){
			$day=date("d");
		}
		if ($month==""){
			$month = date("n");
		}
		if ($year==""){
			$year = date("Y");
		}
		//-----------------------------------
		$query="SELECT * FROM tbl_ceo WHERE active='1' ";
		$resultList=mysql_query($query);
		$dataCeo=mysql_fetch_assoc($resultList);
		
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
    <td width="96%" bgcolor="#D9D9B3">สารจากนายกสมาคม

    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td width="15%" align="right"><strong>วันที่</strong></td>
        <td width="85%"><select name="sdate">
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
            <?php for($i=0;$i<$rangeYear;$i++){ 
				  				
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($year==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select> 
          ถึง 
          <select name="sdate2">
            <option value="00">-</option>
            <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
            <option value="<?php echo $value;?>" <?php if($day2==$i) echo "selected";?> ><?php echo $i?></option>
            <?php }?>
          </select>
          <select name="smonth2">
            <option value="00">-</option>
            <?php 	while (list($key, $val) = each($monthnames3)) {  ?>
            <option value="<?php echo $key;?>"  <?php if($month2==$key) echo "selected";?>><?php echo $val?></option>
            <?php } ?>
          </select>
          <select name="syear2">
            <option value="0000">-</option>
            <?php for($i=0;$i<$rangeYear;$i++){ 
				  				$stable=2007;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($year2==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select></td>
      </tr>
      <tr>
        <td align="right"><strong>หัวข้อ</strong></td>
        <td><input name="title_th" type="text" id="title_th" value="<?php echo $data['title_th']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>รายละเอียด</strong></td>
        <td><textarea name="detail_th" cols="100" rows="8" id="detail_th"><?php echo $data['detail_th']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_th');
		          </script></td>
      </tr>
    <!--  <tr>
        <td>หัวข้อ [english]</td>
        <td><input name="title_en" type="text" id="title_en" value="<?php echo $data['title_en']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td>รายละเอียด [english]</td>
        <td><textarea name="detail_en" cols="60" rows="8" id="detail_en"><?php echo $data['detail_en']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('detail_en');
		          </script></td>
      </tr> -->
      <tr>
        <td align="right"><strong>ชื่อนายกสมาคม</strong></td>
        <td><?php echo $dataCeo['nameCH']?>
          <input name="ceoID" type="hidden" value="<?php echo $dataCeo['id']?>" />
          <input name="signatureIMG" type="hidden" value="<?php echo $dataCeo['SigIMG']?>" />
          <input name="name_th" type="hidden" value="<?php echo $dataCeo['nameTH']?>" />
          <input name="name_en" type="hidden" value="<?php echo $dataCeo['nameEN']?>" />
          <input name="name_ch" type="hidden" value="<?php echo $dataCeo['nameCH']?>" />
          <input name="action" type="hidden" id="action" />
          <input type="hidden" name="IDS" value="<?php echo $_POST['IDS']?>" />
          </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="เพิ่มข้อมูล / แก้ไขข้อมูล"  onclick="document.form1.action.value='add';"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>