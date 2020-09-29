<!doctype html>
<link href="{{ asset(mix('css/principalPage.css')) }}" rel="stylesheet">
<link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
<!-- <link rel="stylesheet" href={{ asset('css/showVideogame.css') }}> -->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','XPN-Games')</title>
    <!-- css -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    @yield('home_css')
    @yield('css_role_page')
    @yield('video_game_show_css')
    @yield('user_settings_css')
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark shadow-sm sticky-top mb-1" >
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
                                <a href="{{ route('videogame.list') }}" class="nav-link">
                                    Games
                                </a>
                            </li>
                            @can('isAdmin')
                            <li class="nav-item">
                                <a href="{{ url('/roles') }}" class="nav-link">
                                    Roles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link">
                                    Users
                                </a>
                            </li>
                            @endcan
                    </ul>
                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto"><li class="nav-item dropdown">
                    <li>
                        <form class="form-inline my-2 my-lg-0 " id="navbar-search">
                            <input class="form-control mr-2"  type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success " type="submit">Search</button>
                        </form>
                    </li>
                    <li class=" dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                @auth
                                {{ Auth::user()->name }} {{ Auth::user()->roles->isNotEmpty() ? Auth::user()->roles->first()->name : "" }}
                                @endauth
                                @guest
                                <img src="{{ asset('icons/user_icons/guest2.png') }}" class="show-icon" height = "40" width ="40">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mega-menu">
                               
                                    <a href="{{ route('login') }}" class="dropdown-item">
                                        {{ __('Login') }}
                                    </a>
                                    <a href="{{ route('register') }}" class="dropdown-item">
                                    {{ __('Register') }}
                                    </a>
                                @else
                                <img src="{{ asset('icons/user_icons/user.png') }}" class="show-icon"  height = "40" width ="40">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mega-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.settings', [ 'username' => auth()->user()->username]) }}"
                                       >
                                        {{ __('User Wishlist') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.wishList') }}"
                                       >
                                        {{ __('User Shopping Cart') }}
                                    </a>                        


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                                </div>
                    </li>

                    </ul>
                </div>
            <!-- </div> -->
        </nav>


    <div class="container" id="app">


        <div class="row" id="main">
            @yield('content')
            
            
        </div>
        <footer class="row">
            @include('layouts.footer')
        </footer>
    </div>
<!-- Footer -->

<!-- Footer -->
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.js') }}" ></script>
    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    @yield('js_role_page') 
    @yield('js_user_page')
    @yield('home_music_js')
    @yield('scripts')
    @yield('user_settings_scripts')
</body>
<!-- Footer -->

</html>
