@extends('layouts.header')

@section('content')

<link rel="stylesheet" href="{{ asset('css/videoGameShow.css') }}">
<!-- Css de esta pagina -->
@include('util.message')
<div class="row row-auto single-videogame">
    <div class="col col-auto col-videogame">
        <img src="{{ $data['videogame']->getImage() }}">
    </div>
    <div class="col col-auto col-videogame">
        <small>{{$data['videogame']->getCategory()}} Game</small>
        <h1>{{ $data['videogame']->getTitle() }}</h1>
        <h4>${{ $data['videogame']->getPrice() }}</h4>
        @guest
            <div class="whiteSpace"></div>
        @else
            <form action="{{ route('item.addToCart',['id'=> $data['videogame']->getId()]) }}" method="POST">
                @csrf
                <input type="number" name="quantity" value="1" min="0">
                <button class="btn btn-videogame" type="submit">{{__('messages.cart.add')}}</button>
                <button type="button" class="btn btn-wishlist" id="create_wish" data-toggle="modal"
                    data-target="#wishListModal">
                    {{__('messages.wishlist.add')}}
                </button>
            </form>
        @endguest
        <h3 data-wrap="wrap[">{{__('messages.videogame.details')}}</h3>
        <p class="details">{{ $data['videogame']->getDetails() }}</p>
    </div>
</div>

<div class="view-comments">
    <div class="card card-body">
        @include('comment.show', ['comments' => $data['videogame']->comments, 'video_game_id' =>
        $data['videogame']->getId()])
        @guest
            <small class="initSession">{{__('messages.comment.loginRequired')}}</small>
        @else
            <h4 class="add-comments">{{__('messages.comment.add')}}</h4>
            <form method="POST" action="{{ route('comment.save') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="description"></textarea>
                    <input type="hidden" name="video_game_id" id="video_game_id" value="{{ $data['videogame']->getId() }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="{{__('messages.comment.create')}}" />
                </div>
            </form>
        @endguest
    </div>
</div>

<!-- pop up modal para elegir wishlist o en caso de no tenerla, crearla -->
<div class="modal fade" id="wishListModal" tabindex="-1" role="dialog" aria-labelledby="wishListModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title  w-100 font-weight-bold" id="wishListModalLabel">{{__('messages.wishlist.add')}}
                </h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" id="closeIcon"><b>&times;</b></span>
                </button>
            </div>
            @guest
            @else
            @if(auth()->user()->wishlists->first() == null)
            <form method="POST" action="{{ route('wishList.store') }}">
                @csrf
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col">
                            <input type="text" id="wish_list_name" name="wish_list_name"
                                placeholder="{{__('messages.wishlist.name')}}..." />
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="submit" id="create_wish_list" class="btn"
                                    value="{{__('messages.wishlist.create')}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @else
            @foreach(auth()->user()->wishlists as $wishlist)
            <form method="POST" action="{{ route('wishlist.addToWish_list', ['id' => $wishlist->getId()]) }}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="videogame" value="{{$data['videogame'] -> getId()}}">
                            <div class="form-group">
                                <input type="submit" id="create_wish_list" class="btn btn-success"
                                    value="{{__('messages.wishlist.add')}}: {{$wishlist->getName()}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
            @endif
            @endguest
            <div class="modal-footer">
                <button type="button" id="close_button" class="btn"
                    data-dismiss="modal"><b>{{__('messages.close')}}</b></button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="carousel-slide">
        @include('video.index' , ['videos' => $data['videos']])
</div>

<script>
    details.style.display = "none";
</script>
@endsection
