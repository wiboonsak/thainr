<?php 
	$path_product="./car_picture";
	$fix_width=240; 
	$fix_height=180;
			$rowPerPage=30;
			if((!$page)||($page==1)){
						$page=1;
						$startRow=0;
			}else{
					$startRow=($page-1)*$rowPerPage;
			}		
		$query = " SELECT c.* ,b.car_brand ,m.car_model  ,t.id TENDid, t.tent_address  , t.tent_fax , t.tent_name , t.tent_telephone ,body.text_model_year "
	." FROM `tbl_car_data` c  "
	." LEFT JOIN tbl_car_brand b ON c.car_brand_id = b.id "
	." LEFT JOIN tbl_car_model m ON c.car_model_id  = m.id "
	." LEFT JOIN tbl_tent_user t ON c.tent_id = t.id "
	." LEFT JOIN tbl_car_model_year  body ON c.car_model_year_id = body.id "
	." WHERE c.tent_id =  '".$_GET['Uid']."' ORDER BY c.car_model_id  ";
	$queryCarLimit = $query." LIMIT $startRow, $rowPerPage";
	$resultData=mysql_query($queryCarLimit);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%"  border="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="3" cellspacing="0">
      <?php $n=1; while($ShowList=mysql_fetch_assoc($resultData)){ ?>
      <tr>
        <td width="255" height="25" valign="top"><a href="cardetail.php?car=<?php echo $ShowList['id']?>" target="_blank">
          <?php if($ShowList['pic2']!=''){ 
		  //@unlink($path_product."/thb/".$ShowList['pic2']);
			//create_thub($path_product."/",$ShowList['pic2'],$n_width,$n_height);
			//--------------
			$SourceFile = 'car_picture/thb/'.$ShowList['pic2'];
			$DestinationFile = 'car_picture/thb/'.$ShowList['pic2'];
			$WaterMarkText = 'www.shopping2car.com';
			//---------------
			watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile);
			echo "<img src='".$path_product."/thb/".$ShowList['pic2']."' border =0>";
			?>
        </a>
          <?php 
	 }else{ ?>
          <img src="dealer/noimg-copy.gif" width="120" height="96" />
          <?php } ?>
          <br />
          <a href="cardetail.php?car=<?php echo $ShowList['id']?>" target="_blank">รายละเอียด</a></td>
        <td valign="top"><div class="font1"><?php echo $n.".";?>&nbsp;<?php echo $ShowList['car_brand']?>&nbsp;<?php echo $ShowList['car_model']?>&nbsp;<?php echo $ShowList['text_model_year']?></div>
              <div><?php echo $ShowList['car_desc']?></div>
          <br />
              <div><?php echo $ShowList['car_note']?></div>
          <br />
              <div class="font1">ราคา <u>
                <?php Xprice($ShowList['car_prize'])?>
          </u> บาท</div>            <br />        </td>
        </tr>
      <tr>
        <td height="1" colspan="2" bgcolor="#D7D7D7"></td>
      </tr>
      <tr>
        <td height="2" colspan="2" bgcolor="#FFFFFF"></td>
      </tr>
      <?php $n++; } ?>
    </table></td>
  </tr>
</table>
<br />
หน้า :<?php  $thisFile=$thisFile."?Uid=".$_GET['Uid'].""; PageDisplay($query,$rowPerPage,$page,$thisFile)?>
</body>
</html>
