<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\Encryptable; 

use App\Http\Controllers\HelperController;

class SMSRecipient extends Model
{
 
  

    use Encryptable;

    protected $encryptable = [
        'number', 
        'number_id'
    ];

    protected $fillable = ['smsname', 'number', 'number_id', 'channel'];


    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    public function addPhone($number, $number_id){

		$number = encrypt($number); 

		// this is the equivalent 
		$this->phone()->create(compact('number', 'number_id'));
        // Phone::create(
        //     [

        //         'number_id' => $number_id, 
        //         'number' => $number, 


        //     ]

        // );
				  // Comment::create([
    //         'body' => request('body'), 
    //         'post_id' => this->id
    //     ]);


	}


	public function getNumber(){

		return $this->phone['number']; 
		

	}



}
