<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	$data = DB::select('SELECT * FROM chemLog WHERE timestamp >= CURDATE()', array(857));
	return View::make('showchems', $data);
});
*/
Route::controller('/api', 'ApiController');
Route::controller('/', 'HomeController');