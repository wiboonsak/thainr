<?php 

	require_once("../control/config.inc.php");
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	mysql_query("set character set utf8");
	//-----------------------------Date------------------------------------
	$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

	
	$query ="SELECT * FROM  `tbl_situation_data`  WHERE (date_act  BETWEEN  '$StartDate'  AND  '$StopDate' )   AND language='".$_GET['lang']."'   ";
		
			if($SituatoionID){
					$query.=" AND c_id = '$SituatoionID' ";
			}
		//echo $query;
		$query.="ORDER BY  id DESC ";
		$result =mysql_query($query);
		$numRows = mysql_num_rows($result);
		if($numRows==1){
				$data=mysql_fetch_assoc($result);	
				$topicID = $data['c_id'];	
		}else if($numRows > 1){
				$n=1;
				while($data=mysql_fetch_assoc($result)){
						$topic[$n]=$data['c_detail'];
						$sid[$n]=$data['c_id'];
						$n++;
				}
		}
		$dateArray=explode("-", $_GET['StopDate']);
		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		$nameYear = $dateArray[0]+543;
		///echo "<br>nameYear>>>".$nameYear;
		$nameMonth = $monthnames2[$dateArray[1]];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.style1 {	color: #FFFFFF;
	font-weight: bold;
}
</style>
</head>

<body >
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="76">&nbsp;</td>
    <td align="left" background="images/inside/h-message_bg.gif">&nbsp;</td>
    <td width="26">&nbsp;</td>
  </tr>
</table>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#336699" class="FontMS10"><span class="style1">บทวิเคราะห์สถานการณ์ยางพารา&nbsp; <?php echo $nameMonth?> <?php echo $nameYear ?> </span></td>
  </tr>
  <tr>
    <td align="right" valign="top" bgcolor="#FFFFFF" class="FontMS10">&nbsp;&nbsp;      <table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td><br />
            <br />
            <?php if($numRows ==1){ ?>
             <p><?php echo $data['topic_th']?></p>
                  <p><?php echo $data['detail_th']?></p>
            <p>
              <?php 
				  			$query= "SELECT * FROM  `tbl_situation_data_file` WHERE news_id='".$data['id']."'  ORDER BY file_type  ";
							$resultFile = mysql_query($query);
							while($File=mysql_fetch_assoc($resultFile)){
									if($File['file_type']==2){ 
				  ?>
                                  <img src="images/download-icon.gif" alt="download" width="13" height="15" hspace="5"> 
                    <a href="../uploadfile/<?php echo $File['file_name']?>" target="_blank" class="Saan">ดาวน์โหลดไฟล์เอกสาร</a></p>
                  <?php	 }else if($File['file_type']==1){ ?>
                  <a href="../uploadfile/<?php echo $File['file_name']?>" target="_blank">
                  <img src="../uploadfile/thb/<?php echo $File['file_name']?>" alt="" style="border:none"> </a><br>
                         <?php //echo $File['file_name']?>
                  <?php 
							   } 
							   } ?>
                  <?php }else if($numRows  > 1){ 
			  						for($i=1; $i  < $n ; $i++){  ?>
                  <p><img src='../control/images/bullet4.gif' alt="" align="absmiddle"> <a href="<?php $_SERVER['PHP_SELF']?>?detail=<?php echo  $detail?>&SituatoionID=<?php echo $sid[$i]?>"> <?php echo " ".$topic[$i]?></a></p>
                  <?php 	 }  } else if($numRows==0){ ?>
                  <center>
                    ไม่มีข้อมูลสถานการณ์ยางพารา เดือน <?php echo $nameMonth;?> <?php echo $nameYear;?>
                  </center>
                  <?php }?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF" class="FontMS10"><a href="#" onclick="window.close()">ปิดหน้านี้</a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF" class="FontMS10"><hr size="1" color="#000000" /></td>
  </tr>
</table>
<script language="javascript">
		window.print() ;
</script>
</body>
</html>