<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    //Recupera a localização
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    //Recupera os estados
    public function states()
    {
        return $this->hasMany(State::class);
    }

    //Recupera as Cidades do Pais atraves do estado
    public function cities()
    {
        return $this->hasManyThrough(City::class,State::class);
    }
}
