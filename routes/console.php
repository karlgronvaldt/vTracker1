<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\LocData;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('updateMap', function () {
	$data = LocData::all();

    $geojson = array(
       'type'      => 'FeatureCollection',
       'features'  => array()
    );

    $i = 0;
    foreach($data as $row) {
        $resultList[$i] = $row['code'];

        $feature = array(
            'type' => 'Feature',
            'geometry' => array(
                'type' => 'Point',
                'coordinates' => array($row['long'], $row['lat'])
            ),
            'properties' => array(
                'code' => $row['code'],
                'gender' => $row['gender']
            )
        );

        array_push($geojson['features'], $feature);

        $i++;
    }

    try {
        \Storage::put('test.geojson', json_encode($geojson));
    } catch(Exception $e) {
        return ['error' => true, 'message' => $e->getMessage()];
    }
});

Artisan::command('updateDb', function () {
	// LocData::where('created_at', )
	$date = new DateTime;
	$date->modify('-2 weeks');
	$fdate = $date->format('Y-m-d H:i:s');

	LocData::where('created_at', '<=', $fdate)->delete();
});