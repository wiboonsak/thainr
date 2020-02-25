<style>
#slides2{
	position: relative;
	height: 280px;
	padding: 0px;
	margin: 0px;
	list-style-type: none;
}

.slide2{
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

.showing2{
	opacity: 1;
	z-index: 2;
}
.showing3{
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

<ul id="slides2">
	<li class="slide2"><a href="http://www.thainr.com/th/journal.php" target="_blank"><img src="../images/journal.jpg" style="border:none"></a></li>
	<li class="slide2 showing2"><a href="http://www.thainr.com/AdvertisingInformationForm_Update15072015.pdf" target="_blank"><img src="../images/20120730114036.gif" style="border:none"></a></li>		
	<li class="slide2 showing3"><a href="http://www.thainr.com/ใบแจ้งความจำนงลงโฆษณา.pdf" target="new"><img src="http://thainr.com/banner_file/20151102114931.jpg" border="0" alt="Ads" align="middle" style="border:none"></a></li>
</ul>


<script>
var slides2 = document.querySelectorAll('#slides2 .slide2');
var currentSlide2 = 0;
var slideInterval2 = setInterval(nextSlide2,5000);

function nextSlide2(){
	slides2[currentSlide2].className = 'slide2';
	currentSlide2 = (currentSlide2+1)%slides2.length;
	slides2[currentSlide2].className = 'slide2 showing2';
}
</script>
