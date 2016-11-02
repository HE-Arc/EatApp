<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function displayMain()
    {
        $titre = 'Liste personnelle';
        return view('main.index', compact('titre'));
    }
}
