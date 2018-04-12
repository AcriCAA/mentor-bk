<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SMSRecipient extends Model
{
 
  protected $fillable = ['smsname', 'number','channel'];

  use Encryptable; 

  protected $encryptable = [
        'number'
    ];


    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    public function addPhone($number){

		
		// this is the equivalent 
		$this->phone()->create(compact('number'));

		//of this

		  // Comment::create([
    //         'body' => request('body'), 
    //         'post_id' => this->id
    //     ]);

	}


	public function getNumber(){

		return $this->phone['number']; 
		
		



	}


}
