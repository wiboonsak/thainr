<?php
	//$query="SELECT  *  FROM `tbl_news_and_act` WHERE cate_id = '$cateID'  AND language='$lang' ORDER  BY   date_act  DESC  LIMIT 0 , 5 ";
	$query="SELECT  *  FROM `tbl_news_and_act` WHERE cate_id = '$cateID' AND language !='3' ORDER  BY   date_act  DESC  LIMIT 0 , 5 ";
	$result =mysql_query($query);
		$n_width=320;$n_height=220;
$thb2path="../uploadfile/";
 $nx=1;  while($data=mysql_fetch_assoc($result)){
	  			$query="SELECT * FROM tbl_news_and_act_file WHERE news_id ='".$data['id']."' AND file_type='1' ORDER BY picSort ASC LIMIT 0,1 ";
				$resultPic=mysql_query($query);
				$pic=mysql_fetch_assoc($resultPic);
				if($nx==1){
							if($pic['file_name']==''){
										$pic['file_name']="../tra-no-image.jpg";
								}else{
										//$pic['file_name']="../uploadfile/".$pic['file_name'];
											list($width, $height, $type, $attr) = getimagesize("../uploadfile/".$pic['file_name']);
										create_thub2($thb2path ,$pic['file_name'],$n_width,$n_height);
										$pic['file_name']=$thb2path."tmp/".$pic['file_name'];
								}					
					}else {
							if($pic['file_name']==''){
										$pic['file_name']="../tra-no-image.jpg";
								}else{
										//$pic['file_name']="../uploadfile/thb/".$pic['file_name'];
											list($width, $height, $type, $attr) = getimagesize("../uploadfile/".$pic['file_name']);
										create_thub2($thb2path ,$pic['file_name'],$n_width,$n_height);
										$pic['file_name']=$thb2path."tmp/".$pic['file_name'];
								}
					}
					$PicTitle[$nx]=$pic['file_name'];
					$title[$nx] =$data['topic_th'];
					$dateTitle[$nx] =$data['date_act'];
					//echo $data['detail_th']."<br>";
					$data['detail_th']= strip_tags($data['detail_th'],'<*>');
					$detailx[$nx]=iconv_substr($data['detail_th'] ,0 ,300, "UTF-8")."..";
					
					$ID[$nx]=$data['id'];
					$nx++;
					
	  
 }

?>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script><link href="style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="FontMS10">
  <tr>
    <td width="46" height="40">&nbsp;</td>
    <td width="779">&nbsp;</td>
    <td width="150" align="right"><span class="txt8"><img src="../images/icon/30x30/002.png" width="30" height="30" alt="icon" style="vertical-align: text-bottom" /></span><a href="?detail=ac-special&cateID=<?php echo $cateID?>">&#3585;&#3636;&#3592;&#3585;&#3619;&#3619;&#3617;พิเศษ&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</a>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="3" align="left"><table width="100%" border="0" cellspacing="2" cellpadding="10">
      <tr>
        <td width="403" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td><!--Inner content DIVs should always carry "contentdiv" CSS class-->
              <!--Pagination DIV should always carry "paginate-SLIDERID" CSS class-->
              <div id="slider2" class="sliderwrapper">
                <?php mysql_data_seek($result,0); $n=1; while($data=mysql_fetch_assoc($result)){?>
                <div class="contentdiv">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr>
                      <td align="center"><img src="<?php echo $PicTitle[$n]?>" alt="" class="radius5" style="vertical-align:middle; border:none;" /></td>
                    </tr>
                    <tr>
                      <td height="37" align="left" class="h-catalog"><a href="#" onclick="windowOpener(700, 1000, 'windowName', 'detail-activity.php?ActID=<?php echo $ID[$n]?>')"> <?php echo $title[$n]?> </a></td>
                    </tr>
                    <tr>
                      <td align="left" class="txt8"><img src="../images/icon/24X24/126.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" />&nbsp;
                        <?php GetThaiDate($dateTitle[$n])?></td>
                    </tr>
                    <tr>
                      <td><?php echo $detailx[$n]?></td>
                    </tr>
                  </table>
                </div>
                <?php $n++; }?>
              </div>
              <div id="paginate-slider2" class="pagination"></div>
              <script type="text/javascript">

featuredcontentslider.init({
	id: "slider2",  //id of main slider DIV
	contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
	toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
	nextprev: ["Previous", "Next"],  //labels for "prev" and "next" links. Set to "" to hide.
	revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
	enablefade: [true, 0.2],  //[true/false, fadedegree]
	autorotate: [true, 3000],  //[true/false, pausetime]
	onChange: function(previndex, curindex, contentdivs){  //event handler fired whenever script changes slide
		//previndex holds index of last slide viewed b4 current (0=1st slide, 1=2nd etc)
		//curindex holds index of currently shown slide (0=1st slide, 1=2nd etc)
	}
})

          </script>
              </td>
          </tr>
        </table>
          <!--<img src="<?php echo $PicTitle[1]?>" style="vertical-align:middle; border:none;" />  --></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <?php for($i=2;$i<$nx;$i++){ ?>
          <tr>
            <td width="126" align="center" bgcolor="#F3F3F3"><img src="<?php echo $PicTitle[$i]?>" width="125" height="90" style="vertical-align:middle; border:none;" class="radius5" /></td>
            <td align="left" bgcolor="#F3F3F3">
			<a href="#" onclick="windowOpener(700, 1000, 'windowName', 'detail-activity.php?ActID=<?php echo $ID[$i]?>')">
			<?php echo $title[$i]?></a><br />
            <span class="txt8"><img src="../images/icon/24X24/126.png" width="24" height="24" alt="icon" style="vertical-align: text-bottom" />
            <?php GetThaiDate($dateTitle[$i])?>
            </span>
            </td>
          </tr><tr>
            <td height="1" colspan="2" bgcolor="#FFFFFF"></td>
            </tr>
          <?php  }?>
          
          </table></td>
      </tr>
    </table></td>
  </tr>
 
</table>
