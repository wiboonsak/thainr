<?php
		require_once("../control/config.inc.php");
	include("../control/function.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//---------------------------------------------------------------------------------------------------------------------------------------------------
			//-----------------------------Date------------------------------------
			$monthnames2 =  Array("1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
			
			$monthnames3 = Array("01"=>"Jan","02"=>"'Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");	
			//----------------------
	$currentDate=date("Y-m-d");
	$lastDay = date('t',strtotime('today'));
	$currMonth=date("m");
	$currYear=date("Y");
	$lastDayFull = $_POST['selectYear']."-".$currMonth."-".$lastDay;
	$dateDiff = DateDiff($lastDayFull, $currentDate);  
		if($dateDiff < 0){
				  $Dayscope="AND  date_data < '".$currYear."-".$currMonth."-01' ";
		}
	//echo $currentDate;
	//echo "<br>";	
	//echo $lastDayFull;
	//echo "<br>";
	//echo $dateDiff;
	//----------	
	//-----------------------RUBBER SHEET--------------------------------------------	AND  rubber_sheet <> '0.00'		
	 $query="SELECT  date_data,  MONTH(date_data) AS MonthNum ,   ROUND(AVG(rubber_sheet) , 2 ) AS avg_sheet FROM tbl_central_market_price  WHERE   YEAR(date_data) = '".$_POST['selectYear']."'   $Dayscope  AND  rubber_sheet <> '0.00'   GROUP BY MONTH(date_data) ";

		    $resultevg=mysql_query($query);
				$sheeArray=array();
				$count=0;
				$sumSheet=0;
				$rubberSheetData='';
				while($avg=mysql_fetch_assoc($resultevg)){
						$sheeArray[$avg['MonthNum']]=$avg['avg_sheet'];
						$sumSheet=$sumSheet+$avg['avg_sheet'];
						$rubberSheetData=$rubberSheetData.$avg['avg_sheet']." ,";
						$count++;
				}
			$rubberSheetData=substr($rubberSheetData,0,-1); 
			
			if($sumSheet > 0){ 
				$avg_sheet=round(($sumSheet/$count),2);
			}
			//-----------------------SMOKE SHEET--------------------------------------------AND  rubber_smoke_sheet <> '0.00'	
			$query="SELECT  date_data,  MONTH(date_data) AS MonthNum ,  ROUND( AVG(rubber_smoke_sheet) , 2) AS avg_smoke_sheet FROM tbl_central_market_price  WHERE    YEAR(date_data) = '".$_POST['selectYear']."'   $Dayscope     AND  rubber_smoke_sheet <> '0.00'  GROUP BY MONTH(date_data) ";
			
			$count=0;
			$sumSmokeSheet=0;
			$rubberSmokeData="";
			$resultevg=mysql_query($query);
			while($avg=mysql_fetch_assoc($resultevg)){ 
						$smokeSheet[$avg['MonthNum']]=$avg['avg_smoke_sheet'];
						$sumSmokeSheet=$sumSmokeSheet+$avg['avg_smoke_sheet'];
						$rubberSmokeData=$rubberSmokeData.$avg['avg_smoke_sheet']." ,";
						$count++;
			}
			$rubberSmokeData=substr($rubberSmokeData,0,-1); 
			if($sumSmokeSheet > 0){ 
				$avg_smoke_sheet=round(($sumSmokeSheet/$count),2);
			}
			//-----------------------LATEX DATA--------------------------------------------AND  latex <> '0.00'			
			$query="SELECT date_data,  MONTH(date_data) AS MonthNum ,   ROUND(AVG(latex) , 2 ) AS avg_latex  FROM tbl_central_market_price  WHERE     YEAR(date_data) = '".$_POST['selectYear']."'  $Dayscope AND  latex <> '0.00'    GROUP BY MONTH(date_data)  ";
			
			$count=0;
			$sumlatex=0;
			$latexData="";
			$resultevg=mysql_query($query);
			while($avg=mysql_fetch_assoc($resultevg)){ 
						$latex[$avg['MonthNum']]=$avg['avg_latex'];
						$sumlatex=$sumlatex+$avg['avg_latex'];
						$latexData=$latexData.$avg['avg_latex']." ,";
						$count++;
			}
			$latexData=substr($latexData,0,-1); 
			if($sumlatex > 0){ 
					$avg_latex=round(($sumlatex/$count),2);
			}
			//-----------------------SCRAP DATA--------------------------------------------	AND  rubber_scrap <> '0.00'
			$query="SELECT date_data,  MONTH(date_data) AS MonthNum ,   ROUND(AVG(rubber_scrap) , 2) AS avg_scrap  FROM tbl_central_market_price  WHERE     YEAR(date_data) = '".$_POST['selectYear']."'  $Dayscope  AND  rubber_scrap <> '0.00'   GROUP BY MONTH(date_data) ";
			$resultevg=mysql_query($query);
			$count=0;
			$sumscrap=0;
			$scrapData="";
			while($avg=mysql_fetch_assoc($resultevg)){ 
						$scrap[$avg['MonthNum']]=$avg['avg_scrap'];
						$sumscrap=$sumscrap+$avg['avg_scrap'];
						$scrapData=$scrapData.$avg['avg_scrap']." ,";
						$count++;
				
			}
			$scrapData==substr($scrapData,0,-1); 			
			if($sumscrap > 0){ 
				$avg_scrap=round(($sumscrap/$count),2);
			}
			
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<!--<script src="jquery.js"></script>
<script src="Highchart/highcharts.js"></script>
<!--<script src="Highchart/exporting.js"></script>-->
    <script >
	//	$monthnames3 = Array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");	.
	//- categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',  'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	
$(function () {
    $('#container3').highcharts({
		chart: {
            type: 'column'
        },
        title: {
            text: 'Central Rubber Market Price, Songkhla  <?php echo $_POST['selectYear']?>',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',  'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
			 min: 10,
			 max :100 ,
			 tickInterval: 10 ,
            title: {
                text: ' Baht / Kilogram '
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' : <b> Baht / Kilogram</b> '
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'USS3',
            data: [<?php echo $rubberSheetData?>]
        }, {
            name: 'RSS3',
            data: [<?php echo $rubberSmokeData?>]
        }, {
            name: 'Field Latex',
            data: [<?php echo $latexData?>]
        }, {
            name: 'Cup Lump (100%)',
            data: [<?php echo $scrapData?>]
        }]
    });
});
	
		</script>
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
<span class="news"><strong>Central Rubber Market Price, Songkhla Province.</strong></span><br>
<span class="news "><strong>year <?php echo $_POST['selectYear']?></strong></span><br><br>
<div class="FontMS10" style=" width:95%; text-align:right;">Baht/Kg.</div>

        <table width="95%" border="0">
          <tbody>
            <tr>
              <td bgcolor="#BBBBBB"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                <tbody>
                  <tr class="txt-white-blue-radius">
                    <td width="15%" height="30" align="center" bgcolor="#6A8A09" class="txt-white">month / Year</td>
                    <td width="17%" align="center" bgcolor="#6A8A09" class="txt-white">USS3</td>
                    <td width="17%" align="center" bgcolor="#6A8A09" class="txt-white">RSS3</td>
                    <td width="17%" align="center" bgcolor="#6A8A09" class="txt-white">Field Latex</td>
                    <td width="17%" align="center" bgcolor="#6A8A09" class="txt-white">Cup Lump(100%)</td>
                  </tr>
                  <?php  
				  			while (list($key, $val) = each($monthnames2)) { 
				  ?>
                  <tr class="search" bgcolor="#FFFFFF"  onmouseover="this.style.backgroundColor='#DCF9BD';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                    <td height="25" align="left" style="padding-left:20px;" class="FontMS10"><!--[<?php //echo $key?>]--> <?php echo $val?> <?php echo $_POST['selectYear']?>&nbsp;</td>
                    <td align="center" class="FontMS10"><?php echo $sheeArray[$key]?></td>
                    <td align="center" class="FontMS10"><?php echo $smokeSheet[$key]?></td>
                    <td align="center" class="FontMS10"><?php echo $latex[$key]?></td>
                    <td align="center" class="FontMS10"><?php echo $scrap[$key]?></td>
                  </tr>
                  <tr>
                    <td height="1" colspan="5" bgcolor="#CCCCCC"></td>
                  </tr>
                  <?php }?>
                  <?php ?>
                  <tr  class="search">
                    <td align="center" bgcolor="#0E9DD2" class="txt-white" >AVERAGE</td>
                    <td align="center"  bgcolor="#0E9DD2" class="txt-white"><?php echo $avg_sheet; ?></td>
                    <td align="center"  bgcolor="#0E9DD2" class="txt-white"><?php echo $avg_smoke_sheet; ?></td>
                    <td align="center"  bgcolor="#0E9DD2" class="txt-white"><?php echo $avg_latex;?></td>
                    <td align="center" bgcolor="#0E9DD2" class="txt-white"><?php echo $avg_scrap;?></td>
                  </tr>
              
                  
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table>
</div>
 <div id="container3" style="min-width: 350px; height: 420px; margin: 0 auto; padding-top:30px;  "></div>
</body>
</html>