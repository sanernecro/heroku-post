<?php
	require_once('SimpleImage.php');

	$img = new abeautifulsite\SimpleImage(null, 470, 256, "#000000");
	$img->resize(470,256);
	$img->overlay('icons/'.rand(1,32).'.png', 'center center', 0.8, 0, 0);
	ob_start();

	$img->save();
	$content = ob_get_contents();
	ob_end_clean();
  	header("Content-type:image/jpg");
	echo $content;
?>
