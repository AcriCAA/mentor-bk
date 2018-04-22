<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\Encryptable; 

class Phone extends Model
{

    // use Encryptable;

    // protected $encryptable = [
    //     'number'
    // ];

	protected $encryptable = [
			'number_id', 
			'number'
		];

    protected $fillable = [
			'number_id', 
			'number'
		];

    public function s_m_s_recipient()
	{
		return $this->belongsTo('App\SMSRecipient'); 

		  // return $this->belongsTo('App\User', 'foreign_key');
	}




}
