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
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu.php"); ?></td>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3%" height="39">&nbsp;</td>
            <td width="97%" align="left">
		<form action="index.php?detail=webboard" method="post" name="boardForm">
			<p ><span class="h-catalog">Please Select Board</span>
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
            <td width="21" height="20" align="center" bgcolor="#ADD71B" class="LR10"></td>
            <td width="407" height="20" align="center" bgcolor="#ADD71B" class="LR10"><strong>TOPICS</strong></td>
            <td width="91" height="20" align="center" bgcolor="#ADD71B" class="LR10"><strong>POST BY </strong></td>
            <td width="87" height="20" align="center" bgcolor="#ADD71B" class="LR10"><strong>REPLIES</strong></td>
            <td width="80" height="20" align="center" bgcolor="#ADD71B" class="LR10"><strong>VIEWS</strong></td>
            <td height="20" colspan="2" align="center" bgcolor="#ADD71B" class="LR10"><strong>DATE</strong></td> 		 	 	
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
            <td height="20" colspan="7" align="left" bgcolor="#FFFFFF">&nbsp;
              <?php if($board['topic_type']==0){ ?>
              <img src="../th/images/h-title-other.gif" width="240" height="27" vspace="10"> 
              <?php } else { ?>
              <img src="../th/images/h-title-us.gif" width="240" height="27" vspace="10"><br>
              <?php } ?>
            <!--<table width="143" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
              <tr>
                <td width="11"><img src="../th/images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                <td width="119" align="center" background="../th/images/inside/nr_94.jpg"><!--<a href="#"  onclick="OpenNew('newtopic.php','850', '850' , '200' , '100')"></a> 
                  <a href="#" onClick="windowOpener(850, 750, 'windowName', 'newtopic.php?selectCateBoard=<?php //echo $_POST['selectCateBoard']?>')"> <strong> New Topic </strong></a></td>
                <td width="13"><img src="../th/images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
              </tr>
            </table>--></td>
          </tr>
		  <?php } ?>
          <tr>
            <td height="20" colspan="2" align="left" bgcolor="#FFFFF5"  class="FontMS10"><img src="../images/icon/30x30/google_talk_30_5.png" alt="webboard" width="20" height="20" hspace="5" vspace="3" style="vertical-align:text-bottom"><!-- <a href="#"  onclick="OpenNew('preview_board.php?NID=<?php echo $board['id']?>','850', '750' , '200' , '10')">  -->
			<a href="#" onClick="windowOpener(750, 1000, 'windowName', 'preview_board.php?NID=<?php echo $board['id']?>')">
			<?php echo $board['question']?> </a>
                <?php $icon="<img src=../th/images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>  
				 <?php if($board['view'] >= 50){ ?>
		      <img src="../th/images/Gif_Icon_Hot.gif" border="0">		
		      <?php } ?>    </td>
            <td height="20" align="left" bgcolor="fffff5" class="FontMS10"><?php echo $board['user']?></td>
            <td height="20" align="center" bgcolor="fffff5" class="FontMS10"><span class="FontMS10"><?php echo $board['ans']?></span></td>
            <td height="20" align="center" bgcolor="fffff5" class="FontMS10"><?php echo $board['view']?></td>
            <td height="20" colspan="2" align="center" bgcolor="fffff5" class="FontMS10"><?php GetThaiDate($board['post_date'])?></td>
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
                <td width="11"><img src="../th/images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                <td width="119" align="center" background="../th/images/inside/nr_94.jpg"><!--<a href="#"  onclick="OpenNew('newtopic.php','850', '850' , '200' , '100')"></a> -->
                  <a href="#" onClick="windowOpener(750, 1000, 'windowName', 'newtopic.php?selectCateBoard=<?php echo $_POST['selectCateBoard']?>')"> <strong>  New Topic  </strong></a></td>
                <td width="13"><img src="../th/images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
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
        <p><br />
        </p>
        <p></p>
      </td>
    </tr>
  </table>
</center>
</body>