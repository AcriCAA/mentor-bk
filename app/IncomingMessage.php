<?php

namespace App;


// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use App\Notifications\IncomingTextMessage;

use Illuminate\Database\Eloquent\Model;


//For encryption
use App\Http\Traits\Encryptable; 



class IncomingMessage extends Model
{

    use Encryptable;

    protected $encryptable = [
        'number', 
        'title'
        
    ];   

	protected $incoming_number; 
    protected $title; 
    protected $body; 
    protected $outgoingMedia;
    protected $outgoingCity; 
    protected $outgoingZip;
    protected $channel; 
    protected $number_id; 


    protected $guarded = []; 

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

   
}
