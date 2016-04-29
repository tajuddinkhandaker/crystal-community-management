<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

use Carbon\Carbon;

use Log;

class UserController extends Controller
{

    private $_topNewsCount = 6;
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home-guest');
    }    

    public function allAnnoucements()
    {
        $sorted = Announcement::all()->sortByDesc('created_at');
        $sorted_news = collect($sorted->values()->all())->take($this->_topNewsCount)->all();
        // $news = collect($sorted_news)->whereDate('expired_at', ">", Carbon::today()->toDateString());
        // $news = $sorted_news;
        $date = Carbon::today();
        $news = collect($sorted_news)->filter(function ($item) use ($date) {
            return (data_get($item, 'expired_at') > $date);
        });
        return response()->json(compact('news'));
    }
}
