<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{

    use Sluggable;

    protected $fillable = ['name','user_id','description'];

    public function Events(){
        return $this->hasMany('App\Model\Event','organizer','id');
    }

    public function User(){
        return $this->hasOne('App\Model\User','id','user_id');
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
