<?php 
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	
	$query="SELECT * FROM tbl_news_data WHERE id = '".$_GET['ActID']."' ";
	$result = mysql_query($query);
	$data=mysql_fetch_assoc($result);
	$reffer =  $data['reff'];
	//$query="SELECT * FROM  `tbl_news_file`  WHERE  news_id =  '".$_GET['ActID']."'  ORDER BY  is_pic   ";
	//$result = mysql_query($query);
	//$data=mysql_fetch_assoc($result);
	$data['c_detail'] = strip_tags($data['topic_th']); 
	$fileName=$_GET['ActID'].".pdf";

?>
<?php mysql_close();?>
<?php
	require('fpdf.php');
	define('FPDF_FONTPATH','font/');
	$pdf=new FPDF();
	$pdf->SetMargins(10,15,10);
	$pdf->AddPage();
	$pdf->AddFont('AngsanaNew','','angsa.php');
	$pdf->AddFont('AngsanaNew','B','angsab.php');
	$pdf->SetFont('AngsanaNew','B',16); 
	$pdf->Cell(0,0,$data['c_detail'],0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('AngsanaNew','',14);
	$data['detail_th'] = strip_tags($data['detail_th']); 
	$data['detail_th'] = str_replace('&nbsp;',"",$data['detail_th']);
	$cnt = 0;
	$pdf->MultiCell(190,10,$data['detail_th']);
	$pdf->Output("MyPDF/$fileName","F");
?>
<script language="javascript">
	window.location.href='opendl.php?file=<?php echo $fileName;?>';
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
