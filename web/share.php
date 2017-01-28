<?php
  	header("Content-type:image/jpg");
	echo file_get_contents("http://www.futunga.com/".$_GET["pic"].".jpg");
?>
