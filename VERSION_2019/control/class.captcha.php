<?php
#------------------------------------------------------------------------------------------------------------------------------------------
#	Programmer  : Sirichai Teerapattarasakul
#	NickName : TaTump
#	Email : tump_si@yahoo.com
#	Msn : tump_si@hotmail.com
#	Website : http://www.memo8.com
#------------------------------------------------------------------------------------------------------------------------------------------

class Captcha{
	var $size;
	var $session;


	function randStr(){
		$chars = 'abcdefghijkmnpqrstuvwxyz123456789';
		for ($i = 0; $i < $this->size; $i++){
			$pos = rand(0, strlen($chars)-1);
			$string .= $chars{$pos};
		}
		$_SESSION[$this->session] = $string;
		return $string;
	}

	function display(){
		 $width = 26*$this->size; 
		 $height = 50; 
		 $string = $this->randStr(); 
		 $im = ImageCreate($width, $height); 
		 $imBG = imagecreatefromjpeg("images/captcha.jpg");
		 $bg = imagecolorallocate($im, 255, 255, 255); 
		 $black = imagecolorallocate($im, 0, 0, 0); 
		 $grey = imagecolorallocate($im, 170, 170, 170); 
		 imagerectangle($im,0, 0, $width-1, $height-1, $grey); 
		 $font = imageloadfont("font/anonymous.gdf");
		 imagestring($im, $font , $this->size, 5, $string, $black);
		 imagecopymerge($im, $imBG, 0, 0, 0, 0, 256, 256, 55);
		 imagepng($im); 
		 imagedestroy($im); 
	}
}
?>