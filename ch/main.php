<?php
	// webboard 
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE topic_type ='0' ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 5 ";
	//$queryboard= "SELECT * FROM `tbl_webboard_question` ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 21 ";
	$resultBoard_1 = mysql_query($queryboard);
	
	$queryboard= "SELECT * FROM `tbl_webboard_question` WHERE topic_type ='1' ORDER BY  topic_type ASC ,id  DESC   LIMIT 0, 5 ";
	$resultBoard_2 = mysql_query($queryboard);	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="ajaxtabs/tabcontent.css" />

<script type="text/javascript" src="ajaxtabs/tabcontent.js">

<script type="text/JavaScript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<body>
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
    <tr>
      <td  align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="18" background="../images/b-2.gif"><img src="../images/b-1.gif" width="18" height="34"></td>
          <td background="../images/b-2.gif"  style="font-family: 'Sarabun', sans-serif; margin-left: 100px;"><?php include("top-message.php"); ?></td>
          <td width="18"><img src="../images/b-3.gif" width="18" height="34"></td>
          </tr>
        </table>
        <br>
        <?php include("top-banner.php"); ?>
        <?php include("title_message.php"); ?>              
        <br>
        <?php include("mid-banner.php"); ?>
        <br>
        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
          <tr>
            <td height="35" colspan="3" align="left" bgcolor="#F5F5F5">
				<p style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; 活动</p>            	
            </td>
          </tr>
          <tr>
            <td colspan="3" align="left">
             	<?php $cateID=2; include('showact_222.php');?>
             </td>
          </tr>
        </table>
        <br>
        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="-webkit-box-shadow: 2px 2px 10px 2px #D4D4D4; box-shadow: 2px 2px 10px 2px #D4D4D4; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
          <tr align="left">
            <td height="35" colspan="3" align="left" bgcolor="#F5F5F5">
				<p style="font-family: 'Sarabun', sans-serif; font-size: 12pt; font-weight: 600;">&nbsp;&nbsp; 新闻</p>            	
            </td>
          </tr>
          <tr align="left" valign="top">
            <td colspan="3" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="18"></td>
                <td width="943" align="left">
                 	 <?php include('5news01_222.php');?>      
                </td>
                <td width="14"></td>
                </tr>
              <tr>
                <td height="10" valign="top">&nbsp;</td>
                <td height="10" align="center" ></td>
                <td height="10">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
        </table>
               
        <br>
		  
        <table width="1200" height="606" border="0" cellspacing="0" cellpadding="0" style="background-image: url(../images/annual_2019_w1200.jpg)">
          <tbody>
            <tr>
              <td width="39">&nbsp;</td>
              <td width="582" height="130">&nbsp;</td>
              <td width="579">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">&nbsp;</td>
              <td align="left" valign="top"><iframe src="../../Annual_2019/dinner/index.html" width="550" height="420" frameborder="0" scrolling="no"></iframe></td>
              <td align="left" valign="top"><iframe src="../../Annual_2019/ARBC/index.html" width="550" height="420" frameborder="0" scrolling="no"></iframe></td>
            </tr>
          </tbody>
        </table>
 
        <div id="btBanner">&nbsp;</div>
      </td>
    </tr>
  </table>
</center>
</body>