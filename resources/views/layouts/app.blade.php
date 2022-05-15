<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('title')</title>
</head>
<body class="font-sans bg-gray-900 text-white pb-10">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="mt-3 md:ml-12 md:mt-0">
                    <a href="{{ route('mars') }}" class="hover:text-gray-300">Mars</a>
                </li>
                <li class="mt-3 md:ml-6 md:mt-0">
                    <a href="{{ route('ivl.index') }}" class="hover:text-gray-300">IVL</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

    @stack('scripts')
</body>
</html>
