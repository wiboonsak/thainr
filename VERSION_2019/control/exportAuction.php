<?php  //sdate2 smonth2 syear2 
   		if($_POST['sdate2']==""){ $day2="01"; }else{ $day2=$_POST['sdate2']; }
		if ($_POST['smonth2']==""){ $smonth2 = date("n");} else{ $smonth2 =$_POST['smonth2']; }
		if ($_POST['syear2']==""){ $year2 = date("Y"); } else { $year2 =$_POST['syear2']; }
		
		$number = cal_days_in_month(CAL_GREGORIAN, $smonth2 , $year2);
		if($number>10){ $number="0".$number; }
		
   		if($_POST['sdate']==""){ $day=$number; }else{ $day=$_POST['sdate']; }
		if ($_POST['smonth']==""){ $smonth = date("n");} else{ $smonth =$_POST['smonth']; }
		if ($_POST['syear']==""){ $year = date("Y"); } else { $year =$_POST['syear']; }		
		$currentYear=date("Y");	
		//echo " day2 ".$day2." |  month2 : ".$smonth2."  | year2 :".$year2;
		//echo "<hr>";
		//echo $month2."  ".$year2."<br>";
		
		if($_POST['action']=='Search'){
			$startDate=$_POST['syear2']."-".$_POST['smonth2']."-".$_POST['sdate2'];
			$EndDate=$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];			
						  ///-------------select data-------------------
	  $query="SELECT *     FROM tbl_central_market_price   WHERE  date_data >='".$startDate."'  AND   date_data <='".$EndDate."'   ORDER BY  date_data ASC ";
	// echo  "<br>".$query;
	  $result=mysql_query($query);
			}

	####################################################

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
    <td width="96%" bgcolor="#D9D9B3">ส่งออกข้อมูล Exel</td>
  </tr>
  
  <tr>
    <td colspan="2" class="txt10-black"><table width="100%" border="0" class="txt10-black">
      <tbody>
        <tr>
          <td width="11%" align="right">วันเริ่มต้น</td>
          <td><select name="sdate2">
            <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
            <option value="<?php echo $value;?>" <?php if($day2==$i) echo "selected";?>><?php echo $i?></option>
            <?php }?>
            </select>
            <select name="smonth2">
              <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
              <option value="<?php echo $key;?>" <?php if($smonth2==$key) echo "selected";?>><?php echo $val?></option>
              <?php } ?>
              </select>
            <select name="syear2">
              <?php for($i=-3;$i<4;$i++){ 
				  				$stable=$currentYear-1;
				  ?>
              <option value="<?php echo $stable+$i;?>" <?php if($year2==($stable+$i))  echo "selected";?>><?php echo $stable+$i+$Range543;?></option>
              <?php }?>
              </select> &nbsp;&nbsp;&nbsp; วันสิ้นสุด
            <select name="sdate">
              <?php for($i=1;$i < 32 ;$i ++){ 
									if($i <10) { $value = "0".$i; }else{ $value=$i;}
					?>
              <option value="<?php echo $value;?>" <?php if($day==$i) echo "selected";?>><?php echo $i?></option>
              <?php }?>
            </select>
            <select name="smonth">
              <?php
			  reset($monthnames2);
			   	while (list($key, $val) = each($monthnames2)) {  ?>
              <option value="<?php echo $key;?>" <?php if($smonth==$key) echo "selected";?>><?php echo $val?></option>
              <?php } ?>
            </select>
            <select name="syear">
              <?php for($i=-3;$i<4;$i++){ 
				  				$stable=$currentYear-1;
				  ?>
              <option value="<?php echo $stable+$i;?>" <?php if($year==($stable+$i))  echo "selected";?>><?php echo $stable+$i+$Range543;?></option>
              <?php }?>
            </select>
            <input type="submit" name="submit" id="submit" value="แสดงข้อมูล" />
            <input type="hidden" name="action" id="action" value="Search" /></td>
          </tr>

       <?php if($_POST['action']=="Search"){?> 
          <tr>
          <td colspan="2" align="left" style="padding-left:15px;">
          		<button type="button" style="width:150px; height:40px;" onclick=" window.open('exportAuctionBlank.php?day=<?php echo $startDate."_".$EndDate?>','_blank');">
                	ส่งออกข้อมูล
                </button>
          </td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="3" cellspacing="1" class="txt10-black">
           
            <tr>
              <td height="33" align="center" bgcolor="#D9D9B3"><strong>วันที่</strong></td>
              <td height="33" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นดิบ</strong></td>
              <td width="17%" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นรมควันชั้น</strong></td>
              <td width="20%" align="center" bgcolor="#D9D9B3"><strong>น้ำยางสด ณ โรงงาน</strong></td>
              <td width="11%" align="center" bgcolor="#D9D9B3"><strong>เศษยาง(100%)</strong></td>
              <td align="center" bgcolor="#D9D9B3"><strong>หมายเหตุ</strong></td>
              </tr>
            <?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
            <tr>
              <td width="9%" align="center" bgcolor="#E4E4E4"><?php GetThaiDate($data['date_data'])?></td>
              <td width="15%" align="center" bgcolor="#E4E4E4"><?php echo $data['rubber_sheet']?></td>
              <td align="center" bgcolor="#E4E4E4"><?php echo $data['rubber_smoke_sheet']?></td>
              <td align="center" bgcolor="#E4E4E4"><?php echo $data['latex']?></td>
              <td align="center" bgcolor="#E4E4E4"><?php echo $data['rubber_scrap']?></td>
              <td align="center" bgcolor="#E4E4E4"><?php echo $data['note']?></td>
              </tr>
            <?php $n++; } ?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
        <?php }?>
        </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>