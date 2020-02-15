<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Sluggable;

    protected $fillable = ['title','pre_description','description','slug','date','place_id','organizer','category','sub_category','poster','rules','trick'];

    public function Place(){
        return $this->hasOne('App\Model\Place','id','place_id');
    }

    public function Organizer(){
        return $this->hasOne('App\Model\Organizer','id','organizer');
    }

    public function Category(){
        return $this->hasOne('App\Model\Category','id','category');
    }

    public function SubCategory(){
        return $this->hasOne('App\Model\Category','id','sub_category');
    }

    public function Prices(){
        return $this->hasMany('App\Model\EventPrice','event_id','id');
    }

    public function Socials(){
        return $this->hasMany('App\Model\Social','event_id','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
