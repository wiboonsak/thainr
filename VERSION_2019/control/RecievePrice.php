<?php 
$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################
		//-----------------------------------------------------------------------------------------------------------------------------
		if(isset($_POST['selectMonth'])){  $_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear'];  }
		//-----------------------------------------------------------------------------------------------------------------------------
		
		if($_POST['action']=='add'){
			$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "INSERT INTO `tbl_rubber_bidding` (`id` ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` ) "
			." VALUES "
			."('', '".$_POST['dateAdd']."', '".$_POST['price']."', '".$_POST['offermonth']."', '".$_POST['offeryear']."', '".$_POST['remark']."')";
			
			mysql_query($query);
	 		$dataDateInput = $_POST['dateAdd'];
			 $selectmonth =  $_POST['smonth'];
			 $selectyear = $_POST['syear'];
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		if($_POST['action']=='Delete'){		
			  $query = "DELETE FROM  tbl_rubber_bidding WHERE    id = '".$_POST['IDS']."' ";
			  mysql_query($query);
		}
		//-----------------------------------------------------------------------------------------------------------------------------		
		if($_POST['action']=='edit'){ 
			$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "UPDATE  `tbl_rubber_bidding` SET  `datex`='".$_POST['dateAdd']."' ,`price`= '".$_POST['price']."' ,`offermonth` ='".$_POST['offermonth']."',`offeryear` ='".$_POST['offermonth']."',`remark`='".$_POST['remark']."' WHERE   id = '".$_POST['IDS']."' ";
			mysql_query($query);	
			$_POST['IDS']="";
			
		}
		//-----------------------------------------------------------------------------------------------------------------------------
		if($_POST['selectMonth']=="selectMonth"){  
				$_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear']; 
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		$currMonth = date("m",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));
		$currYear = date("Y",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
		if($_POST['selectMonth']){
			 $rangeMonth= $_POST['selectMonth']-$currMonth;
		}
		if($_POST['selectyear']){
			 $rangeYear= $_POST['selectyear']-$currYear;			
		}
		$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
				$dateArray = explode("-",$today);
				$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
				$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		//-----------------------------------------------------------------------------------------------------------------------------		
		
		$query="SELECT * FROM `tbl_rubber_bidding`    WHERE (datex  BETWEEN  '$StartDate'  AND  '$StopDate' )  ORDER BY  datex ";
		$result =mysql_query($query);
	
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($_POST['action']=="selectData"){
		$query = "SELECT * FROM   `tbl_rubber_bidding`   WHERE id = '".$_POST['IDS']."' ";
		$resultSelect=mysql_query($query);
		$selectSelect= mysql_fetch_assoc($resultSelect);
		 $today = $selectSelect['datex'];
		$monthOffer = $selectSelect['offermonth'];
		$yearOffer = $selectSelect['offeryear'];		
		$Offer = $selectSelect['remark'];		
		$xprice = $selectSelect['price'];		
		$openData=1;		
		
	}
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($today){
			$arrayDateInput = explode("-",$today);
		}else if($dataDateInput =='' ){
			$arrayDateInput[2]  = date("d");
			$arrayDateInput[1]  = date("m");	
			$arrayDateInput[0]  = date("Y");						
		}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style1 {color: #FFFFFF;
	font-weight: bold;
}
</style>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ราคารับซื้อยาง
<input name="action" type="hidden" id="action" />
            <input type="hidden" name="IDS" value="<?php echo $_POST['IDS']?>" />
            <input type="hidden" name="selectMonth" />
    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="txt10-black">
      <tr>
        <td width="22%">วันที่</td>
        <td width="78%">วัน
          <select name="sdate">
            <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
            <option value="<?php echo $value;?>" <?php if($arrayDateInput[2]==$i) echo "selected";?>><?php echo $i?></option>
            <?php }?>
          </select>
          เดือน
          <select name="smonth">
            <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
            <option value="<?php echo $key;?>" <?php if($arrayDateInput[1]==$key) echo "selected";?>><?php echo $val?></option>
            <?php } ?>
          </select>
          ปี
          <select name="syear">
            <?php for($i=0;$i<30;$i++){ 
				  				$stable=2000;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($arrayDateInput[0]==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select></td>
      </tr>
      <tr>
        <td>ราคา</td>
        <td><input name="price" type="text" id="price" size="10" maxlength="10" value="<?php echo $xprice;?>" /></td>
      </tr>
      <tr>
        <td>เดือนส่งมอบ</td>
        <td><select name="offermonth" id="offermonth">
          <?php  reset($monthnames2);	while (list($key, $val) = each($monthnames2)) {  ?>
          <option value="<?php echo $key;?>" <?php if($monthOffer==$key) echo "selected";?>><?php echo $val?></option>
          <?php } ?>
        </select>
          <select name="offeryear" id="offeryear">
            <?php for($i=0;$i<10;$i++){ 
				  				$stable=2007;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($yearOffer==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select></td>
      </tr>
      <tr>
        <td>เสนอโดย</td>
        <td><input name="remark" type="text" id="remark" size="30" maxlength="100" value="<?php echo $Offer;?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><span class="style1">
          <input type="hidden" name="action2" />
          <input type="hidden" name="totalFiled"  value="<?php echo $n?>"/>
          <?php if($openData==1){?>
          <input type="button" name="Button2" value=" แก้ไข " onclick="document.form1.selectMonth.value='selectMonth';document.form1.action.value='edit';form1.submit();" />
          <?php }else if($openData==""){?>
          <input type="button" name="Button" value=" ตกลง " onclick="document.form1.action.value='add';form1.submit();" />
          <?php }?>
        </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
      <tr>
        <td rowspan="2">&nbsp;</td>
        <td colspan="3" align="center" bgcolor="#E4E4CB"><select name="ChMonth" >
          <?php  reset($monthnames2);	while (list($key, $val) = each($monthnames2)) {  ?>
          <option value="<?php echo $key;?>" <?php if($arrayDateInput[1]==$key) echo "selected";?>><?php echo $val?></option>
          <?php } ?>
        </select>
          <?php //echo $monthnames2[$currMonth]?>
          <select name="ChYear">
            <?php for($i=0;$i<30;$i++){ 
				  				$stable=2000;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($arrayDateInput[0]==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select>
          <input type="submit" name="Submit" value="เลือกเดือน"   onclick="document.form1.selectMonth.value='selectMonth';document.form1.submit();"/>
	&nbsp;&nbsp;<button type="button"   onclick=" window.open('exportRecievePrice.php?day=<?php echo $StartDate."_".$StopDate?>','_blank');">
                	ส่งออกข้อมูล
                </button>
</td>
        <td colspan="2" rowspan="2">&nbsp;</td>
      </tr>
      <tr class="txt10-black">
        <td width="12%" align="center" bgcolor="#E4E4CB">วันที่</td>
        <td width="27%" align="center" bgcolor="#E4E4CB">ราคา</td>
        <td width="46%" align="center" bgcolor="#E4E4CB">เดือนส่งมอบ</td>
      </tr>
      <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
      <tr>
        <td width="2%" align="center"><img src="images/black_icon/16x16/info.png" width="16" height="16" align="absmiddle" /></td>
        <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo substr($data['datex'],8,2)?></td>
        <td bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo $data['price'];?></td>
        <td bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo $monthnames2[$data['offermonth']]?> <?php echo $data['offeryear']+543;?> (<?php echo $data['remark'];?>)</td>
        <td width="6%" align="center" bgcolor="#FBFFE6"><a href="#" onclick="document.form1.selectMonth.value='selectMonth';document.form1.action.value='selectData';form1.IDS.value='<?php echo $data['id']?>';form1.submit(); ">แก้ไข</a></td>
        <td width="7%" align="center" bgcolor="#FFE4CA"><a href="#" onclick="if(confirm('ต้องการลบหัวข้อนี้')){ document.form1.selectMonth.value='selectMonth';document.form1.action.value='Delete'; form1.IDS.value='<?php echo $data['id']?>';document.form1.submit();} else {  return false; }">ลบ</a></td>
      </tr>
      <tr>
        <td colspan="6" height="1" bgcolor="#C4C4C4"></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="6">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>