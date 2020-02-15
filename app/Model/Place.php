<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Place extends Model
{
    use Sluggable;

    protected $fillable = ['name','coordinates','slug','city','country','capacity','address'];

    public function Country(){
        return $this->hasOne('App\Model\Country','id','country');
    }

    public function City(){
        return $this->hasOne('App\Model\City','id','city');
    }

    public function Events(){
        return $this->hasMany('App\Model\Event','place_id','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
