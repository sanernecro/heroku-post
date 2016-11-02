<?php
	function tinyurl($url){
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://tinyurl.com/api-create.php?url=".$url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $shorturl = curl_exec($ch); 
        curl_close($ch);
        return $shorturl;
	}

	function tinycc($url){
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://tiny.cc/?c=rest_api&m=shorten&version=2.0.3&format=text&login=kadirgun&apiKey=9880bc61-a392-4b90-bdb5-133df3364a64&longUrl=".$url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $shorturl = curl_exec($ch); 
        curl_close($ch);
        $shorturl = json_decode($shorturl);
        $shorturl = $shorturl->short_url;
        return $shorturl;
	}
	
	function hnng($url){
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://www.hnng.moe/shortapi.php?url=".$url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $shorturl = curl_exec($ch); 
        curl_close($ch);
        return $shorturl;
	}

	function tweetable($url){
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://tweetable.link/api?api=cySXwZo7D3UL&url=".$url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $shorturl = curl_exec($ch); 
        curl_close($ch);
        $shorturl = json_decode($shorturl);
        $shorturl = $shorturl->short;
        return $shorturl;
	}

	function bitdo($url){
		$fields = array(
    	    'action' => "shorten",
    	    'url' => $url,
    	    'url2' => "site2",
    	    'url_hash' => "",
    	    'url_stats_is_private' => 0,
    	    'permasession' => time()."|".md5(time()),
    	);
        $fields_string = "";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
	
		$ch = curl_init('http://bit.do/mod_perl/url-shortener.pl');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result);
		$shortURL = $result->url_base.$result->url_hash;
		return $shortURL;
	}

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

	function random_word(){
		$words = file_get_contents(__DIR__."/words.json");
        $words = json_decode($words,true);
        return strtolower($words[array_rand($words,1)]);
	}

	function scry($url){
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://scry.in/api.php?action=shorturl&format=simple&url=".$url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10; rv:33.0) Gecko/20100101 Firefox/33.0");
        $shorturl = curl_exec($ch); 
        curl_close($ch);
        return $shorturl;
	}

	function md5rand($length=32){
		$alfabe = "ABCDEFGHIJKLMNOPRSTUVYZXabcdefghijklmnoprstuvyzx0123456789";
       	$rand = md5(substr(str_shuffle($alfabe), rand(10,20),rand(10,20)));
		$rand = substr($rand, 0,$length);
		return $rand;
	}

	function fullescape($in){
	  $out = ''; 
	  for ($i=0;$i<strlen($in);$i++) 
	  { 
	    $hex = dechex(ord($in[$i])); 
	    if ($hex=='') 
	       $out = $out.urlencode($in[$i]); 
	    else 
	       $out = $out .'%'.((strlen($hex)==1) ? ('0'.strtoupper($hex)):(strtoupper($hex))); 
	  } 
	  $out = str_replace('+','%20',$out); 
	  $out = str_replace('_','%5F',$out); 
	  $out = str_replace('.','%2E',$out); 
	  $out = str_replace('-','%2D',$out);
	  return $out; 
	}

	function shorl($url){
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://shorl.com/create.php?url=".$url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec($ch); 
        curl_close($ch);
        if(strpos('class="error"', $result) !== false){
        	$shorturl = false;
        }else{
        	$shorturl = explode('Shorl: ', $result);
        	$shorturl = explode(">", $shorturl[1]);
        	$shorturl = explode("<", $shorturl[1]);
        	$shorturl = $shorturl[0];
        }
        return $shorturl;
	}
?>