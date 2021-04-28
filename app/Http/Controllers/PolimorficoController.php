<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class PolimorficoController extends Controller
{
    public function Polimorfico()
    {
        $cities = City::all();
        foreach ($cities as $city) {
            echo "<b>{$city->name}</b> <br>";

            $coments = $city->coments()->get();


            foreach ($coments as $coment) {

                echo "<br>{$coment->description}<br>";
                echo "<hr>";
            }

        }
        $states = State::all();
        foreach ($states as $state) {
            echo "<b>{$state->name}</b> <br>";

            $coments = $state->coments()->get();


            foreach ($coments as $coment) {

                echo "<br>{$coment->description}<br>";
                echo "<hr>";
            }

        }
        $countries = Country::all();
        foreach ($countries as $country) {
            echo "<b>{$country->name}</b> <br>";

            $coments = $country->coments()->get();


            foreach ($coments as $coment) {

                echo "<br>{$coment->description}<br>";
                echo "<hr>";
            }

        }
    }

    public function PolimorficoInsert()
    {
        $city = City::findorfail(1);
        echo $city->name;

        $city->coments()->create([
            'description' => 'Teste de comentario para cidade ' . date('YmdHis')
        ]);

        $state = State::findorfail(2);
        echo $state->name;

        $state->coments()->create([
            'description' => 'Teste de comentario estado' . date('YmdHis')
        ]);

        $country = Country::findorfail(3);
        echo $country->name;

        $country->coments()->create([
            'description' => 'Teste de comentario País ' . date('YmdHis')
        ]);


    }
}
