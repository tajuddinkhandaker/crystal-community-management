<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

class AnnouncementController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function publishAnnouncement()
    {
        return view('forms.announcement-submit-form');
    }

    public function publish(Request $request)
    {
    	$announcement = Announcement::create($request->only('title', 'source_url'));
    	if($announcement)
    	{
    		flash()->success('You announcement is publish to home');
    	}
    	else
    	{
    		flash()->error('Something went wrong to publish');
    	}
    	return redirect('/home');
    }
}
