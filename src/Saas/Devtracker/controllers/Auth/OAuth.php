<?php 
namespace Saas\Devtracker\Controllers\Auth;

use Illuminate\Routing\Controller;
use Saas\Devtracker\OAuth\Odesk\oDeskAPI;
use Config;
use Input;
use Session;
class OAuth extends Controller {

	public function getIndex()
	{
		$secret 	= Config::get('devtracker::odesk.providers.odesk.secret');
		$key    	= Config::get('devtracker::odesk.providers.odesk.key');
		$odesk_user = Config::get('devtracker::odesk.providers.odesk.odesk_user');
		$odesk_pass = Config::get('devtracker::odesk.providers.odesk.odesk_pass');


		$api = new oDeskAPI($secret, $key);

		$api->option('mode', 'web'); // obligatory option for non web-based applications
		$api->option('verify_ssl', TRUE); // whether to verify SSL certificate, FALSE by default (supports self-signed certs)
		$api->option('cookie_file', '/tmp/cookies.txt'); // cookie file, used for nonweb apps

		if (!isset($_SESSION['saved_token_id'])) {

		    $oauth_cred = $api->auth($odesk_user, $odesk_pass); // auth using your login and pass to authorize app

		} else {
		    $api->option('api_token', $_SESSION['saved_token_id']); // use saved token, then you app do not require
		                                                            // login and auth again
		    $api->option('api_secret', $_SESSION['saved_oauth_secret']);
		
		}
		
	
		
	}
	public function getTeams()
	{
		$secret 	= Config::get('devtracker::odesk.providers.odesk.secret');
		$key    	= Config::get('devtracker::odesk.providers.odesk.key');
		$odesk_user = Config::get('devtracker::odesk.providers.odesk.odesk_user');
		$odesk_pass = Config::get('devtracker::odesk.providers.odesk.odesk_pass');
		$api = new oDeskAPI($secret, $key);

			$params = array(
            'online' => 'all'
            );
		// make GET request
		$response = $api->post_request('https://www.odesk.com/api/team/v1/teamrooms.json', $params);
		$data = json_decode($response);
		var_dump($data);
	}

}