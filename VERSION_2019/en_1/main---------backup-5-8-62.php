<?php
	// webboard 
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE topic_type ='0' ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 10 ";
	//$queryboard= "SELECT * FROM `tbl_webboard_question` ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 21 ";
	//$queryboard= "SELECT * FROM `tbl_webboard_question` ORDER BY  id  DESC   LIMIT 0, 16 ";	
	$resultBoard_1 = mysql_query($queryboard);
	
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE topic_type ='1' ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 10 ";
	$resultBoard_2 = mysql_query($queryboard);	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../th/ajaxtabs/tabcontent.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="../th/ajaxtabs/tabcontent.js">
<!--



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

//-->//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td width="261" align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>		
	</tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu.php"); ?></td>
      <td align="center" valign="top">
		  <table width="95%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="18" background="../images/b-2.gif"><img src="../images/b-1.gif" width="18" height="34"></td>
			  <td background="../images/b-2.gif"><?php include("top-message.php"); ?></td>
			  <td width="18" background="../images/b-3.gif"><img src="../images/b-3.gif" width="18" height="34"></td>
			</tr>
		  </table>
		
	  <?php include("top-banner.php"); ?>
	  <?php include("title_message.php"); ?>
	  <!--<p><a href="../TEG.png" target="_blank"><img src="../TEG_s.png" alt="The DBD Corporate Governance Awards 2011" border="0"style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"></a></p> -->
	  <?php include("mid-banner.php"); ?>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td  align="right"><ul id="maintab" class="shadetabs">
                <li class="selected"><a href="#activities" rel="tcontent1"><img src="../th/images/inside/nr-en_29.jpg" alt="TRA MEETING" name="กิจกรรมการประชุม11" width="161" height="35" border="0" id="กิจกรรมการประชุม11" /></a></li>
                <li><a href="#activities" rel="tcontent2"><img src="../th/images/inside/nr-en_30.jpg" alt="OTHERS ACTIVITIES" name="กิจกรรมการประชุม2" width="160" height="35" border="0"  /></a></li>
              </ul>
            <a name="activities"></td>
            <td background="ajaxtabs/bgtabs2.gif"></td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="3" align="right">
               <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td width="18"></td>
                  <td width="943" align="left"><div class="tabcontentstyle">
                      <div id="tcontent1" class="tabcontent">
                        <?php $cateID=2; include('showact.php');?>
                      </div>
                    <div id="tcontent2" class="tabcontent">
                      <?php $cateID=1; include('showact2.php');?>
                    </div>
                  </div>
                    <script type="text/javascript">
				//Start Tab Content script for UL with id="maintab" Separate multiple ids each with a comma.
				initializetabcontent("maintab")
				</script>                  </td>
                  <td width="14"></td>
                </tr>
                <tr>
                  <td width="18" height="10" valign="top">&nbsp;</td>
                  <td height="10" align="center"></td>
                  <td height="10">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
        </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td align="right" >
               <ul id="maintab2" class="shadetabs">
                <li class="selected"><a href="#activities" rel="tcontent3"><img src="../th/images/inside/nr-en_53.jpg" alt="WORLD ECONOMIC NEWS" name="ข่าวสาร11" width="171" height="35" border="0" id="ข่าวสาร11" /></a></li>
                <li><a href="#activities" rel="tcontent4"><img src="../th/images/inside/nr-en_54.jpg" alt="AUTOMOBILE INDUSTRY NEWS" name="ข่าวสาร21" width="191" height="35" border="0" id="ข่าวสาร21" /></a></li>
                <li><a href="#activities" rel="tcontent5"><img src="../th/images/inside/nr-en_55.jpg" alt="RUBBER NEWS" name="ข่าวสาร3" width="134" height="35" border="0" id="ข่าวสาร3" /></a></li>
              </ul>
            <a name="activities"></a></td>
            <td  background="ajaxtabs/bgtabs2.gif"></td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="3" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td width="18"></td>
                  <td width="943" align="left"><div class="tabcontentstyle">
                      <div id="tcontent3" class="tabcontent">
                        <?php include('5news03.php');?>
                      </div>
                    <div id="tcontent4" class="tabcontent">
                      <?php include('5news02.php');?>
                    </div>
                    <div id="tcontent5" class="tabcontent">
                      <?php include('5news01.php');?>
                    </div>
                  </div>
                    <script type="text/javascript">
				//Start Tab Content script for UL with id="maintab" Separate multiple ids each with a comma.
				initializetabcontent("maintab2")
				</script>                  
                </td>
                <td width="14"></td>
                </tr>
                <tr>
                  <td width="18" height="10" valign="top">&nbsp;</td>
                  <td height="10"></td>
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
         <td align="left" valign="top"><iframe src="../Annual_2019/dinner/index.html" width="550" height="420" frameborder="0" scrolling="no"></iframe></td>
         <td align="left" valign="top"><iframe src="../Annual_2019/ARBC/index.html" width="550" height="420" frameborder="0" scrolling="no"></iframe></td>
       </tr>
     </tbody>
   </table>

        
        
        <!--<table width="1025" height="482" border="0" cellspacing="0" cellpadding="0" style="background-image: url(../Annual_2018/bg-annual-2018.jpg); background-repeat: no-repeat;">
         <tr>
			 <td width="496" height="87" valign="bottom" align="right" style="font-size: 10pt;"><a href="http://www.thainr.com/Annual_2018/dinner.html" target="_blank" style="text-decoration: none;"><i class="fa fa-search-plus"></i> Full Screen</a></td>
            <td width="31" valign="bottom">&nbsp;</td>
            <td  align="right" valign="bottom" style="font-size: 10pt;"><a href="http://www.thainr.com/Annual_2018/golf.html" target="_blank" style="text-decoration: none;"><i class="fa fa-search-plus"></i> Full Screen</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td align="right" valign="top"><iframe src="../Annual_2018/dinner.html" frameborder="0" scrolling="no" style="width:480px; height: 370px; text-align: right"></iframe></td>
            <td >&nbsp;</td>
            <td align="left" valign="top"><iframe src="../Annual_2018/golf.html" frameborder="0" scrolling="no" style="width:480px; height: 370px; text-align: left"></iframe></td>
          </tr>
        </table>-->
        <br>
        
       <!-- <table width="959" height="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(../Annual_2017/bg-annual-2017-video1.jpg); background-repeat:no-repeat; background-position: center top;">
          <tr>
            <td width="959" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3%" height="117" align="center" valign="bottom">&nbsp;</td>
                <td width="96%" align="center">&nbsp;</td>
                <td width="1%" align="center" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="495" align="center" valign="top"></td>
                <td height="495" align="center" valign="top"><iframe width="750" height="480" src="https://www.youtube.com/embed/0r1ZxcseI8I" frameborder="0" allowfullscreen></iframe></td>
                <td align="center"><p>&nbsp;</p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
          </tr>
        </table>
          <table width="959" height="513" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(../Annual_2016/bg-annual-2016-EN-2.jpg); background-repeat:no-repeat">
  <tr>
    <td width="959" align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="135" align="center" valign="bottom">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center" valign="bottom">&nbsp;</td>
        </tr>
        <tr>
          <td height="495" align="center" valign="top"></td>
          <td height="410" align="center" valign="top"><iframe src="../Annual_2016/dinner/slide/index.html" width="700" height="480" frameborder="0"  scrolling="no"></iframe></td>
          <td align="center"></td>
        </tr>
</table>
</td>
  </tr>
</table>
<table width="958" height="340" border="0" cellspacing="0" cellpadding="0" background="../Annual_2016/bg-arbc-golf.jpg">
          <tr>
            <td width="482" height="87" valign="bottom">&nbsp;</td>
            <td width="476" valign="bottom">&nbsp;</td>
          </tr>
          <tr>
            <td width="482" align="center" valign="top"><iframe src="../Annual_2016/ARBC/slide/index.html" width="430" height="200" frameborder="0"  scrolling="no"></iframe></td>
            <td align="center" valign="top"><iframe src="../Annual_2016/Golf/slide/index.html" width="430" height="200" frameborder="0"  scrolling="no"></iframe></td>
          </tr>
        </table>
-->

<!-- ปัญหาเศษยาง
        <table width="959" height="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(../Annual_2017/bg-rubber.jpg); background-repeat:no-repeat; background-position: center top;">
          <tr>
            <td width="959" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3%" height="86" align="center" valign="bottom">&nbsp;</td>
                <td width="96%" align="center">&nbsp;</td>
                <td width="1%" align="center" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="495" align="center" valign="top"></td>
                <td height="495" align="center" valign="top"><iframe width="750" height="505" src="../dead_rubber.html" frameborder="0" scrolling="no" allowfullscreen></iframe></td>
                <td align="center"><p>&nbsp;</p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
          </tr>
        </table>
-->
        <!--<table width="1100" height="440" border="0" align="center" cellpadding="0" cellspacing="0"  style="background-image:url(../Annual_2017/bg-annual-2017-video4-en.jpg); background-repeat:no-repeat">
          <tr>
            <td width="551" height="111" align="left" valign="top">&nbsp;</td>
            <td width="549" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top"><iframe src="../Annual_2017/dinner/slide/index.html"  width="500" height="290" frameborder="0"  scrolling="no"></iframe></td>
            <td width="549" align="center" valign="top"><iframe src="../Annual_2017/golf/slide/index.html"  width="500" height="290"  frameborder="0"  scrolling="no"></iframe></td>
          </tr>
        </table>-->
        <br>
        
<!------WEBBOARD  
<table width="95%" border="0" cellpadding="0" cellspacing="0" class="radius5">
          <tr>
            <td height="20" colspan="2" align="left" bgcolor="#FFFFFF"><img src="../th/images/h-title-other.gif" width="240" height="27" vspace="10" /></td>
            <td height="20" colspan="4" align="right" nowrap class="LR10" bgcolor="#FFFFFF">&nbsp;<a href="#" class="new_topic" onClick="windowOpener(700, 1000, 'windowName', 'newtopic.php?selectCateBoard=0')">Post New Topic</a>&nbsp;<a class="new_topic" href="?detail=webboard&selectCateBoard=0">All Topic</a></td>
        </tr>
          <tr>
            <td height="22" colspan="2" align="center" bgcolor="#53c5ef" class="LR10"><strong>Topic</strong></td>
            <td width="80" height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>Post By</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>Reply</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>View</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>Date</strong></td>
          </tr> 
          <?php
		  	//$queryboard= "SELECT * FROM `tbl_webboard_question` ORDER BY post_date  DESC   LIMIT 0, 16 ";
			//$resultBoard_1 = mysql_query($queryboard);
		   while($board=mysql_fetch_assoc($resultBoard_1)){ ?>
          <tr class="bottom-dot FontMS10" bgcolor="#FFFFFF">
          <td width="15" height="20" class="bottom-dot FontMS10" bgcolor="#FFFFFF"></td>
          <td width="379" height="20" align="left" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><img src="../images/icon/30x30/google_talk_30_5.png" alt="webboard" width="20" height="20" hspace="5" vspace="3" style="vertical-align:text-bottom" />
		  <a href="#" onClick="windowOpener(850, 1000, 'windowName', 'preview_board.php?NID=<?php //echo $board['id']?>')">
		  <?php //echo $board['question']?> </a>
                <?php //$icon="<img src=../th/images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>
                <?php //if($board['view'] >= 50){ ?>
                <img src="../th/images/Gif_Icon_Hot.gif" border="0">
                <?php } ?>            </td>
            <td width="80" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //echo $board['user']?></td>
            <td width="52" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //echo $board['ans']?></td>
            <td width="54" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //echo $board['view']?></td>
            <td width="139" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //GetThaiDate($board['post_date'])?></td>
        </tr>
          <?php  // } ?>
          <tr>
            <td width="15" height="5" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="80" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="54" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="139" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="20" colspan="2" align="left" bgcolor="#FFFFFF"><img src="../th/images/h-title-us.gif" width="240" height="27" vspace="10" /></td>
            <td height="20" colspan="4" align="right" bgcolor="#FFFFFF"><a href="#" class="new_topic"onClick="windowOpener(700, 1000, 'windowName', 'newtopic.php?selectCateBoard=1')">Post New Topic</a>&nbsp;<a class="new_topic" href="?detail=webboard&selectCateBoard=1">All Topic</a></td>
          </tr>
          <tr>
            <td height="22" colspan="2" align="center" bgcolor="#53c5ef" class="LR10"><strong>Topic</strong></td>
            <td width="80" height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>Post By</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>Reply</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>View</strong></td>
            <td height="22" align="center" nowrap bgcolor="#53c5ef" class="LR10"><strong>Date</strong></td>
          </tr>
          <?php //while($board=mysql_fetch_assoc($resultBoard_2)){ ?>
          <tr class="bottom-dot FontMS10" bgcolor="#FFFFFF">
          <td width="15" height="20" class="bottom-dot FontMS10" bgcolor="#FFFFFF"></td>
          <td width="379" height="20" align="left" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><img src="../images/icon/30x30/google_talk_30_5.png" alt="webboard" width="20" height="20" hspace="5" vspace="3" style="vertical-align:text-bottom" />
          <a href="#" onClick="windowOpener(850, 1000, 'windowName', 'preview_board.php?NID=<?php //echo $board['id']?>')">
           <?php //echo $board['question']?> </a>
                <?php //$icon="<img src=../th/images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>
                <?php //if($board['view'] >= 50){ ?>
                <img src="../th/images/Gif_Icon_Hot.gif" border="0">
                <?php //} ?>            </td>
            <td width="80" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //echo $board['user']?></td>
            <td width="52" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //echo $board['ans']?></td>
            <td width="54" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //echo $board['view']?></td>
            <td width="139" height="20" align="center" bgcolor="#FFFFFF" class="bottom-dot FontMS10"><?php //GetThaiDate($board['post_date'])?></td>
          </tr>
          <?php // } ?>
          <tr>
            <td height="10" colspan="6" align="left" bgcolor="#FFFFFF"><hr width="80%" size="1"></td>
          </tr>
          <tr>
            <td width="15" height="54" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="5" align="left" bgcolor="#FFFFFF">
            <table width="100%" border="0" class="FontMS10" >
          <tr>
            <td align="left" bgcolor="#FFFFF5">
              <p><strong>กฎ กติกา ในการร่วมแสดงความคิดเห็น</strong><br>
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



<!--<iframe src="../column.html" width="100%" height="800" frameborder="0" align="left" marginheight="0" marginwidth="0" scrolling="no"></iframe> -->
<!--<img src="../images/RUBBER FUTURES.jpg" width="300" height="95" border="0"><br>
<IFRAME id="tabiframe" marginWidth=0 marginHeight=0 src="http://www.afet.or.th/marketDataRubber_e.php"  frameborder="1" width="95%" scrolling="auto" height="750" style="background-color:#FFF; border:thin; border:#CCC; border:1px; font-family:Arial, Helvetica, sans-serif; font-size:10px;"></IFRAME>-->
	
    </tr>
  </table><br>	<?php include("bt-banner.php"); ?></td>