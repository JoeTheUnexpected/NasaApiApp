@extends('layouts.app')

@section('title', 'NASA library')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Results on "{{ $q }}"</h2>

        <div class="relative max-w-xs inline-block">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="fill-current text-gray-500 w-5 h-5" viewBox="0 0 30 30">
                    <path d="M13 3C7.489 3 3 7.489 3 13s4.489 10 10 10a9.947 9.947 0 0 0 6.322-2.264l5.971 5.971a1 1 0 1 0 1.414-1.414l-5.97-5.97A9.947 9.947 0 0 0 23 13c0-5.511-4.489-10-10-10zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8z"/>
                </svg>
            </div>
            <input id="search" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search">
        </div>
        <a href="#" type="button" id="show" class="bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white font-bold py-2 px-4 rounded ml-5">
          Show
        </a>

        <section class="overflow-hidden text-gray-700">
            <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                <div id="photos" class="flex flex-wrap -m-1 md:-m-2">
                    @forelse($data['collection']['items'] as $photo)
                        <div class="flex flex-wrap w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/5 mt-2 mb-8 cursor-pointer">
                            <span class="block text-white truncate">{{ $photo['data'][0]['title'] }}</span>
                            <div class="w-full p-1 md:p-2">
                                <a href="{{ route('ivl.show', $photo['data'][0]['nasa_id']) }}">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                                         src="{{ $photo['links'][0]['href'] ?? asset('images/no-image.png') }}">
                                </a>
                            </div>
                        </div>
                    @empty
                        <p>No results</p>
                    @endforelse
                </div>
            </div>
        </section>

        <x-pagination :totalPages="$totalPages" />
    </div>
@endsection

@push('scripts')
    <script>
      window.onload = () => {
        document.getElementById('search').addEventListener('blur', () => {
          let q = document.getElementById('search').value
          document.getElementById('show').href = `/ivl?q=${q}`
        })
      }
</script>
@endpush
