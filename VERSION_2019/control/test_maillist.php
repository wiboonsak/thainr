<?php

//error_reporting(E_STRICT | E_ALL);

//date_default_timezone_set('Etc/UTC');
require("class.phpmailer.php");
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$body = file_get_contents('contents.html');

$mail->isSMTP();

//$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
//$mail->Port = 25;

				$mail->Host = "mail.thainr.com";  // specify main and backup server
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "no-reply@thainr.com";  // SMTP username
				$mail->Password = "0m1K6qrd"; // SMTP password
				$mail->From = "no-reply@thainr.com";
				$mail->FromName = "สมาคมยางพาราไทย";
				

$mail->Subject = "PHPMailer Simple database mailing list test";

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop
$mail->msgHTML($body);
//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
          require_once("config.inc.php");
 			 //---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
 

$query="SELECT  name,  id AS memID  FROM tbl_thainr_member ";

				$resultMail=mysql_query($query);
			while($email=mysql_fetch_assoc($resultMail)){ 

	//---------------------------
	$email['email']='saman_noi@yahoo.co.th';
	$email['name'] = htmlspecialchars($email['name'] );	
	//-------------------------
	
    $mail->addAddress($email['email'], $email['name']);
   // if (!empty($email['photo'])) {
        $mail->addStringAttachment('../uploadfile/Thailand Monthly Rubber Report - February 2015.pdf' , 'Thailand Monthly Rubber Report - February 2015.pdf'); //Assumes the image data is stored in the DB
   // }

    if (!$mail->send()) {
        echo "Mailer Error (" . str_replace("@", "&#64;", $email["email"]) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo "Message sent to :" . $email['name'] . ' (' . str_replace("@", "&#64;", $email['email']) . ')<br />';
        //Mark it as sent in the DB
        //mysqli_query(
        //    $mysql,
        //    "UPDATE mailinglist SET sent = true WHERE email = '" .
        //    mysqli_real_escape_string($mysql, $email['email']) . "'"
      //  );
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}

?>