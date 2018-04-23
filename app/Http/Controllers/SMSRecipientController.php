<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SMSRecipient;

use App\Http\Controllers\HelperController;

//For Encrypts
use App\Http\Traits\Encryptable; 
use Illuminate\Support\Facades\Crypt;

class SMSRecipientController extends Controller
{
    //

     use Encryptable;

    protected $encryptable = [
        'number'
    ];

	public function __construct () {

		$this->middleware('auth');
    	// ->except(['index', 'show']); 

	}


	public function index()
	{

    	// latest()->get() orders them in descending order
		$sms_recipients = SMSRecipient::latest()->get();

		return view('sms_recipients.index', compact('sms_recipients')); 
	}


	public function show(SMSRecipient $sms_recipient){ 

		return view('sms_recipients.show', compact('sms_recipient'));

	}

	public function create(){ 

		return view('sms_recipients.register');

	}

	function cleanChannelName($string) {
    //Lower case everything
	    $string = strtolower($string); 
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    $string = "#" . $string; 


	    return $string;
}

	

	public function store()

	{

		$this->validate(request(), [
//edit these to coressponding user fields
			'name' => 'required|max:20', 
			
			//must have at the front be a number and be 11 digits
			'number' => 'required|numeric|digits:10'
			

		]);



	
	$request_no = request('number');

	$request_no = '+1'.$request_no; 

	$request_name = request('name'); 

	$channel = $this->cleanChannelName($request_name); 

	

	// $number = new \App\Phone(['number' => $request_no]);
	

	// $this->addPhone(request['number']); 
	$recipient = new SMSRecipient(); 

	$recipient->smsname = $request_name; 
	$recipient->channel = $channel; 

	$recipient->save();
	$number_id = HelperController::createPhoneId($request_no); 
	$recipient->addPhone($request_no, $number_id); 



	return redirect('/home')->with([
		'sms_saved' => 	'SMS Recipient Saved'
	]);

	}
}
