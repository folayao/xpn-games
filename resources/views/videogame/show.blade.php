@extends('layouts.header')

@section('content')
<section class="card-product">
    <div class="container">
        @include('util.message')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $data['videogame']->getTitle() }}</h4>
                <b class="card-label">Category: </b>{{ $data['videogame']->getCategory() }} <br />
                <b class="card-label">Price: $</b> {{ $data['videogame']->getPrice() }}<br />
                <b class="card-label">Designer: </b>{{ $data['videogame']->getDesigner() }} <br />
                <b class="card-label">Pegy: </b>{{ $data['videogame']->getPg() }} <br />
                <b class="card-label">Details: </b>{{ $data['videogame']->getDetails() }} <br />
                @guest 
                        @else
                <form method="POST" action="{{ route('wishList.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="videogame_id" id="videogame_id"
                            value="{{ $data['videogame']->getId() }}" />
                        <input type="hidden" name="user_id" id="user_id" value="{{ $data['user_id']}}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add To wishlist" />
                    </div>
                </form>
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
        <div id="view-comments">

                <hr />
                <div id="view-comments">
                    <div class="card card-body">
                        @include('comment.show', ['comments' => $data['comments'], 'videogame_id' =>
                        $data['videogame']->getId()])
                        <hr />

                        @guest
                            <small class="initSession">Debes iniciar sesión para comentar</small>
                        @else


                            </html>
                            <h4 class="add-comments">Add comment</h4>
                            <form method="POST" action="{{ route('comment.save') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="description"></textarea>
                                    <input type="hidden" name="videogame_id" id="videogame_id"
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
@endsection
