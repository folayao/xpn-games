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
            {{-- <div class="comments-area">
                <hr />
                <h4>Display Comments</h4> --}}
                <hr />
                <ul class="list-unstyled list-inline">
                    <li>
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#view-comments"
                            aria-expanded="false" aria-controls="view-comments">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                            View Comments
                        </button>
                    </li>
                </ul>
                <div id="view-comments">
                    <div class="card card-body">

                        {{-- @include('comment.show', ['comments' => $data['videogame']->comments()]) --}}
                        @include('comment.show', ['comments' => $data['comments'], 'videogame_id' => $data['videogame']->getId()])

                        {{-- @include('comment.show', ['comments' => $data->comments, 'videogame_id' => $data->id]) --}}

                        <hr />

                        @guest
                            <small>Debes iniciar sesión para comentar</small>
                        @else

                            <h4>Add comment</h4>
                            <form method="POST" action="{{ route('comment.save') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="description"></textarea>
                                    {{-- <input type="hidden" name="videogame_id" value="{{ 'videogame_id' => $videogame->id }}" /> --}}
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
