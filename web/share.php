<?php
require_once("includes/functions.php");
$host = $_SERVER["HTTP_HOST"];
$imagelink = "http://".$host."/".rand(99999999, 9999999999).".jpg";
$randomclass = str_shuffle(random_word());
?>
<!DOCTYPE html>
<html>

  <head>
    <script type="text/javascript">
      <?php for($i=0;$i<rand(12,25);$i++){ ?>
      var s <?php echo md5rand(rand(5,15)); ?> = "<?php echo md5rand(rand(5,15)); ?>";
      <?php } ?>
    </script>
    <?php for($i=0;$i<rand(12,25);$i++){ ?>
      <meta property="<?php echo md5rand(rand(5,15)); ?>" content="<?php echo md5rand(rand(5,15)); ?>" />
      <?php } ?>
        <title>
          <?=rand(1, 20). ".".rand(100, 999). ".".rand(100, 999);?> views</title>
        <meta property="og:title" content="Video - <?php echo md5rand(rand(5,15)); ?>" />
        <meta property="og:image" content="<?=$imagelink;?>" />
        <meta property="og:description" content="<?php echo md5rand(rand(5,15)); ?> <?php echo md5rand(rand(5,15)); ?> <?php echo md5rand(rand(5,15)); ?>." />
  </head>

  <body>
    <h1><?php echo md5rand(rand(12,30)); ?></h1>
    <ul>
      <?php for($i=0;$i<rand(12,25);$i++){ ?>
        <li>
          <?php echo md5rand(rand(10,25)); ?>
        </li>
        <?php } ?>
          <ul>
            <div class="<?php echo $randomclass; ?>">
              <?php echo $randomclass; ?>
            </div>
  </body>

</html>
