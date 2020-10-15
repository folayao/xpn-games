@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}" type="text/css">


<div class="container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @foreach($data["videogames"] as $videogame)
        <tr>
            <td>

                <div class="cart-info">
                    <img src="{{ asset('images/fifa.jpg') }}" >
                    <div>
                        <p>{{ $videogame->getTitle() }}</p>
                        <small>
                       $ {{ $videogame->getPrice() }}
                        </small>
                        <br>
                        <a href="">{{__('messages.home.welcome')}}</a>
                    </div>
                </div>

            </td>
            <td><input type="number" value="{{ Session::get('videogames')[$videogame->getId()] }}"></td>
            <td> ${{ $videogame->getPrice() }}</td>
        </tr>
        @endforeach
    </table>
    <div class="total-price">
        <table>
            <tr>
                <td>{{__('messages.home.welcome')}}</td>
                <td>{{ $videogame->getPrice() }}</td>
            </tr>

            <tr>
                <td>{{__('messages.home.welcome')}}</td>
                <td>{{$data['total_price']}}</td>
            </tr>
            <tr>
                <td>
                <form action="{{ route('order.buy') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}" />
                            <input type="hidden" name="total" id="total" value="{{ $data['total_price']}}" />
                            <button class="btn button-buy" type="submit">{{__('messages.cart.buy')}}</button>
                 </form>
                </td>
            </tr>
        </table>

    </div>

</div>



<!-- <div class="row" style="margin-top:20px; margin-bottom:20px">
    <div class="col-lg-8 mx-auto">
        <div class="row p-5">
            <div class="col-md-12">
                <ul id="errors">
                    @foreach($data["videogames"] as $videogame)
                    <div class="card mt-3">
                        <div class="card-body">
                            <b>{{__('messages.videogame.name')}}: </b>{{ $videogame->getTitle() }} <br>
                            <b>{{__('messages.videogame.price')}}: </b>{{ $videogame->getPrice() }}<br>
                            <b>{{__('messages.cart.quantity')}}: </b>{{ Session::get('videogames')[$videogame->getId()] }}<br>
                        </div>
                    </div>
                    @endforeach
                    <p><b>{{__('messages.cart.totalPrice')}}: {{$data['total_price']}}</b></p>
                    <br /><br />


                </ul>
            </div>
        </div>

    </div>
</div> -->

@endsection
