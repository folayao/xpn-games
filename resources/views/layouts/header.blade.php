<!doctype html>
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
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ asset('css/table.css') }}" type="text/css"> -->

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm sticky-top mb-1" style ="background-color: black">
            <!-- <div class="container"> -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" alt="" width="75" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ url('/videogames') }}" class="nav-link">
                            {{__('messages.videogames')}}
                        </a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto">


                    @php $locale = session()->get('locale'); @endphp
                        <li class=" dropdown mega-menu">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Language <span class="caret"></span>
                            </a>
                            {{-- @switch($locale)
                                @case('es')
                                <img src="{{asset('images/es.png')}}" width="30px" height="20x"> Spanish
                                @break
                                @default
                                <img src="{{asset('images/us.png')}}" width="30px" height="20x"> English
                            @endswitch --}}
                            <div class="dropdown-menu dropdown-menu-right mega-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/lang/en') }}"><img src="{{asset('images/us.png')}}" width="30px" height="20x"> English</a>
                                <a class="dropdown-item" href="{{ url('/lang/es') }}"><img src="{{asset('images/es.png')}}" width="30px" height="20x"> Spanish</a>
                            </div>
                        </li>


                    <li class="dropdown">
                    <li>
                    <input type="text" id="search" class="form-control" list="browsers" name="browser">
                    <datalist id="browsers"></datalist>
                    </li>
                    <li class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            @auth
                            {{ Auth::user()->name }}
                            {{ Auth::user()->roles->isNotEmpty() ? Auth::user()->roles->first()->name : "" }}
                            @endauth
                            @guest
                            <img src="{{ asset('icons/user_icons/guest2.png') }}" class="show-icon" height="40" width="40">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mega-menu">

                            <a href="{{ route('login') }}" class="dropdown-item">
                                {{ __('messages.login') }}
                            </a>
                            <a href="{{ route('register') }}" class="dropdown-item">
                                {{ __('messages.register') }}
                            </a>
                            @else
                            <img src="{{ asset('icons/user_icons/user.png') }}" class="show-icon" height="40" width="40">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mega-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('user.settings', [ 'username' => auth()->user()->username])  }}">
                                    {{ __('messages.wishlist.show') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('item.cart') }}">
                                    {{ __('messages.shoppingCart') }}
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

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>
    <script>
    </script>
    @yield('js_role_page')
    @yield('js_user_page')
    @yield('home_music_js')
    @yield('scripts')
    @yield('user_settings_scripts')
</body>
<!-- Footer -->

</html>
