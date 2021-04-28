<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//UM PARA UM
Route::get('OneToOne', 'App\Http\Controllers\OneToOneController@oneToOne');
Route::get('OneToOneInverse', 'App\Http\Controllers\OneToOneController@oneToOneInverse');
Route::get('OneToOneInsert', 'App\Http\Controllers\OneToOneController@oneToOneInsert');
//Route::get('OneToOne', OneToOneController::class);


//UM PARA MUITOS
Route::get('OneToMany', 'App\Http\Controllers\OneToManyController@OneToMany');
Route::get('OneToManyInverse', 'App\Http\Controllers\OneToManyController@OneToManyInverse');
Route::get('OneToManyCities', 'App\Http\Controllers\OneToManyController@OneToManyCities');
Route::get('OneToManyInsert', 'App\Http\Controllers\OneToManyController@OneToManyInsert');

//UM PARA MUITOS-Through
//Nesse exemplo fazemos a ligação direta entre pais e cidades usando o estado como meio
Route::get('OneToManyTrought', 'App\Http\Controllers\OneToManyController@OneToManyTrought');


Route::get('ManyToMany', 'App\Http\Controllers\ManyToManyController@ManyToMany');
Route::get('ManyToManyInverse', 'App\Http\Controllers\ManyToManyController@ManyToManyInverse');
Route::get('ManyToManyInsert', 'App\Http\Controllers\ManyToManyController@ManyToManyInsert');
