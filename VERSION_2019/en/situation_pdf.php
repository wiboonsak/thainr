<?php  	

		$fileName='situation_'.$_GET['StartDate']."_".$_GET['StopDate'].".pdf";

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
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	//mysql_query("set character set utf8");
		//$query ="SELECT * FROM  tbl_situation  WHERE (c_update  BETWEEN  '$StartDate'  AND  '$StopDate' )   AND language='$lang'   ";
		
		$query ="SELECT * FROM  `tbl_situation_data`  WHERE (date_act  BETWEEN  '$StartDate'  AND  '$StopDate' )   AND language='$lang'   ";
		
		$query.="ORDER BY  id DESC ";

		$result =mysql_query($query);
		while($data=mysql_fetch_assoc($result))	
		{
			 /* $data['c_detail2'] = strip_tags($data['c_detail2']); 
				$data['c_detail2'] = str_replace('&nbsp;',"",$data['c_detail2']);
				$data['c_detail'] = strip_tags($data['c_detail']); 
				$data['c_detail'] = str_replace('&nbsp;',"",$data['c_detail']);
				$data['c_detail2'] = ereg_replace('<BR>'," <br> ",$data['c_detail2']);
			    $data['c_detail2'] = ereg_replace('<STRONG>'," <b> ",$data['c_detail2']);
			    $data['c_detail2'] = ereg_replace('</STRONG>'," </b> ",$data['c_detail2']);*/
				$data['detail_th'] = strip_tags($data['detail_th']); 
			    $data['detail_th'] = ereg_replace('<U>',"  ",$data['detail_th']);
			    $data['detail_th'] = ereg_replace('</U>',"  ",$data['detail_th']);

				//$htmlcontent=$data['c_detail']."  ";	
				$pdf->writeHTML($data['topic_th'], true, false, true, false, '');
				//$pdf->writeHTML($h=0, $htmlcontent, $link='', $fill=0, $align='0', $ln=true, $stretch=0, $firstline=true, $firstblock=false, $maxh=0);
				$pdf->Ln();

				//$htmlcontent=$data['c_detail2']."   ";	
				$font_size = $pdf->pixelsToUnits('24');
				$pdf->writeHTML('<span style="font-size:16px">'.$data['detail_th'].'</span>' , true, false, true, false, '');
				//$pdf->writeHTML($h=0, $htmlcontent, $link='', $fill=0, $align='0', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
				$pdf->Ln();
				
			}
			//echo $htmlcontent;


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