<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'credit_cards';
	protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
		'number',
		'expiration_date',
		'amount',
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
