<?php 
session_start(); 
$text = rand(100000,999999); 
$_SESSION["vercode"] = $text; 
$height = 18; 
$width = 80; 
 $image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 255, 255,255); 
$white = imagecolorallocate($image_p, 0, 0, 0); 
$font_size = 9; 
 imagestring($image_p, $font_size, 5, 5, $text, $white); 
imagejpeg($image_p, null, 100); 
?>