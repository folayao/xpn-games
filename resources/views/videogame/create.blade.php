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
                    <form method="POST" action="{{ route('videogame.save') }}">
                        @csrf
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.title')}}" name="title"
                            value="{{ old('title') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.price')}}" name="price"
                            value="{{ old('price') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.category')}}" name="category"
                            value="{{ old('category') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.designer')}}" name="designer"
                            value="{{ old('designer') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.pg')}}" name="pg"
                            value="{{ old('pg') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.details')}}" name="details"
                            value="{{ old('detail') }}" /><br>
                        <input class="mt-2" type="text" placeholder="{{__('messages.admin.videogame.keyword')}}" name="keyword"
                            value="{{ old('keyword') }}" /><br>
                        <input type="file" name="productImage" />
                        <input class="mt-2 btn btn-success" type="submit" value="{{__('messages.submit')}}" />
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
