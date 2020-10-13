@extends('layouts.header')
@section("title", "Home")
@section('content')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">


<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="home-img">

                <img class="home-image" src="{{ asset('images/yoshi.png') }}" alt=""></div>       
            </div>
            <div class="col mt-5 mb-5">
            
                <h1>
                    {{__('messages.home.title')}}
                </h1>
                <div class="publish_text">
                    {{__('messages.home.welcome')}}
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-4 align-self-end">
                <button class="btn" onmouseover="mario.play()" onmouseleave="mario.pause(), mario.currentTime=0"> 
                <img src="{{ asset('images/nintendoLogo.png') }}" height='auto' alt="">
                </button>
                
            </div>
        </div>

</div>

</body>

@section("home_music_js")
<script>
var mario = new Audio();
mario.src = 'music/MarioTheme.mp3';
</script>
@endsection
@endsection
