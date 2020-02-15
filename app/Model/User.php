<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use QCod\ImageUp\HasImageUploads;



class User extends Authenticatable
{
    use Notifiable, Sluggable, HasImageUploads;

    protected $fillable = [
        'first_name','last_name', 'username', 'email', 'password','phone_number','birthday','type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }

    public function scopeOrganizers($query)
    {
        return $query->where('type', '=' ,'organizer');
    }

    public function myOrganizers(){
        return $this->hasMany('App\Model\Organizer','user_id','id');
    }

    public function getFav(){
        return $this->hasMany('App\Model\Social','user_id','id');
    }

    protected static $imageFields = [
        'avatar'
    ];
}

