@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/wishList.css') }}" type="text/css">

<div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <ul id="errors">
                    @foreach($data["videogames"] as $videogame)
                    <div class="card mt-3">
                        <div class="card-body">
                            <b>Nombre: {{ $videogame->getTitle() }}</b> <br>
                            <b>Precio: {{ $videogame->getPrice() }}</b><br>
                            <b>Cantidad: {{ Session::get('videogames')[$videogame->getId()] }}</b><br>
                            
                        </div>

                    </div>
                    @endforeach
                    <br /><br />

                    <form action="{{ route('order.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $data['user_id']}}" />
                        <button class="btn btn-primary" type="submit">Buy</button>
                    </form>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
