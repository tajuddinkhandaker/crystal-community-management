<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Announcement;

class UserController extends Controller
{
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
        $news = collect($sorted->values()->all())->take(6)->all();
        return response()->json(compact('news'));
    }
}
