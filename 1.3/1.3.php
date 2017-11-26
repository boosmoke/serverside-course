<?php
function creatImage(){
$r =  rand(0,255);
$g =  rand(0,255);
$b =  rand(0,255);

header("Content-Type: image/png");
$im = @imagecreate(250, 50)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, $r, $g, $b);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 3, 25, 15,  "Webbutveckling - Serversidan", $text_color);
imagepng($im);
imagedestroy($im);
return $im;
}
creatImage();
?>