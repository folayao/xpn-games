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
                    {{__('messages.home.title')}}
                </h1>
                <div class="publish_text">
                    {{__('messages.home.welcome')}}
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
