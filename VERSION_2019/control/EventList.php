<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}
	####################################################

		$currentDate=date("d");
		$currentMonth= date("m");
		//$currentMonthname= date("m");			
		$currentYear= date("Y");		
		$YearVar=date("Y");
	####################################################
	if($_POST['selectMonth']){
				$currentMonth=$_POST['selectMonth'];
		}
	if($_POST['SelectYear']){
				$currentYear=$_POST['SelectYear'];
		}	
	$DayStartMonth=date('Y-m-d',mktime(1,1,1,$currentMonth,1,$currentYear));
	$DayStopMonth=date('Y-m-d',mktime(1,1,1,$currentMonth+1,0,$currentYear));
	########################################################	
	if($_POST['action']=='Delete'){
			 $query = "SELECT * FROM  calendar_events_file WHERE  news_id = '".$_POST['EditID']."' ";
			 $result=mysql_query($query);	
			 while($data=mysql_fetch_assoc($result)){
				 		 if(file_exists($path_product."/thb/".$RmPic)){
				 					@unlink ($path_product."/thb/".$RmPic);
							 }
							 if(file_exists($path_product."/".$RmPic)){
									@unlink ($path_product."/".$RmPic);
							 }
				 }
			 $query="DELETE FROM  calendar_events_file WHERE  news_id = '".$_POST['EditID']."' ";
			 mysql_query($query);	
			 $query="DELETE FROM  calendar_events WHERE  newsID = '".$_POST['EditID']."' ";
			 mysql_query($query);			
			 $query="DELETE FROM  calendar_event_data WHERE  id = '".$_POST['EditID']."' ";
			 mysql_query($query);				 	 
		}
	########################################################
	$query="SELECT * FROM `calendar_event_data` WHERE date_start BETWEEN '$DayStartMonth' AND '$DayStopMonth' AND  language= '".$_SESSION['language']."'  ";
	$result =mysql_query($query);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function DeleteThis(ids){
					if(confirm('ต้องการลบ ?')){
								document.form1.action.value='Delete';
								document.form1.EditID.value=ids;
								document.form1.submit();						
						}else{
								return false;							
							}
			
			}
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">ปฏิทินกิจกรรม
      <input type="hidden" name="action" id="action" />
      <input type="hidden" name="EditID" id="EditID" /></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">เลือกเดือน 
      <select name="selectMonth" id="selectMonth">
        <?php
		if($_POST['stopMonth']){  $currentMonth=$_POST['stopMonth'];}
		reset($monthArray); 
		while($month=each($monthnames2)){ ?>
        <option value="<?php echo $month['key']?>" <?php if($currentMonth==$month['key']) echo "selected";?>><?php echo $month['value']?></option>
        <?php }?>
      </select>
      ปี 
      <select name="SelectYear" id="stopYear">
        <?php
  if($_POST['stopYear']){ $currentYear=$_POST['stopYear']; }
  $startYear=$YearVar-2; for($i=1;$i<5;$i++){ ?>
        <option value="<?php echo $startYear+$i?>"<?php if($startYear+$i==$currentYear) echo "selected";?>><?php echo ($startYear+$i)+$Range543?></option>
        <?php } ?>
      </select>
<input type="submit" name="button" id="button" value="ตกลง" /></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="13%" height="25" align="center" bgcolor="#EAEAEA"><span class="txt10-black">          วันเริ่ม</span></td>
        <td width="13%" align="center" bgcolor="#EAEAEA"><span class="txt10-black">วันสิ้นสุด</span></td>
        <td width="60%" align="center" bgcolor="#EAEAEA"><span class="txt10-black">หัวข้อ</span></td>
        <td width="7%" align="center" bgcolor="#EAEAEA"><span class="txt10-black">แก้ไข</span></td>
        <td width="7%" align="center" bgcolor="#EAEAEA"><span class="txt10-black">ลบ</span></td>
      </tr>
     <?php while($data=mysql_fetch_assoc($result)){ ?> 
      <tr>
        <td align="center" bgcolor="#F5F5F5"><span class="txt10-black"><?php echo $data['date_start']?></span></td>
        <td align="center" bgcolor="#F5F5F5"><span class="txt10-black"><?php echo $data['date_end']?></span></td>
        <td bgcolor="#F5F5F5"><span class="txt10-black"><?php echo $data['event_title']?></span></td>
        <td align="center" bgcolor="#F5F5F5">
          <span class="txt10-black"><a href="main.php?work=EventAdd&currentID=<?php echo $data['id']?>">
        <img src="images/black_icon/16x16/doc_edit.png" width="16" height="16"  style="border:none"/>
          </a>
          </span></td>
        <td align="center" bgcolor="#F5F5F5">
          <span class="txt10-black"><a href="#" onclick="DeleteThis('<?php echo $data['id']?>')">
        <img src="images/black_icon/16x16/doc_delete.png" width="16" height="16" style="border:none"/></a></span></td>
      </tr>
      <?php }?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>