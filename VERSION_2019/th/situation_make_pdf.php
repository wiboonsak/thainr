<?php
require_once("setPDF.php");
// เพิ่มหน้าใน PDF 
$pdf->AddPage();

// กำหนด HTML code หรือรับค่าจากตัวแปรที่ส่งมา
//	กรณีกำหนดโดยตรง
//	ตัวอย่าง กรณีรับจากตัวแปร
// $htmlcontent =$_POST['HTMLcode'];
$htmlcontent=AdjustHTML($_POST['pdfContent']);

// สร้างเนื้อหาจาก  HTML code
$pdf->writeHTML($_POST['pdfContent'], true, 0, true, 0);

// เลื่อน pointer ไปหน้าสุดท้าย
$pdf->lastPage();

// ปิดและสร้างเอกสาร PDF
$pdf->Output('MyPDF/'.$_POST['pdfFileName'], 'I');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

</body>
</html><script language="javascript">
		document.form1.submit();
		window.location.href='opendl.php?file=<?php echo $fileName;?>';
</script>