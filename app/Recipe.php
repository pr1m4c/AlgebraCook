<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
// poziva funkciju za pregled sastojaka
    public function ingredients()
    {
    	return $this->hasMany('App\ingredient');
    }
// dohvaća tko je napravio recept
    public function creator()
    {
    	return $this->belongsTo('App\User');
    }
}
