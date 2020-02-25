<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title></title>
		
		<!-- Meta -->
		<meta charset="utf-8" />
		
	    <!-- Styles -->
        <link rel="stylesheet" href="style.css" type="text/css" />

		
		<!-- Javascript -->
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
	</head>
	<body>
	<div id="header">
			<ul>
				<li><a href="#">หน้าหลัก</a></li>
				<li><a href="#">สาส์นจากนายก</a></li>
				<li><a href="#">แนะนำสมาคม</a>
					<ul>
						<li><a href="#">ประวัติสมาคม</a></li>
						<li><a href="#">คณะกรรมการสมาคม</a></li>
						<li><a href="#">อนุกรรมการฝ่ายต่าง ๆ ของสมาคม</a></li>
						<li><a href="#">ที่ปรึกษาสมาคม</a></li>
						<li><a href="#">ระเบียบ และการเป็นสมาชิกสมาคม</a></li>
						<li><a href="#">สมาชิกสมาคมยางพาราไทย</a></li>
						<li><a href="#">องค์กรเกี่ยวกับยางพารา</a></li>
					</ul>
				</li>			
				<li><a href="#">list item</a>
					<ul>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
					</ul>
				</li>
				<li><a href="#">list item</a>
					<ul>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
						<li><a href="#">list item</a></li>
					</ul>
				</li>
			</ul>
		</div><br>

	</body>
</html>