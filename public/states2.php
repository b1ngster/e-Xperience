<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//$url = ['https://escharts.com/tournaments?status=ongoing&with-stats=1'];
//$url = 'https://www.ggesports.com/en-US/stats/lol/global/Match/League';
//$url = 'https://fly.sportsdata.io/v3/lol/scores/json/Competitions/';
$url =  $url = 'https://blog.feedspot.com/esports_rss_feeds/';

$panda_score_token = 'gCiyAx65AyG246dh-tzyUFTiZrwyUWxuz1hyqDB8ufrUOgPad44';

$email = '67551@blackpool.ac.uk';

$password = 'webtech2021';

$args = [''];
$args = http_build_query($args);
$url  .$args .$panda_score_token;
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
 $ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
//var_dump($result);
    // close curl resource to free up system resources
    curl_close($ch); 
$data = array();

$deliminator = '/>';

$result = explode('/>', $result) ;

print_r($result[10]);

$file = 'cache/' .$url .datenow();


