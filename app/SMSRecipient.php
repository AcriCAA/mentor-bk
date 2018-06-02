<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\HelperController;

class SMSRecipient extends Model
{
 
  protected $fillable = ['smsname', 'number','number_id','channel'];
 //    public function user()
	// {
	// 	return $this->belongsTo(User::class); 

	// }

    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    public function addPhone($number){

    	$number_id = HelperController::createPhoneId($number); 

    	$number = encrypt($number); 
		
		// this is the equivalent 
		$this->phone()->create(compact('number', 'number_id'));

		//of this

		  // Comment::create([
    //         'body' => request('body'), 
    //         'post_id' => this->id
    //     ]);

	}


	public function getNumber(){


		return decrypt($this->phone['number']);
		
		



	}


}
