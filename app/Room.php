<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = "room"; // chi dinh ten CSDL

    // belongsTo, hasMany, hasOne, belongsToMany

    public function facilities () {
        return $this->belongsToMany('App\Facilities', 'room_facilities', 'room_id', 'facilities_id');
    }
}
