<?php  session_start();
	$_SESSION['Xcheck']=md5(uniqid(time())); ;
	// echo $_SESSION['Xcheck'];
	 
//------------------------------------------------------------------------------------------------------
	require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	
			if($action=='add'){
					//----check secoure image
					require_once 'securimage.php';
					  $image = new Securimage();
					   if ($image->check($_POST['code']) == true) { 
					//------------ เช็คคำหยาบบบ
						$word = array("ashole","a s h o l e","a.s.h.o.l.e","bitch","b i t c h","b.i.t.c.h","shit","s h i t","s.h.i.t","fuck","dick","f u c k","d i c k","f.u.c.k","d.i.c.k","มึง","มึ ง","กู","ควย","ค ว ย","ค.ว.ย","ปี้","เหี้ย","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า","ช.า.ติ.ห.ม.า","ไอ้","สัดหมา","สัด","เย็ด","หี","แรด");
						$ban = "<font color=red>***</font>";
						for ($i=0 ; $i<sizeof($word) ; $i++) {
								$topic_th = eregi_replace($word[$i],$ban,$topic_th);
								$c_detail2 = eregi_replace($word[$i],$ban,$c_detail2);
								$author = eregi_replace($word[$i],$ban,$author);
								///$QEmail = eregi_replace($word[$i],$ban,$QEmail);
						}
					//-----------
						 $query="INSERT INTO tbl_webboard_question  (id,question,detail ,user,post_date, topic_type  ) VALUES ('','".$_POST['topic_th']."' ,'".$_POST['c_detail2']."','".$_POST['author']."',now(),'".$_POST['topic_type']."' )  ";
					
						  mysql_query($query);
				?>
				 <script language="javascript">
						window.opener.location='index.php?detail=main';
						alert('ตั้งกระทู้เรียบร้อยแล้วคุ่ะ');
						window.close();
				 </script>
		<?php 	
		 }  else{  ?>
		 <script language="javascript">
						alert('กรุณาใส่โค้ดให้ตรงด้วยค่ะ');
		</script>
		 
	<?php 	} ?>
		
		<?php }?>
<html>
<head>
<title>Post-Webboard-</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<script language="Javascript1.2"><!-- // load htmlarea
//_editor_url = "http://localhost/cv4/citymall/lib/htmlarea/";                     // URL to htmlarea files
_editor_url = 'htmlarea/'; 
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=580,height=720,left = 232,top =0');");
}

</script>
<!-- TinyMCE -->
<script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>

<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
body {
	background-color: #D9EFFC;
}
-->
</style>
</head>
<body  >

<form action="<?php $PHP_SELF;?>" method="post" name="FrmNews">
<table width="500" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#D6EEFA" class="font11">
  <tr>
    <td colspan="2" nowrap><img src="../th/images/inside/nr_73.jpg" width="496" height="116" alt="Webboard" /></td>
  </tr>
  <tr>
    <td height="10" colspan="2" nowrap bgcolor="#FFFFF5"></td>
  </tr>
 <tr>
    <td width="25%" height="44" align="right" nowrap bgcolor="fffff5" class="MS10-board"><span class="fonts">category</span></td>
    <td width="75%" bgcolor="fffff5" class="border-product"><!--<select name="topic_type" id="topic_type">
      <option value="0">หมวดถามตอบยางพารา</option>
      <option value="1">หมวดซื้อขายยางพารา</option>
    </select>  -->
    <input type="hidden" name="topic_type" value="<?php echo $_GET['selectCateBoard']?>">
    <?php if($_GET['selectCateBoard']==1){ ?>หมวดซื้อขายยางพารา<?php }else{ ?>หมวดถามตอบยางพารา<?php } ?>
    </td>
  </tr> 
  <tr>
    <td height="45" align="right" nowrap bgcolor="fffff5" class="MS10-board">Topic</td>
    <td width="75%" bgcolor="fffff5"><input name="topic_th" type="text" class="input" id="topic_th" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td align="right" valign="top" bgcolor="fffff5" class="MS10-board"><span class="fonts">detail</span></td>
    <td bgcolor="fffff5"><!--textArea -->
        <textarea name="c_detail2" cols="100" rows="20"></textarea>
        <script language="javascript1.2">
								editor_generate('c_detail2');
	</script>
      <!--textArea -->    </td>
  </tr>
  <tr>
    <td height="42" align="right" bgcolor="fffff5" class="MS10-board"><span class="fonts">ชือผู้ตั้งกระทู้</span></td>
    <td bgcolor="fffff5"><span class="font">
      <input name="author" type="text" class="input" id="author" size="40" maxlength="50">
    </span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="fffff5" class="MS10-board">&nbsp;</td>
    <td bgcolor="fffff5"><img src="securimage_show.php?sid=<?php echo $_SESSION['Xcheck']?>" id="image" align="absmiddle" /> <a href="#" onClick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">reload image <br>
    </a> <font color="#990000" size="1" face="MS Sans Serif"><strong>กรุณาใส่รหัสหมายเลข &nbsp;&nbsp;</strong></font>
    <input name="code" type="text" id="code" size="10" maxlength="10">
    <br></td>
  </tr>
  <tr>
    <td align="right" bgcolor="fffff5">&nbsp;</td>
    <td bgcolor="fffff5"><span class="font">
      <input name="action" type="hidden" id="action" />
      <input name="ID" type="hidden" value="<?php echo $ID;?>"/>
      <input name="Submit" type="submit" class="input" onClick="FrmNews.action.value='add';" value="ส่งกระทู้" />
    </span></td>
  </tr>
    <tr>
    <td height="10" colspan="2" nowrap bgcolor="#FFFFF5"></td>
  </tr>
</table>
<br>
</form>
<script language="JavaScript" type="text/javascript">
function a_value(detail,txtareaname){
	document.getElementById(txtareaname).value= detail;
}
function b_value(detail,txtname){
	if(detail=='1'){
	document.getElementById(txtname).checked=true;
	}
}
</script>

<br>

</body>
</html><?php mysql_close($link)?>
