@extends('layouts.header')

@section('content')


<div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <ul id="errors">
                    @foreach($data["videogames"] as $videogame)
                    <li>Nombre: {{ $videogame->getTitle() }} - Precio: {{ $videogame->getPrice() }}
                        - Cantidad: {{ Session::get('videogames')[$videogame->getId()] }}</li>
                    @endforeach
                    <br /><br />
                    Total: (precio_total)
                    <form action="{{ route('order.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $data['user_id']}}" />
                        <button type="submit">Buy</button>
                    </form>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
