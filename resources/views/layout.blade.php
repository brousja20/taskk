{{-- <body>
    @auth
    <span>logged as <strong>{{auth()->user()->name}}</strong></span>
    <a href="/blogs/manage">my blogs</a>
    <form style="display: inline" action="/logout" method="post">
        @csrf
        <button type="submit" style="background-color: red;">
            logout
        </button>
    </form>

    @else
    <a href="/register">register</a>
    <a href="/login">login</a>
    @endauth

    <a href="/blogs/create">Add blog</a>

    @yield('content')
</body>
</html> --}}

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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.jsx'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-primary" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Project') }} --}}
                    Project name
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        {{-- @auth
                        <span>logged as <strong>{{auth()->user()->name}}</strong></span>
                        <form style="display: inline" action="/logout" method="post">
                            @csrf
                            <button type="submit" style="background-color: red;">
                                logout
                            </button>
                        </form>

                        @else
                        <a href="/register">register</a>
                        <a href="/login">login</a>
                        @endauth --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li>
                            <a class="nav-link" href="/blogs/create">Add blog</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/blogs/manage">My blogs</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mx-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
