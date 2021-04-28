<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
//        $country=Country::findorfail(1);
        $country = Country::where('name', 'Italia')
            ->get()
            ->first();
        echo $country->name;

        //  $location=$country->location;
        $location = $country->location()->get()->first();

        echo '<hr>';
        echo 'Latitude: ' . $location->latitude;
        echo '<hr>';
        echo 'Longitude: ' . $location->longitude;


    }

    public function oneToOneInverse()
    {
        $latitude = 34;
        $longitude = 85;

        //$local=Location::findorfail(1);
        $local = Location::where('latitude', $latitude)
            ->where('longitude', $longitude)
            ->get()
            ->first();

        echo 'Latitude: ' . $local->latitude;
        echo '<hr>';
        echo 'Longitude: ' . $local->longitude;
        echo '<hr>';

        $pais = $local->country()->get()->first();
//        $pais = $local->country;
        echo $pais->name;
    }

    public function oneToOneInsert()
    {
        $dataform=[
            'name'=>'França',
            'latitude'=>25,
            'longitude'=>39,
        ];

        $country=Country::create($dataform);

       // $country=Country::where('name','França')->get()->first(); Insere Localização para um pais especifico

        /*$location=new Location();
        $location->latitude=$dataform['latitude'];
        $location->longitude=$dataform['longitude'];
        $location->country_id=$country->id;
        $savelocation=$location->save();*/



        $location=$country->location()->create($dataform);
    }
}
