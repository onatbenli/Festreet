<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventPrice extends Model
{
    protected $fillable = ['currency_id','category','event_id','price','favorite','status','stock'];
    public function currency(){
        return $this->hasOne('App\Model\Currency','id','currency_id');
    }

    public function event(){
        return $this->hasOne('App\Model\Event','id','event_id');
    }
}
