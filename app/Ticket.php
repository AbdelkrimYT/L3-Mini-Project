<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'flight_id'
    ];
    
    public function price()
    {
        return $this->belongsTo('App\Flight', 'flight_id');
    }

    public function flight()
    {
        return $this->belongsTo('App\Flight', 'flight_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'client_id');
    }
}
