<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function OneToMany()
    {
        /**Um pais e seus respectivos estados*/

//         $country=Country::findorfail(1);
//        $country = Country::where('name', 'Brasil')->get()->first();
//
//        echo 'País: ' . $country->name;
//
//        $states = $country->states;
//        $states = $country->states()->where('initials','ES')->get();
//
//        echo 'Estados: ';
//        echo '<hr>';
//        foreach ($states as $state) {
//            echo $state->initials . ' - ' . $state->name;
//            echo '<hr>';
//        }


        /**Todos os paises e seus respectivos estados*/
//HASMANY
        $searchkey = 'a';
        // $countries=Country::all();
        // $countries = Country::where('name', 'LIKE', "%{$searchkey}%")->get();
        $countries = Country::where('name', 'LIKE', "%{$searchkey}%")->with('states')->get();
        //Preferencialmente usar o with(),o seu parametro e o nome do metodo de relacionamento


        foreach ($countries as $country) {
            echo 'País: ' . "<b>{$country->name}</b>";

            $states = $country->states;
            //  $states = $country->states()->where('initials','ES')->get();


            echo '<hr>';
            echo 'Estados: ';
            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}</br>";


            }
            echo '<hr>';
        }


    }

    public function OneToManyInverse()
    {
        $stateName = 'Amazonas';

//        $state=State::findorfail(1);
        $state = State::where('name', $stateName)->get()->first();

        echo "<b>{$state->name}</b>";

        $country = $state->country->get()->first();
        echo "<br>País:  {$country->name}</br>";
    }


    public function OneToManyCities()
    {
        $searchkey = 'a';
        // $countries=Country::all();
        // $countries = Country::where('name', 'LIKE', "%{$searchkey}%")->get();
        $countries = Country::where('name', 'LIKE', "%{$searchkey}%")->with('states')->get();
        //Preferencialmente usar o with(),o seu parametro e o nome do metodo de relacionamento


        foreach ($countries as $country) {
            echo 'País: ' . "<b>{$country->name}</b>";

            $states = $country->states;
            //  $states = $country->states()->where('initials','ES')->get();


            echo '<hr>';
            echo 'Estados: ';
            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}</br>";

                $cities = $state->cities;

                foreach ($cities as $city) {
                    echo "<br>{$city->name}</br>";
                }

            }
            echo '<hr>';
        }
    }

    public function OneToManyInsert()
    {
        /**Exemplo de Inserir Estado em um País*/
        //Exemplo -1

        //Esse dataform podeira vir de um formulario por exemplo

        //$dataFom=[
        //'name'=>'Rio de Janeiro',
        // 'initials'=>'RJ',
        //];

        //$country=Country::findorfail(1);//Insere no pais com esse id

        // $country->states()->create($dataFom);

        /***---------------------------------*/
        //Exemplo -2

        //Esse dataform podeira vir de um formulario por exemplo

        $dataFom=[
            'name'=>'São Paulo',
            'initials'=>'SP',
            'country_id'=>'1',
        ];



         State::create($dataFom);
    }

    public function OneToManyTrought()
    {
        $country=Country::findorfail(1);

        echo $country->name;

        $cities=$country->cities;

        foreach ($cities as $city){
            echo $city->name;

        }
    }
}
