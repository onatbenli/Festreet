<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;
    protected $fillable = ["category_name","sub_category","slug"];

    public function Events(){
        return $this->hasMany('App\Model\Event','category','id');
    }

    public function SubEvents(){
        return $this->hasMany('App\Model\Event','sub_category','id');
    }

    public function ChildCategories(){
        return $this->hasMany('App\Model\Category','sub_category','id');
    }

    public function SubCategory(){
        return $this->hasOne('App\Model\Category','id','sub_category');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }

    public function scopeMainCategory($query)
    {
        return $query->where('sub_category', '=' ,'');
    }
}
