<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function contact() {
        $data = [];

        $data['name'] = "Alex";
        $data['lastname'] = "Serex";

        return view('pages.contact', $data);
    }

    public function about() {
        $data = [];

        return view('pages.about', $data);
    }
}
