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
		if (!isset($_SESSION['saved_token_id'])) {

		    $oauth_cred = $api->auth(); // auth using your login and pass to authorize app
		    return \Redirect::to('get/teams');
		} else {
		    $api->option('api_token', $_SESSION['saved_token_id']); 	// use saved token, then you app do not require
		                                                            	// login and auth again
		    $api->option('api_secret', $_SESSION['saved_oauth_secret']);
		
		}

		
	}
	public function getTeams()
	{
		$secret 	= Config::get('devtracker::odesk.providers.odesk.secret');
		$key    	= Config::get('devtracker::odesk.providers.odesk.key');

		$api = new oDeskAPI($secret, $key);
		$access_token = $api->getToken(Input::get('oauth_verifier'));
		dd($access_token);
		// 	$params = array(
  //           'online' => 'all'
  //           );
		// // make GET request
		// $response = $api->get_request('https://www.odesk.com/api/team/v1/teamrooms.json');
		// dd($response);
	}

}