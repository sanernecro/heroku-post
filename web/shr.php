<?php

$logo_class = generate_name(rand(10, 12));
$logo2_class = generate_name(rand(10, 12));
$text_class = generate_name(rand(10, 12));
$text_class2 = generate_name(rand(10, 12));
$div_menu = generate_name(rand(10, 12));
$title = generate_name(rand(10,25));


if (strpos($_SERVER["REQUEST_URI"], ".jpg") !== false) {
    require_once('image.api.php');
    header('Access-Control-Allow-Origin: *');
        try {
            header("Content-type: image/jpeg");
            $img = new abeautifulsite\SimpleImage(null, 670, 340, '#'.rand(111111,999999));
            $img->overlay('image/buttons/playbutton.png', 'center center', 0.8, 0, 0);



            for ($i=0;$i<5;$i++) {
                $img->text(str_shuffle("abcdefghijklmnoprstucyzxw0123456789abcdefghijklmnoprstucyzxw01234567+&/()!^+-="), 'arial.ttf', 12, '#FFFFFF', 'top', 0, $i*20);
            }


            for ($i=0;$i<5;$i++) {
                $img->text(str_shuffle("abcdefghijklmnoprstucyzxw0123456789abcdefghijklmnoprstucyzxw01234567+&/()!^+-="), 'arial.ttf', 12, '#FFFFFF', 'bottom', 0, -$i*20);
            }

            $img->save();
            $content = ob_get_contents();
            echo $content;

        } catch(Exception $e) {

            echo 'Error: ' . $e->getMessage();

        }
        exit;
}
// else if (strpos($_SERVER["REQUEST_URI"], ".png") !== false) {
//    require_once('image.api.php');
//    header('Access-Control-Allow-Origin: *');
//        try {
//            header("Content-type: image/png");
//            $img = new abeautifulsite\SimpleImage(null, 75, 75, '#'.rand(111111,999999));
//            $img->text(generate_name(rand(10,25)), 'arial.ttf', 14, '#FFFFFF', 'center center', 0, 0);
//            $img->save();
//            $content = ob_get_contents();
//            echo $content;
//
//        } catch(Exception $e) {
//
//            echo 'Error: ' . $e->getMessage();
//
//        }
//        exit;
//} else 
if (strpos($_SERVER["REQUEST_URI"], ".css") !== false) {
    header('Access-Control-Allow-Origin: *');
    header("Content-type: text/css");
    $expl = explode(".", $_SERVER["REQUEST_URI"]);
echo 'body {margin: 0 auto;max-width: 800px;}
.'.str_replace("/", "", $expl[0]).' {margin-bottom: '.rand(5,20).'px;padding:'.rand(7,17).'px;}
.'.str_replace("/", "", $expl[1]).' {margin-right: '.rand(15,35).'px;border-radius: 100px;}
.'.str_replace("/", "", $expl[2]).' {margin-bottom: '.rand(5,20).'px;padding:'.rand(3,10).'px;}
.'.str_replace("/", "", $expl[3]).' {font-size: '.rand(25,35).'px;padding:'.rand(3,7).'px;margin-right: '.rand(5,10).'px;background: '.'#'.rand(111111,999999).'; color: white; text-decoration: none;}
.'.str_replace("/", "", $expl[3]).':hover {background: '.'#'.rand(111111,999999).';}
.'.str_replace("/", "", $expl[4]).' {margin: 0 100px;}';
        exit;
}



?>
<!DOCTYPE html>
<html>

  <head>
    <title></title>
    <link rel="canonical" href="http://<?=$_SERVER["HTTP_HOST"];?>/<?=$_SERVER["REQUEST_URI"]?>" />
    <link rel="thumbnail" type="image/jpeg" href="http://<?=$_SERVER["HTTP_HOST"];?>/<?=rand(10000, 99999999)?>.jpg" />
    <link rel="image_src" href="http://<?=$_SERVER["HTTP_HOST"];?>/<?=rand(10000, 99999999)?>.jpg" />
    <meta property="og:site_name" content="">
    <meta property="og:url" content="http://<?=$_SERVER["HTTP_HOST"];?>/<?=$_SERVER["REQUEST_URI"]?>">
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:title" content="">
    <meta property="og:image" content="http://<?=$_SERVER["HTTP_HOST"];?>/<?=rand(10000, 99999999)?>.jpg">
    <meta property="og:image:secure_url" content="http://<?=$_SERVER["HTTP_HOST"];?>/<?=rand(10000, 99999999)?>.jpg" />
    <meta property="og:type" content="video.movie">
    <meta property="og:description" content="">
    <meta property="og:image:width" content="660">
    <meta property="og:image:height" content="371">
    <meta name="twitter:site" content="@keyiftv">
    <meta name="twitter:url" content="http://<?=$_SERVER["HTTP_HOST"];?>/<?=$_SERVER["REQUEST_URI"]?>">
    <meta name="twitter:title" content="">
    <meta name="twitter:creator" content="@keyiftv">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="http://<?=$_SERVER["HTTP_HOST"];?>/<?=rand(10000, 99999999)?>.jpg">
    <meta name="medium" content="image">
    <script>
      var base_url = "http://<?=$_SERVER["HTTP_HOST"];?>";
      var current_url = "http://<?=$_SERVER["HTTP_HOST"];?>/<?=$_SERVER["REQUEST_URI"]?>";
      var video_id = "<?=$_SERVER["REQUEST_URI"]?>";

    </script>
    <script type="text/javascript">
      $.post('https://graph.facebook.com', {
        id: 'http://<?=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];?>',
        scrape: true
      }, function(response) {
        console.log(response);
      });

    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo $logo_class; ?>.<?php echo $logo2_class; ?>.<?php echo $text_class; ?>.<?php echo $text_class2; ?>.<?php echo $div_menu; ?>.css">

  </head>

    <body>

        <div class="<?=$logo_class;?>"><div class="<?=$div_menu;?>"><a class="<?=$text_class2;?>" href="#<?=generate_name(rand(4,8));?>"><?=strtoupper(generate_name(rand(4,8)));?></a> <a class="<?=$text_class2;?>" href="#<?=generate_name(rand(4,8));?>"><?=strtoupper(generate_name(rand(4,8)));?></a> <a class="<?=$text_class2;?>" href="#<?=generate_name(rand(4,8));?>"><?=strtoupper(generate_name(rand(4,8)));?></a></div></div>
        
        <div class="<?php echo $text_class; ?>">
        
            <?php
                for ($i=0;$i<rand(150, 350);$i++) {
                    echo generate_name(rand(10,25))." ";
                }
            ?>

        </div>
    </body>
</html>