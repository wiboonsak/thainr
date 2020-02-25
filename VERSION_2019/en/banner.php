<?php 
	  $queryBanner3="SELECT * FROM tbl_banner WHERE banner_position ='3' AND banner_status ='1' ORDER BY id DESC";
	  $resultBanner3 = mysql_query($queryBanner3);
?>
<style>
#slides{
	position: relative;
	height: 280px;
	padding: 0px;
	margin: 0px;
	list-style-type: none;
}

.slide{
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	opacity: 0;
	z-index: 1;

	-webkit-transition: opacity 1s;
	-moz-transition: opacity 1s;
	-o-transition: opacity 1s;
	transition: opacity 1s;
}

.showing{
	opacity: 1;
	z-index: 2;
}



/*
non-essential styles:
just for appearance; change whatever you want
*/

.slide{
	font-size: 40px;
	padding: 0px;
	box-sizing: border-box;
	padding-top: 10px;
	
	color: #fff;
}

.slide:nth-of-type(1){
	/*background: red;*/
}
.slide:nth-of-type(2){
	/*background: orange;*/
}
.slide:nth-of-type(3){
	/*background: green;*/
}
.slide:nth-of-type(4){
	/*background: blue;*/
}
.slide:nth-of-type(5){
	/*background: purple;*/
}
</style>

<ul id="slides">
	<?php $n=1; while($xbanner3 = mysql_fetch_assoc($resultBanner3)){ 
			if($n==1){ $txt='showing';}else{ $txt=''; }
	?>
	
	<li class="slide <?php echo $txt?>"><a href='<?php echo $xbanner3['link'];?>' target='_blank'>
		<img src="<?php echo "../banner_file/".$xbanner3['banner_file_name']?>"></a>
  		</li>
   <?php $n++; }?>
</ul>
<script>
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,4000);

function nextSlide(){
	slides[currentSlide].className = 'slide';
	currentSlide = (currentSlide+1)%slides.length;
	slides[currentSlide].className = 'slide showing';
}
</script>
