<?php  

Route::get('/get/teams',array('uses' => 'Saas\Devtracker\Controllers\Auth\OAuth@getTeams'));
Route::get('/odesk/oauth',array('uses'=>'Saas\Devtracker\Controllers\Auth\OAuth@getIndex'));

Route::get('/zend',array('uses'=>'Saas\Devtracker\Controllers\DevLoggedHours@zumzum'));

