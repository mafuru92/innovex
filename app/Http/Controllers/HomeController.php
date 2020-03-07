<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if ((Auth::user()->Active) != 'Yes') {
            echo '<script>alert("Your Account Was not Activeted, Please Contact The supper Admin User to activate it")</script>';
            Auth::logout();
            return view('auth.login');
        }
        return view('home');
    }
}
