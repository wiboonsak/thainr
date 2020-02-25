<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

require("class.phpmailer.php");
				//$query="SELECT name , 	sname , username FROM tbl_member WHERE username <> '' ";
				//$result=mysql_query($query);
				//while($data=mysql_fetch_assoc($result)){ 
				
$mail = new PHPMailer();
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.hondasrinakhon.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mailsender@hondasrinakhon.com";  // SMTP username
$mail->Password = "1234"; // SMTP password

$mail->From = "official@hondasrinakhon.com";
$mail->FromName = "official hondasrinakhon";
	
	//$mail->AddAddress( $data['username'] , $data['firstname']." ".$data['sname']);
	$mail->AddAddress( "iya555@hotmail.com	" , "iya555");			  
	$mail->AddAddress( "samannois@gmail.com	" , "samannois");	
	$mail->AddAddress( "saman_noi@yahoo.co.th" , "saman_noi");		
$mail->AddReplyTo("official@hondasrinakhon.com", "News letter");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // a  dd attachments
$mail->AddAttachment("../uploadfile/020130826091822.png", "020130826091822.png");  // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "ที่สุดของรถจักรยานยนต์ฮอนด้า และบริการจากฮอนด้าศรีนคร";

"<table width='738' height='77' border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td width='202'><img src='../images/detail/h-news_01.png'></td>
        <td align='right' background='../images/detail/headbar_04.png'>&nbsp;</td>
        <td width='22'><img src='../images/detail/headbar_05.png' width='22' height='77'></td>
      </tr>
    </table>"."<br><br>".$textMessage=$_POST['product_name']."<br><br>".$_POST['detailth'] 
			 ." <br><br> Contact Us : <a href='http://www.hondasrinakhon.com'>www.hondasrinakhon.com</a> ";
$mail->Body = $textMessage;
if(!$mail->Send()) 
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
 $redirect=1;
echo "ส่งจดหมายเรียบร้อยแล้ว"; 
//}
?>
