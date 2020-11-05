@extends('layouts.header')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <form method="POST" action="{{ route('video.search') }}" enctype="multipart/form-inline">
                @csrf
            {{-- {!! Form::open(['route' => 'youtube.search', 'method' => 'POST', 'class' => 'form-inline']) !!} --}}
            <div class="form-group">
                <input class="mt-2" type="text" name="search"/><br>
                {{-- {!! form::label('search','Buscar')!!} --}}
                {{-- {!! form::text('search',null,['class' => 'form-control']) !!} --}}
                <button type="submit" class="btn btn-default">Buscar</button>
            </div>
            </form>
        </div>
        <div class="panel-body">
            <div class="row">
                @if(isset($videos))
                    @foreach($videos as $video)
                        <div class="col-sm-6 col-md-6">
                            <div class="thumbnail">
                                <!-- Mostramamos la fotos mediana del video -->
                                {{-- <img class="img-resp" src="{{$video->snippet->thumbnails->medium->url}}"> --}}
                                <img class="img-resp" src="https://i.ytimg.com/vi/QKpJQbxIU1E/mqdefault.jpg">
                                <div class="caption">
                                    <!-- Mostramamos el titulo del video -->
                                    {{-- <h3><a href="https://www.youtube.com/watch?v={{$video->id->videoId}}">
                                        {{$video->snippet->title}}</a></h3> --}}
                                    <h3><a href="https://www.youtube.com/watch?v=QKpJQbxIU1E">
                                        I BANNED My Best Friends In MINECRAFT SURVIVAL!</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
