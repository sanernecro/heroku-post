<?php

require_once("config.php");
require_once("functions.php");

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://tracking.redirect.pub/api/isBot?api_key=51fa5653d1986420acfc567f4a9826ac&i='.$_SERVER["REMOTE_ADDR"].'&u='.$_SERVER["HTTP_USER_AGENT"]
));
$api = curl_exec($ch);
curl_close($ch);
$isref = false;
print_r($api);
