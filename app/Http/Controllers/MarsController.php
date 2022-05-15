<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class MarsController extends Controller
{
    public function index()
    {
        $page = request()->get('page') ?? 1;

        $earthDate = request()->get('earth_date') ?? Carbon::yesterday();
        $earthDate = Carbon::parse($earthDate)->format('Y-m-d');

        $allData = Http::get("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=$earthDate&api_key={$this->apiKey}")->json();

        $data = Http::get("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?page=$page&earth_date=$earthDate&api_key={$this->apiKey}")
            ->json();

        $totalPages = intval(ceil(count($allData['photos']) / 25));

        return view('mars.index', compact('data', 'totalPages'));
    }
}
