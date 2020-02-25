<!--------- code slide to top -------->

    <script src="../control/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
	<style>
		div#page {
			max-width: 900px;
			margin-left: auto;
			margin-right: auto;
			padding: 2px;
		}
		
		.back-to-top {
			position: fixed;
			bottom: 0em;
			right: 0px;
			text-decoration: none;
			color: #000000;
/*			background-color: rgba(235, 235, 235, 0.80);
*/			font-size: 12px;
			padding: 0em;
			display: none;
		}

		.back-to-top:hover {	
/*			background-color: rgba(135, 135, 135, 0.50);
*/		}	
	</style>


<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>



<!--  MENU TOP Javascript -->
<link href="menu_top/style_nav.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function(){

	//Hide SubLevel Menus
	$('#header ul li ul').hide();

	//OnHover Show SubLevel Menus
	$('#header ul li').hover(
		//OnHover
		function(){
			//Hide Other Menus
			$('#header ul li').not($('ul', this)).stop();

			//Add the Arrow
			$('ul li:first-child', this).before(
				'<li class="arrow">arrow</li>'
			);

			//Remove the Border
			$('ul li.arrow', this).css('border-bottom', '0');

			// Show Hoved Menu
			$('ul', this).slideDown();
		},
		//OnOut
		function(){
			// Hide Other Menus
			$('ul', this).slideUp();

			//Remove the Arrow
			$('ul li.arrow', this).remove();
		}
	);

});
 
</script>

<table width="100%" height="127" border="0" align="center" cellpadding="0" cellspacing="0"  background="../th/images/top_02.jpg">
  <tr>
    <td width="579" height="127" valign="top"><IMG SRC="../th/images/logo-header.jpg" width="579" height="127" ALT="THAI NR"  border="0"></td>
    <td height="127">&nbsp;</td>
    <td width="420" align="left" valign="bottom" style="background-image: url(../th/images/top_03_new.jpg); background-repeat: no-repeat; background-position: right;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="padding-left: 10px"><a href="http://www.thainr.com/VERSION_2019/th/index.php"><img src="images/language_01.png" onmouseover="this.src='images/language_over_01.png'" onmouseout="this.src='images/language_01.png'"></a>
		<a href="http://www.thainr.com/VERSION_2019/en/index.php"><img src="images/language_02.png" onmouseover="this.src='images/language_over_02.png'" onmouseout="this.src='images/language_02.png'"></a>
		<a href="http://www.thainr.com/VERSION_2019/ch/index.php"><img src="images/language_03.png" width="100" height="31" onmouseover="this.src='images/language_over_03.png'" onmouseout="this.src='images/language_03.png'"></a></td>
    </tr>
    <tr>
      <td ><a href="http://www.thainr.com/th/journal.php" target="_blank"><img src="../th/images/magazine.png" alt="E-Magazine" width="130" height="43" border="0" style=" opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.7;this.filters.alpha.opacity=70"
onMouseOut="this.style.opacity=1;this.filters.alpha.opacity=100"/></a> <a href="https://www.facebook.com/pages/%E0%B8%AA%E0%B8%A1%E0%B8%B2%E0%B8%84%E0%B8%A1%E0%B8%A2%E0%B8%B2%E0%B8%87%E0%B8%9E%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B9%84%E0%B8%97%E0%B8%A2-The-Thai-Rubber-Association/150592478364496" target="_blank"><img src="images/facebook-2.png" alt="facebook" width="130" height="43" border="0" style="padding-right:15px; opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.7;this.filters.alpha.opacity=70"
onMouseOut="this.style.opacity=1;this.filters.alpha.opacity=100"/></a>  </td>
    </tr>
  </tbody>
</table>

		
    </td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
	<td align="left">
		<div id="header">
			<ul>
				<li><a href="index.php">หน้าหลัก</a></li>
				<li><a href="index.php?detail=message">สารจากนายก</a></li>
				<li><a href="#">แนะนำสมาคม</a>
					<ul>
						<li><a href="index.php?detail=history">ประวัติสมาคม</a></li>
						<li><a href="index.php?detail=board">คณะกรรมการสมาคม</a></li>
						<li><a href="index.php?detail=subboard">อนุกรรมการฝ่ายต่าง ๆ ของสมาคม</a></li>
						<li><a href="index.php?detail=advisor">ที่ปรึกษาสมาคม</a></li>
						<li><a href="index.php?detail=enroll">ระเบียบ และการเป็นสมาชิกสมาคม</a></li>
						<li><a href="index.php?detail=member">สมาชิกสมาคมยางพาราไทย</a></li>
						<li><a href="index.php?detail=organize">องค์กรเกี่ยวกับยางพารา</a></li>
					</ul>
				</li>	
				<li style="width:80px !important"><a href="index.php?detail=news-rubber">ข่าวสาร</a></li>
				<li style="width:80px !important"><a href="#">กิจกรรม</a>
					<ul>
						<li><a href="index.php?detail=ac-meeting">กิจกรรม</a></li>
						<li><a href="index.php?detail=ac-calendar">ปฎิทินกิจกรรม</a></li>
					</ul>
				</li>		
				<li style="width:80px !important"><a href="#">ราคายาง</a>
					<ul>
						<li><a href="index.php?detail=pr-offer">ราคาเสนอขายยางพารา</a></li>
						<li><a href="index.php?detail=pr-local">ราคายางในตลาดท้องถิ่น</a></li>
						<li><a href="index.php?detail=rubber_center_main_preview">ราคายางตลาดกลางยางพารา สงขลา</a></li>
						<li><a href="index.php?detail=pr-cess">ราคาเกณฑ์ในการคำนวณค่า CESS</a></li>
						<li><a href="index.php?detail=ARBC_Price">ราคายางพารา ARBC</a></li>
						<li><a href="index.php?detail=PhysicalSpot_Price">PHYSICAL SPOT PRICES OF TIM</a></li>
						<li><a href="index.php?detail=pr-synthetic">ราคายางสังเคราะห์</a></li>
					</ul>
				</li>
				<li style="width:100px !important"><a href="index.php?detail=situation">สถานการณ์ยาง</a></li>
				<li style="width:80px !important"><a href="#">สถิติยาง</a>
					<ul>
						<li><a href="index.php?detail=stat-thai">สถิติยางไทย</a></li>
						<li><a href="index.php?detail=stat-world">สถิติยางโลก</a></li>
						<li><a href="index.php?detail=stat-other">สถิติอื่นๆ ที่เกี่ยวข้อง</a></li>
					</ul>
				</li>
				<li><a href="#">ข้อมูลวิชาการ</a>
					<ul>
						<li><a href="index.php?detail=information">กฏระเบียบที่เกี่ยวข้อง</a></li>
						<li><a href="#">ข้อมูลโรงงานแปรรูปยาง ผลิตภัณฑ์ยางและไม้ยางพารา ปี 2556</a></li>
							<div style="text-align: left">
								&nbsp;&nbsp;&#8226;&nbsp;<a href="index.php?detail=information">ทำเนียบโรงงานแปรรูปยาง</a><br>
								&nbsp;&nbsp;&#8226;&nbsp;<a href="index.php?detail=information">ข้อมูลโรงงานผลิตภัณฑ์ยาง</a>								
							</div>
						<li><a href="index.php?detail=information">ความยั่งยืน</a></li>
						<li><a href="#">สัญญาการค้า</a></li>
							<div style="text-align: left">
								&nbsp;&nbsp;&#8226;&nbsp;<a href="index.php?detail=information">สัญญาการค้าสมาคมยางนานาชาติ</a><br>
								&nbsp;&nbsp;&#8226;&nbsp;<a href="index.php?detail=information">มาตรฐานสมาคมยางนานาชาติว่าด้วยคุณภาพและการบรรจุหีบห่อยางธรรมชาติ (IRQPC-The Green Book)</a>	
							</div>							
						<li><a href="index.php?detail=information">อื่นๆ</a></li>
					</ul>
				</li>
				<li><a href="index.php?detail=webboard">คุยกันเรื่องยาง</a></li>
				<li style="width:116px !important"><a href="index.php?detail=weblink">เชื่อมโยงเว็บไซต์</a></li>		
				<li><a href="index.php?detail=contact">ติดต่อสอบถาม</a></li>
			</ul>
		</div>
	</td>
  </tr>
</table>
<!-- End ImageReady Slices -->