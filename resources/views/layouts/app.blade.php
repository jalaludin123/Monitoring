<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm position-sticky top-0 topbar">
            <div class="container">
                <div class="d-flex">
                    <img src="{{ asset('image/logo/' . $appSetting->logo) }}" alt="" width="50px"
                        height="50px">
                    <a class="navbar-brand text-uppercase fw-bold" href="{{ url('/') }}"
                        style="line-height: 38px;">
                        {{ $appSetting->name_website }}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" id="offcanvasNavbar" tabindex="-1"
                    aria-labelledby="offcanvasNavbarLabel">
                    <!-- Left Side Of Navbar -->
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <div class="offcanvas-body">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item me-2 mx-2">
                                <a class="nav-link text-uppercase fw-bold"
                                    href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            <div class="hr"></div>
                            <li class="nav-item mx-2 me-2">
                                <a class="nav-link text-uppercase fw-bold"
                                    href="{{ route('login') }}">{{ __('Statistik') }}</a>
                            </li>
                            <div class="hr"></div>
                            <li class="nav-item mx-2 me-2">
                                <a class="nav-link text-uppercase fw-bold"
                                    href="{{ url('informasi') }}">{{ __('Informasi') }}</a>
                            </li>
                            <div class="hr"></div>
                            <li class="nav-item mx-2 me-2">
                                <a class="nav-link text-uppercase fw-bold" href="#">{{ __('Kontak') }}</a>
                            </li>
                            <div class="hr"></div>
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item mx-2">
                                        <a class="nav-link text-uppercase fw-bold"
                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main style="background: rgb(199, 199, 199)">
            @yield('content')
        </main>
    </div>

    {{-- Script --}}
    <script src="{{ asset('asset/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
