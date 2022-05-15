@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ $data['title'] }}</h2>

        <div class="mt-8">
            <img src="{{ $data['hdurl'] }}" alt="{{ $data['title'] }}">

            <p class="mt-8">{!! $data['explanation'] !!}</p>
        </div>
    </div>
@endsection