<?php

class ApiController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| API Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getChems($orp = -1.0, $ph = -1.0, $serial = -1)
	{
		if($orp == -1.0)
		{
			return 'Invalid input, please specify ORP, pH, and Serial number values';
		}
		if($ph == -1.0)
		{
			return 'Invalid input, please specify ORP, pH, and Serial number values';
		}
		if($serial == -1)
		{
			return 'Invalid input, please specify ORP, pH, and Serial number values';
		}
		// set default timezone
		//date_default_timezone_set('America/Detroit'); // Eastern Time
		//grab the date
		$current_date = date('Y-m-d H:i:s');
		//run the insert
		DB::table('chemlog')->insert(
				array('serial' => $serial, 'ph' => $ph, 'orp' => $orp, 'timestamp' => $current_date)
			);
		return 'Success at ' . $current_date;
	}
	
	public function getIndex()
	{
		return 'Invalid endpoint. Please specify an API function.';
	}

}
