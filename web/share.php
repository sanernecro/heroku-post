<?php
function print_img(){
  $sImage = array('resimler/1.jpg');
  shuffle($sImage);
  $rFP = fopen($sImage[0], 'rb');
  header("Content-Type: image/jpeg");
  header("Content-Length: " .(string)(filesize($sImage[0])) );
  fpassthru($rFP);
}
print_img();
exit;


    $host = $_SERVER["HTTP_HOST"];
    $xsrf = md5($id);
?>
