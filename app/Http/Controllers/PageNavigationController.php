<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageNavigationController extends Controller
{
    //

    public function booking()
    {
	    return view('event-registration');
	}

	public function home()
	{	
		return view('home');
	}
}
