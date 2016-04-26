<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Artisan;

class DevController extends Controller
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

    public function migrate($key = null)
    {    	
	    if($key == "ait_su_tajuddin_khandaker_1097")
	    {
		    try
		    {
		      echo '<br>init migrate...';
		      Artisan::call('migrate:refresh');
		      echo '<br>done migrate';
		      
		      // echo '<br>init with Sentry tables migrations...';
		      // Artisan::call('migrate', [
		      //   '--package'=>'cartalyst/sentry'
		      //   ]);
		      // echo 'done with Sentry';
		      // echo '<br>init with app tables migrations...';
		      // Artisan::call('migrate', [
		      //   '--path'     => "app/database/migrations"
		      //   ]);
		      // echo '<br>done with app tables migrations';
		      // echo '<br>init with Sentry tables seader...';
		      // Artisan::call('db:seed');
		      // echo '<br>done with Sentry tables seader';
		    } 
		    catch (Exception $e) 
		    {
		      // Response::make($e->getMessage(), 500);
		      echo '<br>failed migrate: ' + $e->getMessage();
		    }
	  }
	  else
	  {
	    //abort(404);
		echo '<br>fail key';
	  }
    }
}
