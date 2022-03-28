<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'account.setup']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check if the users profile is complete,
        // if not display a message on the home page to prompt the user to go and complete their profile
        // if (auth()->user()->is_profile_complete == false) {

        //     session()->has('account_setup_step') ?: session(['account_setup_step' => 1]); 
        //     // dd(session());

        //     // Redirect the user to appropriate step page

        //     return view('dashboard/user/home');
        // }


        return view('dashboard/user/home');
    }
}
