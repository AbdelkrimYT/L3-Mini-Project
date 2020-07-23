<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'airplanes';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'model_id',
        'name'
    ];
    
    
    /**
     * ORM Methods
     */
    public function airplaneModel()
    {
        return $this->belongsTo('App\AirplaneModel', 'model_id');
    }

    public function flight()
    {
        return $this->belongsTo('App\Flight', 'model_id');
    }
}
