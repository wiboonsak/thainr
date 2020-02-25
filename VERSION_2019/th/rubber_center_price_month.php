<?php
		require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			//-----------------------------Date------------------------------------
			$monthnames2 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
			$monthnames3 = Array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");	
		  ///-------------select data-------------------
	  $query="SELECT * ,  DATE_FORMAT( date_data, '%e' ) AS DateNum , DATE_FORMAT( date_data, '%m' ) AS MonthNum   FROM tbl_central_market_price   WHERE   MONTH(date_data) =  '".$_POST['selectMonth']."'  AND YEAR(date_data) = '".$_POST['selectYear']."' ORDER BY  date_data ASC ";
	  $result=mysql_query($query);
	
	$currentDate=date("Y-m-d");
	$lastDay = date('t',strtotime('today'));
	$lastDayFull = $_POST['selectYear']."-".$_POST['selectMonth']."-".$lastDay;
	$dateDiff = DateDiff($lastDayFull, $currentDate);  
	//echo "currentDate->".$currentDate."-lastDayFull-> ".$lastDayFull."<br>";
	//echo "dateDiff->".$dateDiff;
     
	 if($dateDiff >=0){
		 	//$query="SELECT ROUND(AVG(rubber_sheet) , 2 ) AS avg_sheet , ROUND( AVG(rubber_smoke_sheet) , 2) AS avg_smoke_sheet ,  ROUND(AVG(latex) , 2 ) AS avg_latex , ROUND(AVG(rubber_scrap) , 2) AS avg_scrap  FROM tbl_central_market_price  WHERE   MONTH(date_data) =  '".$_POST['selectMonth']."'  AND YEAR(date_data) = '".$_POST['selectYear']."'   ";
			//$resultevg=mysql_query($query);
			//$avg=mysql_fetch_assoc($resultevg);
			$query="SELECT  ROUND(AVG(rubber_sheet) , 2 ) AS avg_sheet FROM tbl_central_market_price  WHERE   MONTH(date_data) =  '".$_POST['selectMonth']."'  AND YEAR(date_data) = '".$_POST['selectYear']."'  AND  rubber_sheet <> '0.00' ";
            $resultevg=mysql_query($query);
			$avg=mysql_fetch_assoc($resultevg);
			$avg_sheet=$avg['avg_sheet'];
			
			$query="SELECT  ROUND( AVG(rubber_smoke_sheet) , 2) AS avg_smoke_sheet FROM tbl_central_market_price  WHERE   MONTH(date_data) =  '".$_POST['selectMonth']."'  AND YEAR(date_data) = '".$_POST['selectYear']."'  AND  rubber_smoke_sheet <> '0.00' ";
			$resultevg=mysql_query($query);
			$avg=mysql_fetch_assoc($resultevg);
			$avg_smoke_sheet=$avg['avg_smoke_sheet'];
			
			$query="SELECT  ROUND(AVG(latex) , 2 ) AS avg_latex  FROM tbl_central_market_price  WHERE   MONTH(date_data) =  '".$_POST['selectMonth']."'  AND YEAR(date_data) = '".$_POST['selectYear']."'  AND  latex <> '0.00' ";
			$resultevg=mysql_query($query);
			$avg=mysql_fetch_assoc($resultevg);
			$avg_latex=$avg['avg_latex'];			
		 
			$query="SELECT  ROUND(AVG(rubber_scrap) , 2) AS avg_scrap  FROM tbl_central_market_price  WHERE   MONTH(date_data) =  '".$_POST['selectMonth']."'  AND YEAR(date_data) = '".$_POST['selectYear']."'  AND  rubber_scrap <> '0.00' ";
			$resultevg=mysql_query($query);
			$avg=mysql_fetch_assoc($resultevg);
			$avg_scrap=$avg['avg_scrap'];				 
		 }
    		


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">

</head>

<body>
<?php //echo "smonth->".$_POST['selectMonth']."  syear->".$_POST['selectYear']?>

<!--<script src="jquery.js"></script>
<!--<script src="Highchart/highcharts.js"></script>
<!--<script src="Highchart/exporting.js"></script>-->

<style>
	.topicbox {
				border-radius: 3px 3px 3px 3px;
				-moz-border-radius: 3px 3px 3px 3px;
				-webkit-border-radius: 3px 3px 3px 3px;
				border: 3px solid #346dc2;
				background-color:#A0E1FA;
				color:#000;
				padding:5px ; 
		}
</style>
<div id="head" align="center">
<span class="news"><strong>ราคายาง ตลาดกลางยางพารา จังหวัดสงขลา</strong></span><br>
<span class="news "><strong>ประจำเดือน <?php echo $monthnames2[$_POST['selectMonth']]?>  <?php echo $_POST['selectYear']+543?></strong></span><br><br>
<div class="FontMS10" style=" width:95%; text-align:right;">บาท/กิโลกรัม</div>


        <table width="95%" border="0">
          <tbody>
            <tr>
              <td bgcolor="#BBBBBB"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="FontMS10">
                <tbody>
                  <tr class="txt-white-blue-radius">
                    <td width="15%" height="30" align="center" bgcolor="#6A8A09"><span class="txt-white">วันที่</span></td>
                    <td width="17%" align="center" bgcolor="#6A8A09"><span class="txt-white">ยางแผ่นดิบ</span></td>
                    <td width="17%" align="center" bgcolor="#6A8A09"><span class="txt-white">ยางแผ่นรมควันชั้น 3</span></td>
                    <td width="17%" align="center" bgcolor="#6A8A09"><span class="txt-white">น้ำยางสด ณ โรงงาน</span></td>
                    <td width="17%" align="center" bgcolor="#6A8A09"><span class="txt-white">เศษยาง (100%)</span></td>
                    <td width="17%" align="center" bgcolor="#6A8A09"><span class="txt-white">หมายเหตุ</span></td>
                  </tr>
                  <?php  $cateGoryGraph=""; 
				  				$rubberSheetData="";
								$rubberSmokeData="";
								$latexData="";
								$scrapData="";
				  				while($data=mysql_fetch_assoc($result)){ 
				  				$cateGoryGraph=$cateGoryGraph." '".$data['DateNum']."-".$monthnames3[$data['MonthNum']]."' ,";
								//$cateGoryGraph=$cateGoryGraph." '".$data['DateNum']."' ,";
								$rubberSheetData=$rubberSheetData.$data['rubber_sheet']." ,";
								$rubberSmokeData=$rubberSmokeData.$data['rubber_smoke_sheet']." ,";
								$latexData=$latexData.$data['latex']." ,";
								$scrapData=$scrapData.$data['rubber_scrap']." ,";
				  ?>
                  <tr class="search" bgcolor="#FFFFFF"  onmouseover="this.style.backgroundColor='#DCF9BD';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                    <td height="25" align="center"><span class="FontMS10"><?php echo GetThaiDate($data['date_data'])?></span></td>
                    <td align="center" ><span class="FontMS10">
                    <?php if($data['rubber_sheet']!="0.00"){ echo $data['rubber_sheet']; }else{ echo "-";}?>
                    </span></td>
                    <td align="center"><span class="FontMS10">
                    <?php if($data['rubber_smoke_sheet']!="0.00"){ echo $data['rubber_smoke_sheet']; }else{ echo "-";}?>
                    </span></td>
                    <td align="center"><span class="FontMS10">
                    <?php if($data['latex']!="0.00"){ echo $data['latex']; }else{ echo "-";}?>
                    </span></td>
                    <td align="center"><span class="FontMS10">
                    <?php if($data['rubber_scrap']!="0.00"){ echo $data['rubber_scrap']; }else{ echo "-";}?>
                    </span></td>
                    <td align="center"><span class="FontMS10">
                    <?php  echo $data['note'];  ?>
                    </span></td>
                  </tr>
                  <tr>
                    <td height="1" colspan="6" bgcolor="#CCCCCC"></td>
                  </tr>
                  <?php }?>
                  <?php  if($dateDiff >=0){ ?>
                  <tr  class="search">
                    <td height="29" align="center" bgcolor="#0E9DD2"  ><span class="txt-white"><strong>ค่าเฉลี่ย</strong></span></td>
                    <td align="center" bgcolor="#0E9DD2"><span class="txt-white"><?php echo $avg_sheet; ?></span></td>
                    <td align="center" bgcolor="#0E9DD2"><span class="txt-white"><?php echo $avg_smoke_sheet; ?></span></td>
                    <td align="center" bgcolor="#0E9DD2"><span class="txt-white"><?php echo $avg_latex;?></span></td>
                    <td align="center" bgcolor="#0E9DD2"><span class="txt-white"><?php echo $avg_scrap;?></span></td>
                    <td align="center" bgcolor="#0E9DD2">&nbsp;</td>
                  </tr>
              
                  <?php }  
				           $scrapData2=$scrapData;
				  			$cateGoryGraph=substr($cateGoryGraph, 0,-1); 
							$rubberSheetData=substr($rubberSheetData,0,-1); 
							$rubberSmokeData=substr($rubberSmokeData, 0,-1); 
							$latexData=substr($latexData, 0,-1); 
							$scrapData=substr($scrapData, 0,-1); 
							?>
                 
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table>
</div>
    <script >
$(function () {
    $('#container1').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'กราฟแสดงราคายาง ตลาดกลางยางพารา สงขลา ',
            x: -20 //center
        },
        subtitle: {
            text: '<?php echo $monthnames2[$_POST['selectMonth']]?>  <?php echo $_POST['selectYear']+543?>',
            x: -20
        },
        xAxis: {
            categories: [<?php echo $cateGoryGraph?>] ,
			 labels: {
                rotation: -45,
                style: {
                    fontSize: '9pt',
                    fontFamily: 'Microsoft Sans Serif'
                }
            }
        } , 
        yAxis: {
			 min: 0,
			 max :100 ,
			 tickInterval: 10 ,
            title: {
                text: ' บาท / กิโลกรัม '
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            // valueSuffix: ' บาท/กิโลกรัม'
			  pointFormat: ' : <b>{point.y:.2f}  บาท/กิโลกรัม</b>'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'ยางแผ่นดิบ',
            data: [<?php echo $rubberSheetData?>]
        }, {
            name: 'ยางแผ่นรมควันชั้น 3',
            data: [<?php echo $rubberSmokeData?>]
        }, {
            name: 'น้ำยางสด ณ โรงงาน',
            data: [<?php echo $latexData?>]
        }, {
            name: 'เศษยาง (100%)',
            data: [<?php echo $scrapData?>]
        }]
    });
});
	
		</script>
 <div id="container1" style="min-width: 350px; height: 450px; margin: 0 auto; padding-top:30px;  "></div>

<?php //echo $cateGoryGraph;
//print_r($cateGoryGraph);
	 //foreach($cateGoryGraph as $key => $value) {
   	//		 echo "Key: $key; Value: $value<br>";
	//	}

?>


</body>
</html>