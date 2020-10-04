@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/wishList.css') }}" type="text/css">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="container justify-content-md-center">
            <div class="carousel-item active">
                <h1>{{__('messages.wishlist.show')}}</h1>
            </div>
            @foreach($data['videogames'] as $videogame)
                <div class="carousel-item">
                    <h1>{{$videogame -> getTitle()}}</h1>
                </div>
            @endforeach
        </div>
    </div>
    <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">{{__('messages.wishlist.previous')}}</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">{{__('messages.wishlist.next')}}</span>
    </a>
</div>
<br>
<br>
<br>
<br>
@foreach($data['videogames'] as $videogame)
<div class="card mt-3 mb-3">
    <div class="card-header">
        <h1>{{__('messages.videogame.name')}}:{{$videogame -> getTitle()}}</h1>
        <div class="card-body">
            <b>{{__('messages.videogame.price')}}: {{$videogame -> getPrice()}}</b><br>
            <b>{{__('messages.videogame.pg')}}:{{$videogame -> getPg()}}</b><br>
            <b>{{__('messages.videogame.details')}}: {{$videogame -> getDetails()}}</b><br>
        </div>
    </div>
</div>
@endforeach

@endsection
