<?php 
			$rowPerPage = 20;
			$thisFile=basename($PHP_SELF);
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}		
				  if(!isset($xtype)){ $xtype=1;}else{ $xtype=$xtype;}
				  
				  //	$queryNews = "SELECT *  FROM `tbl_news`  WHERE c_type='1'  AND c_lang='1'  ORDER BY c_update DESC   ";
					 	$queryNews = "SELECT *  FROM `tbl_news_data`  WHERE  cate_id ='1' AND language='$lang'   ORDER BY date_act DESC   ";
					$queryLimit = $queryNews." LIMIT $startRow , $rowPerPage ";
					$resultNews =mysql_query($queryLimit );					
					//echo $query;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" /><style type="text/css">

	<style>
body {
	background-color: #D7EFF9;
}

.style1 {color: #815204}

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

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<title>ข้อมูลวิชาการ สมาคมยางพาราไทย</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg','images/inside/nr_over_55.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #D7EFF9 !important">
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td width="877" align="right" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_information.php"); ?></td>
      <td align="center" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
          <td align="left" background="../th/images/inside/h-message_bg.gif"><img src="../images/h-title/h-infomation.jpg" alt="history" width="400" height="100"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
        </tr>
      </table>
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="top">
          <td width="841" align="right">
             <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;">
              <tr>
                <td width="18"><img src="images/spacer.gif" width="26" height="6" /></td>
                <td width="943" align="center">
				<div style="font-size:11pt;" id="showData"></div>
               </td>
                <td width="26"></td>
              </tr>
              <tr>
                <td height="10" valign="top">&nbsp;</td>
                <td height="10" align="center">
				   <div id="showPage"></div>	
				  
				  </td>
                <td height="10">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
    </table>
        <p class="FontMS10"><br>
        </p>
        <p>&nbsp;</p>
        <p></p>
      </td>
    </tr>
  </table>
</center>
</body>
<script>
	function setnumpaget(numbers){
		
		$('#CurrPage').val(numbers);
		var cateID = $('#category_id').val();
		listData(cateID);
	}
	//-----------------------------
	function deleteThis(dataID,title,pdf_file){
		if(confirm('ต้องการลบ '+title+' ?')){
			$.post('../control/infomation_process.php', { part:"deleteINFO" , dataID:dataID , pdf_file:pdf_file },function(data){
				var cateID = $('#category_id').val();
				listData(cateID);
			})
		}else{
			return false;
		}
	}
	//-----------------------
	function listData(cateID,cateName){
		 
		   var CurrPage = $('#CurrPage').val();
		   var CurrCate = $('#CurrCate').val();
		   var rowPerpage = $('#rowPerpage').val();
		   var lang = $('#lang').val();
		  
		//console.log('CurrCate==>'+CurrCate+' cateID=>'+cateID+' ::CurrPage=>'+CurrPage)
		
		 if(CurrCate!=cateID){
			 $('#CurrPage').val('1');
			 $('#CurrCate').val(cateID)
			 var selectPage =1;
			 var selectCategory = cateID;
		 }else{
			 var selectPage=CurrPage;
			 var selectCategory = CurrCate;
		 }
		
		  $('#CurrPage').val(selectPage);
		
		console.log('listData->  CurrPage->'+selectPage+' CurrCate->'+selectCategory+' rowPerpage->'+rowPerpage);
		
		$.post('../control/infomation_process.php', { part:"listInfomationWWW" , selectPage : selectPage , selectCategory:selectCategory , rowPerpage:rowPerpage , lang:lang , cateName:cateName }, function(data){
			  $('#showData').empty();
			  $('#showData').html(data);
			 
			 
				   ListPages(cateID)
			 
			 
		})
		
		

	}
	//--------------------------------
	function ListPages(cateID){
		var CurrPage = $('#CurrPage').val();
		 var rowPerpage = $('#rowPerpage').val();
		$.post('../control/infomation_process.php', { part:"ListPages" , cateID : cateID , CurrPage : CurrPage , rowPerpage:rowPerpage },function(data){
			    $('#showPage').empty();
				$('#showPage').html(data);
			
		})
	}
	//--------------------------------
	$(document).ready(function(){
		
		var cateID = $('#category_id').val();
		var category_name = $('#category_name').val();
		
		listData(cateID,category_name);
		//ListPages(cateID);
	})	
</script>