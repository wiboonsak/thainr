<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<SCRIPT language=JavaScript>
<!--hide this script from non-javascript-enabled browsers
/* Functions that swaps images. */
/* Functions that handle preload. */
function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

// stop hiding -->

//-->
// begin absolutely positioned scrollable area object scripts 
// Extension developed by David G. Miles 
// Original Scrollable Area code developed by Thomas Brattli 
function verifyCompatibleBrowser(){ 
    this.ver=navigator.appVersion 
    this.dom=document.getElementById?1:0 
    this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom)?1:0; 
    this.ie4=(document.all && !this.dom)?1:0; 
    this.ns5=(this.dom && parseInt(this.ver) >= 5) ?1:0; 
 
    this.ns4=(document.layers && !this.dom)?1:0; 
    this.bw=(this.ie5 || this.ie4 || this.ns4 || this.ns5) 
    return this 
} 
bw=new verifyCompatibleBrowser() 
 
 
var speed=30 
 
var loop, timer 
 
function ConstructObject(obj,nest){ 
    nest=(!nest) ? '':'document.'+nest+'.' 
    this.el=bw.dom?document.getElementById(obj):bw.ie4?document.all[obj]:bw.ns4?eval(nest+'document.'+obj):0; 
    this.css=bw.dom?document.getElementById(obj).style:bw.ie4?document.all[obj].style:bw.ns4?eval(nest+'document.'+obj):0; 
    this.scrollHeight=bw.ns4?this.css.document.height:this.el.offsetHeight 
    this.clipHeight=bw.ns4?this.css.clip.height:this.el.offsetHeight 
    this.up=MoveAreaUp;this.down=MoveAreaDown; 
    this.MoveArea=MoveArea; this.x; this.y; 
    this.obj = obj + "Object" 
    eval(this.obj + "=this") 
    return this 
} 
function MoveArea(x,y){ 
    this.x=x;this.y=y 
    this.css.left=this.x 
    this.css.top=this.y 
} 
 
function MoveAreaDown(move){ 
	if(this.y>-this.scrollHeight+objContainer.clipHeight){ 
    this.MoveArea(0,this.y-move) 
    if(loop) setTimeout(this.obj+".down("+move+")",speed) 
	} 
} 
function MoveAreaUp(move){ 
	if(this.y<0){ 
    this.MoveArea(0,this.y-move) 
    if(loop) setTimeout(this.obj+".up("+move+")",speed) 
	} 
} 
 
function PerformScroll(speed){ 
	if(initialised){ 
		loop=true; 
		if(speed>0) objScroller.down(speed) 
		else objScroller.up(speed) 
	} 
} 
 
function CeaseScroll(){ 
    loop=false 
    if(timer) clearTimeout(timer) 
} 
var initialised; 
function InitialiseScrollableArea(){ 
    objContainer=new ConstructObject('divContainer') 
    objScroller=new ConstructObject('divContent','divContainer') 
    objScroller.MoveArea(0,0) 
    objContainer.css.visibility='visible' 
    initialised=true; 
} 
// end absolutely positioned scrollable area object scripts//-->
</SCRIPT>

<SCRIPT language=JavaScript>
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
// -->
</SCRIPT>

<STYLE type=text/css>#divUpControl {
	Z-INDEX: 1;
	LEFT: 500px;
	WIDTH: 250px;
	POSITION: absolute;
	TOP: 90px;
	TEXT-ALIGN: right;
	height: 22px;
}
#divDownControl {
	Z-INDEX: 1;
	LEFT: 500px;
	WIDTH: 250px;
	POSITION: absolute;
	TOP: 280px;
	TEXT-ALIGN: right;
}
#divContainer {
	LEFT: 534px; VISIBILITY: hidden; OVERFLOW: hidden; WIDTH: 200px; CLIP: rect(0px 200px 208px 0px); POSITION: absolute; TOP: 86px; HEIGHT: 208px
}
#divContent {
	LEFT: 0px; POSITION: absolute; TOP: 0px
}
</STYLE>

  <table width="242" border="0" cellpadding="0" cellspacing="0">
    <tr align="left" valign="top">
      <td colspan="3"><img src="images/inside/h-l-introduction.gif" width=242 height=54 alt=""></td>
    </tr>
    <tr align="left" valign="top">
      <td width="7" align="left"><IMG SRC="images/inside/nr_09.jpg" WIDTH=7 HEIGHT=193 ALT=""></td>
      <td width="228" bgcolor="#FFFFFF"><table width="98%" border="0" cellspacing="2" cellpadding="0">
        <tr>
          <td height="25"  class="out"><a href="?detail=history">ประวัติสมาคม</a></td>
        </tr>
        <tr>
          <td height="25" class="out"><a href="?detail=board">คณะกรรมการสมาคม</a></td>
        </tr>
        <tr>
          <td height="25" class="out"><a href="?detail=subboard">อนุกรรมการฝ่ายต่าง ๆ ของสมาคม</a> </td>
        </tr>
        <tr>
          <td height="25" class="out"><a href="?detail=advisor">ที่ปรึกษาสมาคม</a></td>
        </tr>
        <tr>
          <td height="25" class="out"><a href="?detail=enroll">ระเบียบ และการเป็นสมาชิกสมาคม</a> </td>
        </tr>
        <tr>
          <td height="25"  class="out"><a href="?detail=member">สมาชิกสมาคมยางพาราไทย</a></td>
        </tr>
        <tr>
         <td height="25"  class="out" ><a href="?detail=organize"> องค์กรเกี่ยวกับยางพารา</a></td>
        </tr>
       <!-- <tr>
         <td height="25"  class="out" ><a href="#"> ดาวน์โหลดแบบฟอร์มใบสมัครสมาชิก</a></td>
        </tr>-->
      </table>
      </td>
      <td width="7" align="left"><IMG SRC="images/inside/nr_11.jpg" WIDTH=7 HEIGHT=193 ALT=""></td>
    </tr>
  </table>
  <table width="242" border="0" cellspacing="0" cellpadding="0">

    <tr align="left" valign="top">
      <td width="242" align="center" background="images/inside/nr_21.jpg"><table width="228" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/inside/nr_23.jpg" width=122 height=53 alt=""><a href="?detail=pr-local"><img src="images/inside/nr_24.jpg" alt="" width=103 height=53 border="0"></a></td>
          </tr>
          <tr>
            <td><img src="images/inside/nr_33.jpg" width=122 height=32 alt=""><img src="images/inside/nr_34.jpg" width=103 height=32 alt=""></td>
          </tr>
          <tr>
            <td><a href="?detail=situation"><IMG SRC="images/inside/nr_36.jpg" ALT="" WIDTH=122 HEIGHT=45 border="0"></a><IMG SRC="images/inside/nr_37.jpg" WIDTH=103 HEIGHT=45 ALT=""></td>
          </tr>
          <tr>
            <td><IMG SRC="images/inside/nr_39.jpg" WIDTH=122 HEIGHT=30 ALT=""><IMG SRC="images/inside/nr_40.jpg" WIDTH=103 HEIGHT=30 ALT=""></td>
          </tr>
          <tr>
            <td><IMG SRC="images/inside/nr_45.jpg" WIDTH=122 HEIGHT=38 ALT=""><a href="?detail=stat-thai"><IMG SRC="images/inside/nr_46.jpg" ALT="" WIDTH=103 HEIGHT=38 border="0"></a></td>
          </tr>
      </table></td>
    </tr>
    <tr align="left" valign="top">
      <td align="center" background="images/inside/nr_21.jpg"><img src="images/inside/nr_47.jpg" width=225 height=24 alt=""></td>
    </tr>
    <tr align="left" valign="top">
      <td align="center" background="images/inside/nr_21.jpg"><?php include("link_member.php"); ?></td>
    </tr>
    <tr align="left" valign="top">
      <td align="center" background="images/inside/nr_21.jpg">&nbsp;</td>
</tr>
    <tr align="left" valign="top" background="images/inside/nr_21.jpg">
      <td><img src="images/inside/nr_114.jpg" width="242" height="16" alt="" /></td>
    </tr>
  </table>
