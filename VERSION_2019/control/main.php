<?php session_start();
			date_default_timezone_set("Asia/Bangkok");
			ini_set('allow_call_time_pass_reference',"ON");
             if(!isset($_SESSION['adminID'])){
				 		session_destroy();
						?><script language="javascript">
                        		window.location.href='index.php';
                        </script> 
                        <?php 
				 }else{ 
			require_once("config.inc.php");
			include("function.inc.php");
			require_once("define_language.php");//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			$path_product="../uploadfile/";		
			$path_product_thb="../uploadfile/thb/";	
			$path_product_thb2="../uploadfile/thb2/";		
	
	if($_SESSION['language']==1){
		$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
		$Range543=543;
		}else{
		$monthnames2=Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		$Range543=0;
		}		
			//---------------CLEAR tbl_news_and_act DATA-------------------------
			$dateLastYear=date("Y-m-d",  mktime (0,0,0,date("m"),  date("d"),  date("Y")-1));
			
			$queryClearNews="SELECT * FROM  `tbl_news_and_act` WHERE date_act > '".$dateLastYear."' ";
			echo $query;
			$resultClearNews=mysql_query($queryClearNews);
			  while($clearNews=mysql_fetch_assoc($resultClearNews)){
				  			//------------------clear image------------------
							$queryImg="SELECT * FROM   `tbl_news_and_act_file` WHERE news_id='".$clearNews['id']."' ";
							$resultIMG=mysql_query($queryImg);
							while($imgs=mysql_fetch_assoc($resultIMG)){
											//@unlink ($path_product."/thb/".$imgs['file_name']);
											//@unlink ($path_product.$imgs['file_name']);
								}
							 $queryDelete="DELETE FROM   `tbl_news_and_act_file` WHERE news_id='".$clearNews['id']."' ";
							// mysql_query($queryDelete);
							 $queryDelete="DELETE FROM   `tbl_news_and_act` WHERE id='".$clearNews['id']."' ";
							 //mysql_query($queryDelete);
				  }
				//---------------CLEAR tbl_news DATA-------------------------
				$queryCount="SELECT COUNT(id) NumID FROM tbl_news_data ";
				$resultCount=mysql_query($queryCount);
				$count=mysql_fetch_assoc($resultCount);
				if($count['NumID'] > 200){
							
					}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SERVER['HTTP_HOST'];?>: Admin</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="jquery.min.js"></script>-->
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="ddaccordion.js">
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/
</script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

<style type="text/css">

.arrowlistmenu{
width: 250px; /*width of accordion menu*/
}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 14px Arial;
color: white;
background: black url(titlebar.png) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 5px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;
}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
background-image: url(titlebar-active.png);
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li a{
color: #A70303;
background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
display: block;
padding: 2px 0;
padding-left: 19px; /*link text is indented 19px*/
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 70%;
}

.arrowlistmenu ul li a:visited{
color: #A70303;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #A70303;
background-color: #F3F3F3;
}

</style>
<script language="javascript">
			function windowOpener(windowHeight, windowWidth, windowName, windowUri)
			{
					var centerWidth = (window.screen.width - windowWidth) / 2;
					var centerHeight = (window.screen.height - windowHeight) / 2;
    				newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=yes,width=' + windowWidth +  ',height=' + windowHeight +  ',left=' +centerWidth + ',top=' + centerHeight);
					newWindow.focus();
					return newWindow.name;
		}
</script>
<script language="JavaScript" type="text/javascript" src="wysiwyg2.js"></script>
<script language="Javascript1.2"><!-- // load htmlarea
//_editor_url = "http://localhost/cv4/citymall/lib/htmlarea/";                     // URL to htmlarea files
_editor_url = 'htmlarea/'; 
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

</head>

<body >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="589"  background="images/top-5bg.png"><img src="images/top-5.png" width="589" height="143"></td>
    <td width="370" valign="bottom" background="images/top-5bg.png"><table width="98%" border="0" align="left">
      <tr>
        <td align="right" class="txt10-black" style="padding-right:5px;"><img src="images/black_icon/16x16/contact_card.png" width="16" height="16" style="vertical-align:middle; border:none; padding-right:5px;" /><?php echo $_SESSION['admin_name']?></td>
      </tr>
      <tr>
        <td align="right" style="padding-bottom:5px;"><a href="logout.php" ><img src="images/black_icon/16x16/on-off.png" width="16" height="16" style="vertical-align:middle; border:none; padding-right:5px;" /><span class="txt10-black">ออกจากระบบ</span></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#e3e3e3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="250" align="left" valign="top">
        <h3><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _Language?></h3>
        <div class="arrowlistmenu">
              <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _PresidentTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=PresidentAdd"><?php echo _PresidentAdd?></a></li>
            <li><a href="main.php?work=PresidentNote"><?php echo _PresidentNote?></a></li>
            <li><a href="main.php?work=PresidentNoteEdit"><?php echo _PresidentNoteEdit?></a></li>     
                     
        </ul>    
        <?php if($_SESSION['language']==1){?>
            <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _ActivityTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=ActivityAdd"><?php echo _dataAdd?></a></li>
            <li><a href="main.php?work=ActivityList"><?php echo _dataEdit?></a></li>    
        </ul>  
        <?php }?>
            <?php if($_SESSION['language']==3){?>
            <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _ActivityTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=ActivityAddch"><?php echo _dataAdd?></a></li>
            <li><a href="main.php?work=ActivityListch"><?php echo _dataEdit?></a></li>    
        </ul>  
        <?php }?>
		 <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />ข้อมูลวิชาการ</h3>
        <ul class="categoryitems">
			 <li><a href="main.php?work=infomation_category">เพิ่มหมวด</a></li>
            <li><a href="main.php?work=infomation_add"><?php echo _dataAdd?></a></li>
            <li><a href="main.php?work=infomation_list"><?php echo _dataEdit?></a></li>    
        </ul>  	
        <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _calendarTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=EventAdd"><?php echo _dataAdd?></a></li>
            <li><a href="main.php?work=EventList"><?php echo _dataEdit?></a></li>            
        </ul>        
    
          
               <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo  _MembershipTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=association"><?php echo _dataAdd?> PDf</a></li>
            <li><a href="main.php?work=UserAdd"><?php echo _dataAdd?></a></li>
            <li><a href="main.php?work=UserEdit"><?php echo _dataEdit?></a></li>  
        </ul>  
            
               <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _NewsTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=NewsAdd"><?php echo _dataAdd?></a></li>
             <li><a href="main.php?work=NewsList"><?php echo _dataEdit?></a></li>           
        </ul> 
         <?php if($_SESSION['language']==1){?>      
  	   <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />ระบบวารสาร</h3>
        <ul class="categoryitems">

             <li><a href="main.php?work=document_add&topic_type=1"><?php echo _dataAdd?></a></li>
             <li><a href="main.php?work=document_list&topic_type=0"><?php echo _dataEdit?></a></li> 
             <li><a href="main.php?work=document_pass&topic_type=0"><?php echo 'username , password'?></a></li> 
        </ul> 
               <?php }?>                          
             <?php if($_SESSION['language']==1){?>      
                <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _PriceTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=localPrice"><?php echo _txtLocalprice?></a></li>
             <li><a href="main.php?work=RecievePrice"><?php echo _txtBiddingprice?></a></li> 
             <li><a href="main.php?work=SellPrice"><?php echo _txtOfferprice?></a></li>   
             <li><a href="main.php?work=CessAdd"><?php echo _txtCESSprice?></a></li>  
             <li><a href="main.php?work=Auction"><?php echo _txtCenterprice?></a></li>  
        </ul>  <?php }?>  

         <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _SituationTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=SituationAdd"><?php echo _dataAdd?></a></li>
             <li><a href="main.php?work=SituationList"><?php echo _dataEdit?></a></li> 
        </ul>           
             <?php if($_SESSION['language']==1){?>        
         <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _StatisticsTitle?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=StatThai"><?php echo _txtStatThai?></a></li>
             <li><a href="main.php?work=StatWorld"><?php echo _txtStatWorld?></a></li> 
             <li><a href="main.php?work=StatOther"><?php echo _txtStatOther?></a></li>   
              <li><a href="main.php?work=StatList"><?php echo _txtStatEdit?></a></li>              
        </ul>                
      
           <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />Webboard</h3>
        <ul class="categoryitems">

             <li><a href="main.php?work=webboardList&topic_type=1"><?php echo _txtWebboardList1?></a></li>
             <li><a href="main.php?work=webboardList&topic_type=0"><?php echo _txtWebboardList2?></a></li> 
        </ul>     <?php } ?>         
        <?php if($_SESSION['language']==1){?>         
            <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _ArticleTitle?></h3>
        <ul class="categoryitems">
               <li><a href="main.php?work=MiscAdd"><?php echo _dataAdd?></a></li>
              <li><a href="main.php?work=MiscList"><?php echo _dataEdit?></a></li>              
        </ul>               
         
               <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />Banner</h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=BannerAdd"><?php echo _dataAdd?> Banner</a></li>
        </ul>  
              <?php }?>                                
               <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" /><?php echo _TopNews?></h3>
        <ul class="categoryitems">
            <li><a href="main.php?work=TopNews"><?php echo _dataAdd?> / <?php echo _dataEdit?></a></li>
        </ul>  
         <?php if($_SESSION['language']==1){?>         
          <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />Newsletter</h3>
        <ul class="categoryitems">
      		  <li><a href="main.php?work=MemberList"><?php echo _MemberList?></a></li>
            <li><a href="main.php?work=addLetter"><?php echo _dataAdd?></a></li>
            <li><a href="main.php?work=LetterList"><?php echo _dataEdit?></a></li>
            <li><a href="main.php?work=SendLetter"><?php echo _txtSendLetter?></a></li>            
        </ul> 
        <?php }?>     
        <h3 class="menuheader expandable"><img src="images/black_icon/16x16/brackets2.png" width="16" height="16" hspace="5" align="absmiddle" />Admin User</h3>
        <ul class="categoryitems">
         <?php if($_SESSION['admin_type']==1){ ?>
            <li><a href="main.php?work=User">เพิ่ม Admin</a></li>
            <?php }?>
            <li><a href="main.php?work=chpass"><?php echo _ChPass?></a></li>
            <li><a href="logout.php"><?php echo _LogOut?> <img src="images/black_icon/16x16/on-off.png" width="16" height="16"  style="border:none; vertical-align:middle"/></a></li>
        </ul>        
</div></td>
        <td valign="top"><table id="Table_" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td width="10" bgcolor="#E3E3E3">&nbsp;</td>
            <td  width="727" height="550" valign="top"  bgcolor="#FFFFFF" class="copyRight">
              <?php 
						
					 switch($_GET['work']) {
						//-----------------------President-----------------
						 case   'PresidentAdd' :
								include("PresidentAdd.php");	
								 break;
						 case   'PresidentNote' :
								include("PresidentNote.php");	
								 break;								 
						 case   'PresidentNoteEdit' :
								include("PresidentNoteEdit.php");	
								 break;		
						//-----------------------EVENT---------------								 						 
						 case   'ActivityAdd' :
								include("ActivityAdd.php");	
								 break;									
						 case   'ActivityList' :
								include("ActivityList.php");	
								 break;			
						case   'ActivityPicture' :
								include("sortPicture.php");	
								 break;			 						
						//-----------------------EVENT---------------								 						 
						 case   'ActivityAddch' :
								include("ActivityAddch.php");	
								 break;									
						 case   'ActivityListch' :
								include("ActivityListch.php");	
								 break;			
						case   'ActivityPicturech' :
								include("sortPicturech.php");	
								 break;			 						
						//-----------------------CALENDAR----------	
						 case   'EventAdd' :
								include("EventAdd.php");	
								 break;									
						 case   'EventList' :
								include("EventList.php");	
								 break;			
						//-----------------------association---
						 case   'association' :
								include("association.php");	
								 break;								
                                                 case   'UserAdd' :
                                                                include("UserAdd.php");	
								break;
                                                 case   'UserEdit' :
								include("UserEdit.php");	
								 break;	
						//----------------NEWS------------
						 case   'NewsAdd' :
								include("NewsAdd.php");	
								 break;									
						 case   'NewsList' :
								include("NewsList.php");	
								 break;			
						//----------------Document------------
						 case   'document_add' :
								include("document_add.php");	
								 break;									
						 case   'document_list' :
								include("document_list.php");	
								 break;	
						 case   'document_pass' :
								include("document_pass.php");	
								 break;			
						//----------------NR PRICE------------	
						case   'localPrice' :
								include("localPrice.php");	
								 break;			
						case   'exportlocalprice' :
								include("exportlocalprice.php");	
								 break;			
						case   'RecievePrice' :
								include("RecievePrice.php");	
								 break;			
						case   'SellPrice' :
								include("SellPrice.php");	
								 break;			
						case   'CessAdd' :
								include("CessAdd.php");	
								 break;		
						case   'Auction' :
								include("market_rubber_add.php");	
								 break;										 
						case   'exportAuction' :
								include("exportAuction.php");	
								 break;										 			 				
						//----------------Situation------------	
						case   'SituationAdd' :
								include("SituationAdd.php");	
								 break;	
						case   'SituationList' :
								include("SituationList.php");	
								 break;									 
						//----------------Statistic------------	
						case   'StatThai' :
								$StatType='thai';
								$txttopic="สถิติยางไทย";
								 include("StatisticAdd.php");	
								 break;		
						case   'StatWorld' :
								$StatType='world';
								$txttopic="สถิติยางโลก";
								 include("StatisticAdd.php");	
								 break;									 					
						case   'StatOther' :
								$StatType='other';
								$txttopic="สถิติอื่นๆ";
								 include("StatisticAdd.php");	
								 break;		
						case   'StatList' :
								 include("StatList.php");	
								 break;										 
						//----------------Statistic------------	
						case   'webboardList' :
								 include("webboardList.php");	
								 break;								
						//----------------MISC------------													 																						
						case   'MiscAdd' :
								 include("MiscAdd.php");	
								 break;		
						case   'MiscList' :
								 include("MiscList.php");	
								 break;		
						//----------------BannerAdd------------													 																						
						case   'BannerAdd' :
								 include("banner_add.php");	
								 break;										 
						//----------------Top news------------													 																						
						case   'TopNews' :
								 include("news_top.php");	
								 break;	
						//-------------informatioj-----------
						 case "infomation_category" :
							    include("infomation_category.php");	
							   break;
						 case "infomation_add" :
							    include("infomation_add.php");	
							   break; 
						 case "infomation_list" :
							    include("infomation_list.php");	
							   break;
						//----------------news letter------------													 																						
						case   'addLetter' :
								 include("addLetter.php");	
								 break;									 
						case   'LetterList' :
								 include("LetterList.php");	
								 break;			
						case   'SendLetter' :
								 include("SendLetter.php");	
								 break;										 
						case   'newsletterFrom' :
								 include("newsletterFrom.php");	
								 break;		
						case   'MemberList' :
								 include("memberList.php");	
								 break;										 								 								 
						//-------------------User----------//								
						case 'User' :
								include("user.php");	
								break;
						case 'chpass':
								include("chpass.php");									 									 								  																										
								break;
					 }
						
			  ?>
              </td>
            <td bgcolor="#E3E3E3" width="8">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
   </td>
  </tr>
  
  <tr>
    <td height="40" colspan="2" align="center" bgcolor="#64B047" class="txt-8"><a href="http://www.me-fi.com" target="_blank">[Designed by me-fi.com]</a></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close()?>
<?php } ?>