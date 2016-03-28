<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

use Carbon\Carbon;

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
        $inputs = $request->only('title', 'source_url', 'expired_at');

        // dd(Carbon::parse($inputs['expired_at'])->toDateTimeString());
        // dd(strtotime($inputs['expired_at']));

    	$announcement = Announcement::create([
            'title' => $inputs['title'],
            'source_url' => $inputs['source_url'],
            'has_source_url' => $request->input('has_source_url') == "checked" ? 1 : 0,
            'expired_at' => strtotime($inputs['expired_at'])
        ]);
    	if($announcement)
    	{
            $message = 'You announcement is publish to home';
    		// flash()->success('You announcement is publish to home');
            return response()->json('message');
    	}
    	else
    	{
            $message = 'Something went wrong to publish!';
    		// flash()->error('Something went wrong to publish');
            return response()->json('message');
    	}
    }
}
