<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function main()
    {
        $titre='Liste personnelle';
        return view('main.main', compact('titre'));
    }
}
