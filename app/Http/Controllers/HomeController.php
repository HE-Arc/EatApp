<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $titre = 'Home';
        return view('home', compact('titre'));
    }

    public function entry()
    {
        $titre = 'Welcome';
        return view('welcome', compact('titre'));
    }
}
