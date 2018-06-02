<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    //
	
	public static function createPhoneId($incoming_number) {
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
}
