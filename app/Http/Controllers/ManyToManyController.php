<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function ManyToMany()
    {


        $cities = City::All();

        foreach ($cities as $city) {

            echo "<b>Cidade: {$city->name}</b><br>";

            $companies = $city->companies;

            foreach ($companies as $company) {
                echo " {$company->name}</br>";
                echo "<hr>";
            }
        }
    }

    public function ManyToManyInverse()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            echo "<b>  {$company->name}</b><br>";

            $cities = $company->cities()->get();
            foreach ($cities as $city){
                echo " Cidade: {$city->name} <br> ";
            echo "<hr>";}
        }
    }

    public function ManyToManyInsert()
    {
        $dataFrom=[9,10,11,12];

        $company=Company::find(5);
        echo " Empresa: {$company->name} <br> ";

      // $company->cities()->attach($dataFrom);// Sempre adicona e repete se o id for igual ,sempre que executar vai adicionar as cidades 9,10,11 e 12
        $company->cities()->sync($dataFrom);// Sempre sincroniza e não repete,ele apaga caso remova algum id,por exemplo se remover o id 12 do array ele ira remover da tabela
       // $company->cities()->detach($dataFrom); //Apaga todas com esse id cidades relacionadas a empresa de acordo com o id,nesse caso remove a empresa 9,10,11 e 12

        $cities = $company->cities;
        foreach ($cities as $city){
            echo " Cidade: {$city->name} <br> ";
            echo "<hr>";}

    }
}
