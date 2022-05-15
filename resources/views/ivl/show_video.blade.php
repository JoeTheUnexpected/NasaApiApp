@extends('layouts.app')

@section('title', $metadata['AVAIL:Title'])

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ $metadata['AVAIL:Title'] }}</h2>

        <video controls class="mt-4">
            <source src="{{ $videoSrc }}" type="{{ $metadata['File:MIMEType'] }}">
        </video>
        <p class="mt-2">Description: {!! $metadata['AVAIL:Description'] !!}</p>
    </div>
@endsection
