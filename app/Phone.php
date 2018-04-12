<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\Encryptable; 

class Phone extends Model
{

    use Encryptable;

    protected $encryptable = [
        'number',
        'medical_conditions',
        'allergies',
        'emergency_contact_id',
    ];

	protected $fillable = ['number'];

    public function s_m_s_recipient()
	{
		return $this->belongsTo('App\SMSRecipient'); 

		  // return $this->belongsTo('App\User', 'foreign_key');
	}


}
