<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="caroufredsel.dev7studios.com" />

		<title>carouFredSel: a circular, responsive jQuery carousel</title>

		<!-- include jQuery + carouFredSel plugin -->
		<script type="text/javascript" language="javascript" src="jquery-1.8.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="jquery.carouFredSel-6.2.1-packed.js"></script>

		<!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.transit.min.js"></script>
		<script type="text/javascript" language="javascript" src="helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

		<!-- fire plugin onDocumentReady -->
		<script type="text/javascript" language="javascript">
			$(function() {

				//	Basic carousel, no options
				$('#foo0').carouFredSel();

				//	Basic carousel + timer, using CSS-transitions
				$('#foo1').carouFredSel({
					auto: {
						pauseOnHover: 'resume',
						progress: '#timer1'
					}
				}, {
					transition: true
				});

				//	Scrolled by user interaction
				$('#foo2').carouFredSel({
					auto: false,
					prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					}
				});

				//	Variable number of visible items with variable sizes
				$('#foo3').carouFredSel({
					width: 360,
					height: 'auto',
					prev: '#prev3',
					next: '#next3',
					auto: false
				});

				//	Responsive layout, resizing the items
				$('#foo4').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					items: {
						width: 400,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 6
						}
					}
				});

				//	Fuild layout, centering the items
				$('#foo5').carouFredSel({
					width: '100%',
					scroll: 2
				});

			});
		</script>

		<style type="text/css" media="all">
			html, body {
				padding: 0;
				margin: 0;
			}
			body, div, p {
				font-family: Arial, Helvetica, Verdana;
				color: #333;
			}
			body {
/*				background-color: #eee;
*/			}
			h1 {
				font-size: 60px;
			}
			a, a:link, a:active, a:visited {
				color: black;
				text-decoration: underline;
			}
			a:hover {
				color: #9E1F63;
			}
			#intro {
				width: 580px;
				margin: 0 auto;
			}
			.wrapper {
				width: 1350px;
/*				background-color: white;
				margin: 40px auto;
				padding: 50px;
				box-shadow: 0 0 5px #999;
*/			}
			.list_carousel {
/*				background-color: #ccc;
*/				margin: 0 0 10px 10px;
				width: 1150px;
			}
			.list_carousel ul {
				margin: 0;
				padding: 0;
				list-style: none;
				display: block;
			}
			.list_carousel li {
				font-size: 40px;
				color: #999;
				text-align: center;
/*				background-color: #eee;
*/				border: 0px solid #999;
				width: 220px;
				height: 90px;
				padding: 0;
				margin: 3px;
				display: block;
				float: left;
			}
			.list_carousel.responsive {
				width: auto;
				margin-left: 0;
			}
			.clearfix {
				float: none;
				clear: both;
			}
			.prev {
				float: left;
				margin-left: 10px;
			}
			.next {
				float: right;
				margin-right: 10px;
			}
			.pager {
				float: left;
				width: 300px;
				text-align: center;
			}
			.pager a {
				margin: 0 5px;
				text-decoration: none;
			}
			.pager a.selected {
				text-decoration: underline;
			}
			.timer {
				background-color: #999;
				height: 6px;
				width: 0px;
			}
		</style>
	</head>
	<body>

		

		<div class="wrapper">
			<!--<div class="list_carousel">
				<ul id="foo0">
					<li><a href="#" target="_blank"><img src="banner-1.jpg" width="215" height="84" border="0" /></a></li>
					<li><img src="banner-2.jpg" width="215" height="84" /></li>
					<li><img src="banner-3.jpg" width="215" height="84" /></li>
					<li><img src="banner-4.jpg" width="215" height="84" /></li>
					<li><img src="banner-5.jpg" width="215" height="84" /></li>
					<li><img src="banner-5.jpg" width="215" height="84" /></li>
					<li><img src="banner-4.jpg" width="215" height="84" /></li>
					<li><img src="banner-3.jpg" width="215" height="84" /></li>
					<li><img src="banner-2.jpg" width="215" height="84" /></li>
					<li><img src="banner-1.jpg" width="215" height="84" /></li>
					<li><img src="banner-1.jpg" width="215" height="84" /></li>
					<li><img src="banner-2.jpg" width="215" height="84" /></li>
					<li><img src="banner-3.jpg" width="215" height="84" /></li>
					<li><img src="banner-4.jpg" width="215" height="84" /></li>
					<li><img src="banner-5.jpg" width="215" height="84" /></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		<br />
 -->

			<!--<p>Basic carousel + timer, using CSS-transitions.</p>
			<div class="list_carousel">
				<ul id="foo1">
					<li>c</li>
					<li>a</li>
					<li>r</li>
					<li>o</li>
					<li>u</li>
					<li>F</li>
					<li>r</li>
					<li>e</li>
					<li>d</li>
					<li>S</li>
					<li>e</li>
					<li>l</li>
					<li> </li>
				</ul>
				<div class="clearfix"></div>
				<div id="timer1" class="timer"></div>
			</div>
			<br /> -->


			<!--<p>Carousel scrolled by user interaction.<br />
				(prev-button, next-button, pagination, mousewheel and swipe)</p>
			<div class="list_carousel">
				<ul id="foo2">
					<li>c</li>
					<li>a</li>
					<li>r</li>
					<li>o</li>
					<li>u</li>
					<li>F</li>
					<li>r</li>
					<li>e</li>
					<li>d</li>
					<li>S</li>
					<li>e</li>
					<li>l</li>
					<li> </li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev2" class="prev" href="#">&lt;</a>
				<a id="next2" class="next" href="#">&gt;</a>
				<div id="pager2" class="pager"></div>
			</div>
			<br />
 -->

<?php
		   include("../control/config.inc.php");
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			
			$query="SELECT * FROM `tbl_banner` WHERE `banner_position`='4' AND `first_page_show`='1' ORDER BY RAND()";
			$result=mysql_query($query);
			//echo "host >".$cfgServers['host'];
?>
			<div class="list_carousel">
				<ul id="foo0">
                <?php while($data=mysql_fetch_assoc($result)){ 
							list($width, $height, $type, $attr) = getimagesize("../banner_file/".$data['banner_file_name']);
							//echo   $width."   ".$height;
							$fixHeight=$height+5;
							$fixWidth=$width+5;
				?>
					<li style="height:<?php echo $height?>px; ">
                    <?php 
									if(substr($data['banner_file_name'], -3, 3)=='swf'){ ?>
											<!-- flash  -->
										<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="<?php echo $width?>" height="<?php echo $height?>">
  <param name="movie" value="../banner_file/<?php echo $data['banner_file_name']?>">
  <param name="quality" value="high">
  <embed src="../banner_file/<?php echo $data['banner_file_name']?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php echo $width?>" height="<?php echo $height?>"></embed>
</object>

												<!-- flash  -->
								<?php
									}else if((substr($data['banner_file_name'], -3, 3)=='gif') ||(substr($data['banner_file_name'], -3, 3)=='jpg')){
										echo "<a href='http://".$data['link']."' target='_blank'><img src='../banner_file/".$data['banner_file_name']."' border='0' width='".$width."' height='".$height."'></a>";									
									}else if($data['banner_file_name']==""){
										echo $data['banner_html_code'];
									}
							?>
                    &nbsp;&nbsp;</li>
                <?php } ?>
				</ul>
				<div class="clearfix"></div>
				<a id="prev3" class="prev" href="#">&lt;</a>
				<a id="next3" class="next" href="#">&gt;</a>
			</div>
	</div>
		<br />


	<!--	<p style="text-align: center;">Responsive layout example resizing the items (resize your browser).</p>
		<div class="list_carousel responsive">
			<ul id="foo4">
				<li>c</li>
				<li>a</li>
				<li>r</li>
				<li>o</li>
				<li>u</li>
				<li>F</li>
				<li>r</li>
				<li>e</li>
				<li>d</li>
				<li>S</li>
				<li>e</li>
				<li>l</li>
				<li> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<br /> -->


		<!--<p style="text-align: center;">Responsive layout example centering the items (resize your browser).</p>
		<div class="list_carousel responsive" >
			<ul id="foo5">
				<li style="width: 300px;">c</li>
				<li style="width: 150px;">a</li>
				<li>r</li>
				<li style="width: 300px;">o</li>
				<li style="width: 150px;">u</li>
				<li>F</li>
				<li style="width: 300px;">r</li>
				<li style="width: 150px;">e</li>
				<li>d</li>
				<li style="width: 400px;">S</li>
				<li style="width: 150px;">e</li>
				<li>l</li>
				<li> </li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<br />


		<br /> -->
		<br />
     
        
</body>
</html>