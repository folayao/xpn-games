<!doctype html>
<link href="{{ asset(mix('css/principalPage.css')) }}" rel="stylesheet">
<link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
<link rel="stylesheet" href={{ asset('css/showVideogame.css') }}>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css_role_page')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #240644;">
            <!-- <div class="container"> -->
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" alt="" width="75" height= "75">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link"><img src="{{ asset('icons/games.png') }}" class="show-icon">
                                    Games
                                </a>
                            </li>
                            @can('isAdmin')
                            <li class="nav-item">
                                <a href="{{ url('/roles') }}" class="nav-link"><img src="{{ asset('icons/role.png') }}" class="show-icon">
                                    Roles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link"><img src="{{ asset('icons/users.png') }}" class="show-icon">
                                    Users
                                </a>
                            </li>
                            @endcan
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('item.cart') }}">Cart</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('item.removeCart') }}">Remove Cart</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @auth
                                {{ Auth::user()->name }} {{ Auth::user()->roles->isNotEmpty() ? Auth::user()->roles->first()->name : "" }}
                                @endauth
                                <img src="{{ asset('icons/user.png') }}" class="show-icon">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.wishList') }}"
                                       >
                                        {{ __('User Settings') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            <!-- </div> -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.js') }}" ></script>
    @yield('js_role_page') 
    @yield('js_user_page')
</body>
</html>

