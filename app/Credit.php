<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'credit_card',
        'credit_number'
    ];
    
    /**
    public function users()
    {
        return $this->hasOne('App\User');
    }
    */
}
