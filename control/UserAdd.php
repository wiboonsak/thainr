<?php 
	 $stable=2007;
	 $currentYear=date("Y");
	 $rangeYear = ($currentYear-$stable)+6;
	
	//-------------------------
	
	if($_GET['IDS']){ $_POST['IDS']=$_GET['IDS']; }
	if($_POST['action']=='add'){
		$today=date("Y-m-d");
		//$today =$_POST['syear']."-".$_POST['smonth']."-".$_POST['sdate'];
				if($_POST['IDS']==''){ 
				
						 $query = "INSERT INTO `tbl_member_data` ( `id`, `Office`, `Telephone`, `Fax`, `E-Mail`, `Website`, `Executives`, `Contact_person`, `Products/Capacity`, `language`,`date_add`, `name`)"
									." VALUES "
									." ( '', '".$_POST['Office']."', '".$_POST['Telephone']."' , '".$_POST['Fax']."', '".$_POST['EMail']."', '".$_POST['Website']."' "
									."  ,  '".$_POST['Executives']."', '".$_POST['Contact']."' , '".$_POST['Products']."'  ,  '".$_SESSION['language']."','$today','".$_POST['name']."' ) ";
									mysql_query($query);
									//echo $query;
									$_POST['IDS'] = mysql_insert_id();
								
				}
                                else{ 
				
						$query = "UPDATE   `tbl_member_data`  SET `Office` =  '".$_POST['Office']."',  `Telephone`  =  '".$_POST['Telephone']."' , `Fax` =  '".$_POST['Fax']."'  , `E-Mail` =  '".$_POST['EMail']."', `Website` = '".$_POST['Website']."', `name` = '".$_POST['name']."', `Executives`=	 '".$_POST['Executives']."' , `Contact_person`= '".$_POST['Contact']."'  , `Products/Capacity`= '".$_POST['Products']."' WHERE id =  '".$_POST['IDS']."' ";
						mysql_query($query);
//						//echo $query;
				}
				//echo $query;
	}
	
	if($_POST['IDS']){ 
		$query= "SELECT * FROM tbl_member_data  WHERE id =  '".$_POST['IDS']."' ";
		$result = mysql_query($query);
		$data =mysql_fetch_assoc($result);
		$Executives = $data['Executives'];
		$Contact_person = $data['Contact_person'];
		$Products = $data['Products/Capacity'];
		
		
		
	}
		//-----------------------------------
		$query="SELECT * FROM tbl_ceo WHERE active='1' ";
		$resultList=mysql_query($query);
		$dataCeo=mysql_fetch_assoc($resultList);
		
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="wysiwyg3.js"></script>
</head>

<body><form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr class="red">
    <td width="4%" height="25" align="center" bgcolor="#D9D9B3"><img src="images/black_icon/16x16/app_window.png" width="16" height="16" /></td>
    <td width="96%" bgcolor="#D9D9B3">เพิ่มข้อมูล Mamber

    
    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="txt10-black">
      <tr>
        <td align="right"><strong>Company</strong></td>
        <td><input name="name" type="text" id="name" value="<?php echo $data['name']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Office</strong></td>
        <td><input name="Office" type="text" id="Office" value="<?php echo $data['Office']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Telephone</strong></td>
        <td><input name="Telephone" type="text" id="Telephone" value="<?php echo $data['Telephone']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Fax</strong></td>
        <td><input name="Fax" type="text" id="Fax" value="<?php echo $data['Fax']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>E-Mail</strong></td>
        <td><input name="EMail" type="text" id="EMail" value="<?php echo $data['E-Mail']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Website</strong></td>
        <td><input name="Website" type="text" id="Website" value="<?php echo $data['Website']?>" size="60" maxlength="255" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Executives</strong></td>
        <td><div id="dd22"><textarea name="Executives" cols="100" rows="8" id="Executives"><?php echo $data['Executives'];?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('Executives');;
                </script><div></td>
      </tr>
      <tr>
        <td align="right"><strong>Contact person</strong></td>
        <td><textarea name="Contact" cols="100" rows="8" id="Contact"><?php echo $data['Contact_person']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('Contact');
		          </script></td>
      </tr>
      <tr>
        <td align="right"><strong>Products/Capacity</strong></td>
        <td><textarea name="Products" cols="100" rows="8" id="Products"><?php echo $data['Products/Capacity']?></textarea><script language="JavaScript1.2" type="text/javascript">generate_wysiwyg('Products');
		          </script></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <input type="hidden" id="action" name="action"/>
        <input type="hidden" name="IDS" id="IDS"value="<?php echo $_POST['IDS']?>" />
        <td><input type="submit" name="Submit" value="Add Data"  onclick="document.form1.action.value='add';"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>