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
	  <table width="96%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="2%" background="../images/b-2.gif"><img src="../images/b-1.gif" width="18" height="34"></td>
          <td width="96%" background="../images/b-2.gif"><?php include("top-message.php"); ?></td>
          <td width="2%" background="../images/b-3
          .gif"><img src="../images/b-3.gif" width="18" height="34"></td>
        </tr>
      </table>
	  <p><?php include("top-banner.php"); ?></p>
	  <p><?php include("title_message.php"); ?></p>
	  <!--<p><a href="../TEG.png" target="_blank"><img src="../TEG_s.png" alt="The DBD Corporate Governance Awards 2011" border="0"style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"></a></p> -->
	  <p><?php include("mid-banner.php"); ?></p>
    
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td  align="right" background="../th/ajaxtabs/bgtabs2.gif"><ul id="maintab" class="shadetabs">
                <li class="selected"><a href="#activities" rel="tcontent1"><img src="../th/images/inside/nr-en_29.jpg" alt="TRA MEETING" name="กิจกรรมการประชุม11" width="161" height="35" border="0" id="กิจกรรมการประชุม11" /></a></li>
                <li><a href="#activities" rel="tcontent2"><img src="../th/images/inside/nr-en_30.jpg" alt="OTHERS ACTIVITIES" name="กิจกรรมการประชุม2" width="160" height="35" border="0"  /></a></li>
              </ul>
            <a name="activities"></td>
            <td background="ajaxtabs/bgtabs2.gif"></td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="3" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td width="18" background="../th/images/inside/bg-tab-L.gif"><img src="../th/images/spacer.gif" width="18" height="6" /></td>
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
                  <td width="14" background="../th/images/inside/bg-tab-R.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td width="18" height="10" valign="top"><img src="../th/images/inside/bg-tab-CL.gif" alt="thai nr" width="18" height="10" /></td>
                  <td height="10" align="center" background="../th/images/inside/bg-tab-bot.gif"></td>
                  <td height="10"><img src="../th/images/inside/bg-tab-CR.gif" alt="thai nr" width="14" height="10" /></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
            <td align="right" background="../th/ajaxtabs/bgtabs2.gif"><ul id="maintab2" class="shadetabs">
                <li class="selected"><a href="#activities" rel="tcontent3"><img src="../th/images/inside/nr-en_53.jpg" alt="WORLD ECONOMIC NEWS" name="ข่าวสาร11" width="171" height="35" border="0" id="ข่าวสาร11" /></a></li>
                <li><a href="#activities" rel="tcontent4"><img src="../th/images/inside/nr-en_54.jpg" alt="AUTOMOBILE INDUSTRY NEWS" name="ข่าวสาร21" width="191" height="35" border="0" id="ข่าวสาร21" /></a></li>
                <li><a href="#activities" rel="tcontent5"><img src="../th/images/inside/nr-en_55.jpg" alt="RUBBER NEWS" name="ข่าวสาร3" width="134" height="35" border="0" id="ข่าวสาร3" /></a></li>
              </ul>
            <a name="activities"></td>
            <td  background="ajaxtabs/bgtabs2.gif"></td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="3" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td width="18" background="../th/images/inside/bg-tab-L.gif"><img src="../th/images/spacer.gif" width="18" height="1" /></td>
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
				</script>                  </td>
                  <td width="14" background="../th/images/inside/bg-tab-R.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td width="18" height="10" valign="top"><img src="../th/images/inside/bg-tab-CL.gif" alt="thai nr" width="18" height="10" /></td>
                  <td height="10" align="center" background="../th/images/inside/bg-tab-bot.gif"></td>
                  <td height="10"><img src="../th/images/inside/bg-tab-CR.gif" alt="thai nr" width="14" height="10" /></td>
                </tr>
            </table></td>
          </tr>
        </table>
<!-- <p><iframe src="../activity-2013/Dinner-1.html" width="784" height="451" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe></p>
        <p></p>
       <p><iframe src="../activity-2013/Golf.html" width="784" height="510" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe></p>
        <p></p>
          <p><iframe src="../activity-2013/ARBC.html" width="784" height="451" scrolling="no" marginheight="0" marginwidth="0" frameborder="0"></iframe></p>
        <p></p> 
-->        <table id="Table_" width="658" height="255" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="5"><img src="images/wb_chat_en_01.jpg" width="658" height="108" alt=""></td>
          </tr>
          <tr>
            <td colspan="2"><img src="images/wb_chat_en_02.jpg" width="282" height="29" alt=""></td>
            <td colspan="2"><a href="?detail=webboard"><img src="images/wb_chat_en_03.jpg" alt="" width="135" height="29" border="0"></a></td>
            <td><img src="images/wb_chat_en_04.jpg" width="241" height="29" alt=""></td>
          </tr>
          <tr>
            <td><img src="images/wb_chat_en_05.jpg" width="229" height="46" alt=""></td>
            <td colspan="2"><a href="../livechat/index.php" target="_blank"><img src="images/wb_chat_en_06.jpg" alt="" width="124" height="46" border="0"></a></td>
            <td colspan="2"><img src="images/wb_chat_en_07.jpg" width="305" height="46" alt=""></td>
          </tr>
          <tr>
            <td colspan="5"><img src="images/wb_chat_en_08.jpg" width="658" height="71" alt=""></td>
          </tr>
          <tr>
            <td><img src="images/spacer.gif" width="229" height="1" alt=""></td>
            <td><img src="images/spacer.gif" width="53" height="1" alt=""></td>
            <td><img src="images/spacer.gif" width="71" height="1" alt=""></td>
            <td><img src="images/spacer.gif" width="64" height="1" alt=""></td>
            <td><img src="images/spacer.gif" width="241" height="1" alt=""></td>
          </tr>
        </table>
        <table width="95%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="35" colspan="2" align="center" bgcolor="#ADD71B" class="LR10"><strong>TOPICS</strong></td>
            <td width="80" height="35" align="center" nowrap bgcolor="#ADD71B" class="LR10"><strong>POST BY</strong></td>
            <td align="center" nowrap bgcolor="#ADD71B" class="LR10"><strong>REPLIES</strong></td>
            <td height="35" align="center" nowrap bgcolor="#ADD71B" class="LR10"><strong>VIEWS</strong></td>
            <td height="35" align="center" nowrap bgcolor="#ADD71B" class="LR10"><strong>  </strong></td>
          </tr>
              <tr>
            <td height="35" colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;<img src="../th/images/h-title-other.gif" width="240" height="27" vspace="10"><br></td>
            <td width="80" height="35" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="52" height="35" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="54" height="35" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="139" height="35" bgcolor="#FFFFFF">&nbsp;</td>
          </tr> 
          <?php while($board=mysql_fetch_assoc($resultBoard_1)){ ?>
          <tr class="FontMS10">
            <td width="15" align="left" bgcolor="#fffff5" ></td>
          <td width="379" align="left" bgcolor="#fffff5" class="FontMS10"><img src="../th/images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom"> <a href="#"  onclick="OpenNew('preview_board.php?NID=<?php echo $board['id']?>','850', '750' , '200' , '10')"> <?php echo $board['question']?> </a>
                <?php $icon="<img src=../th/images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>
                <?php if($board['view'] >= 50){ ?>
                <img src="../th/images/Gif_Icon_Hot.gif" border="0">
                <?php } ?>
            </td>
            <td width="80" align="center" bgcolor="#fffff5" class="FontMS10"><?php echo $board['user']?></td>
            <td width="52" align="center" bgcolor="#fffff5" class="FontMS10"><?php echo $board['ans']?></td>
            <td width="54" align="center" bgcolor="#fffff5" class="FontMS10"><?php echo $board['view']?></td>
            <td width="139" align="center" bgcolor="#fffff5" class="FontMS10"><?php GetThaiDate($board['post_date'])?></td>
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
            <td height="5" colspan="2" align="left" bgcolor="#FFFFFF"><img src="../th/images/h-title-us.gif" width="240" height="27" vspace="10"></td>
            <td width="80" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="54" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="139" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <?php while($board=mysql_fetch_assoc($resultBoard_2)){ ?>
          <tr class="FontMS10">
            <td width="15" align="left" bgcolor="#fffff5" ></td>
          <td width="379" align="left" bgcolor="#fffff5" class="FontMS10"><img src="../th/images/postcommemt.gif" alt="webboard" width="16" height="16" hspace="5" vspace="3" align="bottom"> <a href="#"  onclick="OpenNew('preview_board.php?NID=<?php echo $board['id']?>','850', '750' , '200' , '10')"> <?php echo $board['question']?> </a>
                <?php $icon="<img src=../th/images/3_43.gif  hspace=3 />";  $day =$board['post_date']; GetNewIcon($day,$icon)?>
                <?php if($board['view'] >= 50){ ?>
                <img src="../th/images/Gif_Icon_Hot.gif" border="0">
                <?php } ?>
            </td>
            <td width="80" align="center" bgcolor="#fffff5" class="FontMS10"><?php echo $board['user']?></td>
            <td width="52" align="center" bgcolor="#fffff5" class="FontMS10"><?php echo $board['ans']?></td>
            <td width="54" align="center" bgcolor="#fffff5" class="FontMS10"><?php echo $board['view']?></td>
            <td width="139" align="center" bgcolor="#fffff5" class="FontMS10"><?php GetThaiDate($board['post_date'])?></td>
          </tr>
          <?php } ?>
          <tr>
            <td height="5" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="80" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="54" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="139" align="right" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="15" height="54">&nbsp;</td>
            <td colspan="5" align="right">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                <tr>
                  <td width="61"><table width="220" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                      <tr>
                        <!--<td width="11"><img src="../th/images/inside/nr_92.jpg" width="11" height="36" alt="" /></td> -->
                        <!--<td width="279" align="center" background="../th/images/inside/nr_94.jpg"><a href="http://www2.thainr.com/aspboard_th/default.asp" target="_blank" ><strong>ดูเว็บบอร์ดเก่า คลิ๊กที่นี่!!</strong></a></td> -->
                        <!--<td width="13"><img src="../th/images/inside/nr_95.jpg" width="13" height="36" alt="" /></td> -->
                      </tr>
                  </table> </td>
                  <td width="438">&nbsp;</td>
                  <td width="11" align="center" background="../th/images/inside/nr_94.jpg"><img src="../th/images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                  <td width="122" align="center" background="../th/images/inside/nr_94.jpg"><a href="#"  onclick="OpenNew('newtopic.php','850', '750' , '200' , '100')"><strong>Post new topic</strong></a></td>
                  <td width="13"><img src="../th/images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
                  <td width="12">&nbsp;</td>
                  <td width="11"><img src="../th/images/inside/nr_92.jpg" width="11" height="36" alt="" /></td>
                  <td width="125" align="center" background="../th/images/inside/nr_94.jpg"><a href="?detail=webboard"><strong>View all topics</strong></a></td>
                  <td width="13" align="left"><img src="../th/images/inside/nr_95.jpg" width="13" height="36" alt="" /></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <table width="95%" border="1" cellpadding="5" cellspacing="5" bordercolor="#FFFFFF" bgcolor="#ADD71B">
          <tr>
            <td align="left" bgcolor="#FFFFF5" class="FontMS10"><blockquote>
              <p><strong>กฎ กติกา ในการร่วมแสดงความคิดเห็น</strong><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                1. โปรดงดเว้น การใช้คำหยาบคาย ส่อเสียด ดูหมิ่น กล่าวหาให้ร้าย สร้างความแตกแยก หรือกระทบถึงสถาบันอันเป็นที่เคารพ<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                2. ทุกความคาดเห็นไม่เกี่ยวข้องกับผู้ดำเนินการเว็บไซต์ และไม่สามารถนำไปอ้างอิงทางกฎหมายได้<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                3. ทีมงานเว็บมาสเตอร์ขอสงวนสิทธิ์ในการลบความคิดเห็น โดยไม่ต้องชี้แจงเหตุผลใดๆ ต่อเจ้าของความคิดเห็นนั้น<br>
                <br>
                การเข้าร่วมในกิจกรรมของเว็บไซต์ไม่ว่าจะเป็นการตั้งกระทู้ หรือการร่วมแสดงความเห็นในกระทู้ต่างๆ ในเว็บไซต์ จึงจำเป็นต้องกระทำด้วยความระมัดระวัง เพื่อไม่ให้เกิดความเสียหายต่อสังคมส่วนรวม การควบคุมและดูแลอาจไม่สามารถทำได้อย่างทั่วถึง เพราะทุกคนสามารถพิมพ์ข้อความต่างๆ เข้ามาได้โดยอิสระขึ้นอยู่กับสำนึกและความรับผิดชอบต่อสังคมของผู้ร่วมกิจกรรมว่าจะมีมากน้อยเพียงไร ดังนั้นทางทีมงานสมาคมยางพาราไทย จึงไม่อาจร่วมรับผิดชอบในข้อความทุกข้อความที่ส่งเข้ามา หวังเป็นอย่างยิ่งว่าจะได้รับความร่วมมือจากทุกๆ ท่านที่ร่วมกิจกรรมด้วยดี และใคร่ขอความร่วมมือจากผู้เข้าร่วมกิจกรรมทุกท่านช่วยเป็นหูเป็นตาสอดส่องกระทู้ที่เข้าข่ายผิดกฎ กติกา มารยาทดังกล่าว หากพบก็โปรดแจ้งได้ภายในแต่ละกระทู้ได้ในทันที โดยทีมงานสมาคมยางพาราไทยจะพิจารณาดำเนินการตามความเหมาะสมต่อไป</p>
            </blockquote></td>
          </tr>
        </table>
<p><!--<iframe src="../column.html" width="100%" height="800" frameborder="0" align="left" marginheight="0" marginwidth="0" scrolling="no"></iframe> -->
<img src="../images/RUBBER FUTURES.jpg" width="300" height="95" border="0"><br>
<br><IFRAME id="tabiframe" marginWidth=0 marginHeight=0 src="http://www.afet.or.th/marketDataRubber_e.php" frameBorder=0 width="775" scrolling=no height="500"></IFRAME></p>
		    <p>
		<p><?php include("bt-banner.php"); ?></p>
		</p></td>
    </tr>
  </table>
