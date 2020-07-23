<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'economic_class_price',
        'business_class_price',
        'firste_class_price'
    ];
    
    public function flights()
    {
        return $this->hasMany('App\Flight', 'price_id', 'id');
    }
}
