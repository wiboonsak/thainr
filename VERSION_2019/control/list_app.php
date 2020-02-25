<?php
		$rowPerPage=30;
			if((!$_POST['page'])||($_POST['page']==1)){
						$_POST['page']=1;
						$startRow=0;
			}else{
					$startRow=($_POST['page']-1)*$rowPerPage;
			}		
			
			
      //----------------------------------------------------------------------------------
		if($_POST['action']=='delete'){
				$query="DELETE FROM tbl_apply WHERE id= '".$_POST['KEY']."' ";
				mysql_query($query);
				$path_apply="../apply_photo/";
				@unlink ($path_apply."/".$_POST['removeImage']);
				@unlink ($path_apply."/thb/".$_POST['removeImage']);
		}
		//-----------------------------------------------------------------------------------
	
	      //----------------------------------------------------------------------------------	
	
		$query="SELECT * FROM tbl_apply   ORDER BY lastUpdate DESC   ";
		$queryLimit = $query." LIMIT  $startRow , $rowPerPage ";
		$result=mysql_query($queryLimit);
		
		$result2=mysql_query($query);		
		$xrow=mysql_num_rows($result2);
		$totalPage=ceil($xrow/$rowPerPage); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<script language="JavaScript">
     function HLThis(obj,id){
		          if(obj.checked == true){
							document.form1.action.value='HLthis';
							document.form1.KEY.value=id;
							document.form1.HLvalue.value=1;							
							document.form1.submit();
					  }else{
							document.form1.action.value='HLthis';
							document.form1.KEY.value=id;
							document.form1.HLvalue.value=0;							
							document.form1.submit();
						  }
		 }

<!--
	function toDelete(id,act,pic){
		 if(confirm('ต้องการลบหัวข้อนี้ ?')){
		 		document.form1.action.value=act;
		 		document.form1.removeImage.value=pic;				
				document.form1.KEY.value=id;
				document.form1.submit();
		 }else{
		 		return false();
		 }
	}
//-->
</script>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
    
  
  <tr>
    <td class="kbank"><table class="tableborder_full" height="30" cellspacing="0" cellpadding="0"  width="100%" border="0">
      <tbody>
        <tr>
          <td 
          height="28" colspan="6" align="right" valign="middle" nowrap="nowrap" class="navbar_selected" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="48%" height="30" align="left" bgcolor="#F0F0F0"><img src="images/icon24_modules.gif" width="24" height="22" align="absmiddle" /><a href="article_list.php" target="mainFrame" id="menu">รายชื่อผู้สมัครงาน</a>
                    <input name="KEY" type="hidden" id="KEY" />
                    <input name="action" type="hidden" id="action" />
                    <input name="removeImage" type="hidden" id="removeImage" />
                     <input name="HLvalue" type="hidden" />                   
                    <input name="page" type="hidden" id="page" value="<?php echo $_POST['page']?>" />    </td>
                <td width="52%" align="right" bgcolor="#F0F0F0">&nbsp;</td>
                </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25" align="center" bgcolor="#DBDBCA" class="NAV_URL"><label></label>
            &nbsp;</td>
          <td height="25" align="center"  bgcolor="#DBDBCA" class="NAV_URL">&nbsp;</td>
          <td width="109" align="center" bgcolor="#DBDBCA"  class="txt10-brown">วันที่สมัคร</td>
          <td width="103" align="center" bgcolor="#DBDBCA"  class="txt10-brown">แก้ไขล่าสุด</td>
          <td height="25" align="center"  bgcolor="#DBDBCA" class="NAV_URL">&nbsp;</td>
          <td height="25" align="center"  bgcolor="#DBDBCA" class="NAV_URL">&nbsp;</td>
        </tr>
        <?php 
					$bg1="#f2f2f2";
					$bg2="#FFFFFF";
					while($data=mysql_fetch_assoc($result)){ 
					$bgc = ($bgc==$bg2) ? $bg1 : $bg2;
	?>
        <tr>
          <td width="31" align="left"  bgcolor="<?php echo $bgc;?>" class="NAV_URL"><img src="images/icon/detail.png" width="22" height="22" />
              <label></label></td>
          <td width="460" height="25"  bgcolor="<?php echo $bgc;?>" class="NAV_URL">&nbsp;<?php echo $data['name']?> </td>
          <td height="25" align="center"  bgcolor="<?php echo $bgc;?>" class="NAV_URL"><?php echo GetThaiDate2($data['date_register'])?></td>
          <td height="25" align="center"  bgcolor="<?php echo $bgc;?>" class="NAV_URL"><?php echo GetThaiDate2($data['lastUpdate'])?></td>
          <td width="83" align="center"  bgcolor="<?php echo $bgc;?>" class="NAV_URL">
            <a href="#" onclick="windowOpener('800', '950', '<?php echo $data['id']?>', 'detailApp.php?&currentID=<?php echo $data['id']?>')" >รายละเอียด</a></td>
          <td width="57" align="center"  bgcolor="<?php echo $bgc;?>" class="NAV_URL"><a href="#" onclick="toDelete('<?php echo $data['id']?>','delete','<?php echo $data['userImg']?>')">ลบ</a></td>
        </tr>
        <?php } ?>
        <?php if(($xrow==0)||($xrow=="")) { ?>
        <tr>
          <td height="25" colspan="6" align="center"  bgcolor="<?php echo $bgc;?>" class="NAV_URL"><label></label>
            &nbsp;ยังไม่มีข้อมูลในหมวดนี้</td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
      <table width="100%" border="0">
        <tr>
          <td class="txt10-black">Page :
            <?php 
						for($i=1;$i<=$totalPage;$i++){ ?>
              <a href="#" onClick="document.form1.page.value='<?php echo $i?>';document.form1.submit();" >
              <?php		if($i==$_POST['page'])echo "<b><font size='+1'> ";
									         	echo  $i." ";
								if($i==$_POST['page'])echo "</font></b>";
										?>
              </a>
              <?php 	}  //echo "<br>".$_POST['page'];?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td class="kbank">&nbsp;</td>
  </tr>
</table>
</form>
