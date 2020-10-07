@extends('layouts.header')
@section('title', "Video Game List")
@section('content')

<link href="{{ asset('css/list.css') }}" rel="stylesheet">
<div class="container">
    <div class="row addgame">
        @can('isAdmin')
        <div class="col-md-6 float-right mb-3">
            <a href="/videogames/create"><img height="40" width="auto" src="{{ asset('icons/game_icons/create.png') }}"
                class="show-icon"> {{__('messages.admin.videogame.add')}}
            </a>
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
                    <span class="product-trend-label">{{__('messages.new')}}</span>
                    <ul class="social">
                        <li><a href="" data-toggle="tooltip" data-placement="right" title="{{__('messages.cart.add')}}">
                            <img class="game_options" src="{{ asset('icons/game_icons/cart.png') }}" width="40" height='40'></a>
                        </li>
                        <li><a href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"
                                data-tip="Show me more" data-toggle="tooltip" data-placement="right"
                                title="{{__('messages.videogame.info')}}"><img class="game_options" src="{{ asset('icons/game_icons/info.png') }}"
                                    width="40" height='40'></a>
                        </li>
                        <li><a href="" data-tip="Wishlist" data-toggle="tooltip" data-placement="right"
                                title="{{__('messages.wishlist.add')}}"><img class="game_options" src="{{ asset('icons/game_icons/wishlist.png') }}"
                                    width="40" height='40'></a>
                        </li>
                        @can('isAdmin')
                        <li><a href="" data-toggle="tooltip" data-placement="right" title="Delete"><img
                                    class="game_options" src="{{ asset('icons/admin_icons/delete.png') }}"></a></li>
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
