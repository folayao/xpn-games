@extends('layouts.header')
@section('content')


<!-- Css de esta pagina -->
@section('video_game_show_css')
        <link rel="stylesheet" href="{{ asset('css/video_game_show.css') }}">
@endsection

<!-- Inicio de la informacion del producto -->
<div class="container">
<section class="card-product">
    <div class="container">
        @include('util.message')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <h1 class="card-title ">{{ $data['videogame']->getTitle() }}
                        </div>
                        @guest
                        @else
                        <div class="col text-right col-sm-auto">
                                <button type="button" class="btn btn-primary" id="create_wish" data-toggle="modal" data-target="#wishListModal">
                                            Wishlist
                                </button>

                        </div>
                        @endif

                    </div>
                </div>
                </h4>

                <b class="card-label">Category: </b>{{ $data['videogame']->getCategory() }} <br />
                <b class="card-label">Price: $</b> {{ $data['videogame']->getPrice() }}<br />
                <b class="card-label">Designer: </b>{{ $data['videogame']->getDesigner() }} <br />
                <b class="card-label">Pegy: </b>{{ $data['videogame']->getPg() }} <br />
                <b class="card-label">Details: </b>{{ $data['videogame']->getDetails() }} <br />
                @guest 
                        @else

                <div>
                    <form action="{{ route('item.addToCart',['id'=> $data['videogame']->getId()]) }}" method="POST">


                        @csrf
                        <div class="form-row">
                            <div class="col-md-8">Qtt:
                                <input type="number" class="form-control" name="quantity" min="0" style="width: 80px;">
                            </div>
                            <div class="form-group col-md-8">
                                 <button type="submit" class="btn btn-outline-success">Add</button>
                            </div>`
                        </form>


            </div>
            @endguest
        </div>
        <hr />

        <!-- Seccion de comentarios -->
        <div id="view-comments">
                <hr />
                <div id="view-comments">
                    <div class="card card-body">
                        @include('comment.show', ['comments' => $data['comments'], 'video_game_id' =>
                        $data['videogame']->getId()])
                        <hr />

                        @guest
                            <small class="initSession">Debes iniciar sesión para comentar</small>
                        @else


                            </html>
                            <h4 class="add-comments">Write your comment</h4>
                            <form method="POST" action="{{ route('comment.save') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="description"></textarea>
                                    <input type="hidden" name="video_game_id" id="video_game_id"
                                        value="{{ $data['videogame']->getId() }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
 
    </section>
    </div>
    </div>

<!-- pop up modal para elegir wishlist o en caso de no tenerla, crearla -->
    <div class="modal fade" id="wishListModal" tabindex="-1" role="dialog" aria-labelledby="wishListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title  w-100 font-weight-bold" id="wishListModalLabel">Add to wishlist</h5>
                <button type="button" class="btn"  data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="closeIcon" ><b>&times;</b></span>
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
                                         <input type="text" id="wish_list_name" name="wish_list_name" placeholder="Wishlist name..."/>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="submit" id="create_wish_list"class="btn" value="Create a wishlist" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                </form>
                @else
                

                        @foreach(auth()->user()->wishlists as $wishlist)
                        <form method="POST" action="{{ route('wishlist.wishlistAdd', ['id' => $wishlist->getId()]) }}">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden"  name="videogame" value="{{$data['videogame'] -> getId()}}">
                                    <div class="form-group">
                                        <input type="submit" id="create_wish_list" class="btn btn-success" value="Add to your wishlist : {{$wishlist->getName()}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
</form>
                        
                        @endforeach
                        
                @endif
                @endguest
            <div class="modal-footer">
                <button type="button" id="close_button" class="btn" data-dismiss="modal"><b>Close</b></button>
            </div>
            </div>
        </div>
</div>
@endsection
