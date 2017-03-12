<?php
function print_img(){
  $sImage = array('pori.jpg');
  shuffle($sImage);
  $rFP = fopen($sImage[0], 'rb');
  header("Content-Type: image/gif");
  header("Content-Length: " .(string)(filesize($sImage[0])) );
  fpassthru($rFP);
}
print_img();
exit;


    $host = $_SERVER["HTTP_HOST"];
    $xsrf = md5($id);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="xsrf" content="<?php echo $xsrf; ?>">
        <meta property="og:url" content="http://<?php echo $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; ?>" />
        <meta property="og:title" content="<?php echo ucfirst($id); ?>" />
        <meta property="og:description" content="" />
        <title><?php echo ucfirst($id); ?></title>
    </head>
    <body>

    </body>
</html>
