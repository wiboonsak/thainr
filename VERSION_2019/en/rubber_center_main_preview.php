<?php
		$monthnames2 =  Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
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
      <td height="50"  align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td align="left" bgcolor="#FFFFFF"><img src="../images/h-title/h-pr-centralmarketprice.jpg" alt="history" width="370" height="80"></td>
          <td width="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
          <tbody>
            <tr>
              <td width="150" valign="top"><form action="" name="formX">
                <table width="100%" border="0" class="FontMS10 radius_news">
                  <tbody>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#6A8A09"><strong class="txt-white">Daily Price</strong></td>
                      </tr>
                    <tr>
                      <td align="right"><span class="txt10-black"> month
                        
                        </span></td>
                      <td align="left"><span class="txt10-black">
                        <select name="smonth">
                          <?php 	while (list($key, $val) = each($monthnames2)) {  ?>
                          <option value="<?php echo $key;?>" <?php if($_POST['smonth']==$key) echo "selected";?>><?php echo $val?></option>
                          <?php } ?>
                          </select>
                        </span></td>
                      </tr>
                    <tr>
                      <td align="right"><span class="txt10-black">year
                        
                        </span></td>
                      <td align="left"><span class="txt10-black">
                        <select name="syear">
                          <?php for($i=0;$i  <= $CountYear ;$i++){ 
				  				
				  ?>
                          <option value="<?php echo $currentYear-$i;?>" <?php if($_POST['syear']==($currentYear-$i))  echo "selected";?>><?php echo  ($currentYear-$i);?></option>
                          <?php }?>
                          </select>
                        </span></td>
                      </tr>
                    <tr>
                      <td colspan="2" align="center"><input type="button" name="button" id="button" value="GO" ></td>
                      </tr>
                    <tr class="FontMS10 radius_news">
                      <td height="7" colspan="2" align="center"></td>
                      </tr>
                    <tr class="FontMS10 radius_news">
                      <td height="24" colspan="2" align="center" bgcolor="#0E9DD2"><strong  class="txt-white">Monthly Price</strong></td>
                      </tr>
                    <tr>
                      <td height="30" align="right"><span class="txt10-black">
                        year
                        
                        </span></td>
                      <td align="left"><span class="txt10-black">
                        <select name="syear2">
                          <?php for($i=0;$i  <= $CountYear ;$i++){ 
				  				
				  ?>
                          <option value="<?php echo $currentYear-$i;?>" <?php if($_POST['syear']==($currentYear-$i))  echo "selected";?>><?php echo  ($currentYear-$i);?></option>
                          <?php }?>
                          </select>
                        </span></td>
                      </tr>
                    <tr>
                      <td colspan="2" align="center"><input type="button" name="button2" id="button2" value="GO"></td>
                      </tr>
                    <tr>
                      <td colspan="2" align="right">&nbsp;</td>
                      </tr>
                    </tbody>
                  </table>
              </form></td>
              <td height="450" valign="top"><div id="result">&nbsp;</div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
        
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