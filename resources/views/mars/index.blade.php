@extends('layouts.app')

@section('title', 'Mars photos')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Photos
            by {{ $data['photos'][0]['rover']['name'] }}. {{ $data['photos'][0]['earth_date'] }}</h2>

        <x-datepicker/>

        <a href="#" type="button" id="show"
           class="bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white font-bold py-2 px-4 rounded ml-5">
            Show
        </a>

        <section class="overflow-hidden text-gray-700">
            <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                <div class="flex flex-wrap -m-1 md:-m-2">
                    @forelse($data['photos'] as $photo)
                        <div class="flex flex-wrap w-1/5 mt-2 mb-2 cursor-pointer">
                            <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                     src="{{ $photo['img_src'] }}">
                            </div>
                        </div>
                    @empty
                        <p>No images</p>
                    @endforelse
                </div>
            </div>
        </section>

        <x-pagination :totalPages="$totalPages"/>
    </div>

    @push('scripts')
        <script src="{{ asset('js/flowbite.js') }}"></script>
        <script src="{{ asset('js/datepicker.js') }}"></script>

        <script>
          window.onload = () => {
            document.getElementsByClassName('datepicker-grid')[0].addEventListener('click', (e) => {
              setTimeout(() => {
                let date = document.getElementById('datepicker').value;
                console.log(date)
                document.getElementById('show').href = `/mars?earth_date=${date}`
              }, 0)
            })
          }
        </script>
    @endpush
@endsection
