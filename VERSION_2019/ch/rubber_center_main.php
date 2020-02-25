<?php
	$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
		$Range543=543;
		if($_POST['smonth']==""){
				$_POST['smonth']	=date("m");
		}
		if($_POST['syear']==""){
				$_POST['syear']=date("Y");
		}		
		$startYear=2000;
		$currentYear=date("Y");
		$CountYear=$currentYear-$startYear;
		$Range543=543;	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>ราคาประมูลยางพารา</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>

<body onLoad="MM_preloadImages('images/inside/nr_29_over.jpg','images/inside/nr_30_over.jpg')">
<center>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7EFF9">
    <tr>
      <td align="left" valign="top"><img src="images/inside/cor-L.gif" alt="corner" width="16" height="20" /></td>
      <td  align="right" valign="top"><img src="images/inside/cor-R.gif" alt="corner" width="16" height="20" /></td>
    </tr>
    <tr>
      <td width="261" align="center" valign="top"><?php include("menu_price.php"); ?></td>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09_left.gif" alt="message" width="26" height="56"></td>
          <td align="left" background="images/inside/h-message_bg.gif"><img src="../images/h-title/h-pr-centralmarketprice.jpg" alt="history" width="370" height="100"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF"><img src="../images/h-title/h-message_09.gif" alt="message" width="26" height="56"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center" height="300" class="MS10-board">Coming Soon.</td>
  </tr>
</table>

        <!--<table width="100%" border="0" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
          <tbody>
            <tr>
              <td width="150" valign="top"><form action="" name="formX">
                <table width="100%" border="0" class="FontMS10 radius_news">
                  <tbody>
                    <tr>
                      <td height="31" colspan="2" align="center" bgcolor="#6A8A09"><strong class="txt-white">ราคายางประจำเดือน</strong></td>
                    </tr>
                    <tr>
                      <td width="23%" align="right"><span class="txt10-black"> เดือน

                      </span></td>
                      <td width="77%" align="left">
                      <select name="smonth">
                          <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
                          <option value="<?php echo $key;?>" <?php if($_POST['smonth']==$key) echo "selected";?>><?php echo $val?></option>
                          <?php } ?>
                        </select></td>
                    </tr>
                    <tr>
                      <td align="right"><span class="txt10-black">ปี
                        
                      </span></td>
                      <td align="left"><span class="txt10-black">
                        <select name="syear">
                          <?php for($i=0;$i  <= $CountYear ;$i++){ 
				  				
				  ?>
                          <option value="<?php echo $currentYear-$i;?>" <?php if($_POST['syear']==($currentYear-$i))  echo "selected";?>><?php echo  ($currentYear-$i)+$Range543;?></option>
                          <?php }?>
                        </select>
                      </span></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><input type="button" name="button" id="button" value="GO" ></td>
                    </tr>
                    <tr>
                      <td height="7" colspan="2" align="center"></td>
                    </tr>
                    <tr>
                      <td height="24" colspan="2" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">ราคายางประจำปี</strong></td>
                    </tr>
                    <tr>
                      <td align="right"><span class="txt10-black">
                        ปี
                          
                      </span></td>
                      <td align="left"><span class="txt10-black">
                        <select name="syear2">
                          <?php for($i=0;$i  <= $CountYear ;$i++){ 
				  				
				  ?>
                          <option value="<?php echo $currentYear-$i;?>" <?php if($_POST['syear']==($currentYear-$i))  echo "selected";?>><?php echo  ($currentYear-$i)+$Range543;?></option>
                          <?php }?>
                        </select>
                      </span></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><input type="button" name="button2" id="button2" value="GO"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
              </form></td>
              <td height="450" valign="top"><div id="result" >&nbsp;</div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>-->
        
      </td>
    </tr>
  </table>
</center><script src="jquery.js"></script> 
<script src="Highchart/highcharts.js"></script>
<script>
	  $(document).ready(function(){
       
        $('#button').click(function(){   
				              
				var selectMonth = document.formX.smonth.value;
				var selectYear = document.formX.syear.value;
                $.ajax({
                  type: 'POST',
                  url: "rubber_center_price_month.php",
                  data: { selectMonth : selectMonth , selectYear : selectYear  },
                  success: function(data){
                     $('#result').html( data );                   
                  }
                 
                });               
        })
          $('#button2').click(function(){   
               	var selectMonth = document.formX.smonth.value;
				var selectYear = document.formX.syear2.value;
                $.ajax({
                  type: 'POST',
                  url: "rubber_center_price_year.php",
                   data: { selectMonth : selectMonth , selectYear : selectYear  },
                  success: function(data){
                     $('#result').html( data );                   
                  }
                 
                });               
        })    
 
    });
	
	//$_POST['smonth']$_POST['syear']
		
			
             function showGraph( selectMonth , selectYear ){   
                 $.ajax({
                  type: 'POST',
                  url: "rubber_center_price_month.php",
                   data: { selectMonth : selectMonth , selectYear : selectYear  },
                  success: function(data){
                     $('#result').html( data );                   
                  }
                 
                });  
				
               }    
             showGraph( '<?php echo $_POST['smonth']?>' ,  '<?php echo $_POST['syear']?>' ); 
	
</script>