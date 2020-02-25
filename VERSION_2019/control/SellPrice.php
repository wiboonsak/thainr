<?php 
$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	####################################################
			//-----------------------------------------------------------------------------------------------------------------------------
		if(isset($_POST['selectMonth'])){  $_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear'];  }
		//-----------------------------------------------------------------------------------------------------------------------------
		if($_POST['action']=='add'){
			$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "INSERT INTO  `tbl_rubber_offer`  "
			." (`id` ,`cake_rubber_01` ,`cake_rubber_02` ,`STR_20_01` ,`STR_20_02` ,`STR_5L_01` ,`STR_5L_02` ,`liquid_01` ,`liquid_02` ,`date_update` ) "
			." VALUES  "
			." ('' , '".$_POST['cake_rubber_01']."', '".$_POST['cake_rubber_02']."', '".$_POST['STR_20_01']."', '".$_POST['STR_20_02']."', '".$_POST['STR_5L_01']."', '".$_POST['STR_5L_02']."', '".$_POST['liquid_01']."', '".$_POST['liquid_02']."', '".$_POST['dateAdd']."') ";
			mysql_query($query);
			$dataDateInput = $_POST['dateAdd'];
			 $selectmonth =  $_POST['smonth'];
			 $selectyear = $_POST['syear'];
			// echo $query;
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		if($_POST['action']=='Delete'){		
			  $query = "DELETE FROM  tbl_rubber_offer WHERE    id = '".$_POST['IDS']."' ";
			  mysql_query($query);
		}
		//-----------------------------------------------------------------------------------------------------------------------------		
		if($_POST['action']=='edit'){ 
			$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "UPDATE  `tbl_rubber_offer` SET   "
			."  `cake_rubber_01` = '".$_POST['cake_rubber_01']."' ,`cake_rubber_02` = '".$_POST['cake_rubber_02']."' ,`STR_20_01`= '".$_POST['STR_20_01']."'   ,`STR_20_02`= '".$_POST['STR_20_02']."'  "
			."  ,`STR_5L_01` = '".$_POST['STR_5L_01']."'  ,`STR_5L_02`=  '".$_POST['STR_5L_02']."' ,`liquid_01`= '".$_POST['liquid_01']."'   ,`liquid_02` = '".$_POST['liquid_02']."' ,`date_update`= '".$_POST['dateAdd']."' "
			." WHERE   id = '".$_POST['IDS']."' ";
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
		
		$query="SELECT * FROM `tbl_rubber_offer`    WHERE (date_update   BETWEEN  '$StartDate'  AND  '$StopDate' )   ORDER BY  date_update  ";
		$result =mysql_query($query);
	
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($_POST['action']=="selectData"){
		$query = "SELECT * FROM   `tbl_rubber_offer`   WHERE id = '".$_POST['IDS']."' ";
		$resultSelect=mysql_query($query);
		$selectSelect= mysql_fetch_assoc($resultSelect);
		$today = $selectSelect['date_update'];
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
    <td width="96%" bgcolor="#D9D9B3">ราคาเสนอขายยางพารา
<input name="action" type="hidden" id="action" />
            <input type="hidden" name="IDS" value="<?php echo $_POST['IDS']?>" />
            <input type="hidden" name="selectMonth" />
    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="txt10-black">
      <tr>
        <td width="21%">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#E9E9E9"><strong>วันที่</strong></td>
        <td colspan="2" bgcolor="#E9E9E9"><strong>วัน
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
        </strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="2" align="center" bgcolor="#CCCCCC"><strong>ยางก้อน</strong></td>
        <td width="12%" height="25" align="center" bgcolor="#CCCCCC"><strong>กทม.</strong></td>
        <td width="67%" bgcolor="#CCCCCC"><input name="cake_rubber_01" type="text" id="cake_rubber_01" value="<?php echo $selectSelect['cake_rubber_01']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><strong>สข./ภก.</strong></td>
        <td bgcolor="#D7D7D7"><input name="cake_rubber_02" type="text" id="cake_rubber_02" value="<?php echo $selectSelect['cake_rubber_02']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td rowspan="2" align="center" bgcolor="#F4F4F4"><strong>ยางแท่ง<br />
          STR 20</strong></td>
        <td height="25" align="center" bgcolor="#F4F4F4"><strong>กทม.</strong></td>
        <td bgcolor="#F4F4F4"><input name="STR_20_01" type="text" id="STR_20_01" value="<?php echo $selectSelect['STR_20_01']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#E9E9E9"><strong>สข./ภก.</strong></td>
        <td bgcolor="#E9E9E9"><input name="STR_20_02" type="text" id="STR_20_02" value="<?php echo $selectSelect['STR_20_02']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td rowspan="2" align="center" bgcolor="#CCCCCC"><strong>ยางแท่ง<br />
          STR 5L</strong></td>
        <td height="25" align="center" bgcolor="#CCCCCC"><strong>กทม.</strong></td>
        <td bgcolor="#CCCCCC"><input name="STR_5L_01" type="text" id="STR_5L_01" value="<?php echo $selectSelect['STR_5L_01']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><strong>สข./ภก.</strong></td>
        <td bgcolor="#D7D7D7"><input name="STR_5L_02" type="text" id="STR_5L_02" value="<?php echo $selectSelect['STR_5L_02']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td rowspan="2" align="center" bgcolor="#F4F4F4"><strong>น้ำยางข้น</strong></td>
        <td height="25" align="center" bgcolor="#F4F4F4"><strong>กทม.</strong></td>
        <td bgcolor="#F4F4F4"><input name="liquid_01" type="text" id="liquid_01" value="<?php echo $selectSelect['liquid_01']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#E9E9E9"><strong>สข./ภก.</strong></td>
        <td bgcolor="#E9E9E9"><input name="liquid_02" type="text" id="liquid_02" value="<?php echo $selectSelect['liquid_02']?>" size="10" maxlength="6" /></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#CCCCCC">&nbsp;</td>
        <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td height="5" align="center"></td>
        <td height="5" colspan="2"></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td colspan="2"><span class="style1">
          <input type="hidden" name="action2" />
          <input type="hidden" name="totalFiled"  value="<?php echo $n?>"/>
          <?php if($openData==1){?>
          <input type="button" name="Button2" value=" แก้ไข " onclick="form1.selectMonth.value='selectMonth';form1.action.value='edit';form1.submit();" />
          <?php }else if($openData==""){?>
          <input type="button" name="Button" value=" ตกลง " onclick="form1.action.value='add';form1.submit();" />
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
    <td colspan="2" class="txt10-black"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="cat_desc">
      <tr>
        <td rowspan="3">&nbsp;</td>
        <td colspan="9" align="center" bgcolor="#E4E4CB"><select name="ChMonth" >
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
          <input type="submit" name="Submit" value="เลือกเดือน"   onclick="form1.selectMonth.value='selectMonth';form1.submit();"/>
&nbsp;&nbsp;<button type="button"   onclick=" window.open('exportlsellprice.php?day=<?php echo $StartDate."_".$StopDate?>','_blank');">
                	ส่งออกข้อมูล
                </button>
</td>
        <td colspan="2" rowspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td width="8%" rowspan="2" align="center" bgcolor="#E4E4CB">วันที่</td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>ยางก้อน</strong></td>
        <td colspan="2" align="center" bgcolor="#E9E9E9"><strong>ยางแท่ง
          STR 20</strong></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>ยางแท่ง
          STR 5L</strong></td>
        <td colspan="2" align="center" bgcolor="#E9E9E9"><strong>น้ำยางข้น</strong></td>
      </tr>
      <tr>
        <td width="10%" align="center" bgcolor="#D7D7D7"><strong>กทม.</strong></td>
        <td width="10%" align="center" bgcolor="#CCCCCC"><strong>สข./ภก.</strong></td>
        <td width="9%" align="center" bgcolor="#E9E9E9"><strong>กทม.</strong></td>
        <td width="11%" align="center" bgcolor="#F4F4F4"><strong>สข./ภก.</strong></td>
        <td width="11%" align="center" bgcolor="#D7D7D7"><strong>กทม.</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>สข./ภก.</strong></td>
        <td width="8%" align="center" bgcolor="#E9E9E9"><strong>กทม.</strong></td>
        <td width="11%" align="center" bgcolor="#F4F4F4"><strong>สข./ภก.</strong></td>
      </tr>
      <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
      <tr>
        <td width="2%" align="center"><img src="images/black_icon/16x16/info.png" alt="" width="16" height="16" align="absmiddle" /></td>
        <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo substr($data['date_update'],8,2)?></td>
        <td align="center" bgcolor="#D7D7D7" class="txt10-black">&nbsp;&nbsp;<?php echo $data['cake_rubber_01']?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['cake_rubber_02']?></td>
        <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['STR_20_01']?></td>
        <td align="center" bgcolor="#F4F4F4" class="txt10-black"><?php echo $data['STR_20_02']?></td>
        <td align="center" bgcolor="#D7D7D7" class="txt10-black"><?php echo $data['STR_5L_01']?></td>
        <td align="center" bgcolor="#CCCCCC" class="txt10-black"><?php echo $data['STR_5L_02']?></td>
        <td align="center" bgcolor="#E9E9E9" class="txt10-black"><?php echo $data['liquid_01']?></td>
        <td align="center" bgcolor="#F4F4F4" class="txt10-black"><?php echo $data['liquid_02']?></td>
        <td width="6%" align="center" bgcolor="#E4E4CB"><a href="#" onclick="form1.selectMonth.value='selectMonth';form1.action.value='selectData';form1.IDS.value='<?php echo $data['id']?>';form1.submit(); ">แก้ไข</a></td>
        <td width="3%" align="center" bgcolor="#FFE4CA"><a href="#" onclick="if(confirm('ต้องการลบหัวข้อนี้')){ form1.selectMonth.value='selectMonth';form1.action.value='Delete'; form1.IDS.value='<?php echo $data['id']?>';form1.submit();} else {  return false; }">ลบ</a></td>
      </tr>
      <tr>
        <td colspan="12" height="1" bgcolor="#C4C4C4"></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="12">&nbsp;</td>
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