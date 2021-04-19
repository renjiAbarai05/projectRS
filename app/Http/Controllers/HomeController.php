<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

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
        return view('homepage');
    }
    public function dashboard()
    {
        // $loginUser = Auth::id();
        Session::put('loginUser', Auth::id());

        return view('AdminPage.Dashboard.dashboard');
    }
}
