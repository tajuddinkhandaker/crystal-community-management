<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

use Carbon\Carbon;

use Log;

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

        // NOTE: input date FORMAT -> "Tue May 31 2016 00:00:00 GMT+0900 (Korea Standard Time)"

        $input_text_expired_at = preg_replace("/\s(\(\w.+)/", "", $inputs['expired_at']);
        Log::info('[crystal-community-management][AnnouncementController][' . $input_text_expired_at . "] input date format modified.");

        try
        {
            Log::info('[crystal-community-management][AnnouncementController][' . Carbon::createFromFormat( "D M d Y g:i:s P" , $input_text_expired_at) . "] input date format.");
        }
        catch(InvalidArgumentException $x) 
        { 
            Log::error('[crystal-community-management][AnnouncementController][' . $x->getMessage() . "] input date format argument error.");
        }

    	$announcement = Announcement::create([
            'title' => $inputs['title'],
            'source_url' => $inputs['source_url'],
            'has_source_url' => $request->input('has_source_url') == "checked" ? 1 : 0,
            'expired_at' => Carbon::createFromFormat( "D M d Y g:i:s P" , $input_text_expired_at)->toDateTimeString()
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
