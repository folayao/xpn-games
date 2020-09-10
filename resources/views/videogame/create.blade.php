{{-- @extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">Create VideoGame</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('videogame.save') }}">
                            @csrf
                            <input class="mt-2" type="text" placeholder="Enter title" name="title"
                                value="{{ old('title') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter price" name="price"
                                value="{{ old('price') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter category" name="category"
                                value="{{ old('category') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter designer" name="designer"
                                value="{{ old('designer') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter pegy" name="pg"
                                value="{{ old('pg') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter detail" name="details"
                                value="{{ old('detail') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter keyword" name="keyword"
                                value="{{ old('keyword') }}" /><br>
                            <input class="mt-2 btn btn-success" type="submit" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection --}}


@extends('layouts.header')

@section('content')
    <section class="card-product">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    {{-- ¡OJO! -> CAMBIAR TODO ESTO CON LOS GETTERS DEL MODELO --}}
                    <h4 class="card-title">{{ $data['videogame']->getTitle() }}</h4>
                    <b class="card-label">Category: </b>{{ $data['videogame']->getCategory() }} <br />
                    <b class="card-label">Price: $</b> {{ $data['videogame']->getPrice() }}<br />
                    <b class="card-label">Designer: </b>{{ $data['videogame']->getDesigner() }} <br />
                    <b class="card-label">Pegy: </b>{{ $data['videogame']->getPg() }} <br />
                    <b class="card-label">Details: </b>{{ $data['videogame']->getDetails() }} <br />
                </div>
            </div>
            <div class="comments-area">
                {{-- @include('comment.show') --}}
                {{-- @include('comment.show', ['comments' => $data->comments, 'videogame_id' => $data->id]) --}}
                <hr />
                <h4>Display Comments</h4>

                @include('comment.show', ['comments' => $videogame->comments, 'videogame_id' => $videogame->id])

                <hr />
                <h4>Add comment</h4>
                <form method="POST" action="{{ route('comment.save') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="videogame_id" value="{{ $videogame->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
