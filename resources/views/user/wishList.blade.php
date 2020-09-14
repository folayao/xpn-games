@extends('layouts.header')
@section('content')
<style>
  body{
    background: green;
  }
</style>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <div class="container justify-content-md-center">
 
  <div class="carousel-item active">
      <h1>Your WishList</h1>
    </div>
    @foreach($data['videogames'] as $videogame)
    <div class="carousel-item">
      <h1>{{$videogame -> getTitle()}}</h1>
    </div>
    @endforeach
    </div>
    


  </div>
  <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev" color= "black" >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@endsection