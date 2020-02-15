<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = ['name','country_id'];

    public function Country(){
        return $this->hasOne('App\Model\Country','id','country_id');
    }
}
