@extends('layouts.header')
@section('title', "Video Game List")
@section('content')

<link href="{{ asset('css/list.css') }}" rel="stylesheet">
<div class="container">
    <div class="row addgame">
    @can('isAdmin')
<div class="col-md-2 float-right"><a href="/videogames/create"><img src="{{ asset('icons/addgame.png') }}" class="show-icon">  Add Game</a>
</div>
@endcan
    </div>
</div>

<div class="container">
    <div class="row mr-5 ml-5">
    @foreach ($videogames as $videogame)
        <div class="col-md-4 col-sm-6 ">
            <div class="product-grid">
                <div class="product-image">
                    <a href="">
                        <img src="{{ asset('images/fifa.jpg') }}" alt="Card image cap" width="200" height='200'>
                    </a>
                    <span class="product-trend-label">NEW</span>
                    <ul class="social">
                        <li><a href="" data-toggle="tooltip" data-placement="right"title="Add to cart"><img class="game_options" src="{{ asset('icons/game_icons/cart.png') }}" width="40" height='40'></a></li>
                        <li><a href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}" data-tip="Show me more" data-toggle="tooltip" data-placement="right"title="Show more info"><img class="game_options" src="{{ asset('icons/game_icons/info.png') }}" width="40" height='40'></a></li>
                        <li><a href="" data-tip="Wishlist" data-toggle="tooltip" data-placement="right"title="Add to wishlist"><img class="game_options" src="{{ asset('icons/game_icons/wishlist.png') }}" width="40" height='40'></a></li>
                        @can('isAdmin')
                        <li><a href=""data-toggle="tooltip" data-placement="right" title="delete"><img class="game_options" src="{{ asset('icons/deletee.png') }}"></a></li>
                        @endcan
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title">
                        <a href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}">
                            {{$videogame->getTitle()}}
                        </a>
                    </h3>
                    <div class="price"> $ {{$videogame->getPrice()}}</div>
                </div>
            </div>
        </div>
    @endforeach
    
    </div>
</div>
{{$videogames->links()}}





@endsection
@section('scripts')
<script>
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
