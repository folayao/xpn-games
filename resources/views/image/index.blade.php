@extends('layouts.header')

@section("title", "Image Storage - DI")

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('messages.admin.videogame.uploadImage') }}</div>
                <div class="card-body">
                    <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('messages.image') }}:</label>
                            <input type="file" name="profile_image" />
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                    </form>
                    <img src="{{ URL::asset('storage/test.png') }}" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
