@extends('layouts.header')

@section('content')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}" type="text/css">


<div class="container cart-page">
    <table>
        <tr>
            <th>{{ __('messages.cart.product') }}</th>
            <th>{{ __('messages.cart.quantity') }}</th>
            <th>{{ __('messages.cart.subtotal') }}</th>
        </tr>
        @foreach($data["videogames"] as $videogame)
        <tr>
            <td>
                <div class="cart-info">
                    <img src="{{ $videogame ->getImage()}}" >
                    <div>
                        <p>{{ $videogame->getTitle() }}</p>
                        <small>
                       $ {{ $videogame->getPrice() }}
                        </small>
                        <br>
                        {{$videogame->getDetails()}}
                    </div>
                </div>
            </td>
            <td>
                {{ Session::get('videogames')[$videogame->getId()] }}
            </td>
            <td> ${{ $videogame->getPrice() }}</td>
        </tr>
        @endforeach
    </table>
    <div class="total-price">
        <table>
            <tr>
                <td>{{__('messages.cart.totalPrice')}}</td>
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

@endsection
