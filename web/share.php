<?php
    $host = $_SERVER["HTTP_HOST"];
    if(!isset($_GET["id"])){
        $_GET["id"] = "";
    }
    $_GET["id"] = explode(".", $_GET["id"])[0];
    //$imagelink = "http://".$host."/".$_GET["id"].".jpg";
    $imagelink = "https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png";
    //$imagelink = "http://".md5rand(8).".amddialer.com/play.jpg";
    //$imagelink = "http://cdn.pktune.net/".md5rand(8).".jpg";
    $putimage = true;
    $randomclass = generate_name(5);
    $des = generate_name(rand(10,25));

?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <title><?php echo ucfirst($_GET["id"]); ?></title>
        <meta property="og:title" content="<?php echo $des; ?>" />
        <meta property="og:description" content="<?php echo $des; ?>" />
        <?php if($putimage == true){ ?>
        <meta property="og:image" content="<?php echo $imagelink; ?>" />
        <?php } ?>
        <meta name="description" content="<?php echo $des; ?>">
        <meta name="title" content="<?php echo ucfirst($_GET["id"]); ?>">
        <meta property="og:type" content="music.song" />
    </head>

    <body>
        <h1><?php echo generate_name(rand(12,30)); ?></h1>
        <ul>
        <?php for($i=0;$i<rand(12,25);$i++){ ?>
            <li><?php echo generate_name(rand(10,25)); ?></li>
        <?php } ?>
        <ul>
        <div class="<?php echo $randomclass; ?>">
            <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>.
             <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>.
              <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>  <?php echo generate_name(rand(5,15)); ?>
        </div>
    </body>
</html>
