<?php
function print_img(){
  $sImage = array('pori.jpg');
  shuffle($sImage);
  $rFP = fopen($sImage[0], 'rb');
  header("Content-Type: image/gif");
  header("Content-Length: " .(string)(filesize($sImage[0])) );
  fpassthru($rFP);
}
print_img();
exit;


    $host = $_SERVER["HTTP_HOST"];
    $xsrf = md5($id);
?>
