<?php 
		if($_GET['yearPlus']=='subtract'){
					$_SESSION['yearVar']=$_SESSION['yearVar']-1;
		}else if($_GET['yearPlus']=='Add'){
					$_SESSION['yearVar']=$_SESSION['yearVar']+1;
		}else if($_GET['yearPlus']=='Nothing'){
			$_SESSION['yearVar']=0;
		}
		//-------------select year from select box
		if($chooseyear=="select"){
			//echo $chooseyear."  selectY".$selectY."<br>";
			$_SESSION['yearVar'] = $_SESSION['yearVar']+$selectY;
		}
		$currMonth = date("m",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));
		if($selectmonth){
			 $rangeMonth= $selectmonth-$currMonth;
		}else{
			$rangeMonth= -1;
		}
		 $rangeYear= $_SESSION['yearVar'];	
		
		 $currdate = date("d",  mktime (0,0,0,date("m"),  date("d"),  date("Y")));		
		if($currdate > 28){
			$rangDate=5;
		}else{
			$rangDate=0;
		}
		 
		$numDayOfMonth = date("t",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		$today  =  date("Y-m-d",  mktime (0,0,0,date("m")+$rangeMonth,  date("d")-$rangDate,  date("Y")+$rangeYear));
		if(!isset($StartDate)){
				$dateArray = explode("-",$today);
				$StartDate =  $dateArray[0]."-".$dateArray[1]."-01";
		}
		if(!isset($StopDate)){
				$StopDate =  $dateArray[0]."-".$dateArray[1]."-".$numDayOfMonth;
		}
		
		$query ="SELECT * FROM  `tbl_situation_data`  WHERE (date_act  BETWEEN  '$StartDate'  AND  '$StopDate' )   AND language='$lang'   ";
		
			if($_GET['SituatoionID']){
					$query = " SELECT * FROM  `tbl_situation_data`  WHERE id = '".$_GET['SituatoionID']."' ";
			}
		
		$query.="ORDER BY  id DESC ";
		$result =mysql_query($query);
		$numRows = mysql_num_rows($result);
		if($numRows==1){
				$data=mysql_fetch_assoc($result);	
				$topicID = $data['c_id'];	
		}else if($numRows > 1){
				$n=1;
				while($data=mysql_fetch_assoc($result)){
						$topic[$n]=$data['topic_th'];
						$sid[$n]=$data['id'];
						$n++;
				}
		}
		
		$YName =  date("Y",  mktime (0,0,0,date("m")+$rangeMonth,  date("d"),  date("Y")+$rangeYear));
		$nameYear = $YName;
		///echo "<br>nameYear>>>".$nameYear;
		$nameMonth = $monthnames2[$dateArray[1]];
                
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>ราคาเสนอซื้อยางพารา</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {	color: #006699;
	font-weight: bold;
}
-->
</style>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td width="877" height="50" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-nr-situation.jpg" alt="history" width="341" height="80" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="27" bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF" >&nbsp;</td>
            <td width="12" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="651" align="center" bgcolor="#336699" class="FontMS10"><span class="style1">NR SITUATION OF &nbsp; 
              <?php echo $nameMonth?> <?php echo $nameYear ?>
            </span></td>
            <td width="153" align="center" bgcolor="#336699" class="FontMS10">
              <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Nothing"?>">
              <span class="style1">[Current Year]</span></a>			</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10">
              <table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr>
                  <td align="right">
                    
                    <a href="#" onClick="windowOpener('1138', '864', '1', 'situation_pdf.php?StartDate=<?php echo $StartDate?>&StopDate=<?php echo $StopDate?>&lang=<?php echo $lang?>')"><img src="pdficon.png" width="50" height="50" hspace="5" border="0"></a>&nbsp;&nbsp; <a href="#" onClick="windowOpener('1138', '864', '1', 'situation_print.php?StartDate=<?php echo $StartDate?>&StopDate=<?php echo $StopDate?>&lang=<?php echo $lang?>')"><img src="printicon.png" width="50" height="50" hspace="5" border="0" onClick="window.print();"></a><br>
                    <small>**use acrobat reader to read file  </small>           &nbsp;&nbsp;
                    
                    </td>
                </tr>
                
                
                <tr>
                  <td><br>
                    <br>
                    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                    <script src="js/prototype.js" type="text/javascript"></script>
                    <script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
                    <script src="js/lightbox.js" type="text/javascript"></script>
                    <?php if($numRows ==1){ ?>
                    <p><?php echo $data['topic_th']?></p>
                    <p><?php echo $data['detail_th']?></p>
                    <p>
                      <!--  <?php 
				  			/*$query= "SELECT * FROM  `tbl_situation_data_file` WHERE news_id='".$data['id']."'  ORDER BY file_type ";
							$resultFile = mysql_query($query);
							while($File=mysql_fetch_assoc($resultFile)){
									if($File['file_type']==2){ */
				  ?>
                                  <img src="images/download-icon.gif" alt="download" width="13" height="15" hspace="5"> 
                    <a href="../uploadfile/<?php echo $File['file_name']?>" target="_blank" class="Saan">ดาวน์โหลดไฟล์เอกสาร</a></p>
                  <?php	 /* }else if($File['file_type']==1){ */?>
                  <a href="../uploadfile/<?php echo $File['file_name']?>" target="_blank">
                  <img src="../uploadfile/thb/<?php echo $File['file_name']?>" alt="" style="border:none"> </a><br>
                         <?php //echo $File['file_name']?>
                  <?php 
							  /* } 
							   }*/ ?> 
                               -->
                      <?php 
					 	$query="SELECT * FROM `tbl_situation_data_file` WHERE  news_id = '".$data['id']."' AND file_type='1'   ORDER BY  id ASC ";
	//echo $query;
	$resultFILE = mysql_query($query);
	
	$query="SELECT * FROM `tbl_situation_data_file` WHERE  news_id = '".$data['id']."' AND file_type='2'   ORDER BY  id ASC ";
	//echo $query;
	$resultFILE2 = mysql_query($query);	
					 ?>
                    <table width="100%" border="0">
                      <tr>
                        <?php $n=1; while($data=mysql_fetch_assoc($resultFILE)){ ?>
                        <td align="center"><a href="../uploadfile/<?php echo $data['file_name']?>" class="Saan" title="<?php echo $data['w_th']?>" rel="lightbox[roadtrip]"> <img src="../uploadfile/thb/<?php echo $data['file_name']?>" alt=""></a> <br>
                          <span class="product"><?php echo $data['w_th']?></span></td>
                        <?php if($n==4){ echo "</tr><tr>"; $n=0;}?>
                        <?php $n++; } ?>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <?php /*?>
		            <tr>
			          <?php $n=1; while($data=mysql_fetch_assoc($resultFILE2)){ ?>
			          <td align="center" bgcolor="#EBEBEB"><a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank" title="<?php echo $data['w_th']?>"> <img src="../th/images/download2.gif" alt="" width="32" height="32"> Download file</a> <br>
			            <span class="product"><?php echo $data['w_th']?></span></td>
			          <?php if($n==4){ echo "</tr><tr>"; $n=0;}?>
			          <?php $n++; } ?>
			          </tr>
			        <?php */?>  
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                    </table>
                    <?php }else if($numRows  > 1){ 
			  						for($i=1; $i  < $n ; $i++){  ?>
                    <p><img src='../control/images/bullet4.gif' alt="" align="absmiddle"> <a href="<?php $_SERVER['PHP_SELF']?>?detail=<?php echo  $detail?>&SituatoionID=<?php echo $sid[$i]?>"> <?php echo " ".$topic[$i]?></a></p>
                    <?php 	 }  } else if($numRows==0){ ?>
                    <center>
                      <span class="FontMS10">No Situation in<?php echo $nameMonth;?> <?php echo $nameYear;?>
                      </span>
                    </center>
                  <?php }?></td>
                </tr>
              </table>
            <!--<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><br><br><?php if($numRows ==1){ ?>
                       <p><?php echo $data['topic_th']?></p>
                  <p><?php echo $data['detail_th']?></p>
				  
                  <p> 
				  <?php 
				  			$query= "SELECT * FROM tbl_situation_data_file WHERE news_id='$topicID'  ORDER BY file_type ";
							$resultFile = mysql_query($query);
							while($File=mysql_fetch_assoc($resultFile)){
									if($File['is_pic']==0){ 
				  ?>
				  <img src="../th/images/download-icon.gif" alt="download" width="13" height="15" hspace="5">
				  <a href="../situation/<?php echo $File['f_name']?>" target="_blank" class="Saan">Download File </a></p>
                   <?php	 }else if($File['is_pic']==1){ ?>
				   					<img src="../situation/<?php echo $File['f_name']?>"> <br>
									<?php echo $File['f_detail']?>
							<?php 
							   } 
							   } ?>
				   
				    <?php }else if($numRows  > 1){ 
			  						for($i=1; $i  < $n ; $i++){  ?>
                  <p><img src='../control/images/bullet4.gif' align="absmiddle">
				 <a href="<?php $_SERVER['PHP_SELF']?>?detail=<?php echo  $detail?>&SituatoionID=<?php echo $sid[$i]?>">
				  <?php echo " ".$topic[$i]?>				  </a>				  </p>
                  <?php 	 }  } else if($numRows==0){ ?>
				  				 <center>
				  				   <span class="FontMS9">no situation in</span> 
				  				   <?php echo $nameMonth;?> <?php echo $nameYear;?>
				  				 </center>
				  <?php }?>				  </td>
              </tr>
            </table> -->			</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="left" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="left" bgcolor="#FFFFFF" class="FontMS10"><hr size="1" color="#000000"></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="center" bgcolor="#FFFFFF" class="FontMS9"><p>&nbsp;</p>
              
              <p>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
                  <span class="FontMS10">select year
                  <select name="selectY">
                    <?php
						$kons = 8;
						 for($i=1;$i < 11 ; $i++){ 
						 $xyear=$dateArray[0]+($i-$kons);
						 $eyear = $dateArray[0]+($i-$kons);
						 ?>
                    <option value="<?php echo ($i-$kons)?>" <?php if($dateArray[0]==$eyear) { echo "selected";}?>>
                    <?php echo $xyear?></option>
                    <?php } ?>
                  </select>
                  </span>			    &nbsp;
                  <input name="chooseyear" type="hidden" >
                  <input type="button" name="Button" value="Submit" onClick="form1.chooseyear.value='select';form1.submit(); ">
                  <br>
                  <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=subtract"?>">
                  <img src="../th/images/pre.gif" alt="prev" width="16" height="16" hspace="5" border="0" align="absbottom">			  </a>
                  <?php   while (list($key, $value) = each($monthnames2)) {  ?>
                  
                  <?php echo "<a href='".$_SERVER['PHP_SELF']."?detail=$detail&selectmonth=$key'>$value</a> "; ?>
                  
                  <?php if($key!="12"){ echo "|";} ?>
                  <?php 	}	?>
                  <a href="<?php echo $_SERVER['PHP_SELF']."?detail=$detail&yearPlus=Add"?>">
                  <img src="../th/images/next.gif" alt="next" width="16" height="16" hspace="5" border="0" align="absbottom">			  </a>	
            </form>	   </p>			</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
       
      </td>
    </tr>
  </table>
</center>
</body>