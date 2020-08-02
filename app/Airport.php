<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state',
        'photo'
    ];

    public function flights_takeoff()
    {
        return $this->hasMany('App\Flight', 'take_off_airport_id', 'id');
    }

    public function flights_landing()
    {
        return $this->hasMany('App\Flight', 'landing_airport_id', 'id');
    }
}
