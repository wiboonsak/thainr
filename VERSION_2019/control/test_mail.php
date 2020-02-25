<?php
	require("class.phpmailer.php");
	$mail = new PHPMailer();
				$mail->IsSMTP();                                      // set mailer to use SMTP
				$mail->Host = "mail.thainr.com";  // specify main and backup server
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "no-reply@thainr.com";  // SMTP username
				$mail->Password = "0m1K6qrd"; // SMTP password
				$mail->From = "no-reply@thainr.com";
				
				
				$mail->Subject = "ทดสอบ อีเมล์";
				
				$mail->FromName = "สมาคมยางพาราไทย";
				
				$mail->AddAddress('samannois@gmail.com', 'iyazz');
				$textMessage="<table width='800' border='0' cellspacing='1' cellpadding='5' align='center'>
  
  <tr>
    <td colspan='2' height='30' align='left' bgcolor='#f0edd9' style='padding-left:20px; padding-right:20px;'><strong>".$newsLetterData['topic']."</strong></td>
  </tr>
   
     <tr>
    <td colspan='2' style='padding:5px;' align='left'>Dear. ".$email['name']."</td>
  </tr>
  <tr>
    <td colspan='2' style='padding:5px;' align='left'>".$newsLetterData['detail']."</td>
  </tr>
 
   <tr>
    <td colspan='2' height='30' align='center'>
	<img src='http://www.thainr.com/uploadfile/".$newsLetterData['images']."'>
	</td>
  </tr> 
  <tr>
    <td height='2' colspan='2' align='left' valign='bottom'><hr width='800' align='left' /></td>
  </tr>
  <tr>
    <td width='543' align='left' valign='top'>&nbsp;</td>
    <td width='246' align='left' valign='top'>&nbsp;</td>
  </tr>  <tr>
    <td width='543' align='left' valign='top' colspan='2'>หากท่านไม่ต้องการรับจดหมายข่าว  ".$linkUnsubscribeTh."<br>if you do not want to receive future messages, please ".$linkUnsubscribeEn.". </td>
  </tr>
  <tr>
    <td align='left' valign='top'>&nbsp;</td>
    <td align='left' valign='top'>&nbsp;</td>
  </tr>
</table>";

				$mail->Body = $textMessage;
				if(!$mail->Send()) 
				{
				   echo "Message could not be sent. <p>";
				   echo "Mailer Error: " . $mail->ErrorInfo;
				   exit;
				}
				
				 $redirect=1;
				 echo "ข่าวสารได้ส่งถึงสมาชิกทั้งหมดเรียบร้อยแล้วค่ะ";	
				 //$query="DELETE FROM tbl_member_temp ";
				// mysql_query($query);
				 //$_SESSION['KEY_GROUP']=$rand = substr(str_shuffle('ABCDEFGHIJKLMNPQRSTUVWXYZ123456789'),0,4);			
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>