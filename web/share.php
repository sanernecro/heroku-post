<?php
	require_once('image/simpleImage/src/abeautifulsite/SimpleImage.php');

	$img = new abeautifulsite\SimpleImage(null, 470, 256, "#000000");
	$img->resize(470,256);
	$img->overlay('icons/'.rand(1,32).'.png', 'center center', 0.8, 0, 0);
	ob_start();

	if (isset($_GET["pic"])) {
		$img->output();
	} else {
		$img->save();
	}

	$content = ob_get_contents();
	ob_end_clean();
  	header("Content-type:image/jpg");
	echo $content;
?>
