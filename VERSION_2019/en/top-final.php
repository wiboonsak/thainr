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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

<table width="100%" height="127" border="0" align="center" cellpadding="0" cellspacing="0"  background="images/top_02.jpg">
  <tr>
    <td valign="top"><IMG SRC="images/logo-header.jpg" ALT="THAI NR" border="0" class="logo"></td>
    <td>&nbsp;</td>
    <td align="left" valign="bottom" class="bg_right">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
			<tr>
			  <td style="padding-left: 10px">
				<a href="http://www.thainr.com/VERSION_2019/th/index.php"><img src="images/language_01.png" onmouseover="this.src='images/language_over_01.png'" onmouseout="this.src='images/language_01.png'" class="img_lang"></a>
				<a href="http://www.thainr.com/VERSION_2019/en/index.php"><img src="images/language_02.png" onmouseover="this.src='images/language_over_02.png'" onmouseout="this.src='images/language_02.png'" class="img_lang"></a>
				<a href="http://www.thainr.com/VERSION_2019/ch/index.php"><img src="images/language_03.png" onmouseover="this.src='images/language_over_03.png'" onmouseout="this.src='images/language_03.png'" class="img_lang"></a>
			  </td>
			</tr>
			<tr>
			  <td ><a href="http://www.thainr.com/th/journal.php" target="_blank"><img src="images/magazine.png" alt="E-Magazine" class="img_lang" border="0" style=" opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.7;this.filters.alpha.opacity=70"
		onMouseOut="this.style.opacity=1;this.filters.alpha.opacity=100"/></a> <a href="https://www.facebook.com/pages/%E0%B8%AA%E0%B8%A1%E0%B8%B2%E0%B8%84%E0%B8%A1%E0%B8%A2%E0%B8%B2%E0%B8%87%E0%B8%9E%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B9%84%E0%B8%97%E0%B8%A2-The-Thai-Rubber-Association/150592478364496" target="_blank"><img src="images/facebook-2.png" alt="facebook" class="img_lang" border="0" style="padding-right:15px; opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.7;this.filters.alpha.opacity=70"
		onMouseOut="this.style.opacity=1;this.filters.alpha.opacity=100"/></a>  </td>
			</tr>
		  </tbody>
		</table>		
    </td>
  </tr>
</table>





<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
  <h2>Responsive Topnav Example</h2>
  <p>Resize the browser window to see how it works.</p>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>









<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
	<td align="left">
		
		<div id="cssmenu">
			<ul>
				<li><a href="index.php">หน้าหลัก</a></li>
				<li><a href="index.php?detail=message">สารจากนายก</a></li>
				<li class="has-sub"><a href="#">แนะนำสมาคม</a>
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
				<li><a href="index.php?detail=news-rubber">ข่าวสาร</a></li>
				<li class="has-sub"><a href="#">กิจกรรม</a>
					<ul>
						<li><a href="index.php?detail=ac-meeting">กิจกรรม</a></li>
						<li><a href="index.php?detail=ac-calendar">ปฎิทินกิจกรรม</a></li>
					</ul>
				</li>		
				<li class="has-sub"><a href="#">ราคายาง</a>
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
				<li><a href="index.php?detail=situation">สถานการณ์ยาง</a></li>
				<li class="has-sub"><a href="#">สถิติยาง</a>
					<ul>
						<li><a href="index.php?detail=stat-thai">สถิติยางไทย</a></li>
						<li><a href="index.php?detail=stat-world">สถิติยางโลก</a></li>
						<li><a href="index.php?detail=stat-other">สถิติอื่นๆ ที่เกี่ยวข้อง</a></li>
					</ul>
				</li>
				<li class="has-sub"><a href="#">ข้อมูลวิชาการ</a>
					<ul>				
					
						<li><a href="#">กฏระเบียบที่เกี่ยวข้อง</a></li>
						<li class="has-sub"><a href="#">ข้อมูลโรงงานแปรรูปยาง ผลิตภัณฑ์ยางและไม้ยางพารา ปี 2556</a>
							<ul>
							   <li><a href="#">ทำเนียบโรงงานแปรรูปยาง</a></li>
							   <li class="last"><a href="#">ข้อมูลโรงงานผลิตภัณฑ์ยาง</a></li>
							</ul>
						</li>
						<li><a href="#">ความยั่งยืน</a></li>
						<li class="has-sub"><a href="#">สัญญาการค้า</a>
							<ul>
							   <li><a href="#">สัญญาการค้าสมาคมยางนานาชาติ</a></li>
							   <li class="last"><a href="#">มาตรฐานสมาคมยางนานาชาติว่าด้วยคุณภาพและการบรรจุหีบห่อยางธรรมชาติ (IRQPC-The Green Book)</a></li>
							</ul>						
						</li>
						<li><a href="#">อื่นๆ</a></li>
					</ul>
				</li>
				<li><a href="index.php?detail=webboard">คุยกันเรื่องยาง</a></li>
				<li><a href="index.php?detail=weblink">เชื่อมโยงเว็บไซต์</a></li>		
				<li><a href="index.php?detail=contact">ติดต่อสอบถาม</a></li>
			</ul>
		</div>
	
	</td>
  </tr>
</table>
<!-- End ImageReady Slices -->