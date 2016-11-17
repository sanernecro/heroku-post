<?php
    require_once("includes/functions.php");
    $host = $_SERVER["HTTP_HOST"];
    if(!isset($_GET["id"])){
        $_GET["id"] = md5rand(rand(6,8));
    }
    $imagelink = "http://".$host."/".$_GET["id"].".jpg";
    // $imagelink = "http://".md5rand(8).".imgur.com/MODrRSI.jpg";
    $putimage = true;
    $randomclass = random_word();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:url" content="http://<?=$host;?>/<?=$_GET["id"];?>">
<meta property="og:title" content="Video <?=$_GET["id"];?>">
<meta property="og:description" content="Video <?=$_GET["id"];?>">
<meta property="og:image" content="http://<?=$host;?>/<?=$_GET["id"];?>.jpg">
<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="https://www.herokucdn.com/favicon.ico">
		<style media="screen">
		  html,body,iframe {
			margin: 0;
			padding: 0;
		  }
		  html,body {
			height: 100%;
			overflow: hidden;
		  }
		  iframe {
			width: 100%;
			height: 100%;
			border: 0;
		  }
		</style>
	  </head>
	  <body>
		<iframe src="//www.herokucdn.com/error-pages/no-such-app.html"></iframe>
	  </body></head></html>
