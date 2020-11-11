@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{__('messages.admin.videogame.create')}}</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul id="errors">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('videogame.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.title')}}" name="title"
                            value="{{ old('title') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.price')}}" name="price"
                            value="{{ old('price') }}" /><br>
                        <div class="row ml-2 mt-1">
                        <select name="category">
                            <option value="RPG">RPG</option>
                            <option value="Action">Action</option>
                            <option value="FPS">FPS</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Sports">Sports</option>
                        </select>
                        </div>


                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.designer')}}" name="designer"
                            value="{{ old('designer') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.pg')}}" name="pg"
                            value="{{ old('pg') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.details')}}" name="details"
                            value="{{ old('detail') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.keyword')}}" name="keyword"
                            value="{{ old('keyword') }}" /><br>
                        <input class="mt-2 btn btn-success" type="file" name="gameImage" value="file" />

                        <select name="type" id="cars">
                            <option value="Local">Local</option>
                            <option value="S3">S3</option>
                        </select>
                        <input class="mt-2 btn btn-success" type="submit" value="{{__('messages.submit')}}" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
