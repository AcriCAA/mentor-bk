<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//For Encrypts
use App\Http\Traits\Encryptable; 
use Illuminate\Support\Facades\Crypt;

class Phone extends Model
{

    // use Encryptable;

    // protected $encryptable = [
    //     'number'
    // ];

	// protected $encryptable = [
			
	// 		'number'
	// 	];

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
