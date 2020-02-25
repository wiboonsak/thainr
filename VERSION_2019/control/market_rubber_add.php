<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
	####################################################	
	//$cfgServers['host']				= 'localhost';
	//$cfgServers['stduser']			= 'bhhatyai_eshop';
	//$cfgServers['stdpass']			= 'FdkLTDs3';
	//$cfgServers['selectdb']			= 'thainr_temp';	
	
	//$cfgServers['stduser']			= 'root';
	//$cfgServers['stdpass']			= '1234';
	
	//$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
	//mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	####################################################
	$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
		$Range543=543;
		if($_POST['smonth']==""){
				$_POST['smonth']	=date("m");
		}
		if($_POST['syear']==""){
				$_POST['syear']=date("Y");
		}		
		$startYear=2000;
		$currentYear=date("Y");
		$CountYear=$currentYear-$startYear;
		$Range543=543;	
 	//---------------------------------------------------------
	if($_POST['action']=='Add'){
				$dateAdd=$_POST['syear']."-".$_POST['smonth']."-".$_POST['selectDay'];
				$query="INSERT INTO  `tbl_central_market_price` (`id`, `rubber_sheet`, `rubber_smoke_sheet`, `latex`, `rubber_scrap`, `date_data`, `note`) VALUES ( '' , '".$_POST['rubber_sheet']."', '".$_POST['rubber_smoke_sheet']."', '".$_POST['latex']."', '".$_POST['rubber_scrap']."', '".$dateAdd."', '".$_POST['note']."' )";
				mysql_query($query);
		}
 	//---------------------------------------------------------------- Delete updatID
	if($_POST['action']=='Delete'){
				$query="DELETE FROM tbl_central_market_price WHERE  id ='".$_POST['updatID']."'  ";
				mysql_query($query);
		} 
	
 	//----------------------------------------------------------------	
	if($_POST['action']=='Update'){
			for($i=1;$i < $_POST['Loops']; $i++){ 
				$dateAdd=$_POST['syear']."-".$_POST['smonth']."-".$_POST['ShowDay'][$i];
			
				$query="UPDATE tbl_central_market_price SET   `rubber_sheet` = '".$_POST['sheet'][$i]."' , `rubber_smoke_sheet` =  '".$_POST['smoke'][$i]."' , `latex` =  '".$_POST['latexData'][$i]."' , `rubber_scrap` = '".$_POST['scrapData'][$i]."' , `date_data` = '".$dateAdd."' , `note`  = '".$_POST['noteData'][$i]."'  "
				." WHERE id ='".$_POST['hiddenID'][$i]."'  ";
				//echo $query."<br>";
				mysql_query($query);
			}
		} 
  	//--------------------auto detect date----------------//
	$query="SELECT DATE_FORMAT( date_data, '%d' ) AS LastDate FROM `tbl_central_market_price`  WHERE   MONTH(date_data) =  '".$_POST['smonth']."'  AND YEAR(date_data) = '".$_POST['syear']."' ORDER BY  date_data DESC LIMIT 0, 1 ";
	// echo $query;
	 $result = mysql_query($query);
	 $lastDate =mysql_fetch_assoc($result);
	 $lastDate['LastDate'];
	 $DateAutoAdd=$lastDate['LastDate']+1;
	 if($DateAutoAdd< 10){ $DateAutoAdd="0".$DateAutoAdd;}else{ $DateAutoAdd=$DateAutoAdd; }
     // echo "<br>".$DateAutoAdd;
	  
	  ///-------------select data-------------------
	  $query="SELECT * ,  DATE_FORMAT( date_data, '%d' ) AS DateNum   FROM tbl_central_market_price   WHERE   MONTH(date_data) =  '".$_POST['smonth']."'  AND YEAR(date_data) = '".$_POST['syear']."' ORDER BY  date_data ASC ";
	 // echo  "<br>".$query;
	  $result=mysql_query($query);
	  
	  
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	function AddData(){
					document.form1.action.value='Add';
					document.form1.submit();
		}
	function updateData(){
					document.form1.action.value='Update';
					document.form1.submit();		
		}
	function deleteThis(ids , dateShow){
					if(confirm('ต้องการลบรายการนี้')){
						    document.form1.action.value='Delete';
							document.form1.updatID.value=ids; 
							document.form1.submit();		
						}else{
							return false;
							}
		
		}	
		
</script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr class="txt10-green">
      <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" alt="" width="16" height="16" /></td>
      <td width="96%" height="30" align="left" bgcolor="#D9D9B3"><span class="red">ราคายาง ตลาดกลางยางพารา สงขลา
        <input type="hidden" name="action" id="action" />
      </span>
<input type="hidden" name="updatID" id="updatID" /></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0" cellpadding="3" cellspacing="1" class="txt10-black">
        <tr>
          <td height="198" colspan="8" align="center"><table width="100%" border="0" cellpadding="3" cellspacing="1">
            <tbody>
            <tr>
                <td height="46" colspan="7" align="center" bgcolor="#CCCCCC" class="txt10-black"><table width="100%" border="0" class="txt10-black">
                  <tbody>
                    <tr>
                      <td width="20%">
                      <button type="button" onClick="window.location.href='main.php?work=exportAuction'">ส่งออกข้อมูลรูปแบบ exel</button>
                      </td>
                      <td width="80%">
                      
                          <strong>เลือกเดือน 
                    <select name="smonth">
                      <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
                      <option value="<?php echo $key;?>" <?php if($_POST['smonth']==$key) echo "selected";?>><?php echo $val?></option>
                      <?php } ?>
                  </select>
                  เลือกปี
                  <select name="syear">
                    <?php for($i=0;$i  <= $CountYear ;$i++){ 
				  				
				  ?>
                    <option value="<?php echo $currentYear-$i;?>" <?php if($_POST['syear']==($currentYear-$i))  echo "selected";?>><?php echo  ($currentYear-$i)+$Range543;?></option>
                    <?php }?>
                  </select>
                </strong>
                  <label for="hr">
                    <strong>สำหรับเพิ่ม/ดูข้อมูล</strong> 
                    <input type="submit" name="button2" id="button2" value="ตกลง" />
                  </label>
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
                </tr>
              <tr class="txt10-black">
                <td height="30" colspan="7" align="center" bgcolor="#B9B973"><strong>ส่วนเพิ่มข้อมูล</strong></td>
                </tr>
              <tr class="txt10-black">
                <td width="6%" height="30" align="center" bgcolor="#D9D9B3"><strong>วันที่</strong></td>
                <td width="15%" height="30" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นดิบ</strong></td>
                <td width="17%" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นรมควันชั้น 3</strong></td>
                <td width="21%" align="center" bgcolor="#D9D9B3"><strong>น้ำยางสด ณ โรงงาน</strong></td>
                <td width="17%" align="center" bgcolor="#D9D9B3"><strong>เศษยาง(100%)</strong></td>
                <td width="17%" align="center" bgcolor="#D9D9B3"><strong>หมายเหตุ</strong></td>
                <td width="7%" align="center" bgcolor="#D9D9B3">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" bgcolor="#E4E4E4"><select name="selectDay" id="selectDay">
                 		<?php for($i=1;$i<=31; $i++){ 
									 if($i<10){ $txtSi="0".$i;}else{ $txtSi=$i;  }
						?>
                        <option value="<?php echo $txtSi?>" <?php if($txtSi==$DateAutoAdd){ echo "selected";}?>><?php echo $i?></option>
                        <?php }?>
                  </select>
                  </td>
                <td align="center" bgcolor="#E4E4E4"><input name="rubber_sheet" type="text" id="rubber_sheet" size="10" maxlength="10" /></td>
                <td align="center" bgcolor="#E4E4E4"><input name="rubber_smoke_sheet" type="text" id="rubber_smoke_sheet" size="10" maxlength="10" /></td>
                <td align="center" bgcolor="#E4E4E4"><input name="latex" type="text" id="latex" size="10" maxlength="10" /></td>
                <td align="center" bgcolor="#E4E4E4"><input name="rubber_scrap" type="text" id="rubber_scrap" size="10" maxlength="10" /></td>
                <td bgcolor="#E4E4E4"><input name="note" type="text" id="note" maxlength="255" /></td>
                <td bgcolor="#E4E4E4"><input type="button" name="button" id="button" value="เพิ่มข้อมูล" onClick="AddData()"  /></td>
              </tr>
            </tbody>
          </table>
            <p class="red">หมายเหตุ ** หากไม่มีข้อมูลในวันใด ไม่ต้องกรอกข้อมูลวันนั้นคะ **</p>
</td>
        </tr>
        <tr>
          <td height="30" colspan="8" align="center" bgcolor="#B9B973"><strong>ส่วนแก้ไขข้อมูล</strong></td>
          </tr>
        <tr>
          <td height="33" align="center" bgcolor="#D9D9B3"><strong>วันที่</strong></td>
          <td height="33" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นดิบ</strong></td>
          <td width="17%" align="center" bgcolor="#D9D9B3"><strong>ยางแผ่นรมควันชั้น</strong></td>
          <td width="20%" align="center" bgcolor="#D9D9B3"><strong>น้ำยางสด ณ โรงงาน</strong></td>
          <td width="11%" align="center" bgcolor="#D9D9B3"><strong>เศษยาง(100%)</strong></td>
          <td width="12%" align="center" bgcolor="#D9D9B3"><strong>หมายเหตุ</strong></td>
          <td width="8%" align="center" bgcolor="#D9D9B3"><strong>แก้ไข</strong></td>
          <td width="8%" align="center" bgcolor="#D9D9B3"><strong>ลบ</strong></td>
        </tr>
     <?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
        <tr>
          <td width="9%" align="center" bgcolor="#E4E4E4"><select name="ShowDay[<?php echo $n?>]">
            <?php for($i=1;$i<=31; $i++){ 
									 if($i<10){ $txtSi="0".$i;}else{ $txtSi=$i;  }
						?>
            <option value="<?php echo $txtSi?>" <?php if($txtSi==$data['DateNum']){ echo "selected";}?>><?php echo $i?></option>
            <?php }?>
          </select>
            <input type="hidden" name="hiddenID[<?php echo $n?>]" id="hiddenID[<?php echo $n?>]" value="<?php echo $data['id']?>" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input name="sheet[<?php echo $n?>]" type="text" id="rubber_sheet_data[<?php echo $n?>]" size="10" maxlength="10" value="<?php echo $data['rubber_sheet']?>" /></td>
          <td align="center" bgcolor="#E4E4E4"><input name="smoke[<?php echo $n?>]" type="text" id="smoke[<?php echo $n?>]" size="10" maxlength="10" value="<?php echo $data['rubber_smoke_sheet']?>" /></td>
          <td align="center" bgcolor="#E4E4E4"><input name="latexData[<?php echo $n?>]" type="text" id="latexData[<?php echo $n?>]" size="10" maxlength="10"  value="<?php echo $data['latex']?>" /></td>
          <td align="center" bgcolor="#E4E4E4"><input name="scrapData[<?php echo $n?>]" type="text" id="scrapData[<?php echo $n?>]" size="10" maxlength="10"   value="<?php echo $data['rubber_scrap']?>" /></td>
          <td align="center" bgcolor="#E4E4E4"><input name="noteData[<?php echo $n?>]" type="text" id="noteData[<?php echo $n?>]" size="20" maxlength="255"  value="<?php echo $data['note']?>"/></td>
          <td align="center" bgcolor="#E4E4E4"><input type="button" name="button3" id="button3" value="แก้ไข" onClick="updateData()" /></td>
          <td align="center" bgcolor="#E4E4E4"><input type="button" name="button4" id="button4" value="ลบ"  onclick="deleteThis('<?php echo $data['id']?>', <?php echo $data['date_data']?>)"/></td>
        </tr>
    <?php $n++; } ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2" class="txt10-black"><input name="Loops" type="hidden" id="Loops" value="<?php echo $n?>" /></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<script language="javascript">
	
					document.form1.rubber_sheet.focus();
					
		
</script>
<?php //mysql_close();?>
