<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //
    public function user()
    {
        return $this->hasOne('App\Model\User','id','user_id');
    }

    public function event()
    {
        return $this->hasOne('App\Model\Event','id','event_id');
    }

    public function scopeEvent($query,$event_id)
    {
        return $query->where('event_id',$event_id);
    }

    public function scopeGetFav($query,$user_id,$event_id){
        return $query->where('user_id',$user_id)->andWhere('event_id',$event_id)->andWhere('type','fav');
    }
}
