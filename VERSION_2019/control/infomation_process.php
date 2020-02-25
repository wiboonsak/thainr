<?php
			require_once("config.inc.php");
			//include("function.inc.php");
			//require_once("define_language.php");//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			$path_product="../uploadfile/";		
			$path_product_thb="../uploadfile/thb/";	
			$path_product_thb2="../uploadfile/thb2/";	
            //--------------------------------

           // cate_name_th:cate_name_th  cate_lv, cate_name_en:cate_name_en , cate_lv:cate_lv , main_cate_id:main_cate_id 
            switch($_POST['part']){
				case "AddCate":
					$query="INSERT INTO tbl_information_category (id, cate_lv, main_cate_id, cate_name_th, cate_name_en, cate_name_ch, category_statis) VALUES ('', '".$_POST['cate_lv']."', '".$_POST['main_cate_id']."', '".$_POST['cate_name_th']."',  '".$_POST['cate_name_en']."', '".$_POST['cate_name_ch']."' , '1');";
					if(mysql_query($query)){
						echo '1';
					}else{
						echo '0';
					}
					
			    break;
				//--------------- updateCate" , name_th:name_th , name_en
				case "updateCate" : 
					$query="UPDATE tbl_information_category SET cate_name_th = '".$_POST['name_th']."' , cate_name_en ='".$_POST['name_en']."' WHERE id ='".$_POST['dataID']."' ";
					if(mysql_query($query)){
						echo '1';
					}else{
						echo '0';
					}
				break;
				//---------------  DeleteCate" , dataID:dataID , cType main  sub
				case "DeleteCate" :
					$query="UPDATE  tbl_information_category SET category_statis='0' WHERE id ='".$_POST['dataID']."' ";
					if(mysql_query($query)){
						echo '1';
					}else{
						echo '0';
					}
				break;
				//--------------- getMainCategory" , mainCateID
				case "getMainCategory":
					$query="SELECT * FROM tbl_information_category WHERE category_statis ='1' AND main_cate_id='0' ORDER BY id ASC  ";
					$result = mysql_query($query);
					$txtOption='<option value="0">--เป็นหมวดหลัก--</option>';
					while($data=mysql_fetch_assoc($result)){
						$txtOption=$txtOption.'<option value="'.$data['id'].'">'.$data['cate_name_th']."</option>";
					}
					echo $txtOption;
				break;
				//---------------listCate" , mainCate
				case "listCate":
					 function random_color_part() {
						return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
					}

					function random_color() {
						return random_color_part() . random_color_part() . random_color_part();
					}

					
	
					$query="SELECT * FROM tbl_information_category  "
						."  WHERE category_statis ='1' AND main_cate_id='0'   ORDER BY id ASC "
				        ." ";
				
					$result = mysql_query($query);
					
					
					
					?>
					
<table width="100%" class="txt10-black">
						<tr style="background-color: #CCE3B3">
							<td width="10" height="35" align="center"><strong>#</strong></td>
							<td align="center"><strong>หมวดภาษาไทย</strong></td>
							<td align="center"><strong>หมวดภาษาอังกฤษ</strong></td>
							<td width="15"></td>
							<td width="15"></td>
							<td width="15"></td>
						</tr>
						<?php $n=1; while($data=mysql_fetch_assoc($result)){
								//$bgRowcolor = random_color();
						?>	
					  <tr>
							<td height="40" align="center"><strong><?php echo $n?></strong></td>
							<td><input type="text" id="name_th<?php echo $data['id']?>" name="name_th<?php echo $data['id']?>" class="cateName" value="<?php echo $data['cate_name_th']?>" style="width: 100%; height: 30px;"></td>
							<td><input type="text" id="name_en<?php echo $data['id']?>" name="name_en<?php echo $data['id']?>" class="cateName"  value="<?php echo $data['cate_name_en']?>"  style="width: 100%;height: 30px;"></td>
							
							<td width="15"><button type="button"  onClick="UpdateName('<?php echo $data['id']?>')">แก้ไข</button></td>
							<td width="15"><button type="button" onClick="DeleteCate('<?php echo $data['id']?>','main')">ลบ</button></td>
						</tr>
						<?php 
						    $nSub=1;
							$query="SELECT *  FROM tbl_information_category   "
							."  WHERE  main_cate_id ='".$data['id']."' AND category_statis ='1'  ORDER BY id ASC "
				        	." ";
							$resultSub = mysql_query($query);	
							while($sub=mysql_fetch_assoc($resultSub)){ 
						?>
						<tr >
							<td height="40" align="center" style="width: 30px; background-color: #EBEBEB">
								<strong><?php echo $n.".".$nSub?>
						    </strong></td>
							<td bgcolor="#EBEBEB" style="padding-left: 10px;"><input type="text" id="name_th<?php echo $sub['id']?>" name="name_th<?php echo $sub['id']?>"  class="cateName"  value="<?php echo $sub['cate_name_th']?>" style="width: 100%; height: 30px;"></td>
							<td bgcolor="#EBEBEB"><input type="text" id="name_en<?php echo $sub['id']?>" name="name_en<?php echo $sub['id']?>"  class="cateName"  value="<?php echo $sub['cate_name_en']?>"  style="width: 100%;height: 30px;"></td>
							
							<td width="15" bgcolor="#EBEBEB"><button type="button" onClick="UpdateName('<?php echo $sub['id']?>')">แก้ไข</button></td>
							<td width="15" bgcolor="#EBEBEB"><button type="button"  onClick="DeleteCate('<?php echo $sub['id']?>','sub')">ลบ</button></td>
						</tr>
						  <?php $nSub++; }?>
						<tr>
							<td colspan="5" style="border-bottom:solid; border-bottom-color:#D7D7D7;border-bottom-width: 1px;"></td>
						</tr>
					  <?php $n++; }?>
					</table>

				<?php
			    break;
				//---------------------listInfomation" , selectPage : selectPage , selectCategory:selectCategory , rowPerpage
				case "listInfomation" :
					$_POST['selectPage'];
					$_POST['selectCategory'];
					$_POST['rowPerpage'];
					
					$rowPerPage=$_POST['rowPerpage'];
					if((!$_POST['selectPage'])||($_POST['selectPage']==1)){
								$_POST['selectPage']=1;
								$startRow=0;
					}else{
							$startRow=($_POST['selectPage']-1)*$rowPerPage;
					}	
					//---------category SELECT id , main_cate_id FROM tbl_information_category WHERE id='2' OR main_cate_id ='2'
					//echo 'selectPage->'.$_POST['selectPage']."<Br>";
					
					$query="SELECT * FROM tbl_information_data WHERE category_id IN(SELECT id FROM tbl_information_category WHERE id='".$_POST['selectCategory']."' OR main_cate_id ='".$_POST['selectCategory']."') ORDER BY date_add ASC LIMIT $startRow , $rowPerPage  ";
					//echo $query;
					$result = mysql_query($query);
					
					?>
					<table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
					  <tr>
						<td width="20" bgcolor="#E1E1E1">&nbsp;</td>
						<td width="81%" align="center" bgcolor="#E1E1E1">หัวข้อ</td>
						<td width="8%" align="center" bgcolor="#E1E1E1">แก้ไข</td>
						<td width="8%" align="center" bgcolor="#E1E1E1">ลบ</td>
					  </tr>
					  <?php


						while($data=mysql_fetch_assoc($result)){ ?>
					  <tr>
						<td width="20" align="center" bgcolor="#EFEFEF"><img src="images/black_icon/16x16/2x2_grid.png" width="16" height="16" /></td>
						<td bgcolor="#EFEFEF">
						<?php echo $data['title_th']?><br />
						<?php echo $data['title_en']?>
						</td>
						<td align="center" bgcolor="#EFEFEF"><a href="main.php?work=infomation_add&currID=<?PHP echo $data['id']?>"><img src="images/black_icon/16x16/doc_edit.png" width="16" height="16" style="border:none" /></a></td>
						<td align="center" bgcolor="#EFEFEF"><a href="#" onclick="deleteThis('<?php echo $data['id']?>','<?php echo htmlspecialchars($data['title_th'])?>','<?php echo $data['pdf_file']?>')"><img src="images/black_icon/16x16/round_delete.png" width="16" height="16"  style="border:none"  /></a></td>
					  </tr>
					  <?php } ?>      
					</table>

					<?php
				break;
				//--------------------	
				case "listInfomationWWW" :
					$_POST['selectPage'];
					$_POST['selectCategory'];
					$_POST['rowPerpage'];
					
					$lang=$_POST['lang'];
					
					$rowPerPage=$_POST['rowPerpage'];
					if((!$_POST['selectPage'])||($_POST['selectPage']==1)){
								$_POST['selectPage']=1;
								$startRow=0;
					}else{
							$startRow=($_POST['selectPage']-1)*$rowPerPage;
					}	
					//---------category SELECT id , main_cate_id FROM tbl_information_category WHERE id='2' OR main_cate_id ='2'
					//echo 'selectPage->'.$_POST['selectPage']."<Br>";
					include('function.inc.php');
					
					
					$query="SELECT * FROM tbl_information_category WHERE main_cate_id ='".$_POST['selectCategory']."' AND category_statis ='1' ";
					
					$resultN = mysql_query($query);
					$CountN=mysql_num_rows($resultN);
					
					
					if($CountN>0){ 
						
						if($lang=='1'){
							$txtPleaseChoose ='กรุณาเลือกหมวดย่อย';
						}else if($lang=='2'){
							$txtPleaseChoose ='Please select a sub-category.';
						}else if($lang=='3'){
							$txtPleaseChoose ='Please select a sub-category.';
						}	
					?>	
					   <script>
						   	$("#showPage").css("display", "none");
					   </script>
						<p style="font-family: Microsoft Sans Serif; font-size: 11pt; font-weight: bold;"> <?php echo $txtPleaseChoos.' '.$_POST['cateName']?></p>
						  <div align="center">
							<table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10" align="center" style="font-family: Microsoft Sans Serif; font-size: 11pt; font-weight: bold;">
                            <?php $n=1; while($dataCount = mysql_fetch_assoc($resultN)){ 
									if($lang=='1'){
										$titleSub = $dataCount['cate_name_th'];
									}else if($lang=='2'){
										$titleSub = $dataCount['cate_name_en'];
									}else if($lang=='3'){
										$titleSub = $dataCount['cate_name_en']; //cate_name_ch

									}
							?>
							<tr>
							    
							   <td  height="35" align="left"><img src="../images/icon-infomation.jpg" width="24" height="24" alt="icon" style="vertical-align: text-bottom" />&nbsp;
								   <a href="#" onClick="listData('<?php echo $dataCount['id']?>','<?php echo htmlspecialchars($titleSub)?>')">
								   <?php echo $titleSub?>
								   </a>
								</td>
                           </tr>
						   <?php $n++; }?>
						</table>
						 </div>
						

					<?php 
					}else if($CountN<=0){ 
						
						$sql="SELECT b.* FROM tbl_information_category AS a "
							." LEFT JOIN tbl_information_category AS b ON a.main_cate_id = b.id "
							." WHERE a.id ='".$_POST['selectCategory']."'  ";
						
						
						//echo $sql;
						$resultMainCate = mysql_query($sql);
						$dataManinCate = mysql_fetch_assoc($resultMainCate);
						if($lang=='1'){
								$titleMainCate = $dataManinCate['cate_name_th'];
							}else if($lang=='2'){
								$titleMainCate = $dataManinCate['cate_name_en'];
							}else if($lang=='3'){
								$titleMainCate = $dataManinCate['cate_name_en'];

							}

						$query="SELECT * FROM tbl_information_data WHERE category_id IN(SELECT id FROM tbl_information_category WHERE id='".$_POST['selectCategory']."' OR main_cate_id ='".$_POST['selectCategory']."') ORDER BY date_add ASC LIMIT $startRow , $rowPerPage  ";
					//echo $query;
						$result = mysql_query($query);	
						?>
						 <script>
						   	$("#showPage").css("display", "block");
					   </script>

						
					
				<p style="font-family: Microsoft Sans Serif; font-size: 11pt; font-weight: bold;">
					<?php if($titleMainCate!=''){ ?>
							<a href="#" onClick="listData('<?php echo $dataManinCate['id']?>','<?php echo htmlspecialchars($titleMainCate)?>')" >
						<?php	echo $titleMainCate." &raquo;"; ?>
							 </a> 
					<?php 	}?>
					<?php echo $_POST['cateName']?></p>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
                    <tr>
                      <td width="54">&nbsp;</td>
                      <td width="1079">&nbsp;</td>
                      <td width="28" align="right">&nbsp;</td>
                    </tr>
                    
					
					<?php while($data=mysql_fetch_assoc($result)){
							if($lang=='1'){
								$titleSub = $data['title_th'];
							}else if($lang=='2'){
								$titleSub = $data['title_en'];
							}else if($lang=='3'){
								$titleSub = $data['title_en'];

							}
						
						?>
                      <tr>
                      <td height="35" align="center"><span class="txt8"><img src="../images/icon-infomation.jpg" width="24" height="24" alt="icon" style="vertical-align: text-bottom" /></span></td>
                      <td height="35" align="left">
					 <!-- <a href="#"  onclick="OpenNew('detail-news.php?ActID=<?php //echo $data['id']?>','600', '700' , '200' , '10')"> -->
                       <a href="#" onClick="windowOpener(700, 1000, 'windowName', 'detail-information.php?ActID=<?php echo $data['id']?>&lang=<?php echo $lang?>')">
					  <?php echo $titleSub;?></a> &nbsp;
                        <?php  $icon="<img src=\"http://www.thainr.com/th/images/3_43.gif\" alt=\"new\" width=\"21\" height=\"9\" />";
								GetNewIcon($data['date_add'],$icon)?></td>
                      <td height="35" align="center">&nbsp;</td>
                    </tr>
					
                    <tr bgcolor="#DAD5C2">
                      <td colspan="3" ><img src="images/spacer.gif" width="1" height="1" /></td>
                    </tr><?php } ?>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                </table>
					
					<?php	} 
				break;
			 //-----------------------------deleteINFO" , dataID:
				case "deleteINFO":
					if($_POST['pdf_file']!=''){
						@unlink('../uploadfile/'.$_POST['pdf_file']);
					}
					$query="DELETE FROM tbl_information_data WHERE id ='".$_POST['dataID']."' ";
					if(mysql_query($query)){
						echo 1;
					}else{
						echo 0;
					}
				break;
			 //-----------------------------	ListPages" , cateID : cateID , CurrPage  rowPerpage
				case "ListPages" :
					$query="SELECT COUNT(id) AS CountRow FROM tbl_information_data WHERE  category_id IN(SELECT id FROM tbl_information_category WHERE id='".$_POST['cateID']."' OR main_cate_id ='".$_POST['cateID']."') ";
					$result = mysql_query($query);
					$data = mysql_fetch_assoc($result);
					
					$totalPage=ceil($data['CountRow']/$_POST['rowPerpage']);
					
					echo "page :";
                                       
                                        
					for($i=1;$i<=$totalPage;$i++){
						
						echo '<a href="#" onclick="setnumpaget('.$i.')">';
						if($i==$_POST['CurrPage']){
							echo "<strong><font size='2'>";
						}
						echo "&nbsp;".$i;
						if($i==$_POST['CurrPage']){
							echo "</font></strong>";
						}
						echo "</a>";
					}
					
				break;
					
					
			}
 mysql_close($link);