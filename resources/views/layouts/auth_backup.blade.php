<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logoalfa2.png') }}" type="image/png" sizes="16x16">

    <!-- Scripts -->
    <script src="{{ asset('js/auth.js') }}" defer></script>

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
</head>
<body>
    <div id="app">
        <main class="py-3">
            @yield('content')
        </main>
    </div>
    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('assets/js/Chart.min.js') }}">
        <script src = "{{ asset('assets/js/apexcharts.min.js') }}" >
        <script src = "{{ asset('assets/js/dynamic-pie-chart.js') }}" >
        <script src = "{{ asset('assets/js/moment.min.js') }}" >
        <script src = "{{ asset('assets/js/fullcalendar.js') }}" >
        <script src = "{{ asset('assets/js/jsvectormap.min.js') }}" >
        <script src = "{{ asset('assets/js/world-merc.js') }}" >
        <script src = "{{ asset('assets/js/polyfill.js') }}" >
        <script src = "{{ asset('assets/js/main.js') }}" >
</body>
</html>
