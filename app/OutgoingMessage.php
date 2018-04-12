<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Encrypt Numbers
use App\Http\Traits\Encryptable; 

class OutgoingMessage extends Model
{
    

    use Encryptable;

    protected $encryptable = [
        'number'
        
    ]; 

     	protected $fillable = ['smsname','channel','number','message'];

     	protected $command;
        protected $text;
        protected $token; 
        protected $user; 
        protected $channel_id;
        protected $channel_name;
        protected $to; 
        protected $message; 

        protected $title;
}
