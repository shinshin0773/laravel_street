<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen content">
            <div class="bg-color">
            @if(auth('admin')->user())
                @include('layouts.admin-navigation')
            @elseif(auth('artists')->user())
                @include('layouts.artist-navigation')
            @elseif(auth('users')->user())
                @include('layouts.user-navigation')
            @else
                @include('layouts.guest-navigation')
            @endif


            <!-- Page Heading -->
            <header style="background-color: rgb(0,0,0); border-top:1px groove rgb(0,128,128)">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        </div>
    </body>
</html>
