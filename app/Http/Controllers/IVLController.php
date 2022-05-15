<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class IVLController extends Controller
{
    public function index()
    {
        $q = request()->get('q') ?? 'galaxy';
        $page = request()->get('page') ?? 1;

        $data = Http::get("https://images-api.nasa.gov/search?q=$q&page=$page")
            ->json();

        $totalPages = intval(ceil($data['collection']['metadata']['total_hits'] / (count($data['collection']['items']) ?: 1)));

        return view('ivl.index', compact('data', 'q', 'totalPages'));
    }

    public function show($nasaId)
    {
        $asset = Http::get("https://images-api.nasa.gov/asset/$nasaId")
            ->json();

        foreach ($asset['collection']['items'] as $item) {
            if (Str::endsWith($item['href'], 'metadata.json')) {
                $metadata = Http::get($item['href'])->json();
                break;
            }
        }

        if ($metadata['AVAIL:MediaType'] === 'image') {
            return view('ivl.show_image', compact('asset', 'metadata'));
        }

        if ($metadata['AVAIL:MediaType'] === 'audio') {
            $audioSrc = collect($asset['collection']['items'])->first(fn($item) => Str::endsWith($item['href'], '.mp3'))['href'];
            return view('ivl.show_audio', compact('asset', 'metadata', 'audioSrc'));
        }

        if ($metadata['AVAIL:MediaType'] === 'video') {
            $videoSrc = collect($asset['collection']['items'])->first(fn($item) => Str::endsWith($item['href'], '.mp4'))['href'];
            return view('ivl.show_video', compact('asset', 'metadata', 'videoSrc'));
        }
    }
}
