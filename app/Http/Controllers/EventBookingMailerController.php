<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;

class EventBookingMailerController extends Controller
{
    //
	// http://learninglaravel.net/learn-to-send-emails-using-gmail-and-sendgrid-in-laravel-5
	// https://myaccount.google.com/security#connectedapps
    public function sendMail(Request $request)
    {
		$data = $request->input(compact('email', 'phone', 'name'));
		$data['name'] = 'Pinki';
		$data['email'] = 'firewings1097@gmail.com';
		$sent = Mail::send('email-body', $data, function ($message) use ($data) {
	  	$message->subject('Blog Contact Form: '. $data['name'])
				->to('pink.tasha14@gmail.com')
	          	->replyTo($data['email']);
	    });

		if( ! $sent) dd("something wrong");
		dd("send");

    	return back()->withSuccess("Thank you for your message. It has been sent.");
    }
}
