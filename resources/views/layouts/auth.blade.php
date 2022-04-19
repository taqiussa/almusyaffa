<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logoalfa.png') }}" type="image/jpg" sizes="16x16">
    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('fontawesome/js/fontawesome.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('feather-icons/dist/feather.min.js') }}"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('auth-style/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{ asset('auth-style/assets/mp4/bg.mp4') }}" type="video/mp4" />
    </video>
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <a class="btn m-3" href="#!"><img src="{{ asset('images/logoalfa.png') }}"
                    class="img img-thumbnail rounded-circle w-25" alt="Logo Al Musyaffa"></a>
                <h1 class="fst-italic lh-1 mb-4">SMP Al Musyaffa</h1>
                <p class="mb-5">Mencetak generasi yang ahli Al Qur’an, berakhlaq, serta unggul dalam skill dan prestasi</p>
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <div class="social-icons">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn m-3" href="#!"><img src="{{ asset('images/logoalfa.png') }}"
                    class="img img-thumbnail rounded-circle" alt=""></a>
            <a class="btn btn-primary m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-danger m-3" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <!-- Core theme JS-->
    <script src="{{ asset('auth-style/js/scripts.js') }}"></script>
</body>

</html>
