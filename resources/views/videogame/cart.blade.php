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
                            <b>{{__('messages.videogame.name')}}: {{ $videogame->getTitle() }}</b> <br>
                            <b>{{__('messages.videogame.price')}}: {{ $videogame->getPrice() }}</b><br>
                            <b>{{__('messages.cart.quantity')}}: {{ Session::get('videogames')[$videogame->getId()] }}</b><br>
                        </div>
                        
                    </div>
                    @endforeach
                    <p><b>total Price : {{$data['total_price']}}</b></p>
                    <br /><br />

                    <form action="{{ route('order.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $data['user_id']}}" />
                        <input type="hidden" name="total" id="total" value="{{ $data['total_price']}}" />
                        <button class="btn btn-primary" type="submit">{{__('messages.cart.buy')}}</button>
                    </form>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
