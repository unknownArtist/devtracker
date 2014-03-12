<?php namespace Saas\Devtracker\Controllers;

use Illuminate\Routing\Controller;
use Saas\Devtracker\Controllers\Auth\OAuth;

class DevLoggedHours extends Controller {

	public function getIndex()
	{
		return "hello";
	}
}