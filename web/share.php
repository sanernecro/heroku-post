<?php
function print_img(){
  $sImage = 'resim.jpg';
  $rFP = fopen($sImage, 'rb');
  header("Content-Type: image/jpeg");
  header("Content-Length: " .(string)(filesize($sImage)) );
  fpassthru($rFP);
}
print_img();
?>
