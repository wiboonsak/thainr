<?php 
			$rowPerPage = 20;
			$thisFile=basename($PHP_SELF);
				if((!$page)||($page==1)){
							$page=1;
							$startRow=0;
					}else{
							$startRow=($page-1)*$rowPerPage;
				  }
				  if(!isset($xtype)){ $xtype=1;}else{ $xtype=$xtype;}
				  
				$queryMember = "SELECT *  FROM `tbl_member_data`  WHERE language='1'   ORDER BY name ASC  ";					
					$resultMember =mysql_query($queryMember );						
					//echo $query;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>


<link href="style.css" rel="stylesheet" type="text/css" />
<title>สมาชิกสมาคมยางพาราไทย TRA Membership</title>
<body >
<table width="225" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" background="images/inside/nr_65.jpg"><a href="?detail=member"><img src="images/inside/nr_48.jpg" alt="" width=225 height=48 border="0"></a></td>
  </tr>
  <tr>
    <td align="left" valign="top" background="images/inside/nr_65.jpg">
	<table width="214"><td><p align="right">
<a href="#" onMouseover="moveup()" onMouseout="clearTimeout(moveupvar)"><img src="images/icon-up.gif" border=0></a></p></td>
</table></td>
  </tr>
  <tr>
    <td height="25"   align="center" valign="top" background="images/inside/nr_65.jpg">
    
<table width="205" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" class="FontMS10">
          
          
<script type="text/javascript">

/******************************************
* Scrollable content script II- ? Dynamic Drive (www.dynamicdrive.com)
* Visit http://www.dynamicdrive.com/ for full source code
* This notice must stay intact for use
******************************************/

iens6=document.all||document.getElementById
ns4=document.layers

//specify speed of scroll (greater=faster)
var speed=5

if (iens6){
document.write('<div id="container" style="position:relative;width:200px;left:5px;height:238px;border:0px solid black;overflow:hidden">')
document.write('<div id="content" style="position:absolute;width:200px;left:5px;top:0">')
}
</script>

<ilayer name="nscontainer"  width=210 height=180  clip="0,0,210,180">
<layer name="nscontent"  top="3" width=210 height=160  visibility=hidden left="5px" >
	 <table border="0" cellpadding="0" cellspacing="0">
              <col width="72">
              <col width="481">
                  <?php $a=1; 
                	while($dataMember=mysql_fetch_assoc($resultMember)){ ?>
                      <tr>
                        <td align="center" style="border-bottom: 1px solid #D5D5D5"><?php echo $a?></td>
						  <td height="26" align="left" style="border-bottom: 1px solid #D5D5D5; text-transform: uppercase !important"><a href="http://thainr.com/en/detail_member/member_dataen.php?&IDS=<?php echo $dataMember['id']?>"  target="_blank" style="text-decoration: none !important"><?php echo $dataMember['name']?>&nbsp;</a></td>
                      </tr>
                   <?php $a++;} ?>
      </table>
</layer>
</ilayer>



<script language="JavaScript1.2">
if (iens6)
document.write('</div></div>')
</script>
<table width="205px"><td><p align="right">
<a href="#" onMouseover="movedown()" onMouseout="clearTimeout(movedownvar)"><img src="images/icon-down.gif" border=0></a></p></td>
</table>
<script language="JavaScript1.2">
if (iens6){
var crossobj=document.getElementById? document.getElementById("content") : document.all.content
var contentheight=crossobj.offsetHeight
}
else if (ns4){
var crossobj=document.nscontainer.document.nscontent
var contentheight=crossobj.clip.height
}

function movedown(){
if (iens6&&parseInt(crossobj.style.top)>=(contentheight*(-1)+100))
crossobj.style.top=parseInt(crossobj.style.top)-speed+"px"
else if (ns4&&crossobj.top>=(contentheight*(-1)+100))
crossobj.top-=speed
movedownvar=setTimeout("movedown()",20)
}

function moveup(){
if (iens6&&parseInt(crossobj.style.top)<=0)
crossobj.style.top=parseInt(crossobj.style.top)+speed+"px"
else if (ns4&&crossobj.top<=0)
crossobj.top+=speed
moveupvar=setTimeout("moveup()",20)

}

function getcontent_height(){
if (iens6)
contentheight=crossobj.offsetHeight
else if (ns4)
document.nscontainer.document.nscontent.visibility="show"
}
window.onload=getcontent_height
</script>		  </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><img src="images/inside/nr_66.jpg" width=225 height=28 alt=""></td>
  </tr>
</table>
&nbsp; <br>
<!--
<table width="225" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"  background="images/inside/nr_85.jpg"><img src="images/inside/nr_70.jpg" alt="" width=225 height=47 border="0" usemap="#Map2">
      <map name="Map2">
        <area shape="rect" coords="11,7,208,34" href="?detail=organize">
      </map>    </td>
  </tr>
  <tr>
    <td height="20" align="center" valign="top" background="images/inside/nr_85.jpg" class=".LR10"><table width="210" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left"><span class="FontMS10"><img src="images/icon_www2.gif" alt="icon" width="15" height="14" hspace="5"><a href="detail_member/roat.php" target="_blank">Rubber Authority of Thailand (ROAT)</a></span><br>
          
          <span class="FontMS10"><img src="images/icon_www2.gif" alt="icon" width="15" height="14" hspace="5"><a href="detail_member/orraf-moac.php" target="_blank">Office of Replanting Aid Fund, Ministry of Agricultural and Cooperative (ORRAF/MOAC)</a></span><br>
          <span class="FontMS10"><img src="images/icon_www2.gif" alt="icon" width="15" height="14" hspace="5"><a href="detail_member/tisi.php" target="_blank">Thai Industrial Standards Institute (TISI)</a></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="images/inside/nr_86.jpg" width=225 height=28 alt=""></td>
  </tr>
</table>
-->
<map name="Map">
  <area shape="rect" coords="195,20,196,21" href="#">
</map>
</body>