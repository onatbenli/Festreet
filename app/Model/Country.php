<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ["name",'sort_name','phone_code'];
    public function Cities(){
        return $this->hasMany('App\Model\City','country_id','id');
    }
}
