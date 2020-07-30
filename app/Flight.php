<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_take_off',
        'date_landing',
        'status',
        'take_off_airport_id',
        'landing_airport_id',
        'airplane_id',
        'price_id',
        'reserved_economy_class',
        'reserved_businessmen',
        'reserved_first_class'
    ];
    
    public function price()
    {
        return $this->belongsTo('App\Price', 'price_id');
    }
    
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'flight_id', 'id');
    }

    public function airplane()
    {
        return $this->hasOne('App\Airplane', 'id', 'airplane_id');
        //return $this->hasMany('App\Airplane', 'id', 'airplane_id');
    }
    
    public function airport_takeoff()
    {
        return $this->belongsTo('App\Airport', 'take_off_airport_id');
    }

    public function airport_landing()
    {
        return $this->belongsTo('App\Airport', 'landing_airport_id');
    }
}
