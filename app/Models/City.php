<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function state()
    {
        return $this->belongsTo(City::class);
    }


    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function coments()
    {
        return $this->morphMany(Coments::class,'comentable');
    }

}
