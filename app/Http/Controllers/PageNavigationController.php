<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as PageNavigationRequest;

use App\Http\Requests;

class PageNavigationController extends Controller
{
    //
    protected $selectedContext = '{ "id": "home", "title": "HOME", "target": "crystal-image-slider", "pageTitle": "AIT | Home" }';

    public function booking()
    {
	    return view('event-registration');
	}

	public function home()
	{	
		return view('home-guest');
	}

	public function navigate(PageNavigationRequest $request)
	{
		$selectedContext = json_decode($this->selectedContext);
		$success = false;
		$message = 'Page failed to navigate. Current context is ' .  $selectedContext->title;
		if($request->ajax())
		{
			if(!$request->has('_selected_context'))
			{
				flash($message);
				return response()->json(compact('message', 'success'));
			}
			$this->selectedContext = $request->input('_selected_context');

			$success = true;
			$message = 'Page is navigated to ' .  $selectedContext->title;
			flash($message);
			return response()->json(compact('message', 'success'));
		}
		$success = true;
		$message = 'Page is navigated to ' .  $selectedContext->title;
		return response()->redirect('home')->with(compact('message', 'success'));
	}

	public function navigatedTo(PageNavigationRequest $request)
	{
		$selectedContext = json_decode($this->selectedContext);
		flash()->info('Your current context is ' . $selectedContext->{'title'});
		if($request->ajax())
		{
			return response()->json(compact('selectedContext'));
		}
		return response()->redirect('home')->with(compact('selectedContext'));
	}
}
