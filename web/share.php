<?php
header("Content-Type: image/jpeg");
echo file_get_contents("http://futunga.com/".$_GET["pic"].".jpg");
?>
