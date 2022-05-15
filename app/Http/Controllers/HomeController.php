<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data = Http::get("https://api.nasa.gov/planetary/apod?api_key={$this->apiKey}")
            ->json();

        return view('home.index', compact('data'));
    }
}
