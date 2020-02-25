<?php  session_start();
//phpinfo();
//ini_set ("safe_mode","ON");
session_start();
if(!$admin)header("location:index.php");
require_once("config.inc.php");
$link = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect");
mysql_select_db($db_name) or die("Could not select database");
	if(isset($xtype)){ $_SESSION['stattype'] = $xtype; }else{  $_SESSION['stattype']=$_SESSION['stattype']; }
	
if(!$c_update)
	{
		$c_update= date("Y-m-d",time());
	}
if($_POST['action']=="del"){
		$query_d2="select *  from tbl_stat_file  where news_id=".$_POST['delid']." ";
			$result_d2=mysql_query($query_d2);
			while($ans2=mysql_fetch_assoc($result_d2)){
				unlink($path_stat.$ans2['f_name']);
			}	
			
			$querydel="delete from tbl_stat  where c_id=".$_POST['delid']." ";
			mysql_query($querydel);
			$querydel2="delete from tbl_stat_file  where news_id=".$_POST['delid']." ";
			mysql_query($querydel2);
?>
<script language="javascript">
document.location='addstat.php';
</script>
<?php
}
if($_POST['action']=="insert"){
$_POST['c_detail']=ereg_replace ("<P>", " ", $_POST['c_detail']);
$_POST['c_detail2']=ereg_replace ("<P>", " ", $_POST['c_detail2']);
$_POST['c_detail1_en']=ereg_replace ("<P>", " ", $_POST['c_detail1_en']);
$_POST['c_detail2_en']=ereg_replace ("<P>", " ", $_POST['c_detail2_en']);

$_POST['c_detail']=ereg_replace ("</P>", "<BR>", $_POST['c_detail']);
$_POST['c_detail2']=ereg_replace ("</P>", "<BR>", $_POST['c_detail2']);
$_POST['c_detail1_en']=ereg_replace ("</P>", "<BR>", $_POST['c_detail1_en']);
$_POST['c_detail2_en']=ereg_replace ("</P>", "<BR>", $_POST['c_detail2_en']);

if($_POST['c_display']=='')$_POST['c_display']='0';
if($_POST['c_top']=='')$_POST['c_top']='0';
if($_POST['c_top']==1){
$query_u="update tbl_stat  set ";
	$query_u.="c_top='0' ";
	mysql_query($query_u);
}
$query_ins="insert INTO tbl_stat(c_detail,c_detail2,c_update,c_display,c_top,c_detail1_en, c_detail2_en, c_type,language) values";
$query_ins.="('".$_POST['c_detail']."','".$_POST['c_detail2']."','".$_POST['c_update']."','".$_POST['c_display']."','".$_POST['c_top']."', '".$_POST['c_detail1_en']."', '".$_POST['c_detail2_en']."' , '".$_SESSION['stattype']."' , '$lang' )";
mysql_query($query_ins);
$query="select *  from tbl_stat  order by  c_id desc ";
$result=mysql_query($query);
$ans=mysql_fetch_assoc($result);

?>
<script language="javascript">
document.location='addstat.php';
</script>
<?php
}
if($_GET['action']=="edit"){
$query_e="select *  from tbl_stat  where c_id=".$_GET['cid']." ";
$result_e=mysql_query($query_e);
while($ane=mysql_fetch_assoc($result_e)){
$ec_id=$ane['c_id'];
$ec_detail=$ane['c_detail'];
$ec_detail2=$ane['c_detail2'];
$ec_detail2_en=$ane['c_detail2_en'];
$ec_detail1_en=$ane['c_detail1_en'];
$ec_display=$ane['c_display'];
$ec_update=$ane['c_update'];
$ec_top=$ane['c_top'];
}
		$ec_detail = htmlspecialchars($ec_detail);
		$ec_detail = ereg_replace("\r\n"," ",$ec_detail);
		$ec_detail = addslashes($ec_detail);
		$ec_detail  = str_replace ( '&nbsp;', ' ', $ec_detail);
		$ec_detail  = str_replace ( '&amp;', '&', $ec_detail);
       	$ec_detail  = str_replace ( '&#039;', '\'', $ec_detail);
       	$ec_detail  = str_replace ( '&quot;', '\"', $ec_detail);
       	$ec_detail  = str_replace ( '&lt;', '<', $ec_detail);
       	$ec_detail  = str_replace ( '&gt;', '>', $ec_detail);
		
		$ec_detail2 = htmlspecialchars($ec_detail2);
		$ec_detail2 = ereg_replace("\r\n"," ",$ec_detail2);
		$ec_detail2 = addslashes($ec_detail2);
		$ec_detail2  = str_replace ( '&nbsp;', ' ', $ec_detail2);
		$ec_detail2  = str_replace ( '&amp;', '&', $ec_detail2);
       	$ec_detail2  = str_replace ( '&#039;', '\'', $ec_detail2);
       	$ec_detail2  = str_replace ( '&quot;', '\"', $ec_detail2);
       	$ec_detail2  = str_replace ( '&lt;', '<', $ec_detail2);
       	$ec_detail2  = str_replace ( '&gt;', '>', $ec_detail2);
		
		$ec_detail2_en = htmlspecialchars($ec_detail2_en);
		$ec_detail2_en = ereg_replace("\r\n"," ",$ec_detail2_en);
		$ec_detail2_en = addslashes($ec_detail2_en);
		$ec_detail2_en  = str_replace ( '&nbsp;', ' ', $ec_detail2_en);
		$ec_detail2_en  = str_replace ( '&amp;', '&', $ec_detail2_en);
       	$ec_detail2_en  = str_replace ( '&#039;', '\'', $ec_detail2_en);
       	$ec_detail2_en  = str_replace ( '&quot;', '\"', $ec_detail2_en);
       	$ec_detail2_en  = str_replace ( '&lt;', '<', $ec_detail2_en);
       	$ec_detail2_en  = str_replace ( '&gt;', '>', $ec_detail2_en);		
	
		$ec_detail1_en = htmlspecialchars($ec_detail1_en);
		$ec_detail1_en = ereg_replace("\r\n"," ",$ec_detail1_en);
		$ec_detail1_en = addslashes($ec_detail1_en);
		$ec_detail1_en  = str_replace ( '&nbsp;', ' ', $ec_detail1_en);
		$ec_detail1_en  = str_replace ( '&amp;', '&', $ec_detail1_en);
       	$ec_detail1_en  = str_replace ( '&#039;', '\'', $ec_detail1_en);
       	$ec_detail1_en  = str_replace ( '&quot;', '\"', $ec_detail1_en);
       	$ec_detail1_en  = str_replace ( '&lt;', '<', $ec_detail1_en);
       	$ec_detail1_en  = str_replace ( '&gt;', '>', $ec_detail1_en);				
}
if($_POST['action']=="startedit"){
$_POST['c_detail']=ereg_replace ("<P>", " ", $_POST['c_detail']);
$_POST['c_detail2']=ereg_replace ("<P>", " ", $_POST['c_detail2']);
$_POST['c_detail1_en']=ereg_replace ("<P>", " ", $_POST['c_detail1_en']);
$_POST['c_detail2_en']=ereg_replace ("<P>", " ", $_POST['c_detail2_en']);

$_POST['c_detail']=ereg_replace ("</P>", "<BR>", $_POST['c_detail']);
$_POST['c_detail2']=ereg_replace ("</P>", "<BR>", $_POST['c_detail2']);
$_POST['c_detail1_en']=ereg_replace ("</P>", "<BR>", $_POST['c_detail1_en']);
$_POST['c_detail2_en']=ereg_replace ("</P>", "<BR>", $_POST['c_detail2_en']);

if($_POST['c_display']=='')$_POST['c_display']='0';
if($_POST['c_top']==1){
$query_u="update tbl_stat  set ";
	$query_u.="c_top='0' ";
	mysql_query($query_u);
}
	$query_u="update tbl_stat  set ";
	$query_u.="c_detail='".$_POST['c_detail']."'";
	$query_u.=",c_detail2='".$_POST['c_detail2']."' ";
	$query_u.=",c_display='".$_POST['c_display']."' ";
	$query_u.=",c_update='".$_POST['c_update']."' ";
	$query_u.=",c_top='".$_POST['c_top']."' ";
	$query_u.=",c_detail1_en='".$_POST['c_detail1_en']."' ";
	$query_u.=",c_detail2_en='".$_POST['c_detail2_en']."' ";		
	$query_u.=",c_type='".$_SESSION['stattype']."' ";			
	$query_u.=" where c_id=".$_POST['ec_id']."";
	//echo $query_u;
mysql_query($query_u);
?>
<script language="javascript">
document.location='addstat.php';
</script>
<?php
}
$query_c="select * from tbl_stat WHERE c_type= '".$_SESSION['stattype']."'  AND language ='$lang' order by c_id desc";
$result_c=mysql_query($query_c);
		//---set page --//
		if(!$row) { $row=5; }
		if(!$page) {$page =1; } 
		$rowinpage =$row; 
		$startrow=($page-1)*$rowinpage;
		$rows = mysql_num_rows($result_c);	
		$maxpage=ceil($rows/$rowinpage);
		//---set page --//
$query_c="select * from tbl_stat   WHERE c_type= '".$_SESSION['stattype']."' AND language ='$lang'  order by c_id desc";
$query_c.=" limit $startrow, $rowinpage ";
$result_c=mysql_query($query_c);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>เพิ่มข้อมูลรถ</title>
<LINK href="images/style.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="simplecalendar.js"></SCRIPT>
<LINK href="calendar.css" rel=stylesheet>
<style type="text/css">
<!--
body {
	margin-left: 1px;
	margin-top: 25px;
}
-->
</style>
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
<script language="javascript">
function checkdata(){
/*if(!addnews.c_detail.value){
alert('กรุณาใส่ ข้อมูลในช่อง หัวข้อบทความ');
return false;
}else */
 //if(!addnews.c_detail2.value){
//alert('กรุณาใส่ ข้อมูลในช่อง รายละเอียด');
//return false;
//}else{
		if(addnews.ec_id.value!=''){
			addnews.action.value='startedit'
		}else{
			addnews.action.value="insert";
		}
addnews.submit();
//}
}

function delitem(iid,iname){
	if(confirm('ต้องการลบ '+iname+' หรือไม่?')){
	addnews.action.value='del';
	addnews.delid.value=iid;
	addnews.submit();
	}
}
</script>
<script language="javascript">
var win=null;
function NewWindowPop(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
</script>
</head>
<body>
<form name="addnews" action="addstat.php" method="post" >
<input type="hidden" name="action" >
<input type="hidden" name="ec_id" value="<?php echo $ec_id;?>">
<input type="hidden" name="delid" >
<table width="750" border="0" cellpadding="3" cellspacing="1"  class="tableborder_full">
<tbody>
<tr>
      <td 
          height="15" colspan="2"  valign="top" nowrap="nowrap" background="sdmenu/title.gif" class="navbar_selected"><img src="images/icon24_modules.gif" width="24" height="22" align="absmiddle" />
		 <?php if($_SESSION['stattype']==1){?>thai statistics
		  <?php }else if($_SESSION['stattype']==2){?>world statistics <?php }else if($_SESSION['stattype']==3){?>other statistics <?php }?>	    </td>
    </tr>

  <tr>
    <td align="right" bgcolor="#F9F5EE">Topic:<br></td>
    <td bgcolor="#F9F5EE">
	<textarea name="c_detail1_en" cols="60" rows="3"></textarea>
	<script language="javascript1.2">
								editor_generate('c_detail1_en');
	</script> </td>
  </tr>
 
   <tr>
     <td align="right" bgcolor="#F9F5EE">detail :<br></td>
     <td bgcolor="#F9F5EE"><textarea name="c_detail2_en" cols="60" rows="5"></textarea>
       <script language="javascript1.2">
								editor_generate('c_detail2_en');
	</script></td>
   </tr>
 <!--    <tr>
    <td align="right" class="navbar_selected">แสดงผลหน้าแรก :</td>
    <td bgcolor="f0f0f0"><input type="checkbox" name="c_display"  id="c_display" value="1" >	</td>
  </tr>
   <tr>
    <td align="right" class="navbar_selected">แสดงผลหน้าแรกบนสุด :</td>
    <td bgcolor="f0f0f0"><input type="checkbox" name="c_top"  id="c_top" value="1" >	</td>
  </tr> -->
  	<tr > 
				<td align="right" bgcolor="#F9F5EE" a>date</td>
		        <td bgcolor="#F9F5EE" ><input name="c_update" type="text" class="box120" value="<?=$c_update?>" size="15">&nbsp;&nbsp;
		  <a onMouseOver="if (timeoutId) clearTimeout(timeoutId);window.status='Show Calendar';return true;" 
			onClick="g_Calendar.show(event,'addnews.c_update',true,'yyyy-mm-dd'); return false;" 
			onMouseOut="if (timeoutDelay) calendarTimeout();window.status='';" 
			href="javascript:%20void(0);"> <img height=21 src="images/calendar.gif" width=34 border=0 name=imgCalendar align="absmiddle">                        </a></td>
      </tr>
   <tr>
    <td colspan="2" align="center" bgcolor="f0f0f0"><input name="ok" type="button" value="จัดเก็บ" onClick="checkdata();"></td>
  </tr>
  </tbody>
</table>
<br>
<table width="800" border="0" cellpadding="3" cellspacing="1"  class="tableborder_full">
				  <tr>
				  <td width="90%" background="sdmenu/title.gif" bgcolor="#66CCFF" class="navbar_selected">&nbsp;
                        <?php for($i=1;$i<=$maxpage;$i++){?>
                        <a href="addstat.php?page=<?php echo $i?>" ><?php if($i==$page) echo "<b>";?><font color="<?php if($i==$page) { echo "red"; }else{ echo "black";}?>"><?php echo $i;?></font><?php if($i==$page) echo "</b>";?></a>
                        <?php } ?>					</td>
					<td width="10%" align="center">
					page <?php echo $page;?>  / <? echo $maxpage;?>
					</td>
	</tr>
  </table>
<table width="800" border="0" cellpadding="3" cellspacing="1"  class="tableborder_full">
<tr>
	<td width="5%" bgcolor="#66CCFF" class="permissions5_cell">no</td>
	<td width="24%" bgcolor="#66CCFF" class="permissions5_cell"><?php if($_SESSION['stattype']==1){?>thai statistics <?php }else if($_SESSION['stattype']==2){?>
			 world statistics
				  <?php }else if($_SESSION['stattype']==3){?>  
				  other statistics
				  <?php }?></td>
	<td width="24%" bgcolor="#66CCFF" class="permissions5_cell">detail</td>
	<td width="10%" bgcolor="#66CCFF" class="permissions5_cell">date</td>
	<td width="17%" bgcolor="#66CCFF" class="permissions5_cell">edit/add file/delete </td>
	</tr>
<?php
	$numr=(($page-1)*$row+1);
	 $class1="#F7F7EE"; $class2="#FFFFFF";
	while($anc=mysql_fetch_assoc($result_c)){
	$class = ($class==$class1) ? $class2 : $class1; 
	?>
	<tr onMouseOver="this.style.background='#FFFFCC'" 
										  onmouseout="this.style.background='<?php echo $class?>'" bgColor='<?php echo $class?>'>
	<td align="left" valign="top"><?php echo $numr;?></td>
	<td align="left" valign="top"><?php echo $anc['c_detail1_en'];?></td>
	<td align="left" valign="top"><a href="../../en/detail-stat.php?statID=<?php echo $anc['c_id']?>" target="_blank"><?php echo $anc['c_detail2_en']?> ......</a></td>
	<td align="left" valign="top"><?php echo $anc['c_update'];?></td>
	<td align="left" valign="top"><a href="#" onClick="NewWindowPop('addstatpic.php?c_id=<?php echo $anc['c_id'];?>','acepopup','600','700','center','front');" >addfile</a>   /    <a href="addstat.php?action=edit&cid=<?php echo $anc['c_id'];?>"  target="_self">edit </a>   / delete </td>
	</tr>

	<?php
	$numr++;
	}
	?>
  </table>
</form>
</body>
</html>
<?php mysql_close($link);?>
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
<?php if($_GET['action']=="edit"){?>
<SCRIPT LANGUAGE="JavaScript">
<!--
//a_value('<?php echo $ec_detail?>','c_detail');
//a_value('<?php echo $ec_detail2?>','c_detail2');
a_value('<?php echo $ec_update?>','c_update');
a_value('<?php echo $ec_detail1_en?>','c_detail1_en');
a_value('<?php echo $ec_detail2_en?>','c_detail2_en');

b_value('<?php echo $ec_display?>','c_display');
b_value('<?php echo $ec_top?>','c_top');
//-->
</SCRIPT>
<?php }?>