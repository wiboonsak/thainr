<?php 
   header("Content-Type: application/octet-stream");
   header("Content-Disposition: attachment; filename=".$_GET['filename']);
   readfile("../uploadfile/".$_GET['filename']);
?>