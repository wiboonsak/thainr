<?php  	

		$fileName=$_GET['ActID'].".pdf";

$htmlcontent=stripslashes($htmlcontent);
$htmlcontent=$htmlcontent;

require_once("setPDF.php");
// เพิ่มหน้าใน PDF 
$pdf->AddPage();

// กำหนด HTML code หรือรับค่าจากตัวแปรที่ส่งมา
//	กรณีกำหนดโดยตรง
//	ตัวอย่าง กรณีรับจากตัวแปร
// $htmlcontent =$_POST['HTMLcode'];
$htmlcontent=AdjustHTML($htmlcontent);

// สร้างเนื้อหาจาก  HTML code
//$pdf->writeHTML($htmlcontent, true, 0, true, 0);
	//$link = mysql_connect('localhost','thainr_data','thainr') or die("Could not connect");
	//$link = mysql_connect('localhost','root','1234') or die("Could not connect");
	//mysql_select_db('thainr_data') or die("Could not select database");	
		    require_once("../control/config.inc.php");
			
			$lang=1;
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	//mysql_query("set character set utf8");
		//$query ="SELECT * FROM  tbl_situation  WHERE (c_update  BETWEEN  '$StartDate'  AND  '$StopDate' )   AND language='$lang'   ";
		
		//$query ="SELECT * FROM  `tbl_situation_data`  WHERE (date_act  BETWEEN  '$StartDate'  AND  '$StopDate' )   AND language='$lang'   ";
		//$query.="ORDER BY  id DESC ";
		$query="SELECT * FROM tbl_news_data WHERE id = '".$_GET['ActID']."' ";
		$result =mysql_query($query);
		$data=mysql_fetch_assoc($result);
		
	
				$data['detail_th'] = ereg_replace('<U>',"  ",$data['detail_th']);
			    $data['detail_th'] = ereg_replace('</U>',"  ",$data['detail_th']);

				//$htmlcontent=$data['c_detail']."  ";	
				$pdf->writeHTML('<u>'.$data['topic_th'].'</u>', true, false, true, false, '');
				
				//$pdf->writeHTML($h=0, $htmlcontent, $link='', $fill=0, $align='0', $ln=true, $stretch=0, $firstline=true, $firstblock=false, $maxh=0);
				$pdf->Ln();

				//$htmlcontent=$data['c_detail2']."   ";	
				$pdf->writeHTML($data['detail_th'] , true, false, true, false, '');
			    //$pdf->writeHTML($data['detail_th'] , true, false, true, false, '');
				//$pdf->writeHTML($h=0, $htmlcontent, $link='', $fill=0, $align='0', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
				$pdf->Ln();
				
				if($lang='1'){
					$dateArray = explode("-",$data['date_act']);
					$date= $dateArray[2];
					$mon= $dateArray[1];
					$year= $dateArray[0]+543;
					$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

					if($date < 10){ $date = str_replace("0", "", $date); } 
					$dateAdd = $date."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;

					$htmlcontent1="ที่มา : ".$data['reff'];
					$pdf->writeHTML($htmlcontent1, true, false, true, false, '');
					$htmlcontent2="วันที่ : ".$dateAdd;
					$pdf->writeHTML($htmlcontent2, true, false, true, false, '');
				 }else{
						$dateArray = explode("-",$day2);
						$date= $dateArray[2];
						$mon= $dateArray[1];
						$year= $dateArray[0];
						$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
						if($date < 10){ $date = str_replace("0", "", $date); } 
						$dateAdd = $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
					
					$htmlcontent4="source :".$data['reff'];
					$pdf->writeHTML($htmlcontent4, true, false, true, false, '');
					$htmlcontent3="date :".$dateAdd;
					$pdf->writeHTML($htmlcontent3, true, false, true, false, '');
				}
				
// เลื่อน pointer ไปหน้าสุดท้าย   
$pdf->lastPage();

// ปิดและสร้างเอกสาร PDF

$pdf->Output('MyPDF/'.$fileName, 'I');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script language="javascript">
		//document.form1.submit();
	window.location.href='opendl.php?file=<?php echo $fileName;?>';
</script>


</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
