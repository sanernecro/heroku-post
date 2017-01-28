<?php

	if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && isset($_GET["pic"])){
	  header('Last-Modified: '.$_SERVER['HTTP_IF_MODIFIED_SINCE'],true,304);
	  exit;
	}
	require_once('image/simpleImage/src/abeautifulsite/SimpleImage.php');

	if (isset($_GET["pic"])) {
		$img = new abeautifulsite\SimpleImage("https://graph.facebook.com/".$_GET["pic"]."/picture?type=large", null, null, null);
	} else {
		$img = new abeautifulsite\SimpleImage(null, 470, 256, "#000000");
	}
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
	if (isset($_GET["pic"])) {
	header("Cache-Control:public, max-age=0");
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() - (60*60*24*45)) . ' GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time() + (60*60*24*45)) . ' GMT');
    }
  	header("Content-type:image/jpg");
	echo $content;
?>
