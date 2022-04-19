<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logoalfa2.png') }}" type="image/png" sizes="16x16">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('notyf/notyf.min.css') }}" rel="stylesheet" />
    <style>
        [x-cloak] { display: none !important; }
    </style>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>

    @livewireStyles
    @livewireScripts
    @stack('wire-loading')
</head>
<body>
    <div id="app">
        @livewire('layouts.sidebar')
        <main class="main-wrapper py-4">
            @include('layouts.partials.navbar')
            <section class="section">
                <div class="container-fluid">
                    @include('layouts.partials.header')
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
            </section>
        </main>
        <div class="d-flex justify-content-around">
            @include('layouts.partials.footer')
        </div>
    </div>
    <!-- ========= All Javascript files linkup ======== -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('notyf/notyf.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('feather-icons/dist/feather.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src= "{{ asset('assets/js/apexcharts.min.js') }}" ></script>
    <script src= "{{ asset('assets/js/dynamic-pie-chart.js') }}" ></script>
    <script src= "{{ asset('assets/js/fullcalendar.js') }}" ></script>
    <script src= "{{ asset('assets/js/jsvectormap.min.js') }}" ></script>
    <script src= "{{ asset('assets/js/world-merc.js') }}" ></script>
    <script src= "{{ asset('assets/js/polyfill.js') }}" ></script> --}}
    <script src= "{{ asset('assets/js/moment.min.js') }}" ></script>
    <script src= "{{ asset('assets/js/main.js') }}" ></script>
</body>
</html>
