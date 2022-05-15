@extends('layouts.app')

@section('title', $metadata['AVAIL:Title'])

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ $metadata['AVAIL:Title'] }}</h2>

        <img class="block mt-4" src="{{ $asset['collection']['items'][0]['href'] }}" alt="img">
        <p class="mt-4">Created at {{ Illuminate\Support\Carbon::parse($metadata['AVAIL:DateCreated'])->format('d M Y') }} by {{ ($metadata['AVAIL:Photographer']) ?: $metadata['AVAIL:SecondaryCreator'] }}</p>
        <p class="mt-2">Description: {!! $metadata['AVAIL:Description'] !!}</p>
    </div>
@endsection
