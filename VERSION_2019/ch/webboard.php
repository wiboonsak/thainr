<?php
	if(!isset($selectCateBoard)){
		$selectCateBoard=0;
	}else{
		$selectCateBoard=$selectCateBoard;
		$page=1;
	}

		$thisFile= basename($PHP_SELF);
		$rowPerPage=45;
			if((!$_GET['page'])||($_GET['page']==1)){
						$page=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}		
	// webboard 
	if($_GET['selectCateBoard']){$_POST['selectCateBoard']=$_GET['selectCateBoard'];  } 
	if(!$_POST['selectCateBoard']){ $_POST['selectCateBoard']='0';}
	//-----------------------
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE  topic_type='".$_POST['selectCateBoard']."' ORDER BY  id DESC ";
	//$queryboard= "SELECT * FROM `tbl_webboard_question`  ORDER BY  topic_type ASC  , id DESC ";	
//	$queryboard= "SELECT * FROM `tbl_webboard_question`  ORDER BY   post_date DESC ";	

	$queryboardLimit = $queryboard." LIMIT  $startRow , $rowPerPage ";
	$resultBoard = mysql_query($queryboardLimit );
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
body {
	background-color: #D7EFF9;
}
-->
</style>
<script type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>สาส์นจากนายกสมาคม TRA PRESIDENT VIEW</title><body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td width="877" height="50" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top" bgcolor="#FFFFFF"><!--<table id="Table_01" width="653" height="253" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="images/wb_chat_01.gif" width="83" height="36" alt=""></td>
          <td><img src="images/wb_chat_02.gif" width="157" height="36" alt=""></td>
          <td><img src="images/wb_chat_03.gif" width="263" height="36" alt=""></td>
          <td><img src="images/wb_chat_04.gif" width="150" height="36" alt=""></td>
        </tr>
        <tr>
          <td><img src="images/wb_chat_05.gif" width="83" height="67" alt=""></td>
          <td><img src="images/wb_chat_06.jpg" width="157" height="67" alt=""></td>
          <td><img src="images/wb_chat_07.jpg" width="263" height="67" alt=""></td>
          <td><img src="images/wb_chat_08.jpg" width="150" height="67" alt=""></td>
        </tr>
        <tr>
          <td><img src="images/wb_chat_09.gif" width="83" height="35" alt=""></td>
          <td><img src="images/wb_chat_10.jpg" width="157" height="35" alt=""></td>
          <td><a href="?detail=webboard"><img src="images/wb_chat_11.jpg" alt="" width="263" height="35" border="0"></a></td>
          <td><img src="images/wb_chat_12.jpg" width="150" height="35" alt=""></td>
        </tr>
        <tr>
          <td><img src="images/wb_chat_13.gif" width="83" height="43" alt=""></td>
          <td><img src="images/wb_chat_14.jpg" width="157" height="43" alt=""></td>
          <td><a href="../livechat/index.php" target="_blank"><img src="images/wb_chat-over_15.jpg" alt="" width="263" height="43" border="0"></a></td>
          <td><img src="images/wb_chat_16.jpg" width="150" height="43" alt=""></td>
        </tr>
        <tr>
          <td><img src="images/wb_chat_17.gif" width="83" height="72" alt=""></td>
          <td><img src="images/wb_chat_18.gif" width="157" height="72" alt=""></td>
          <td><img src="images/wb_chat_19.gif" width="263" height="72" alt=""></td>
          <td><img src="images/wb_chat_20.gif" width="150" height="72" alt=""></td>
        </tr>
      </table>-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
          <tr>
            <td width="3%" height="39">&nbsp;</td>
            <td width="97%" align="left">
		<form action="index.php?detail=webboard" method="post" name="boardForm">
			<p ><span class="h-catalog">กรุณาเลือกหมวดเว็บบอร์ด</span>
			  <select name="selectCateBoard" class="wb" onChange="boardForm.submit();">
			    <option value="0" <?php if($_POST['selectCateBoard']==0) echo "selected";?>>หมวดถามตอบยางพารา</option>
			    <option value="1" <?php if($_POST['selectCateBoard']==1) echo "selected";?>>หมวดซื้อขายยางพารา</option>
			    </select>
		        </p>
		</form>
            </td>
          </tr>
        </table>
        <table width="95%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="21" height="22" align="center" bgcolor="#ADD71B" class="LR10"></td>
            <td width="407" height="22" align="center" bgcolor="#ADD71B" class="LR10"><strong>หัวข้อกระทู้</strong></td>
            <td width="91" height="22" align="center" bgcolor="#ADD71B" class="LR10"><strong>ผู้ตั้งกระทู้</strong></td>
            <td width="87" height="22" align="center" bgcolor="#ADD71B" class="LR10"><strong>จำนวนผู้ตอบ</strong></td>
            <td width="80" height="22" align="center" bgcolor="#ADD71B" class="LR10"><strong>จำนวนผู้ชม</strong></td>
            <td height="22" colspan="2" align="center" bgcolor="#ADD71B" class="LR10"><strong>วันที่</strong></td>
          </tr>
          <tr>
            <td height="5"></td>
            <td height="5"></td>
            <td height="5" colspan="2"></td>
            <td height="5"></td>
            <td width="43" height="5"></td>
            <td width="23" height="5"></td>
          </tr>
          <?php while($board=mysql_fetch_assoc($resultBoard)){ 		
		   		if($board['topic_type']!=$oldBoardtype){ 
		  ?>
		   <tr>
            <td height="35" colspan="7" align="left" bgcolor="#FFFFFF">&nbsp;
              <?php if($board['topic_type']==0){ ?>
              <img src="images/h-title-other.gif" width="240" height="27" vspace="10"> 
              <?php } else { ?>
            <img src="images/h-title-us.gif" width="240" height="27" vspace="10">             <?php } ?>
            <!--<table width="143" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
              <tr>
                <td width="11"><img src="images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                <td width="119" align="center" background="images/inside/nr_94.jpg"><!--<a href="#"  onclick="OpenNew('newtopic.php','850', '850' , '200' , '100')"></a> 
                  <a href="#" onClick="windowOpener(850, 750, 'windowName', 'newtopic.php?selectCateBoard=<?php //echo $_POST['selectCateBoard']?>')"> <strong> ตั้งกระทู้ใหม่ </strong></a></td>
                <td width="13"><img src="images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
              </tr>
            </table>--></td>
          </tr>
		  <?php } ?>
          <tr>
            <td height="10" colspan="2" align="left" bgcolor="#FFFFF5"  class="FontMS10"><img src="images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom"><!-- <a href="#"  onclick="OpenNew('preview_board.php?NID=<?php echo $board['id']?>','850', '750' , '200' , '10')">  -->
			<a href="#" onClick="windowOpener(850, 1000, 'windowName', 'preview_board.php?NID=<?php echo $board['id']?>')">
			<?php echo $board['question']?> </a>
                <?php $icon="<img src=images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>  
				 <?php if($board['view'] >= 50){ ?>
		      <img src="images/Gif_Icon_Hot.gif" border="0">		
		      <?php } ?>    </td>
            <td align="left" bgcolor="fffff5" class="FontMS10"><?php echo $board['user']?></td>
            <td align="center" bgcolor="fffff5" class="FontMS10"><span class="FontMS10"><?php echo $board['ans']?></span></td>
            <td align="center" bgcolor="fffff5" class="FontMS10"><?php echo $board['view']?></td>
            <td colspan="2" align="center" bgcolor="fffff5" class="FontMS10"><?php GetThaiDate($board['post_date'])?></td>
          </tr>
          <tr>
            <td height="1" colspan="7" bgcolor="#CCCCCC"  class="FontMS10"></td>
          </tr>
		  
          <?php  $oldBoardtype = $board['topic_type'];  } ?>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="5" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="45">&nbsp;</td>
            <td colspan="5" align="right"><table width="143" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
              <tr>
                <td width="11"><img src="images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                <td width="119" align="center" background="images/inside/nr_94.jpg"><!--<a href="#"  onclick="OpenNew('newtopic.php','850', '850' , '200' , '100')"></a> -->
                  <a href="#" onClick="windowOpener(850, 1000, 'windowName', 'newtopic.php?selectCateBoard=<?php echo $_POST['selectCateBoard']?>')"> <strong> ตั้งกระทู้ใหม่ </strong></a></td>
                <td width="13"><img src="images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="45">&nbsp;</td>
            <td colspan="5" align="right">
            
            
             <!--<table width="143" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
              <tr>
                <td width="11"><img src="images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                <td width="119" align="center" background="images/inside/nr_94.jpg">
                <a href="#" onClick="windowOpener(850, 750, 'windowName', 'newtopic.php?selectCateBoard=2')">
                <strong> ตั้งกระทู้ใหม่ </strong></a></td>
                <td width="13"><img src="images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
                
                <td width="11"><img src="images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                <td width="119" align="center" background="images/inside/nr_94.jpg">
                <a href="#" onClick="windowOpener(850, 750, 'windowName', 'newtopic.php?selectCateBoard=2')">
                <strong> ดูกระทู้ทั้งหมด </strong></a></td>
                <td width="13"><img src="images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
                </tr>
            </table> -->
            
            
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>
            <span class="FontMS10">หน้า
            
            <?php  $thisFile=$thisFile."?detail=webboard&selectCateBoard=$selectCateBoard"; PageDisplay($queryboard,$rowPerPage,$_GET['page'],$thisFile)?>
          </span></p>
       
        <!--<table width="303" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
          <tr>
            <td width="11"><img src="images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
            <td  align="center" background="images/inside/nr_94.jpg"><a href="http://www2.thainr.com/aspboard_th/default.asp" target="_blank"><strong> คลิ๊กที่ีนี่ เพื่อดูข้อมูลเว็บบอร์ดเก่า</strong></a></td>
            <td width="13"><img src="images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
          </tr>
        </table> -->
        
      </td>
    </tr>
  </table>
</center>
</body>