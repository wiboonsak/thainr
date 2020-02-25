<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">	
body {
	background-color: #D7EFF9;
	}
	
div#ARBC_position1{  
    position:relative;  
    margin:auto;  
    display:block;    
	height:1300px;/* ความสูงส่วนของเนื้อหา iframe ที่ต้องการแสดง */  
	width:1200px; /*ความกว้างส่วนของเนื้อหา iframe ที่ต้องการแสดง*/  
    overflow:hidden;  
}  
/* ส่วนกำหนด สำหรับ iframe */  
div#ARBC_position1 iframe{
	position: absolute;
	display: block;
	float: left;
	margin-top: -150px; /* ปรับค่าของ iframe ให้ขยับขึ้นบนตามตำแหน่งที่ต้องการ */
	margin-left: -50px; /* ปรับค่าของ iframe ให้ขยับมาด้านซ้ายตามตำแหน่งที่ต้องการ */
	left: 40px;
	top: 10px;
}  

.tabs{
    width:100%;
    height:auto;
    margin:0 auto;
	background-color: #FFFFFF;
	
}

/* tab list item */
.tabs .tabs-list{
    list-style:none;
    margin:0 auto;
    padding: 20px 0px 0px 38px;	
}
.tabs .tabs-list li{
    width:160px;
    float:left;
    margin:0px;
    margin-right:2px;
    padding:10px 5px;
    text-align: center;
    background-color: #d1d1d1;
    border-radius:3px;
}
.tabs .tabs-list li:hover{
    cursor:pointer;
}
.tabs .tabs-list li a{
    text-decoration: none;
    color: #000000;
}

/* Tab content section */
.tabs .tab{
    display:none;
    width:100%;
    min-height:250px;
    height:auto;
    border-radius:3px;
/*  padding:20px 15px;*/
    background-color: #FFFFFF;
    color: #000000;
    clear:both;
}
.tabs .tab h3{
    border-bottom:3px solid #595959;
    letter-spacing:1px;
    font-weight:normal;
    padding:5px;
	margin: 2px 35px;
}
.tabs .tab p{
    line-height:20px;
    letter-spacing: 1px;
}

/* When active state */
.active{
    display:block !important;
}
.tabs .tabs-list li.active{
    background-color:#309645 !important;
    color: #ffffff !important;
}
.active a{
    color:black !important;
}

/* media query */
@media screen and (max-width:360px){
    .tabs{
        margin:0;
        width:96%;
    }
    .tabs .tabs-list li{
        width:80px;
    }
}
	
</style>
<!--<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
<title>ราคาเสนอขายยางพารา</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
          <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-price-arbc.jpg" alt="history" width="307" height="80" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
    </table>
      
<div class="tabs">
  <ul class="tabs-list">
     <li class="active"><a href="#tab1">ARBC Price 2019</a></li>
     <li ><a href="#tab2">ARBC Price 2018</a></li>
  </ul>

  <div id="tab1" class="tab active">
     <h3>ARBC Price 2019</h3>
     <div id="ARBC_position1"><iframe src="http://aseanrubber.net/arbc/index.php/rubber-prices/arbc-prices/2019-prices" frameBorder="0" scrolling="auto" width="1200" height="1250"></iframe></div> 
  </div>
  <div id="tab2" class="tab">
    <h3>ARBC Price 2018</h3>
    <div id="ARBC_position1"><iframe src="http://aseanrubber.net/arbc/index.php/rubber-prices/arbc-prices/various-market-2" frameBorder="0" scrolling="auto" width="1200" height="1250"></iframe></div>
  </div>
</div>
	<script type="text/javascript">
$(document).ready(function(){

  $(".tabs-list li a").click(function(e){
     e.preventDefault();
  });

  $(".tabs-list li").click(function(){
     var tabid = $(this).find("a").attr("href");
     $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab

     $(".tab").hide();   // hiding open tab
     $(tabid).show();    // show tab
     $(this).addClass("active"); //  adding active class to clicked tab

  });

});
</script>
</center>
</body>