<?php 	session_start();
				$_SESSION['Xcheck']=md5(uniqid(time())); ;
//------------------------------------------------------------------------------------------------------
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			
	
		if($action=='add'){
				//---------check code-----------
				require_once 'securimage.php';
				 $image = new Securimage();
   				  if ($image->check($_POST['code']) == true) {
				 //-----------check spam word---------
				 	$word = array("ashole","a s h o l e","a.s.h.o.l.e","bitch","b i t c h","b.i.t.c.h","shit","s h i t","s.h.i.t","fuck","dick","f u c k","d i c k","f.u.c.k","d.i.c.k","มึง","มึ ง","กู","ควย","ค ว ย","ค.ว.ย","ปี้","เหี้ย","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า","ช.า.ติ.ห.ม.า","ไอ้","สัดหมา","สัด","เย็ด","หี","แรด");
						$ban = "<font color=red>***</font>";
						for ($i=0 ; $i<sizeof($word) ; $i++) {
								$elm1 = eregi_replace($word[$i],$ban,$elm1);
								$answer = eregi_replace($word[$i],$ban,$answer);
								//$author = eregi_replace($word[$i],$ban,$author);
								///$QEmail = eregi_replace($word[$i],$ban,$QEmail);
						}
				 
				  
				 //------------------------------------------ 
								$elm1=eregi_replace(chr(13),"<br>",$elm1);
									$query="INSERT INTO  tbl_webboard_ans  (id,answer,post_by,Qid,post_date )  VALUES "
														."('','$elm1','$answer','$BID',now()) ";
									mysql_query($query);
									$query="UPDATE tbl_webboard_question  SET  ans=(ans+1)  WHERE id='$BID'  ";
									mysql_query($query);
				}else{
					echo "<script>alert('กรุณาใส่โค้ดให้ตรงด้วยค่ะ')</script>";
				}
					
			}
	if($action22=='logout'){
			session_unset($_SESSION['adminLogin']);
			?><script language="javascript">window.close();</script><?php
	}
	if($refresh==''){
	$query="UPDATE  tbl_webboard_question SET view= view+1  WHERE id = '".$_GET['NID']."' ";
	mysql_query($query);
	$refresh = 1;
	}
	$query = "SELECT * FROM tbl_webboard_question WHERE id = '".$_GET['NID']."' ";
	$result = mysql_query($query);
	$data=mysql_fetch_assoc($result);
	if($data['topic_type']==1){ 
		$_SESSION['adminLogin']='ok';
	}else{
		$_SESSION['adminLogin']='ok';
	}
	$query="SELECT * FROM tbl_webboard_ans WHERE Qid ='".$_GET['NID']."' ORDER BY id DESC ";
	$result = mysql_query($query);
	$number=mysql_num_rows($result);
	
	if($action2=='login'){
			if(($name=="admin")&&($pass=="1234")){
					$_SESSION['adminLogin']='ok';
			}else{ ?>
				<script language="javascript">alert("รหัสผ่าน ผิดพลาด !");</script>		
		<?php }
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css">
<title>Webboard</title><style type="text/css">
<!--
body {
	margin-left: 5px;
	margin-top: 5px;
	/*background-color: #D6EEF8;*/
}
.style1 {color: #FFFFFF}
-->
</style></head>

<body>
<form action="<?php $PHP_SELF?>" method="post" name="form1">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr>
    <td align="center" valign="top"><img src="images/inside/nr_73.jpg" width="496" height="116" alt="Webboard" /> <br />
      <table width="100%" border="0"  class="radius5" bgcolor="#FFFFFF">
        <tr>
          <td colspan="2"><span class="txt-h-ms"><img src="images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom" /><?php echo $data['question']?></span></td>
        </tr>
        <tr>
          <td colspan="2"><hr size="2" color="#009900" /></td>
        </tr>
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="97%" height="53" valign="top"><span class="MS10-board"><?php echo $data['detail']?></span></td>
        </tr>
        <tr>
          <td height="26">&nbsp;</td>
          <td align="right" bgcolor="#FEFBE7"><span class="fonts-11">ผู้ตั้งกระทู้ :: <?php echo $data['user']?> ::
            <?php GetThaiDate($data['post_date'])?>
          </span></td>
        </tr>
      </table>
      <br /></td></tr>
  <?php  if($number > 0){  $n=0; while($data=mysql_fetch_assoc($result)){ ?>
  <tr>
    <td valign="top"><p><br />
    </p>
      <table width="100%" border="0" class="radius5" bgcolor="#FFFFFF">
        <tr>
          <td colspan="2" align="left"><span class="txt-h-ms"><img src="images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom" /><span class="font14-black-bold">ข้อคิดเห็นที่ <?php echo $number-$n;?></span></span></td>
        </tr>
        <tr>
          <td colspan="2"><hr size="1" color="#CC3300"/></td>
        </tr>
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="97%" height="40" align="left" valign="top"><span class="fonts-11"><?php echo $data['answer']?></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" bgcolor="#FEFBE7"><span class="fonts-11">ผู้ตอบ <?php echo $data['post_by']?> ::
            <?php GetThaiDate($data['post_date'])?>
          </span></td>
        </tr>
      </table>
      <p>&nbsp;</p></td></tr>
  <?php $n++; }  } ?>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
<?php if(($_SESSION['adminLogin']=='ok')){ ?>
  <tr>
    <td valign="top">
	
	<table id="Table_01" width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="radius_news">
      <tr>
        <td height="36" align="center" bgcolor="#990000"><strong class=" style1">ร่วมแสดงความคิดเห็น</strong></td>
      </tr>
      <tr>
        <td height="284" align="center"><table width="95%" border="0" cellpadding="5" bgcolor="#FFFFF5" class="font11">
          <tr>
            <td width="13%">ชื่อ <a name="ans" id="ans"></a></td>
            <td width="87%"><input name="answer" type="text" class="linedot" id="answer" size="40" maxlength="50" /></td>
          </tr>
          <tr>
            <td>ความคิดเห็น</td>
            <td><!--textArea -->
              <textarea name="elm1" cols="20" rows="5" class="input" id="elm1" style="width: 100%"></textarea>
              <!--textArea --></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><img src="securimage_show.php?sid=<?php echo $_SESSION['Xcheck']?>" id="image" align="absmiddle" /> <a href="#" onClick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">reload image <br />
              </a> <font color="#990000" size="1" face="MS Sans Serif"><strong>กรุณาใส่รหัสหมายเลข &nbsp;&nbsp;</strong></font>
              <input name="code" type="text" id="code" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td><input name="BID" type="hidden" id="NID" value="<?php echo $NID;?>" />
              <input name="action" type="hidden" id="action" />
              <input type="hidden" name="addView" value="1" />
              <input type="hidden" name="refresh" value="<?php echo $refresh?>" /></td>
            <td><input name="Button" type="button" class="input" value="ส่งคำตอบ" onClick="form1.action.value='add';form1.submit();" /></td>
          </tr>
        </table></td>
        </tr>
    </table>	
	
	</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <?php }else {  ?>
  <tr>
    <td align="center" valign="top"><table id="Table_01" width="496" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="radius_news">
      <tr>
        <td><img src="images/board/board_01.gif" width="17" height="1" alt="" /></td>
        <td rowspan="2" align="center" bgcolor="#990000" class="txt-h-ms"><span class="style1"><strong>สำหรับเจ้าหน้าที่ กรุณาเข้าสูระบบก่อนตอบคำถาม</strong></span></td>
        </tr>
      <tr>
        <td height="36" bgcolor="#990000">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFF5">&nbsp;</td>
        <td valign="top" bgcolor="#fffff5"><table width="100%" border="0" cellpadding="5" bgcolor="#FFFFF5" class="font11">
          <tr>
            <td width="36%" align="right">username</td>
            <td width="64%" align="left"><input name="name" type="text" id="name" /></td>
            </tr>
          <tr>
            <td align="right">password</td>
            <td align="left"><!--textArea --><!--textArea -->
              <input name="pass" type="password" id="pass" /></td>
            </tr>
          <tr>
            <td><input name="action2" type="hidden" id="action2" /></td>
            <td align="left"><input name="Button2" type="button" class="input" value="เข้าสู่ระบบ" onClick="form1.action2.value='login';form1.submit();" /></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><img src="images/board/board_09.gif" width="459" height="17" alt="" /></td>
        </tr>
    </table></td>
  </tr>
  <?php } ?>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><a href="#"  onClick="form1.action22.value='logout';form1.submit();">
      <input name="action22" type="hidden" id="action22" />
      <img src="images/close.gif" alt="close" hspace="20" border="0"></a></td>
  </tr>
</table>
</form>

<!--
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
<style>
   img {
    -webkit-filter: grayscale(100%); /* Chrome, Safari, Opera */
     
   }
   body{
    -webkit-filter: grayscale(100%); /* Chrome, Safari, Opera */
   }
 </style>
-->
</body>
</html>
