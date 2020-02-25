<?php
	// webboard 
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE topic_type ='0' ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 5 ";
	//$queryboard= "SELECT * FROM `tbl_webboard_question` ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 21 ";
	$resultBoard_1 = mysql_query($queryboard);
	
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE topic_type ='1' ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 5 ";
	$resultBoard_2 = mysql_query($queryboard);	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="ajaxtabs/tabcontent.css" />

<script type="text/javascript" src="ajaxtabs/tabcontent.js">

<script type="text/JavaScript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<body>
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr>
      <td  align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="18" background="../images/b-2.gif"><img src="../images/b-1.gif" width="18" height="34"></td>
          <td background="../images/b-2.gif"  style="font-family: 'Sarabun', sans-serif; margin-left: 100px;"><?php include("top-message.php"); ?></td>
          <td width="18"><img src="../images/b-3.gif" width="18" height="34"></td>
          </tr>
        </table>
        <br>
        <?php include("top-banner.php"); ?>
        <?php include("title_message.php"); ?>              
        <br>
        <p><?php include("mid-banner.php"); ?></p>
        <br>
        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
          <tr>
            <td height="35" colspan="3" align="left" bgcolor="#F5F5F5">
				<p style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; กิจกรรมสมาคมฯ</p>            	
            </td>
          </tr>
          <tr>
            <td colspan="3" align="left">
             	<?php $cateID=2; include('showact_222.php');?>
             </td>
          </tr>
        </table>
        <br>
        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
          <tr align="left">
            <td height="35" colspan="3" align="left" bgcolor="#F5F5F5">
				<p style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; ข่าวสาร</p>            	
            </td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="3" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="18"></td>
                <td width="943" align="left">
                 	 <?php include('5news01_222.php');?>      
                </td>
                <td width="14"></td>
                </tr>
              <tr>
                <td height="10" valign="top">&nbsp;</td>
                <td height="10" align="center" ></td>
                <td height="10">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
        </table>
               
        <br>
		  
        <table width="1200" height="606" border="0" cellspacing="0" cellpadding="0" style="background-image: url(../images/annual_2019_w1200.jpg)">
          <tbody>
            <tr>
              <td width="39">&nbsp;</td>
              <td width="582" height="130">&nbsp;</td>
              <td width="579">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td align="left" valign="top"><iframe src="../../Annual_2019/dinner/index.html" width="550" height="420" frameborder="0" scrolling="no"></iframe></td>
              <td align="left" valign="top"><iframe src="../../Annual_2019/ARBC/index.html" width="550" height="420" frameborder="0" scrolling="no"></iframe></td>
            </tr>
          </tbody>
        </table>
  <br>
        
        <!------WEBBOARD------->      
        <table width="95%" border="0" cellpadding="0" cellspacing="0" class="radius5">
          <tr>
            <td height="35" colspan="2" align="left" bgcolor="#FFFFFF"><img src="images/h-title-other.gif" width="240" height="27" vspace="10" /></td>
            <td height="35" colspan="4" align="right" nowrap class="LR10" bgcolor="#FFFFFF">&nbsp;<a href="#" class="new_topic" onClick="windowOpener(700, 1000, 'windowName', 'newtopic.php?selectCateBoard=0')">ตั้งกระทู้ใหม่</a>&nbsp;<a class="new_topic" href="?detail=webboard&selectCateBoard=0">ดูกระทู้ทั้งหมด</a></td>
          </tr>
          <tr>
            <td height="22" colspan="2" align="center" bgcolor="#53c5ef" class="LR10"><strong>หัวข้อกระทู้</strong></td>
            <td width="80" height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>ผู้ตั้งกระทู้</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>จำนวนผู้ตอบ</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>จำนวนผู้ชม 	</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>วันที่</strong></td>
          </tr> 
          <?php
		  	//$queryboard= "SELECT * FROM `tbl_webboard_question` ORDER BY post_date  DESC   LIMIT 0, 16 ";
			//$resultBoard_1 = mysql_query($queryboard);
		   while($board=mysql_fetch_assoc($resultBoard_1)){ ?>
          <tr class="bottom-dot FontMS10" bgcolor="#FFFFFF">
            <td width="15" height="15" class="bottom-dot FontMS10" bgcolor="#FFFFFF"></td>
            <td width="379" height="15" align="left" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><img src="images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom"> <!--<a href="#"  onclick="OpenNew('preview_board.php?NID=<?php echo $board['id']?>','850', '750' , '200' , '10')"></a> -->
              <a href="#" onClick="windowOpener(850, 1000, 'windowName', 'preview_board.php?NID=<?php echo $board['id']?>')">
              <?php echo $board['question']?> </a>
              <?php $icon="<img src=images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>
              <?php if($board['view'] >= 50){ ?>
              <img src="images/Gif_Icon_Hot.gif" border="0">
              <?php } ?>            </td>
            <td width="80" height="15" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php echo $board['user']?></td>
            <td width="52" height="15" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php echo $board['ans']?></td>
            <td width="54" height="15" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php echo $board['view']?></td>
            <td width="139" height="15" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php GetThaiDate($board['post_date'])?></td>
          </tr>
          <?php   } ?>
          <tr>
            <td width="15" height="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="80" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="54" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="139" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="5" colspan="2" align="left" bgcolor="#FFFFFF"><img src="images/h-title-us.gif" width="240" height="27" vspace="10" /></td>
            <td colspan="4" align="right" bgcolor="#FFFFFF"><a href="#" class="new_topic"onClick="windowOpener(700, 1000, 'windowName', 'newtopic.php?selectCateBoard=1')">ตั้งกระทู้ใหม่</a>&nbsp;<a class="new_topic" href="?detail=webboard&selectCateBoard=1">ดูกระทู้ทั้งหมด</a></td>
          </tr>
          <tr>
            <td height="22" colspan="2" align="center" bgcolor="#efb653" class="LR10"><strong>หัวข้อกระทู้</strong></td>
            <td height="22" align="center" nowrap="nowrap" bgcolor="#efb653" class="LR10"><strong>ผู้ตั้งกระทู้</strong></td>
            <td height="22" align="center" nowrap="nowrap" bgcolor="#efb653" class="LR10"><strong>จำนวนผู้ตอบ</strong></td>
            <td height="22" align="center" nowrap="nowrap" bgcolor="#efb653" class="LR10"><strong>จำนวนผู้ชม </strong></td>
            <td height="22" align="center" nowrap="nowrap" bgcolor="#efb653" class="LR10"><strong>วันที่</strong></td>
          </tr>
          <?php while($board=mysql_fetch_assoc($resultBoard_2)){ ?>
          <tr class="bottom-dot FontMS10" bgcolor="#FFFFFF">
            <td width="15" height="10" class="bottom-dot FontMS10" bgcolor="#FFFFFF"></td>
            <td width="379" align="left" class="bottom-dot FontMS10" bgcolor="#FFFFFF"><img src="images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom" style="vertical-align:text-bottom"> <!--<a href="#"  onclick="OpenNew('preview_board.php?NID=<?php echo $board['id']?>','850', '750' , '200' , '10')"></a> -->
              <a href="#" onClick="windowOpener(850, 1000, 'windowName', 'preview_board.php?NID=<?php echo $board['id']?>')">
              <?php echo $board['question']?> </a>
              <?php $icon="<img src=images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>
              <?php if($board['view'] >= 50){ ?>
              <img src="images/Gif_Icon_Hot.gif" border="0">
              <?php } ?>            </td>
            <td width="80" align="center" class="bottom-dot FontMS10" bgcolor="#FFFFFF"><?php echo $board['user']?></td>
            <td width="52" align="center" class="bottom-dot FontMS10" bgcolor="#FFFFFF"><?php echo $board['ans']?></td>
            <td width="54" align="center" class="bottom-dot FontMS10" bgcolor="#FFFFFF"><?php echo $board['view']?></td>
            <td width="139" align="center" class="bottom-dot FontMS10" bgcolor="#FFFFFF"><?php GetThaiDate($board['post_date'])?></td>
          </tr>
          <?php  } ?>
          <tr>
            <td height="21" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="80" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="54" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="139" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#FFFFFF" ><hr width="80%" size="1"></td>
          </tr>
          <tr>
            <td width="15" height="54" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="5" align="left" bgcolor="#FFFFFF">
              <table width="100%" border="0" style="padding:2px; margin:2px;" >
                <tr>
                  <td align="left">
                    <p style="font-size: 9pt; font-family: 'Sarabun', sans-serif; color: #333333;"><strong>กฎ กติกา ในการร่วมแสดงความคิดเห็น</strong><br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      1. โปรดงดเว้น การใช้คำหยาบคาย ส่อเสียด ดูหมิ่น กล่าวหาให้ร้าย สร้างความแตกแยก หรือกระทบถึงสถาบันอันเป็นที่เคารพ<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      2. ทุกความคาดเห็นไม่เกี่ยวข้องกับผู้ดำเนินการเว็บไซต์ และไม่สามารถนำไปอ้างอิงทางกฎหมายได้<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      3. ทีมงานเว็บมาสเตอร์ขอสงวนสิทธิ์ในการลบความคิดเห็น โดยไม่ต้องชี้แจงเหตุผลใดๆ ต่อเจ้าของความคิดเห็นนั้น<br>
                      <br>
                    การเข้าร่วมในกิจกรรมของเว็บไซต์ไม่ว่าจะเป็นการตั้งกระทู้ หรือการร่วมแสดงความเห็นในกระทู้ต่างๆ ในเว็บไซต์ จึงจำเป็นต้องกระทำด้วยความระมัดระวัง เพื่อไม่ให้เกิดความเสียหายต่อสังคมส่วนรวม การควบคุมและดูแลอาจไม่สามารถทำได้อย่างทั่วถึง เพราะทุกคนสามารถพิมพ์ข้อความต่างๆ เข้ามาได้โดยอิสระขึ้นอยู่กับสำนึกและความรับผิดชอบต่อสังคมของผู้ร่วมกิจกรรมว่าจะมีมากน้อยเพียงไร ดังนั้นทางทีมงานสมาคมยางพาราไทย จึงไม่อาจร่วมรับผิดชอบในข้อความทุกข้อความที่ส่งเข้ามา หวังเป็นอย่างยิ่งว่าจะได้รับความร่วมมือจากทุกๆ ท่านที่ร่วมกิจกรรมด้วยดี และใคร่ขอความร่วมมือจากผู้เข้าร่วมกิจกรรมทุกท่านช่วยเป็นหูเป็นตาสอดส่องกระทู้ที่เข้าข่ายผิดกฎ กติกา มารยาทดังกล่าว หากพบก็โปรดแจ้งได้ภายในแต่ละกระทู้ได้ในทันที โดยทีมงานสมาคมยางพาราไทยจะพิจารณาดำเนินการตามความเหมาะสมต่อไป</p>
                  </td>
                </tr>
            </table></td>
          </tr>
        </table>
        
  <!------WEBBOARD------->      
     <br>
        <div id="btBanner">&nbsp;</div>
      </td>
    </tr>
  </table>
</center>
</body>