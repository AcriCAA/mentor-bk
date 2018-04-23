<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\Encryptable; 

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

	public function createPhoneId($incoming_number) {


        $last = substr($incoming_number, -4);

        $foursix = substr($incoming_number, 4, 2); 

        $beginning = (int)$foursix; 

        $beginning = ($beginning + env('CIPHER')) * env('CIPHER_2'); 

        $ending = (int)$last; 

        $ending = ($ending + env('CIPHER')) * env('CIPHER_2');

        $beginning = (string)$beginning; 
        $ending = (string)$ending; 

        $id = $ending . $beginning; 

        return $id; 

    }



	public function getNumber(){

		return $this->phone['number']; 
		

	}



}
