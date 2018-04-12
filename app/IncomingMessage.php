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

    // use Encryptable;

    // protected $encryptable = [
    //     'number', 
    //     'title'
        
    // ];   

	protected $incoming_number; 
    protected $title; 
    protected $body; 
    protected $outgoingMedia;
    protected $outgoingCity; 
    protected $outgoingZip;
    protected $channel; 


    protected $guarded = []; 


   
}
