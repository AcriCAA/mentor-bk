<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SMSRecipient;

class SMSRecipientController extends Controller
{
    //

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

	public function store()

	{

		$this->validate(request(), [
//edit these to coressponding user fields
			'smsname' => 'required|max:20', 
			'number' => 'required',
			'channel' => 'required|max:20'

		]);
		


		//Creates a new post and requests the array passed in and saves it to the db
		//IMPORTANT: BE EXPLICIT! only pass the fields you are comfortable submitted to the server
		
// edit these to corresponding user fields
	SMSRecipient::create(request(['smsname','number','channel']));
		
		/*

		^^^ that does the same as this:
		$post = new Post; 
		//Create a new post using the request data
		$post->name = request('title'); 
		$post->number = request('number'); 
		'chan'
		$post->save(); 
		// Save it to the database */

		// And then redirect to the homepage
		return redirect('/');

	}
}