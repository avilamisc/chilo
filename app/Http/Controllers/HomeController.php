<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $userHasRole = DB::table('role_user')->where('user_id', Auth::user()->id)
                          ->pluck('user_id');
        //dd($userHasRole->isEmpty());
        if ($userHasRole->isEmpty()) {
          return view('welcome');
        }

        if (Auth::user()->isRole('mesero')) {
          // return view('home');
          return redirect('/encuesta');
        }else{
            return view('home');
        }

    }
}
