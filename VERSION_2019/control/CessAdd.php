<?php 
 		$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		//-----------------------------------------------------------------------------------------------------------------------------
			if(isset($_POST['selectMonth'])){  $_POST['selectMonth']=  $_POST['ChMonth'];  $_POST['selectyear']=  $_POST['ChYear'];  }
		//-----------------------------------------------------------------------------------------------------------------------------
		if($_POST['action']=='add'){
		$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "INSERT INTO `tbl_rubber_cess`  "
			." (`id` ,`1_15_price` ,`1_15_cess` ,`16_31_price` ,`16_31_cess` ,`date_update` ,`cess_month` ,`cess_year` "
			
			."  ,`115pmark` ,`115cmark` ,`1631pmark` ,`1631pcess`   )"
			." VALUES "
			." ('' , '$a', '$b', '$c', '$d', '$dateAdd', '$smonth', '$syear'  "
			." , '$m1' ,'$m2' ,'$m3' ,'$m4')  ";
			mysql_query($query);
			
		
			$dataDateInput = $_POST['dateAdd'];
			 $selectmonth =  $_POST['smonth'];
			 $selectyear = $_POST['syear'];
		}
		//-----------------------------------------------------------------------------------------------------------------------------	
		if($_POST['action']=='Delete'){		
			  $query = "DELETE FROM  tbl_rubber_cess WHERE    id = '".$_POST['IDS']."' ";
			  mysql_query($query);
		}
		//-----------------------------------------------------------------------------------------------------------------------------		
		if($_POST['action']=='edit'){ 
			$_POST['dateAdd'] =  $_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
			$query = "UPDATE  `tbl_rubber_cess` SET   "
			." 1_15_price ='$a' ,1_15_cess ='$b' ,16_31_price = '$c' ,16_31_cess='$d' ,date_update ='$dateAdd' "
			."  ,`cess_month`  = '$smonth'  ,`cess_year` = '$syear' "
			."  ,`115pmark` = '$m1'  ,`115cmark` = '$m2' ,`1631pmark`= '$m3'  ,`1631pcess`= '$m4'   "
			." WHERE   id = '".$_POST['IDS']."' ";
			//echo $query;
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
		
			$CessYear  =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));	
		//-----------------------------------------------------------------------------------------------------------------------------		
		
		$query="SELECT * FROM `tbl_rubber_cess`    WHERE cess_year  = '$CessYear'  ORDER BY  cess_month  ";
		$result =mysql_query($query);
	    //echo "<br>".$query;
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($_POST['action']=="selectData"){
		$query = "SELECT * FROM   `tbl_rubber_cess`   WHERE id = '".$_POST['IDS']."' ";
		$resultSelect=mysql_query($query);
		$selectSelect= mysql_fetch_assoc($resultSelect);
		$today = $selectSelect['cess_year']."-".$selectSelect['cess_month'];
		$today2 = $selectSelect['date_update'];
		$openData=1;		
		
	}
	//echo $today2;
		//-----------------------------------------------------------------------------------------------------------------------------		
	if($today ){
			$arrayDateInput = explode("-",$today);
			$arrayDateInput2= explode("-",$today2);			
		}else if($dataDateInput =='' ){
			$arrayDateInput[2]  = date("d");
			$arrayDateInput[1]  = date("m");	
			$arrayDateInput[0]  = date("Y");	
			$arrayDateInput2[2]  = date("d");
			$arrayDateInput2[1]  = date("m");	
			$arrayDateInput2[0]  = date("Y");						
					
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
    <td width="96%" bgcolor="#D9D9B3">CESS
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
        <td align="center" bgcolor="#E9E9E9"><span class="txt10-black"><strong>เดือน</strong></span></td>
        <td colspan="2" bgcolor="#E9E9E9"><span class="txt10-black"><strong> เดือน
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
        <td rowspan="2" align="center" bgcolor="#CCCCCC"><span class="txt10-black"><strong>1-15</strong></span></td>
        <td width="12%" height="25" align="center" bgcolor="#CCCCCC"><span class="txt10-black"><strong>ราคา</strong></span></td>
        <td width="67%" bgcolor="#CCCCCC"><span class="txt10-black">
          <input name="a" type="text"  value="<?php echo $selectSelect['1_15_price']?>" size="10" maxlength="15" />
          หมายเหตุ
          <input name="m1" type="text" id="m1"  value="<?php echo $selectSelect['115pmark']?>" size="5" maxlength="5"/>
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#D7D7D7"><span class="txt10-black"><strong>Cess</strong></span></td>
        <td bgcolor="#D7D7D7"><span class="txt10-black">
          <input name="b" type="text" value="<?php echo $selectSelect['1_15_cess']?>" size="10" maxlength="15" />
          หมายเหตุ
          <input name="m2" type="text" id="m2" value="<?php echo $selectSelect['115cmark']?>" size="5" maxlength="5" />
        </span></td>
      </tr>
      <tr>
        <td rowspan="2" align="center" bgcolor="#F4F4F4"><span class="txt10-black"><strong>16-31</strong></span></td>
        <td height="25" align="center" bgcolor="#F4F4F4"><span class="txt10-black"><strong>ราคา</strong></span></td>
        <td bgcolor="#F4F4F4"><span class="txt10-black">
          <input name="c" type="text"  value="<?php echo $selectSelect['16_31_price']?>" size="10" maxlength="15" />
          หมายเหตุ
          <input name="m3" type="text" id="m3" value="<?php echo $selectSelect['1631pmark']?>" size="5" maxlength="5" />
        </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#E9E9E9"><span class="txt10-black"><strong>Cess</strong></span></td>
        <td bgcolor="#E9E9E9"><span class="txt10-black">
          <input name="d" type="text" value="<?php echo $selectSelect['16_31_cess']?>" size="10" maxlength="15" />
          หมายเหตุ
          <input name="m4" type="text" id="m4" value="<?php echo $selectSelect['1631pcess']?>" size="5" maxlength="5" />
        </span></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#CCCCCC"><span class="txt10-black">วันแก้ไข</span></td>
        <td colspan="2" bgcolor="#CCCCCC"><span class="txt10-black"><strong>
          <select name="sdate2">
            <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
            <option value="<?php echo $value;?>" <?php if($arrayDateInput2[2]==$i) echo "selected";?>><?php echo $i?></option>
            <?php }?>
          </select>
          เดือน
          <select name="smonth2">
            <?php  reset($monthnames2);	while (list($key, $val) = each($monthnames2)) {  ?>
            <option value="<?php echo $key;?>" <?php if($arrayDateInput2[1]==$key) echo "selected";?>><?php echo $val?></option>
            <?php } ?>
          </select>
          ปี
          <select name="syear2">
            <?php for($i=0;$i<30;$i++){ 
				  				$stable=2000;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($arrayDateInput2[0]==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select>
        </strong></span></td>
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
        <td colspan="5" align="center" bgcolor="#E4E4CB"><?php //echo $monthnames2[$currMonth]?>
          <select name="ChYear">
            <?php for($i=0;$i<30;$i++){ 
				  				$stable=2000;
				  ?>
            <option value="<?php echo $stable+$i;?>" <?php if($arrayDateInput[0]==($stable+$i))  echo "selected";?>><?php echo $stable+$i+543;?></option>
            <?php }?>
          </select>
          <input type="submit" name="Submit" value="เลือกปี"   onclick="form1.selectMonth.value='selectMonth';form1.submit();"/>
&nbsp;&nbsp;<button type="button"   onclick=" window.open('exportCessAdd.php?CessYear=<?php echo $CessYear;?>','_blank');">
                	ส่งออกข้อมูล
                </button>
</td>
        <td colspan="2" rowspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" rowspan="2" align="center" bgcolor="#E4E4CB">เดือน</td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>1-15</strong></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>16-31</strong></td>
      </tr>
      <tr class="txt10-black">
        <td width="15%" align="center" bgcolor="#D7D7D7" class="txt10-black"><strong>ราคา</strong></td>
        <td width="18%" align="center" bgcolor="#E9E9E9" class="txt10-black"><strong>Cess</strong></td>
        <td width="19%" align="center" bgcolor="#D7D7D7" class="txt10-black"><strong>ราคา</strong></td>
        <td width="19%" align="center" bgcolor="#E9E9E9"><strong>Cess</strong></td>
      </tr>
      <?php while($data=mysql_fetch_assoc($result)){ 
		  				//   ,`datex` ,`price` ,`offermonth` ,`offeryear` ,`remark` 
		  ?>
      <tr>
        <td width="2%" align="center"><img src="images/black_icon/16x16/info.png" width="16" height="16" align="absmiddle" /></td>
        <td align="center" bgcolor="#EBEBD8" class="txt10-black">&nbsp;<?php echo $monthnames2[$data['cess_month']]?></td>
        <td align="center" bgcolor="#D7D7D7" class="txt10-black">&nbsp;<?php echo $data['1_15_price']?><?php echo $data['115pmark']?></td>
        <td align="center" bgcolor="#E9E9E9" class="txt10-black">&nbsp;<?php echo $data['1_15_cess']?><?php echo $data['115cmark']?></td>
        <td align="center" bgcolor="#D7D7D7" class="txt10-black">&nbsp;<?php echo $data['16_31_price']?><?php echo $data['1631pmark']?></td>
        <td align="center" bgcolor="#E9E9E9" class="txt10-black">&nbsp;<?php echo $data['16_31_cess']?><?php echo $data['1631pcess']?></td>
        <td width="7%" align="center" bgcolor="#E4E4CB"><a href="#" onclick="form1.selectMonth.value='selectMonth';form1.action.value='selectData';form1.IDS.value='<?php echo $data['id']?>';form1.submit(); ">แก้ไข</a></td>
        <td width="4%" align="center" bgcolor="#FFE4CA"><a href="#" onclick="if(confirm('ต้องการลบหัวข้อนี้')){ form1.selectMonth.value='selectMonth';form1.action.value='Delete'; form1.IDS.value='<?php echo $data['id']?>';form1.submit();} else {  return false; }">ลบ</a></td>
      </tr>
      <tr>
        <td colspan="8" height="1" bgcolor="#C4C4C4"></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="8">&nbsp;</td>
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