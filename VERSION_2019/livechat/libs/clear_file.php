<?php
		$date = date("Y-m-d");
		$filename = $date.".html";
		if (!file_exists("../data/".$filename)) {
			$filename = fopen("../data/".$filename,'a');
		}
	$webSite['pathMsg'] = '../data/'.$filename; // ที่อยู่ของ messages
?>