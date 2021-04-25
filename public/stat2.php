<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//require_once 'PandaScoreAPI/APIClient.php';
require_once 'vendor/autoload.php';


use PandaScoreAPI\PandaScoreAPI;

//$url = ['https://escharts.com/tournaments?status=ongoing&with-stats=1'];
//$url = 'https://www.ggesports.com/en-US/stats/lol/global/Match/League';
//$url = 'https://fly.sportsdata.io/v3/lol/scores/json/Competitions/';
//$url =  $url = 'https://blog.feedspot.com/esports_rss_feeds/';

$url_base = '';


$panda_score_token = 'gCiyAx65AyG246dh-tzyUFTiZrwyUWxuz1hyqDB8ufrUOgPad44';

$email = '67551@blackpool.ac.uk';

$password = 'webtech2021';


//  Initialize the library
$api = new PandaScoreAPI([
	//  Your API key, you can get one at https://pandascore.co/settings
	PandaScoreAPI::SET_TOKEN    => $panda_score_token,
	// If you need to use a game specific API, you initialize it at launch
	PandascoreAPI::USE_LEAGUE_OF_LEGENDS => true,
]);

//  And now you are ready to rock!
$api->leagues->getLeague(61);
// Get only the datas from the games you need
$lolch = $api->lol->tournaments->listTournaments();

print_r($api);
$league = $api->getLeague(4213);

echo $league->id;             //  4213
echo $league->name;           //  LVP SLO
echo $league->slug;           //  league-of-legends-lvp-slo

print_r($league->getData()); 
