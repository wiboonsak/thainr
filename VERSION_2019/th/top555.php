<!--------- code slide to top -------->
<?php
	//-----------------------------------
		$query="SELECT * FROM tbl_information_category  "
						."  WHERE category_statis ='1' AND main_cate_id='0'   ORDER BY id ASC "
				        ." ";
        $resultCate = mysql_query($query);

?>
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
	<link href="css_top_menu/styles.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">   
   	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   	<script src="script.js"></script>


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
					 <?php $firstCategory='';$firstCategoryName='';
                                         while($cate=mysql_fetch_assoc($resultCate)){ 
							if($lang=='1'){
								$title = $cate['cate_name_th'];
							}else if($lang=='2'){
								$title = $cate['cate_name_en'];
							}else if($lang=='3'){
								$title = $cate['cate_name_en'];
								
							}
	                        
							if($firstCategory==''){
								$firstCategory=$cate['id'];
								$firstCategoryName=$title;
							}else{
								$firstCategory=$firstCategory;
							}
								
							$query="SELECT * FROM tbl_information_category WHERE main_cate_id ='".$cate['id']."' AND  category_statis ='1'  ";
							$resultCount = mysql_query($query);
							$count = mysql_num_rows($resultCount);

							if($count  <= 0){ ?>
						<li>
                                                    
  <?php $npage = $_GET["detail"];
        $prtxt = "";
     if($npage!="information"){
        $idcat =  $cate['id'];
        $page_name = $title;
        $prtxt = "?detail=information&idcat=".$idcat."&page_name=".$page_name;
     }
  ?>                                                  
<a href="<?php echo$prtxt?>#"  onClick="listData('<?php echo $cate['id']?>','<?php echo htmlspecialchars($title)?>')" ><?php echo $title?></a>
                                                
                                                
                                                </li>
                                                <?php }else if($count  > 0){  ?>
						<li class="has-sub">
                                                    
                                                    
   <?php $npage = $_GET["detail"];
        $prtxt = "";
     if($npage!="information"){
        $idcat =  $cate['id'];
        $page_name = $title;
        $prtxt = "?detail=information&idcat=".$idcat."&page_name=".$page_name;
     }
  ?>                                                      
<a href="<?php echo$prtxt?>#sub-menu<?php echo $cate['id']?>"  onClick="listData('<?php echo $cate['id']?>','<?php echo htmlspecialchars($title)?>')" ><?php echo $title?></a>
     
     
							<ul>
                                                              <?php $titleSub=''; while($sub=mysql_fetch_assoc($resultCount)){ 
										if($lang=='1'){
											$titleSub = $sub['cate_name_th'];
										}else if($lang=='2'){
											$titleSub = $sub['cate_name_en'];
										}else if($lang=='3'){
											$titleSub = $sub['cate_name_en'];

										}
									
									?>
							   <li>
    <?php $npage = $_GET["detail"];
        $prtxt = "";
     if($npage!="information"){
        $idcat =  $sub['id'];
        $page_name = $titleSub;
        $prtxt = "?detail=information&idcat=".$idcat."&page_name=".$page_name;
     }
  ?>                                                                
<a href="<?php echo$prtxt?>#" onClick="listData('<?php echo $sub['id']?>','<?php echo htmlspecialchars($titleSub)?>')"><?php echo $titleSub?></a>
                                                           
                                                           
                                                           </li>
<?php }?>
							</ul>
						</li>
                                                <?php }?>
                                                <?php }?>	
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