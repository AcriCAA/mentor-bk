<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\Encryptable; 

class SMSRecipient extends Model
{
 
  

      use Encryptable;

    protected $encryptable = [
        'number'
    ];

    protected $fillable = ['smsname', 'number','channel'];


    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    public function addPhone($number){

		
		// this is the equivalent 
		$this->phone()->create(compact('number'));


	}


	public function getNumber(){

		return $this->phone['number']; 
		
		



	}


}
