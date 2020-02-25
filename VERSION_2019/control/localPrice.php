<?php 
 	$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################
		//-----------------------------------------------------------------------------------------------------------------------------
		if(isset($_POST['selectMonth'])){  $_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear'];  }
		//-----------------------------------------------------------------------------------------------------------------------------
		if($_POST['action']=='add'){
			$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "INSERT INTO `tbl_rubber_price`  "
			."(`id` ,`p1` ,`p2` ,`p3` ,`p4` ,`p5` ,`p6` ,`p7` ,`p8` ,`p9` ,`p10` ,`date_update` ) "
			." VALUES "
			." ('' , '".$_POST['p1']."', '".$_POST['p2']."', '".$_POST['p3']."', '".$_POST['p4']."', '".$_POST['p5']."', '".$_POST['p6']."', '".$_POST['p7']."', '".$_POST['p8']."', '".$_POST['p9']."', '".$_POST['p10']."', '".$_POST['dateAdd']."')";
			mysql_query($query);
			//echo $query;
			$_POST['dataDateInput'] = $_POST['dateAdd'];
			$_POST['selectMonth'] =  $_POST['smonth'];
			$_POST['selectyear'] = $_POST['syear'];
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		if($_POST['action']=='Delete'){		
			  $query = "DELETE FROM  tbl_rubber_price WHERE    id = '".$_POST['IDS']."' ";
			  mysql_query($query);
		}
		//-----------------------------------------------------------------------------------------------------------------------------		
		if($_POST['action']=='edit'){ 
				$dateAdd =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "UPDATE  `tbl_rubber_price` SET   "
			." `p1` = '".$_POST['p1']."' ,`p2` = '".$_POST['p2']."' ,`p3`= '".$_POST['p3']."' ,`p4`= '".$_POST['p4']."' ,`p5`= '".$_POST['p5']."' ,`p6`= '".$_POST['p6']."' ,`p7` = '".$_POST['p7']."' ,`p8`= '".$_POST['p8']."' ,`p9`= '".$_POST['p9']."' ,`p10`= '".$_POST['p10']."',`date_update`='$dateAdd'  "
			." WHERE   id = '".$_POST['IDS']."' ";
			mysql_query($query);	
			//echo $query;
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
		
		$query="SELECT * FROM `tbl_rubber_price`    WHERE (date_update   BETWEEN  '$StartDate'  AND  '$StopDate' )  ORDER BY  date_update  ";
		//echo $query;
		$result =mysql_query($query);
	
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($_POST['action']=="selectData"){
		$query = "SELECT * FROM   `tbl_rubber_price`   WHERE id = '".$_POST['IDS']."' ";
		$resultSelect=mysql_query($query);
		$selectSelect= mysql_fetch_assoc($resultSelect);
		$today = $selectSelect['date_update'];
		$openData=1;		
		
	}
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($today ){
			$arrayDateInput = explode("-",$today);
		}else if($dataDateInput =='' ){
			$arrayDateInput[2]  = date("d");
			$arrayDateInput[1]  = date("m");	
			$arrayDateInput[0]  = date("Y");						
		}	
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <td width="96%" bgcolor="#D9D9B3">ราคายางในตลาดท้องถิ่น
  			 <input name="action" type="hidden" id="action" />
            <input type="hidden" name="IDS" value="<?php echo $_POST['IDS']?>" />
            <input type="hidden" name="selectMonth" />
    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
      <tr>
        <td width="21%">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#E9E9E9"><span class="txt10-black"><strong>วันที่</strong></span></td>
        <td colspan="2" bgcolor="#E9E9E9"><span class="txt10-black"><strong>วัน
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
          </select>
        </strong></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="7" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>ยางแผ่นดิบ</strong></span></td>
        <td width="18%" height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>หาดใหญ่</strong></span></td>
        <td width="61%" bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p1" type="text" id="p1" size="10" maxlength="6" value="<?php echo $selectSelect['p1'];?>" />
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>คลองแงะ</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p2" type="text" id="p2" size="10" maxlength="6" value="<?php echo $selectSelect['p2'];?>"/>
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>ตรัง</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p3" type="text" id="p3" size="10" maxlength="6" value="<?php echo $selectSelect['p3'];?>" />
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>ภูเก็ต</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p4" type="text" id="p4" size="10" maxlength="6" value="<?php echo $selectSelect['p4'];?>"/>
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>สุราษฎร์ธานี</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p5" type="text" id="p5" size="10" maxlength="6"  value="<?php echo $selectSelect['p5'];?>"/>
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>ระยอง</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p6" type="text" id="p6" size="10" maxlength="6" value="<?php echo $selectSelect['p6'];?>" />
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>อุบลราชธานี</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="p7" type="text" id="p7" size="10" maxlength="6" value="<?php echo $selectSelect['p7'];?>" />
        </span></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#F4F4F4"><span class="txt10-black"><strong>ยางลูกขุน</strong></span></td>
        <td height="25" align="center" bgcolor="#F4F4F4">&nbsp;</td>
        <td bgcolor="#F4F4F4"><span class="txt10-black">
          <input name="p8" type="text" id="p8" size="10" maxlength="6" value="<?php echo $selectSelect['p8'];?>" />
        </span></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#CCCCCC"><span class="txt10-black"><strong>ขี้ยางก้นถ้วย</strong></span></td>
        <td height="25" align="center" bgcolor="#CCCCCC">&nbsp;</td>
        <td bgcolor="#CCCCCC"><span class="txt10-black">
          <input name="p9" type="text" id="p9" size="10" maxlength="6" value="<?php echo $selectSelect['p9'];?>" />
        </span></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#F4F4F4"><span class="txt10-black"><strong>น้ำยาง</strong></span></td>
        <td height="25" align="center" bgcolor="#F4F4F4">&nbsp;</td>
        <td bgcolor="#F4F4F4"><span class="txt10-black">
          <input name="p10" type="text" id="p10" size="10" maxlength="6" value="<?php echo $selectSelect['p10'];?>" />
        </span></td>
      </tr>
      <tr>
        <td height="5" align="center"></td>
        <td height="5" colspan="2"></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2">
          <span class="txt10-black">
          <input type="hidden" name="action2" />
          <input type="hidden" name="totalFiled"  value="<?php echo $n?>"/>
          <?php if($openData==1){?>
          <input type="button" name="Button2" value=" แก้ไข " onclick="document.form1.selectMonth.value='selectMonth';document.form1.action.value='edit';form1.submit();" />
          <?php }else if($openData==""){?>
          <input type="button" name="Button" value=" ตกลง " onclick="document.form1.action.value='add';document.form1.submit();" />          
          <?php }?>        
          </span></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="txt10-black">	</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="txt10-black">
      <tr>
        <td rowspan="3">&nbsp;</td>
        <td colspan="11" align="center" bgcolor="#E4E4CB" class="txt10-black"><select name="ChMonth" >
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
          <input type="submit" name="Submit" value="เลือกเดือน"   onclick="form1.selectMonth.value='selectMonth';form1.submit();"/>&nbsp;&nbsp;<button type="button"   onclick=" window.open('exportlocalprice.php?day=<?php echo $StartDate."_".$StopDate?>','_blank');">
                	ส่งออกข้อมูล
                </button></td>
        <td colspan="2" rowspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td width="4%" rowspan="2" align="center" bgcolor="#E4E4CB">วันที่</td>
        <td colspan="7" align="center" bgcolor="#CCCCCC"><strong>ยางแผ่นดิบ</strong></td>
        <td width="10%" rowspan="2" align="center" bgcolor="#E9E9E9"><strong>ยางลูกขุน</strong></td>
        <td width="11%" rowspan="2" align="center" bgcolor="#CCCCCC"><strong>ขี้ยางก้นถ้วย</strong></td>
        <td width="7%" rowspan="2" align="center" bgcolor="#E9E9E9"><strong>น้ำยาง</strong></td>
      </tr>
      <tr>
        <td width="7%" align="center" bgcolor="#CCCCCC"><strong>หาดใหญ่</strong></td>
        <td width="9%" align="center" bgcolor="#CCCCCC"><strong>คลองแงะ</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC"><strong>ตรัง</strong></td>
        <td width="8%" align="center" bgcolor="#CCCCCC"><strong>ภูเก็ต</strong></td>
        <td width="10%" align="center" bgcolor="#CCCCCC"><strong>สุราษฎร์ธานี</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC"><strong>ระยอง</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>อุบลราชธานี</strong></td>
      </tr>
      <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
      <tr>
        <td width="2%" align="center"><img src="images/black_icon/16x16/info.png" alt="" width="16" height="16" align="absmiddle" /></td>
        <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo substr($data['date_update'],8,2)?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p1'];?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p2'];?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p3'];?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p4'];?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p5'];?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p6'];?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['p7'];?></td>
        <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['p8'];?></td>
        <td align="center" bgcolor="#D7D7D7" class="txt10-black"><?php echo $data['p9'];?></td>
        <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['p10'];?></td>
        <td width="5%" align="center" bgcolor="#E4E4CB" class="txt10-black"><a href="#" onclick="form1.selectMonth.value='selectMonth';form1.action.value='selectData';form1.IDS.value='<?php echo $data['id']?>';form1.submit(); ">แก้ไข</a></td>
        <td width="3%" align="center" bgcolor="#FFE4CA" class="txt10-black"><a href="#" onclick="if(confirm('ต้องการลบหัวข้อนี้')){ form1.selectMonth.value='selectMonth';form1.action.value='Delete'; form1.IDS.value='<?php echo $data['id']?>';form1.submit();} else {  return false; }">ลบ</a></td>
      </tr>
      <tr>
        <td colspan="14" height="1" bgcolor="#C4C4C4"></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="14">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>