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
<meta property="og:title" content="Eeasy news <?=$_GET["id"];?>">
</head></html>
