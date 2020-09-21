@extends('layouts.header')
@section('content')
@section('home_css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home-img">
                <img class="home-image" src="{{ asset('images/yoshi.png') }}" alt="">
                </div>
                
            </div>
            <div class="col mt-5">
                <h1>
                    Best Games In Town!!
                </h1>
                <div class="publish_text">
                    Welcome to XPN-Games where your dreams come true. Come by, purchase a game, whatch a gameplay. Or do wathever you want. Enjoy!!
                </div>
            </div>
        </div>
    </div>
</body>

@endsection