<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        {{-- Header section --}}
        <div class="header-component">
            @include('frontend.includes.HeaderSection')
        </div>
        {{-- Main content section --}}
        <main class="side-main">
            @yield('content')
        </main>
        {{-- footer section --}}
        <div class="footer-wrapper" style="position:relative:top:-80px;">
            <section class="section call-to-action is-primary has-text-centered">
                @include('frontend.includes.FooterCallToActionSection') 
            </section>
            <section class="section newsletter">
                @include('frontend.includes.NewsLetterSection')    
            </section>
            <div class="footer-component">
                @include('frontend.includes.FooterSection') 
            </div>
        </div>
    </div>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
 @livewireScripts
</html>
