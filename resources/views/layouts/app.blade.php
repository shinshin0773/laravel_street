<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix="og:http://ogp.me/ns#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

        <!-- ページのプロパティ情報 -->
        <meta property="og:url" content="https://street-sing.com/">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Street">
        <meta property="og:description" content="「路上ライブは見つける時代から探す時代に・・・」をテーマにして開発しております。ユーザーはアーティストの開催情報、アーティストはユーザーに開催情報を共有することができます">
        <meta property="og:site_name" content="ホームページのコーディング ポートフォリオ">
        <meta property="og:image" content="public/images/toppage.png">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen" id="content">
            <div class="bg-color">
            @if(request()->is('admin*'))
                @include('layouts.admin-navigation')
            @elseif(request()->is('artist*'))
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
        {{-- GoogleMapAPICDNを読み込む --}}
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4TRSMH7b3P1XSqpMikp5mrVhHHPG_ok0&callback=initMap" async defer></script>
        <script>
            // let wh = window.innerHeight;
            // let elem = document.getElementById('content');

            // window.addEventListener("load", () => {
            //     let elem = document.getElementById("content");
            //     // let elem = document.getElementById("bg-color");
            //     let wh = window.innerHeight;
            //     elem.style.height = wh + "px";

            //     console.log(elem.style.height);
            // }, false);

            // window.addEventListener("resize", () => {
            //     let elem = document.getElementById("content");
            //     let wh = window.innerHeight;
            //     elem.style.height = wh + "px";
            // }, false);
        </script>
    </body>
</html>
