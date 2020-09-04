@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <br>
                <h2 class="content"><b> Lista de comentarios <br></h2> </b>
                <div class="row">
                    <div class="col-sm">
                        <ul id="errors">
                            @if ($data["comments"]->isEmpty())
                            <div class="text">
                                (No hay comentarios) <br> <br>
                                <a href="{{ route('comment.create') }}" class="btn btn-primary">Crear un comentario</a>
                            </div>

                            @else
                                @foreach($data["comments"] as $comment)
                                    <div class="row p-4 m-auto">
                                        @if ($loop->iteration <= 3)
                                            <div class="col-lg">
                                                <h3><b><a href="{{ route('comment.show', $comment->getId()) }}"> Comentario:
                                                    {{$comment->getId() }}</a></h3></b>
                                                <h5>{{ $comment->getDescription() }}</h5>
                                            </div>
                                        @else
                                            <div class="col-lg">
                                                <h3><a href="{{ route('comment.show', $comment->getId()) }}"> Comentario:
                                                    {{$comment->getId() }}</a></h3>
                                                <h5>{{ $comment->getDescription() }}</h5>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
