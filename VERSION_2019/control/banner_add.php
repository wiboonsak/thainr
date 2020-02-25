<?php 
    $rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}	
	####################################################
				 ///-----------------------------
				 $banner_path ="../banner_file/";
				 
				 //-----------------------------1
				if($_POST['action']=='add'){
					//echo $_FILES['uploadfile']['type'];
							if(($_FILES['uploadfile']['type']=="application/x-shockwave-flash") || ($_FILES['uploadfile']['type']=="image/gif")|| ($_FILES['uploadfile']['type']=="image/pjpeg")||($_FILES['uploadfile']['type']=="image/jpeg")){
										//get_file_name($_FILES['uploadfile']['name'],$_FILES['uploadfile']['type']);
										GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$fileExt);
										if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $banner_path.$_FILES['uploadfile']['name'])){
												$query="INSERT INTO `tbl_banner` "
												." (`id` ,`link` ,`banner_file_name` ,`banner_html_code` ,`banner_position` ,`banner_status` ) "
												." VALUES "
												." ('' , '$linkData', '".$_FILES['uploadfile']['name']."', '$html_code', '$bannerType', '$show') ";
											mysql_query($query);
									 }
					
			        	}else{
											$html_code =stripslashes($html_code);
											$html_code =addslashes($html_code);
												$query="INSERT INTO `tbl_banner` "
												." (`id` ,`link` ,`banner_file_name` ,`banner_html_code` ,`banner_position` ,`banner_status` ) "
												." VALUES "
												." ('' , '$linkData', '".$_FILES['uploadfile']['name']."', '$html_code', '$bannerType', '$show') ";
											mysql_query($query);										
									}
	  }		

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="ajax.js"></script>

</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">Banner

    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td width="141">ตำแหน่ง Banner </td>
        <td width="460"><select name="bannerType">
          <option value="1">ด้านบนหน้าเวป 734 x 184 pixel</option>
          <option value="2">ใต้สาส์นนายก 734 x 184 pixel</option>
          <option value="3">ด้านข้างหน้าเวป 200 x 250 pixel</option>
          <option value="4">ด้านล่างสุดหน้าเวป 215 x 85 pixel</option>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="addbannerType" type="radio" value="1"  onclick="showAddBanner(this.value)"/>
          เพิ่มไฟล์
          <input name="addbannerType" type="radio" value="2" onclick="showAddBanner(this.value)" />
          แลก Link </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div id="addType"></div></td>
      </tr>
      <tr>
        <td>แสดงหน้าเวป</td>
        <td><select name="show">
          <option value="1">แสดงทันที</option>
          <option value="0">ยังไม่แสดง</option>
        </select></td>
      </tr>
      <tr>
        <td><input name="action" type="hidden" id="action" /></td>
        <td><input type="button" name="Button" value=" เพิ่ม " onclick="form1.action.value='add';form1.submit();" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="txt10-black">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table class="txt10-black" height="30" cellspacing="0" cellpadding="0" 
      width="100%" border="0">
      <tbody>
        <tr>
          <td width="178" 
          height="25" valign="middle" nowrap="nowrap"bgcolor="#D9D9B3" ><img src="images/black_icon/16x16/picture.png" width="16" height="16" align="absmiddle" />List Banner </td>
          <td width="443" align="left" nowrap="nowrap" bgcolor="#D9D9B3">กรุณาเลือกประเภท
            <select name="select" onchange="listBanner(this.value)">
              <option>เลือกประเภท Banner</option>
              <option value="1" <?php if($bannerType==1) echo "selected"?>>ด้านบนหน้าเวป 734 x 184 pixel</option>
              <option value="2"<?php if($bannerType==2) echo "selected"?>>ใต้สาส์นนายก 734 x 184 pixel</option>
              <option value="3"<?php if($bannerType==3) echo "selected"?>>ด้านข้างหน้าเวป 200 x 250 pixel</option>
              <option value="4"<?php if($bannerType==4) echo "selected"?>>ด้านล่างสุดหน้าเวป 215 x 85 pixel</option>
            </select></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="" class="NAV_URL"><div id="listBanner"></div></td>
        </tr>
      </tbody>
    </table>
      <?php if($bannerType){ ?>
      <scrip>
		listBanner('<?php echo $bannerType?>');
      </script>
      <?php }?></td>
  </tr>
</table>
</form>
<script >
		function showAddBanner(atype){
					var str=Math.random();
					var isNS4 = (navigator.appName=="Netscape")?1:0;
					var mydata='atype='+atype+'&str='+str;	
				 ajax = new sack('show_form_banner.php');
				 ajax.element ='addType';
				 ajax.runAJAX(mydata);	
		}			
		function listBanner(listType){
			var isNS4 = (navigator.appName=="Netscape")?1:0;
			var str=Math.random();		
					var mydata='listType='+listType+'&showList=ok&str='+str;			
					 ajax = new sack('show_form_banner.php');
					 ajax.element ='listBanner';
					 ajax.runAJAX(mydata);			
		}
		function deleteBanner(listType,banner_id){
			var isNS4 = (navigator.appName=="Netscape")?1:0;
			var str=Math.random();	
			var mydata='listType='+listType+'&todo=delete&showList=ok&str='+str+'&banner_id='+banner_id;		
			 ajax = new sack('show_form_banner.php');
			 ajax.element ='listBanner';
			 ajax.runAJAX(mydata);	
		}
		function ChangeStatusBanner( listType,banner_id,banner_status){
					var isNS4 = (navigator.appName=="Netscape")?1:0;
					var str=Math.random();	
					var mydata='listType='+listType+'&todo=change&showList=ok&str='+str+'&banner_id='+banner_id+'&bannerStatus='+banner_status;		
					 ajax = new sack('show_form_banner.php');
					 ajax.element ='listBanner';
					 ajax.runAJAX(mydata);				
		}
		function showFirstPage(  listType, banner_id,showValue){
					var isNS4 = (navigator.appName=="Netscape")?1:0;
					var str=Math.random();	
					var mydata='listType='+listType+'&showList=ok&todo=firstPage&str='+str+'&banner_id='+banner_id+'&showValue='+showValue;		
					 ajax = new sack('show_form_banner.php');
					 ajax.element ='listBanner';
					 ajax.runAJAX(mydata);				
		}
		
		
</script>
</body>
</html>