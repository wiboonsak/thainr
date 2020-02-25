
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
				  
				$queryNews = "SELECT *  FROM `tbl_member_data`  WHERE language='3'   ORDER BY name ASC  ";
					$queryLimit = $queryNews." LIMIT $startRow , $rowPerPage ";
					$resultNews =mysql_query($queryLimit );						
					//echo $query;
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<style type="text/css">
<!--
body {
	background-color: #D7EFF9;
}
-->
</style>
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
<title>��Ҫԡ��Ҥ��ҧ������ TRA Membership</title>
<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="../th/images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td width="877" align="right" valign="top"><img src="../th/images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_history.php"); ?></td>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56" /></td>
          <td align="left" background="../images/h-title/h-message_bg.gif"><img src="../images/h-title/h-MemberCorporation.jpg" alt="history" width="370" height="100" /></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="47" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="449" align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10" ><table border="0" cellpadding="0" cellspacing="0">
              <col width="72">
              <col width="481">
                <?php $a=1; 
                while($data=mysql_fetch_assoc($resultNews)){ ?>
              <tr>
                <td width="34" height="22" align="right" class="LR10"><?php echo $a?></td>
                <td width="377" height="22" align="left"><a href="http://thainr.com/Demo_ch/detail_member/member_data.php?&IDS=<?php echo $data['id']?>"  target="_blank"><?php echo $data['name']?>&nbsp;</a></td>
              </tr>
                  <?php $a++;} ?>
<!--              <tr>
                <td height="22" align="right" class="LR10">2</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/b-rightrubber.php" target="_blank">B.RIGHT RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td height="22" align="right" class="LR10">3</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/BOTHONGRUBBER.php" target="_blank">BOTHONG RUBBER FUND COOPERATIVE LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">4</td>
                <td height="22" align="left" style="text-transform: uppercase"><a href="http://thainr.com/en/detail_member/TONGTEIK.php" target="_blank">Centrotrade Hatyai Co., Ltd.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">5</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/CHAROEN-POKPHAND.php" target="_blank">CHAROEN POKPHAND AGRICULTURE</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">6</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/cp.php" target="_blank">C.P.    INTERTRADE CO.,LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">7</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/chalong-auttasahakam-yang.php" target="_blank">CHALONG LATEX INDUSTRY CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">8</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/Chunjaroenrubber.php" target="_blank">CHUNJAROENRUBBER CO., LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">9</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/GrandRubber.php" target="_blank">GRAND RUBBER CO., LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">10</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/GTrubber.php" target="_blank" style="text-transform: uppercase">G T Rubber Co., Ltd</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">11</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/kwang-sen.php" target="_blank">GUANGKEN RUBBER (SATUN) CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">12</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/interrubberlatac.php" target="_blank">INTER RUBBER LATEX CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">13</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/lt-rubber.php" target="_blank">L T RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">14</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/maltechrubber.php" target="_blank">MAL TECH RUBBER CO.,LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">15</td>
                <td height="22" align="left" style="text-transform: uppercase"><a href="http://thainr.com/en/detail_member/MahakitRubber.php" target="_blank">Mahakit Rubber Co., Ltd.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">16</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/metthai.php" target="_blank">MITRATHAI    HOLDING CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">17</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/mengtai.php" target="_blank">MT CENTERTRADE CO., LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">18</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/niyomrubber.php" target="_blank">NIYOM RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">19</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/NteqPolymer.php" target="_blank">NTEQ POLYMER CO,.LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">20</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/northeast-rubber.php" target="_blank">NORTH EAST RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">21</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/pc-rubber.php" target="_blank">P.C. RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">22</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/panstar.php" target="_blank">PAN    STAR CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">23</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/pianpradit.php" target="_blank">PIANPRADIT RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">24</td>
                <td height="22" align="left" style="text-transform: uppercase"><a href="http://thainr.com/en/detail_member/PhatthalungAgroTechnology.php" target="_blank">Phatthalung Agro Technology (Thailand) Co., Ltd.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">25</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/r1internationnal.php" target="_blank">R1 INTERNATIONAL (THAILAND) LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">26</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/ranna.php" target="_blank">RANAD    (THAILAND) CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">27</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/RubberAuthorityofThailand.php" target="_blank">RUBBER AUTHORITY OF THAILAND</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">28</td>
                <td height="22" align="left" style="text-transform: uppercase"><a href="http://thainr.com/en/detail_member/RubberPlanet.php" target="_blank">Rubber Planet Co., Ltd.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">29</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/sadoal-ps-rubber.php" target="_blank">SADAO P.S. RUBBER CO.,LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">30</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/sangtvonrubber.php" target="_blank">SANGTVON RUBBER LTD PART</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">31</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/south-eastrubber.php" target="_blank">SOUTH-EAST RUBBER CO., LTD.</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">32</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/soutlanrunber.php" target="_blank">SOUTHLAND RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">33</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/sritanggorindastre.php" target="_blank">SRI TRANG AGRO-INDUSTRY PUBLIC CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">34</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/sricharan.php" target="_blank">SRIJAROEN RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">35</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/SUPARK.php" target="_blank">SUPARK    CO., LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">36</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/tawon-yangpara-1982.php" target="_blank">TAVORN RUBBER INDUSTRY (1982) CO.,LTD.&nbsp;</a></td>
              </tr>
              
              <tr>
                <td align="right" class="LR10">37</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/yangthai-paktai.php" target="_blank">TECK BEE HANG CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">38</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/terrago.php" target="_blank">TERAGRO    CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">39</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/yangthai-asia.php" target="_blank">THAI ASIA RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">40</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thaiastern-rubber.php" target="_blank">THAI EASTERN RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">41</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thaihua-yangpara.php" target="_blank">THAI HUA RUBBER PUBLIC CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">42</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thaimac-str.php" target="_blank">THAI MAC STR CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">43</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/ThaiRubberJointVenture.php" target="_blank" style="text-transform: uppercase">Thai Rubber Joint Venture</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">44</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thairubberlataxcoporation.php" target="_blank">THAI RUBBER LATEX CORPORATION (THAILAND)    PUBLIC CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">45</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thaisangrubber.php" target="_blank">THAI SENG RUBBER CO.,LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">46</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thaitaxrubbercoporation.php" target="_blank">THAITECH RUBBER CORPORATION LTD.&nbsp;</a></td>
              </tr>
              <tr>
                <td align="right" class="LR10">47</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/THAIYAREE-RUBBER.php"  target="_blank">THAIYAREE RUBBER CO,.LTD.</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">48</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/FederationCooperativeTrang.php" target="_blank">THE FEDERATION COOPERATIVE OF TRANG LIMITED</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">49</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thongthai-as.php" target="_blank">THONG THAI A.S. CO.,LTD.</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">50</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/tungsangsesavas.php" target="_blank">THUNGSONG SISAWAD CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">51</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/ti-rubber.php" target="_blank">TI RUBBER CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">52</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/TK-Charoenrungrueng.php" target="_blank">TK. CHAROENRUNGRUENG</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">53</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/togthai-nb.php" target="_blank">TONG THAI N.B. CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">54</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/togthai-rubber.php" target="_blank">TONG THAI RUBBER CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">55</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/thanglatag.php" target="_blank">TRANG LATEX CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">56</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/unimac.php" target="_blank">UNIMAC RUBBER CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">57</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/vongbundit_chumphon.php" target="_blank">VON BUNDIT CHUMPHON CO., LTD.</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">58</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/vongbundit.php" target="_blank">VON BUNDIT CO.,LTD.&nbsp;</a></td>
                </tr>
              <tr>
                <td align="right" class="LR10">59</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/XIN-YUAN-DA-RUBBER.php" target="_blank">XIN YUAN DA RUBBER (THAILAND) CO., LTD</a></td>
                </tr>
              <tr>
                <td height="22" align="right" class="LR10">60</td>
                <td height="22" align="left"><a href="http://thainr.com/en/detail_member/yonglong-rubber.php" target="_blank">YONGLONG RUBBER CO.,LTD.&nbsp;</a></td>
                </tr>-->
            </table></td>
            <td width="336" align="right" valign="top" bgcolor="#FFFFFF" ><?php $query = "SELECT * FROM   `tbl_rubber_assosinate_pdf`   WHERE  lang= '".$lang."'  ";		
			
				$data=mysql_fetch_assoc(mysql_query($query));
				$detail_th = $data['detail'];
				$_POST['topic_id']=$data['id']; ?>
            <a href="../uploadfile/<?php echo $data['file_name']?>" target="_blank"> <img src="../th/images/banner_pdf.png" width="320" height="141" border="0" align="absmiddle" style="opacity:1;filter:alpha(opacity=100)" onMouseOver="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100" 
/></a></td>
            <td width="25" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td width="449" align="left" valign="top" bgcolor="#FFFFFF" class="FontMS10" >&nbsp;</td>
            <td align="left" bgcolor="#FFFFFF" class="FontMS10">&nbsp;</td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <br />
        <p align="center"><a href="#"></a></p></td>
    </tr>
  </table>
</center>
</body>