@extends('layouts.header')

@section('content')
    <section class="card-product">
        <div class="container">
            <div class="card">
                <div class="card-body">
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
