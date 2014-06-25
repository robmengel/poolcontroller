<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$current_date = date('Y-m-d H:i:s');
		$entries = DB::table('chemlog')
							->where('timestamp', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 1 DAY)'))
							->orderBy('timestamp', 'desc')
							->get();

		return View::make('showchems')
			->with('entries', $entries);
		//return View::make('hello');
	}

}
