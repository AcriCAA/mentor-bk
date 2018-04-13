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

    public function addPhone($number, $number_id){

		

		// this is the equivalent 
		$this->phone()->create(compact('number', 'number_id'));
				  // Comment::create([
    //         'body' => request('body'), 
    //         'post_id' => this->id
    //     ]);


	}

	public function createPhoneId($incoming_number) {


        $lastfour = substr($incoming_number, -4);

        $foursix = substr($incoming_number, 4, 2); 

        $beginning = (int)$foursix; 

        $beginning = ($beginning + env('CIPHER')) * env('TIMES'); 

        $ending = (int)$lastfour; 

        $ending = ($ending + env('CIPHER')) * env('TIMES');

        $beginning = (string)$beginning; 
        $ending = (string)$ending; 

        $id = $ending . $beginning; 

        return $id; 

    }



	public function getNumber(){

		return $this->phone['number']; 
		

	}



}
