<?php
	//header("Content-Type: text/plain; charset=utf-8");
	//header("Cache-Control: no-cache,must-revalidate");
	//header("Prdgma : no-cache");
  require_once("config.inc.php");
  	
 
	//----------show form -------------------//

	if($atype=='1'){?>
	ระบุ Link ต้องระบุ http:// หรือ https://  <INPUT TYPE="text" NAME="linkData" size='40'>
	<br />
เลือกไฟล์
<INPUT TYPE="file" NAME="uploadfile" size="25">
<?php }else if($atype=='2'){ ?>
	แลกLink <BR>
	<textarea name="html_code" cols="50" rows="4" id="html_code"></textarea>
<?php }
		//---------------------------------------------
		//---------------------List--------------------///
	
		if($showList=='ok'){
			//----------------------------------------------------------------
$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
				//----------------------------------------------------------------
					if($_POST['todo']=='delete'){
							$query = "SELECT * FROM tbl_banner WHERE id = '".$banner_id."' ";
							$result = mysql_query($query);
							$data=mysql_fetch_assoc($result);
									@unlink("../banner_file/".$data['banner_file_name']);
							$query="DELETE FROM tbl_banner WHERE id = '".$banner_id."' ";
							mysql_query($query);
						
					}
				//----------------------------------------------------------------
					if($_POST['todo']=='change'){
							if($bannerStatus=='1'){ $Status=0;}
							if($bannerStatus=='0'){ $Status=1;}
							$query = "UPDATE  tbl_banner  SET  banner_status='".$Status."'  WHERE id = '".$_POST['banner_id']."' ";
							mysql_query($query);
						
					}		
				//----------------------------------------------------------------			
					if($_POST['todo']=='firstPage'){
							if($showValue=='1'){ $showValueUpdate=0;}
							if($showValue=='0'){ $showValueUpdate=1;}
							$query = "UPDATE  tbl_banner  SET  first_page_show='".$showValueUpdate."'  WHERE id = '".$_POST['banner_id']."' ";
							//echo $query;
							mysql_query($query);
							
					}
			//----------------------------------------------------------------
			$fixwidth[1]=round(734/2);
			$fixheight[1]=round(134/2);			
			$fixwidth[2]=round(734/2);
			$fixheight[2]=round(134/2);	
			$fixwidth[3]=200/2;
			$fixheight[3]=250/2;	
			$fixwidth[4]=round(215/2);
			$fixheight[4]=round(85/2);	
			
		//	echo "height=".$fixheight[$listType]."     width = ".$fixwidth[$listType]."<BR>";
			//----------------------------------------------------------------

					$query="SELECT * FROM tbl_banner WHERE banner_position = '".$listType."' ORDER BY id DESC";
					//echo $query;
					$result =mysql_query($query); 
		?>
		<table width='100%' border='0'>
        	<tr>
						  <td bgcolor='#F9F9F9'>&nbsp;</td>
						  <td align="center" bgcolor='#F9F9F9'>แสดงหน้าแรก</td>
						  <td bgcolor='#FEF1D8' align='center'>&nbsp;</td>
						  <td align="center"  bgcolor='#F9F9F9' >&nbsp;</td>
		  <tr>
				<?php while($data=mysql_fetch_assoc($result)){ ?>
						<tr>
							<td width ='65%' bgcolor='#F9F9F9'>
							<?php 
									if(substr($data['banner_file_name'], -3, 3)=='swf'){ ?>
											<!-- flash  -->
										<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="<?php echo $fixwidth[$listType]?>" height="<?php echo $fixheight[$listType]?>">
  <param name="movie" value="../banner_file/<?php echo $data['banner_file_name']?>">
  <param name="quality" value="high">
  <embed src="../banner_file/<?php echo $data['banner_file_name']?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php echo $fixwidth[$listType]?>" height="<?php echo $fixheight[$listType]?>"></embed>
</object>

												<!-- flash  -->
								<?php
									}else if((substr($data['banner_file_name'], -3, 3)!='')){
										echo "<a href='".$data['link']."' target='_blank'><img src='../banner_file/".$data['banner_file_name']."' border='0' width='".$fixwidth[$listType]."' height='".$fixheight[$listType]."'></a>";	
										//echo "<br>../banner_file/".$data['banner_file_name'];								
									}else if($data['banner_file_name']==""){
										    echo $data['banner_html_code'];
									}
							?>
							
							</td>
							<td width ='13%' align="center" bgcolor='#F9F9F9'>
                            <input name="first_page" type="checkbox" id="first_page" value="1" <?php if($data['first_page_show']=='1'){ echo "checked";}?> onclick="showFirstPage(form1.select.value,'<?php echo $data['id']?>','<?php echo $data['first_page_show']?>')" />
						    <label for="first_page"></label></td>
										<td bgcolor='#FEF1D8' width ='15%' align='center'>
											<?php if($data['banner_status']=='1'){ ?>
												ใช้งาน<BR>
												<A HREF="#" onclick="ChangeStatusBanner(form1.select.value,'<?php echo $data['id']?>','<?php echo $data['banner_status']?>')"  title="[ กดเพื่อยกเลิกใช้งาน ]">
											  <IMG SRC="images/publish_x.png" WIDTH="12" HEIGHT="12" BORDER=0 ALT="[  กดเพื่อยกเลิกใช้งาน ] ">
												</A>
												<?php }else { ?>ไม่ใช้งาน<BR>
												<A HREF="#" onclick="ChangeStatusBanner(form1.select.value,'<?php echo $data['id']?>','<?php echo $data['banner_status']?>')" title="[ กดเพื่อใช้งาน ]">
												<IMG SRC="images/tick.png" WIDTH="12" HEIGHT="12" BORDER=0 ALT="[ กดเพื่อใช้งาน ]">
												</a>
											<?php }?>
									</td>
							<td width ='7%' align="center"  bgcolor='#F9F9F9' >&nbsp; 
							<A HREF="#" onclick="if(confirm('ต้องการลบ ?')){ deleteBanner(form1.select.value,'<?php echo $data['id']?>'); }else{ return false;}">ลบ</A>
							</td>
					
			<?php } ?>
		</table>


<?php	mysql_close($link); 
	
	
	} ?>