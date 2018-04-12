<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Http\Traits\Encryptable;

class Phone extends Model
{



    protected $encryptable = [
        'number'
    ];

	protected $fillable = ['number'];

    public function s_m_s_recipient()
	{
		return $this->belongsTo('App\SMSRecipient'); 

		  // return $this->belongsTo('App\User', 'foreign_key');
	}


}
