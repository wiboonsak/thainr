<?php 
	//--------------------------------------------------------------------
		if($_POST['action']=='sendLetter'){
				require("class.phpmailer.php");
				
				//--------select newsletter data-----$_POST['selectNewsID']
				$query="SELECT * FROM tbl_newsletter_data WHERE id = '".$_POST['selectNewsID']."' ";
				$result=mysql_query($query);
				$newsLetterData=mysql_fetch_assoc($result);
						$info =  pathinfo($path_product."/".$newsLetterData['attachfile']);
						$info[extension]=strtolower($info[extension]);
				//--------select member ------------------
					$query="SELECT a.* , b.name, b.email , b.id AS memID  FROM  tbl_member_temp a "
	." LEFT JOIN tbl_thainr_member b ON a.memberID=b.id  WHERE a.keyGroup='".$_SESSION['KEY_GROUP']."' ORDER BY a. 	memberID DESC ";
				$resultMail=mysql_query($query);
			while($email=mysql_fetch_assoc($resultMail)){ 
			//echo $email['email']." >> ".$email['name']."<br>";
			$linkUnsubscribeTh="<a href='http://www.thainr.com/2013/th/unsubscribe.php?mID=".$email['memID']."'><strong>ยกเลิกจดหมายข่าว</strong></a> ";
			$linkUnsubscribeEn="<a href='http://www.thainr.com/2013/en/unsubscribe.php?mID=".$email['memID']."'><strong>Unsubscribe</strong></a> ";
				
				$mail = @new PHPMailer();
				$mail->IsSMTP();                                      // set mailer to use SMTP
				$mail->Host = "mail.thainr.com";  // specify main and backup server
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->Username = "no-reply@thainr.com";  // SMTP username
				$mail->Password = "0m1K6qrd"; // SMTP password
				$mail->From = "no-reply@thainr.com";
				$mail->FromName = "สมาคมยางพาราไทย";
				
				$mail->AddAddress($email['email'] , $email['name']);
				
				$mail->WordWrap = 50;                                 // set word wrap to 50 characters
				//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
				if($newsLetterData['attachfile']!=''){ 
				//$mail->AddAttachment($path_product.$newsLetterData['attachfile'], $_SESSION['KEY_GROUP'].".".$info[extension]); 
				$mail->AddAttachment($path_product.$newsLetterData['attachfile'], $newsLetterData['attachfile']);    // optional name
				}
				$mail->IsHTML(true);                                  // set email format to HTML
				
				$mail->Subject = "".$newsLetterData['topic'];
				
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
				}//end while
				 $redirect=1;
				 echo "ข่าวสารได้ส่งถึงสมาชิกทั้งหมดเรียบร้อยแล้วค่ะ";	
				 $query="DELETE FROM tbl_member_temp ";
				 mysql_query($query);
				 $_SESSION['KEY_GROUP']=$rand = substr(str_shuffle('ABCDEFGHIJKLMNPQRSTUVWXYZ123456789'),0,4);			
		}

	//--------------------------------------------------------------------
	if($_POST['action']=='Delete'){
				$query="DELETE FROM tbl_member_temp WHERE id ='".$_POST['KEY']."' ";
				mysql_query($query);
		}

	//--------------------SELCT MEMBER FROM TEMP ------------------
	$query="SELECT a.* , b.name  FROM  tbl_member_temp a "
	." LEFT JOIN tbl_thainr_member b ON a.memberID=b.id  WHERE a.keyGroup='".$_SESSION['KEY_GROUP']."' ORDER BY a. 	memberID DESC ";
	//echo $query;
	$result=mysql_query($query);
	//-------------------SELECT topic 
	 $query="SELECT * FROM   `tbl_newsletter_data`  ORDER BY id DESC";
	 $resultLetter=mysql_query($query);
	
	

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function DeleteList(ids){
					if(confirm('ต้องการลบรายชื่อนี้')){
								document.form1.action.value='Delete';
								document.form1.KEY.value=ids;
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
    <td width="96%" bgcolor="#D9D9B3">thainr newsletter

    <input type="hidden" name="action" id="action" />
      <input type="hidden" name="KEY" id="KEY" /></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#E9E9E9"><span class="txt10-black">รายชื่อสมาชิก 
      <a href="main.php?work=SendLetter"><img src="images/black_icon/16x16/sq_plus.png" width="16" height="16" style="border:none"/> เพิ่มรายชื่อ</a></span></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">
    					
    		<table border="0" cellspacing="1" cellpadding="1">
                  <tr>
                  <?php $n=1;$col=3; while($data=mysql_fetch_assoc($result)){ ?>
                    <td width="16" bgcolor="#EBEBEB">
                    <a href="#" onclick="DeleteList('<?php echo $data['id']?>')">
                    <img src="images/black_icon/16x16/sq_minus.png" width="16" height="16" style="border:none" /></a></td>
                    <td width="177" height="25" nowrap="nowrap" bgcolor="#EBEBEB"><?php echo $data['name']?></td>
                    <td width="1" nowrap="nowrap" bgcolor="#FFFFFF"></td>
                    <?php if($n==$col){   echo "</tr><tr>"; $n=0; }
					   $n++;
					 } ?>
                  </tr>
                </table>

            
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#E9E9E9"><span class="txt10-black">หัวข้อจดหมาย 
      
      <select name="selectNewsID" id="selectNewsID">
      <?php while($letter=mysql_fetch_assoc($resultLetter)){ ?>
        <option value="<?php echo $letter['id']?>"><?php echo $letter['topic']?></option>
        <?php } ?>
      </select>
      <input type="submit" name="button" id="button" value="ส่งจดหมาย" onclick="document.form1.action.value='sendLetter';" />

    </span></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>