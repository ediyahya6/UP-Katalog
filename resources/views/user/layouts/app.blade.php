<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="{{ asset('user/all.min.css') }}" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "{{ asset('user/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <!-- custom css -->
    <link rel = "stylesheet" href = "{{ asset('user/css/main.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : ''}}" aria-current="page" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('cara-pemesanan') ? 'active' : ''}}" aria-current="page" href="#carapemesanan">Cara Pemesanan</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kategori') ? 'active' : ''}}" aria-current="page" href="#produk">Kategori</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : ''}}" aria-current="page" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('cara-pemesanan') ? 'active' : ''}}" aria-current="page" href="#carapemesanan">Cara Pemesanan</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kategori') ? 'active' : ''}}" aria-current="page" href="#produk">Kategori</a>
                        </li>
                    </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Dashboard Admin</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
            @yield('content')
    </div>




<!-- jquery -->
<script src = "{{ asset('user/js/jquery-3.6.0.js') }}"></script>
<!-- isotope js -->
<script src="{{ asset('user/isotope.pkgd.js') }}"></script>
<!-- bootstrap js -->
<script src = "{{ asset('user/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
<!-- custom js -->
<script src = "{{ asset('user/js/script.js') }}"></script>
</body>

</html>