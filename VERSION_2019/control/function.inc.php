<?php
	###############################################
	function ShowListDate($lang , $rangeYear){
		if($lang=='en'){
				$monthArray=Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		}else if($lang=='th'){
					$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		}
		//---------------------------month------------------------------
		echo "<select name='listMonth' onchange='dateChainSelect(this.value,document.form1.listYear.value)'>";
		echo "<option value='00'>-------------</option>";
		while(list($key, $value) = each($monthArray)) {
					echo "<option value='$key'>$value</option>";
			}
		echo "</select>";
	
		//---------------------------Year------------------------------
		echo " - ";
		$curryear=date("Y");
		echo "<select name='listYear'  onchange='dateChainSelect(document.form1.listMonth.value,this.value)'>";
		echo "<option value='00'>-----</option>";
		for($i=0;$i<$rangeYear;$i++){ $theYear=$curryear+$i;
					echo "<option value='$theYear'>$theYear</option>";
		}	
		echo "</select>";	
			//---------------------------day------------------------------
		echo " - ";
		echo "<select name='listDay'>";
		echo "<option value='00'>-----</option>";
		for($i=1;$i<=31;$i++){ if($i<10){ $i="0".$i; }
					echo "<option value='$i'>$i</option>";
		}	
		echo "</select>";	
	}
	###############################################
	function ShowListDate2($lang , $rangeYear){
		if($lang=='en'){
				$monthArray=Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		}else if($lang=='th'){
					$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		}
		//---------------------------month------------------------------
		echo "<select name='listMonth2' onchange='dateChainSelect2(this.value,document.form1.listYear2.value)'>";
		echo "<option value='00'>-------------</option>";
		while(list($key, $value) = each($monthArray)) {
					echo "<option value='$key'>$value</option>";
			}
		echo "</select>";
	
		//---------------------------Year------------------------------
		echo " - ";
		$curryear=date("Y");
		echo "<select name='listYear2'  onchange='dateChainSelect2(document.form1.listMonth2.value,this.value)'>";
		echo "<option value='00'>-----</option>";
		for($i=0;$i<$rangeYear;$i++){ $theYear=$curryear+$i;
					echo "<option value='$theYear'>$theYear</option>";
		}	
		echo "</select>";	
			//---------------------------day------------------------------
		echo " - ";
		echo "<select name='listDay2'>";
		echo "<option value='00'>-----</option>";
		for($i=1;$i<=31;$i++){ if($i<10){ $i="0".$i; }
					echo "<option value='$i'>$i</option>";
		}	
		echo "</select>";	
	}


	function get_new_name($sname,&$uploadfile_name,$uploadfile_type,$realtype,&$ispic){
			$today = date("YmdHis"); 
			if(($uploadfile_type=="image/pjpeg")||($uploadfile_type=="image/gif")||($uploadfile_type=="image/x-png")){ 
						$ispic='1';
						if($uploadfile_type=="image/gif"){
							$imgType=".gif";
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
						} else if($uploadfile_type=="image/pjpeg"){
							$imgType=".jpg";
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
						}else if($uploadfile_type=="image/x-png"){
							$imgType=".png";
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
						}
		}else{
							$ispic='0';
							$imgType=$realtype;
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
		}
  } //end function
	################################################
	function get_file_name($sname,&$uploadfile2_name,$uploadfile_type){
				$today = date("YmdHis"); 
				$file_array = explode(".",$uploadfile2_name);
				$uploadfile2_name = $sname.$today.".".$file_array[1];
	}
	################################################
		function GetNewFileName($uploadFile,&$uploadFileName,$fileExt){
			$info =  pathinfo($uploadFileName);
		    $dayFile=date("YmdHis");
	 	    $uploadFileName =  $fileExt.$dayFile.".".$info[extension];
			$fileExt=$info[extension];
			
	}
################################################
		function GetNewFileNameII($uploadFile,$uploadFileName,$fileExt){
			$info =  pathinfo($uploadFileName);
		    $dayFile=date("YmdHis");
	 	    $uploadFileName =  $fileExt.$dayFile.".".$info[extension];
			$fileExt=$info[extension];
			return $uploadFileName;
	}	
	
	################################################
				 function PageDisplay($query,$perPage,$cPage,$self){
						$result =mysql_query($query);
						$totalRow=mysql_num_rows($result);
						$totalPage=ceil($totalRow/$perPage);
								echo "";
								for($i=1;$i<=$totalPage;$i++){
										echo "<a href='$self&page=$i'>";
										if($i==$cPage)echo "<b>";
										echo  $i." ";
										if($i==$cPage)echo "</b>";
										echo "</a> ";
								}
				 }
	################################################]
		function get_img_name($sname,&$uploadfile_name,$uploadfile_type){
				$today = date("YmdHis"); 
			if(($uploadfile_type=="image/pjpeg")||($uploadfile_type=="image/gif")||($uploadfile_type=="image/x-png")){ 
						if($uploadfile_type=="image/gif"){
							$imgType=".gif";
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
						} else if($uploadfile_type=="image/pjpeg"){
							$imgType=".jpg";
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
						}else if($uploadfile_type=="image/x-png"){
							$imgType=".png";
							$uploadfile_name =  $sname.$today.$imgType;
							return  $uploadfile_name;
						}
		}else{
				$error_1 =" ä¿Åì ÃÙ»ÀÒ¾ÊÓËÃÑº *.jpg  áÅÐ *.gif à·èÒ¹Ñé¹ ";
				echo $error_1;
		}
  } //end function
	################################################
	function upload_img($uploadfile_name,$removeFile,$path_trip_img,$uploadfile){
					if($removeFile!=0){
						if(file_exists($path_trip_img.$removeFile)){
							unlink($path_trip_img."/".$removeFile);
						}
						copy($uploadfile,$path_trip_img.$uploadfile_name);
					}else if($removeFile==0){
							copy($uploadfile,$path_trip_img."/".$uploadfile_name);
					}
	}
	################################################
	function remove_image($removeFile,$path_trip_img){
						if($removeFile){
						unlink($path_trip_img.$removeFile);
						}
						return ;
	}
	################################################
	function show_imageScale($max_x ,$max_y,$x,$y,$img_path,$pic_name){
				$x_ratio = $max_x / $x;
				$y_ratio = $max_y / $y;
						//IF width and high < MAX
						if ( ($x <= $max_x) && ($y <= $max_y) )  {
								$new_x = $x;
								$new_y = $y;
						} else if ( ($x_ratio * $y) < $max_y){
								$new_x = $max_x;
								$new_y = ceil($x_ratio * $y);
						}
						else {
								$new_x = ceil($y_ratio * $x);
								$new_y = $max_y;
						}
		echo  "<img src=".$img_path."/".$pic_name." width=".$new_x." high =".$new_y." border=0>";
	}
	################################################
	function chr13_to_br(&$textarea,$icons){
			$textarea = eregi_replace(chr(13),"<br>",$textarea);
	}
	################################################	
	function showCate(&$n,$col,$title,$img,$aLink){ 
				echo "<td bgcolor='#F9F9F9' nowarp height=25 align='left'> ";
				echo $aLink.$title;
				echo "</a></td> ";
				if($n==$col){ echo "</tr>\n"; $n=0;};
				return;
			}

	################################################	
	function TDshow(&$n,$col,$word,$code,$name,$price,$img,$ilink){
				echo "<td align=center> ";
					showDetail($code,$name,$price,$img,$ilink);
				echo "</td> ";
				if($n!=$col){
					echo "<td width=1 bgcolor=#f73c84><img src=images/main/spacer.gif width=1 height=10></td> ";			
				}
				if($n==$col){ echo "</tr>\n"; $n=0;};
				return;
			}

	################################################	
	function  getID($numID){
			$PrintID= strlen($numID);
			if($PrintID==1){
					echo "C0000".$numID;
			}
			if($PrintID==2){
					echo "C000".$numID;
			}
			if($PrintID==3){
					echo "C00".$numID;
			}
			if($PrintID==4){
					echo "C0".$numID;
			}
			if($PrintID==5){
					echo "C".$numID;
			}
	}
	################################################	
	function tranCost(&$tranCost,$sumTotal){
		if($sumTotal ==0 ){
				$tranCost=0;
			}elseif($sumTotal <=150 ){
				$tranCost=70;
			}else  if(($sumTotal > 150 )&&($sumTotal <=500)){
				$tranCost=30;
			}else{
				$tranCost=0;	
			}
			return $tranCost;
	}
	################################################
				function create_thub($impath,$img,$fix_width,$fix_height){
					$source = $impath.$img;
					$cache_dir =$impath."thb/";
					$tsrc=$impath."thb/".$img;
					$imgType = substr($img,-3,3);
					$days = 1;
					copy($source, $tsrc); //ทำการ copy รู
						//---- make scale width and height

						 $imgsize = @getImageSize($source);
						$x_ratio = $fix_width / $imgsize[0];
						$y_ratio = $fix_height / $imgsize[1];

						//IF width and high < MAX
						if ( ($imgsize[0] <= $max_x) && ($imgsize[1] <= $max_y) )  {
								$new_x = $imgsize[0];
								$new_y = $imgsize[1];
						} else if ( ($x_ratio * $imgsize[1]) < $fix_height){
								$new_x = $fix_width;
								$new_y = ceil($x_ratio * $imgsize[1]);
						}
						else {
								$new_x = ceil($y_ratio * $imgsize[0]);
								$new_y = $fix_height;
						}

					$n_width=$new_x;
					$n_height=$new_y;
					
					//----start make thumb------

					if(($imgType=='jpg')||($imgType=='JPG')){
							$im=ImageCreateFromJPEG($source); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);    
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							ImageJpeg($newimage,$tsrc);
					
					}else if(($imgType=='gif')||($imgType=='GIF')){
							$im=ImageCreateFromGIF($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
								if (function_exists("imagegif")) {
								//Header("Content-type: image/gif");
								ImageGIF($newimage,$tsrc);
								}
								elseif (function_exists("imagejpeg")) {
								//Header("Content-type: image/jpeg");
								ImageJPEG($newimage,$tsrc);
								}
					}else if(($imgType=='png')||($imgType=='PNG')){	
							$im = @imagecreatefrompng($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							imagepng($newimage,$tsrc);
					}		

				//---------------Clear cache--------------------------------------
				   if($dp = @opendir($cache_dir)) {
								while($file = readdir($dp)) {
										if(preg_match('/^img_/', $file)) {
											 $mtime = @filemtime("$cache_dir/$file");
											 if($mtime < time() - 3600 * 24 * $days) @unlink("$cache_dir/$file");
										}
									}
								closedir($dp);
							  }
					
			}	
	
		################################################		
				function create_thub2($impath,$img,$fix_width,$fix_height){
					$source = $impath.$img;
					$cache_dir =$impath."tmp/";
					$tsrc=$impath."tmp/".$img;
					$imgType = substr($img,-3,3);
					$days = 1;
				copy($source, $tsrc); //ทำการ copy ร
						//---- make scale width and height

						 $imgsize = @getImageSize($source);
						$x_ratio = $fix_width / $imgsize[0];
						$y_ratio = $fix_height / $imgsize[1];

						//IF width and high < MAX
						if ( ($imgsize[0] <= $max_x) && ($imgsize[1] <= $max_y) )  {
								$new_x = $imgsize[0];
								$new_y = $imgsize[1];
						} else if ( ($x_ratio * $imgsize[1]) < $fix_height){
								$new_x = $fix_width;
								$new_y = ceil($x_ratio * $imgsize[1]);
						}
						else {
								$new_x = ceil($y_ratio * $imgsize[0]);
								$new_y = $fix_height;
						}

					$n_width=$new_x;
					$n_height=$new_y;
					
					//----start make thumb------

					if(($imgType=='jpg')||($imgType=='JPG')){
							$im=ImageCreateFromJPEG($source); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);    
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							ImageJpeg($newimage,$tsrc);
					
					}else if(($imgType=='gif')||($imgType=='GIF')){
							$im=ImageCreateFromGIF($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
								if (function_exists("imagegif")) {
								//Header("Content-type: image/gif");
								ImageGIF($newimage,$tsrc);
								}
								elseif (function_exists("imagejpeg")) {
								//Header("Content-type: image/jpeg");
								ImageJPEG($newimage,$tsrc);
								}
					}else if(($imgType=='png')||($imgType=='PNG')){	
							$im = @imagecreatefrompng($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,1,1,1,1,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							imagepng($newimage,$tsrc);
					}		

				//---------------Clear cache--------------------------------------
				   if($dp = @opendir($cache_dir)) {
								while($file = readdir($dp)) {
										if(preg_match('/^img_/', $file)) {
											 $mtime = @filemtime("$cache_dir/$file");
											 if($mtime < time() - 3600 * 24 * $days) @unlink("$cache_dir/$file");
										}
									}
								closedir($dp);
							  }
					
			}	
	################################################
				function create_fix($impath,$img,$fix_width,$fix_height){
					$source = $impath.$img;
					$cache_dir =$impath."thb2/";
					$tsrc=$impath."thb2/".$img;
					$imgType = substr($img,-3,3);
					$days = 1;
					copy($source, $tsrc); //ทำการ copy รู
						//---- make scale width and height

						 $imgsize = @getImageSize($source);
						$x_ratio = $fix_width / $imgsize[0];
						$y_ratio = $fix_height / $imgsize[1];

						//IF width and high < MAX
				/*		if ( ($imgsize[0] <= $max_x) && ($imgsize[1] <= $max_y) )  {
								$new_x = $imgsize[0];
								$new_y = $imgsize[1];
						} else if ( ($x_ratio * $imgsize[1]) < $fix_height){
								$new_x = $fix_width;
								$new_y = ceil($x_ratio * $imgsize[1]);
						}
						else {
								$new_x = ceil($y_ratio * $imgsize[0]);
								$new_y = $fix_height;
						}*/

					$n_width=$fix_width;
					$n_height=$fix_height;
					
					//----start make thumb------

					if(($imgType=='jpg')||($imgType=='JPG')){
							$im=ImageCreateFromJPEG($source); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);    
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							ImageJpeg($newimage,$tsrc);
					
					}else if(($imgType=='gif')||($imgType=='GIF')){
							$im=ImageCreateFromGIF($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
								if (function_exists("imagegif")) {
								//Header("Content-type: image/gif");
								ImageGIF($newimage,$tsrc);
								}
								elseif (function_exists("imagejpeg")) {
								//Header("Content-type: image/jpeg");
								ImageJPEG($newimage,$tsrc);
								}
					}else if(($imgType=='png')||($imgType=='PNG')){	
							$im = @imagecreatefrompng($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							imagepng($newimage,$tsrc);
					}		

			
					
			}	
	
	#########################################################################333
			function delete_directory($dirname) { 
				if (is_dir($dirname)) $dir_handle = opendir($dirname); 
				if (!$dir_handle) 
				return false; 

				while($file = readdir($dir_handle)) { 
							if ($file != "." && $file != "..") { 
									if (!is_dir($dirname."/".$file)) 
								unlink($dirname."/".$file); 
						else 
								delete_directory($dirname.'/'.$file); 
						} 
					} 
				closedir($dir_handle); 
				rmdir($dirname); 
				return true; 
	} 

	################################################
	function GetThaiDate($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0]+543;
		$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo $date."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
	}	
	################################################
	function GetThaiDate2($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0]+543;
		$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo $date."/".$mon."/".$year;
	}
	################################################
	function GetThaiDate3(&$day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0]+543;
		$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $day=$date."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
		return $day;
	}
	################################################
	function GetOnlyThaiMonth($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0]+543;
		$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo "&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
	}
	################################################ 
	function GetEngDate($day2){
		$dateArray = explode("-",$day2);
		//echo "Day 2 = ".$day2."<br>";
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
	}
	################################################
	function GetOnlyEngMonth($day3){
		$dateArray = explode("-",$day3);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
	$monthArray4=Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo "&nbsp;&nbsp;".$monthArray4[$mon]."&nbsp;&nbsp;".$year;
	}
	################################################
	function GetNewIcon($day,$icon){
		$today = date("Y-m-d");
		$dateDiff = ( strtotime($today) - strtotime($day) ) / ( 60 * 60 * 24 ); 
		if($dateDiff < 7){
			echo $icon;
		}		
	}
	################################################
	function createFileForSlideShow($sourcefolder,$targetfolder , $targetfolder2, $fix_width_img , $fix_height_img , $fix_width_tmb , $fix_height_tmb){
				  $file_array = array();
				  $txt='';
				  $handle = opendir($sourcefolder); 
				   	while (false!== ($file = readdir($handle))) {  
						if ($file!= "." && $file!= ".." &&!is_dir($file)) {  
								$namearr = split('\.',$file);  
								if (($namearr[count($namearr)-1] == 'jpg') ||($namearr[count($namearr)-1] == 'gif') || ($namearr[count($namearr)-1] == 'png'))
										 //$file_array[] = $file;  
										//---------------- copy to img folder -----------------------//
											if(!file_exists($targetfolder.$file)){ 
														$imgType = substr($file,-3,3);
														if(($imgType=='jpg')||($imgType=='JPG')||($imgType=='gif')||($imgType=='GIF')||($imgType=='png')||($imgType=='PNG')){
														img2folder($sourcefolder,$targetfolder , $fix_width_img , $fix_height_img , $file);							
														}
											}
												
										//-----------------copy to thb folder -------------------------//
											if(!file_exists($targetfolde2.$file)){ 
													$imgType = substr($file,-3,3);
													if(($imgType=='jpg')||($imgType=='JPG')||($imgType=='gif')||($imgType=='GIF')||($imgType=='png')||($imgType=='PNG')){
													img2folder($sourcefolder, $targetfolder2 ,$fix_width_tmb , $fix_height_tmb , $file);	
													}
										
											}

										//----------------  txt file ---------------------------------//
										if(($imgType=='jpg')||($imgType=='JPG')||($imgType=='gif')||($imgType=='GIF')||($imgType=='png')||($imgType=='PNG')){
												$txt = $txt."$file,$file,Surfing;";
										}
								}
							 } 
							closedir($handle);
									//---------------fwrite txt file ------------------------------//
									//	$txtcontent = "img_path=".$targetfolder."&tmb_path=".$targetfolder2."&arr_imgs=".$txt;
									//	$filetxt = "vfpg_config.txt";
									//	chmod($filetxt,0777);
									//	if (is_writable($filetxt)) {
									//		 $handle = fopen($filetxt, "w+");
									//		  fwrite($handle, $txtcontent );
									//		  fclose($handle);
											 
									//	}
									//	chmod($filetxt,0644);
			//print_r($file_array);
	}
	################################################
	function img2folder($sourcefolder,$targetfolder , $fix_width , $fix_height  , $img){
					
					$source =$sourcefolder.$img;
					$tsrc=$targetfolder.$img;
					$imgType = substr($img,-3,3);
					$days = 1;
					$cache_dir =$targetfolder;
				copy($source, $tsrc); //ทำการ copy รู
					//---- make scale width and height

					   $imgsize = @getImageSize($source);
						$x_ratio = $fix_width / $imgsize[0];
						$y_ratio = $fix_height / $imgsize[1];

						//IF width and high < MAX
						if ( ($imgsize[0] <= $max_x) && ($imgsize[1] <= $max_y) )  {
								$new_x = $imgsize[0];
								$new_y = $imgsize[1];
						} else if ( ($x_ratio * $imgsize[1]) < $fix_height){
								$new_x = $fix_width;
								$new_y = ceil($x_ratio * $imgsize[1]);
						}
						else {
								$new_x = ceil($y_ratio * $imgsize[0]);
								$new_y = $fix_height;
						}

					$n_width=$new_x;
					$n_height=$new_y;
					
					//----start make thumb------
					if(($imgType=='jpg')||($imgType=='JPG')){
							$im=ImageCreateFromJPEG($source); 
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);             // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);    
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							ImageJpeg($newimage,$tsrc);
					
					}else if(($imgType=='gif')||($imgType=='GIF')){
							$im=ImageCreateFromGIF($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
						//	imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
								if (function_exists("imagegif")) {
								//Header("Content-type: image/gif");
								ImageGIF($newimage,$tsrc);
								}
								elseif (function_exists("imagejpeg")) {
								//Header("Content-type: image/jpeg");
								ImageJPEG($newimage,$tsrc);
								}
					}else if(($imgType=='png')||($imgType=='PNG')){	
							$im = @imagecreatefrompng($source);
							$width=ImageSx($im);              // Original picture width is stored
							$height=ImageSy($im);                  // Original picture height is stored
							$newimage=imagecreatetruecolor($n_width,$n_height);
							//imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
							imagepng($newimage,$tsrc);
					}	

					//---------------Clear cache--------------------------------------
				   if($dp = @opendir($cache_dir)) {
								while($file = readdir($dp)) {
										if(preg_match('/^img_/', $file)) {
											 $mtime = @filemtime("$cache_dir/$file");
											 if($mtime < time() - 3600 * 24 * $days) @unlink("$cache_dir/$file");
										}
									}
								closedir($dp);
							  }

					return;
	}
	
	################################################	
	function  Xprice($price){
			//$price=substr_replace($price, $substr , -2, strlen($price));
			$price_array=explode(".",$price);
			$price_array[0]=number_format($price_array[0]);
			
			//$price_array[0]=ereg_replace("0", "X", $price_array[0]);
			//$price_array[1]=ereg_replace("0", "X", $price_array[1]);
			
			echo $price_array[0].".".$price_array[1];			
			return;
	}
	################################################	
	function  Xprice2($price){
			//$price=substr_replace($price, $substr , -2, strlen($price));
			$price_array=explode(".",$price);
			$price_array[0]=number_format($price_array[0]);
			if($price_array[1]==""){
				$price_array[1] ="00";
			}
			//$price_array[0]=ereg_replace("0", "X", $price_array[0]);
			//$price_array[1]=ereg_replace("0", "X", $price_array[1]);
			
			echo $price_array[0].".".$price_array[1];			
			return;
	}
	################################################
		//################### copy img thb+img#################################

		function copyImg($im,$imgPath,$thumbPath,$maxXimg,$maxYimg,$maxXthb,$maxYthb,$uploadfile_name){
						
						//$max_x= 500;//$max_y=400;
						$max_x= $maxXimg;
						$max_y=$maxYimg;
						
						$width=ImageSx($im);              // Original picture width is stored
						$height=ImageSy($im);            // Original picture height is stored
								$x_ratio = $max_x / $width;
								$y_ratio = $max_y / $height;
										//IF width and high < MAX
										if ( ($width <= $max_x) && ($height <= $max_y) )  {
												$new_x = $width;
												$new_y = $height;
										} else if ( ($x_ratio * $height) < $max_y){
												$new_x = $max_x;
												$new_y = ceil($x_ratio * $height);
										}
										else {
												$new_x = ceil($y_ratio * $width);
												$new_y = $max_y;
										}
							$n_width= $new_x;
							$n_height=$new_y;

						$tsrc=$imgPath.$uploadfile_name;   //path to store thumb img
						$newimage=imagecreatetruecolor($n_width,$n_height);
					//	imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
						ImageJpeg($newimage,$tsrc);
						//################### copy thumb###############################
						$max_x= $maxXthb; 
						$max_y=$maxYthb;
						$width=ImageSx($im);              // Original picture width is stored
						$height=ImageSy($im);            // Original picture height is stored
								$x_ratio = $max_x / $width;
								$y_ratio = $max_y / $height;
										//IF width and high < MAX
										if ( ($width <= $max_x) && ($height <= $max_y) )  {
												$new_x = $width;
												$new_y = $height;
										} else if ( ($x_ratio * $height) < $max_y){
												$new_x = $max_x;
												$new_y = ceil($x_ratio * $height);
										}
										else {
												$new_x = ceil($y_ratio * $width);
												$new_y = $max_y;
										}
							
							$n_width= $new_x;
							$n_height=$new_y;
						$tsrc=$thumbPath.$uploadfile_name;  //path to store thumb img
						$newimage=imagecreatetruecolor($n_width,$n_height);
						imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						ImageJpeg($newimage,$tsrc);

		}
		//################### copy img img#################################

		function copyImgNoThb($im,$imgPath,$thumbPath,$maxXimg,$maxYimg,$maxXthb,$maxYthb,$uploadfile_name){
						
						//$max_x= 500;//$max_y=400;
						$max_x= $maxXimg;
						$max_y=$maxYimg;
						
						$width=ImageSx($im);              // Original picture width is stored
						$height=ImageSy($im);            // Original picture height is stored
								$x_ratio = $max_x / $width;
								$y_ratio = $max_y / $height;
										//IF width and high < MAX
										if ( ($width <= $max_x) && ($height <= $max_y) )  {
												$new_x = $width;
												$new_y = $height;
										} else if ( ($x_ratio * $height) < $max_y){
												$new_x = $max_x;
												$new_y = ceil($x_ratio * $height);
										}
										else {
												$new_x = ceil($y_ratio * $width);
												$new_y = $max_y;
										}
							$n_width= $new_x;
							$n_height=$new_y;

						$tsrc=$imgPath.$uploadfile_name;   //path to store thumb img
						$newimage=imagecreatetruecolor($n_width,$n_height);
						imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
						//imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width,$n_height,$width,$height); 
						ImageJpeg($newimage,$tsrc);
		}
		//################### chane File name##################################
		function cHangeFileName2(&$filename,$prefix){
						$name_file_array = explode(".",$filename);
						$name_file_array[0] =  date("YMDHis");
						$filename = $name_file_array[0].$prefix.".".$name_file_array[1];
		}
		//################### DisplayNumberFormat##################################
            function DisplayNumberFormat($num){
					$priceArray = explode(".",$num);
					if($priceArray[1]==""){  $priceArray[1]="00";}
					echo  number_format($priceArray[0]).".".$priceArray[1];
	}
	//################### DisplayNumberFormat##################################
	   function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	//################### Count hotel in locationt##################################	 
	 function  CountHotel($location_id){
		 				$queryCount = "SELECT COUNT(id) CountNum FROM tbl_hotel_data WHERE location_id='".$location_id."' ";
						$result=mysql_query($queryCount);
						$data=mysql_fetch_assoc($result);
						echo $data['CountNum'];
		 }
		//################### Count Room in Hotel##################################	 
	 function  CountRoomHotel($hotel_id){
		 				$queryCount = "SELECT COUNT(id) CountNum FROM tbl_room_data WHERE hotel_id='".$hotel_id."' ";
						$result=mysql_query($queryCount);
						$data=mysql_fetch_assoc($result);
						echo $data['CountNum'];
		 } 
		//################### MIN MAX PRICE##################################	 		 
		function MinMaxPrice($hotel_id){
					  $query="SELECT MIN(normal_price) AS minPrice , MAX(normal_price) AS maxPrice FROM tbl_room_data WHERE hotel_id='".$hotel_id."' ";
					  $result=mysql_query($query);
					  $data=mysql_fetch_assoc($result);
					  echo $data['minPrice']." - ".$data['maxPrice'];
			}
		 
?>
