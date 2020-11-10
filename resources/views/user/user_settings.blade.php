@extends('layouts.header')
@section('title', "User Settings")
@section('content')
<link rel="stylesheet" href="{{ asset('css/user_settings.css') }}">
    <div class="container user_settings_container">
        <div class="leftbox">
        <nav class="user_settings">
            <a onclick="tabs(0)" class="tab active">
                <img src="{{ asset('icons/user_icons/user_settings.png') }}" alt="">
            </a>
            <a onclick="tabs(1)" class="tab">
                <img src="{{ asset('icons/user_icons/credit_card.png') }}" alt="">
            </a>
            <a onclick="tabs(2)" class="tab">
                <img src="{{ asset('icons/user_icons/wish_list.png') }}" alt="">
            </a>
            </nav>
        </div>
        <div class="rightbox">
            <div class="profile tabShow">
                <h1>{{__('messages.user.settings.info')}}</h1>
                <h2>{{__('messages.user.settings.name')}}</h2>
                <p>{{auth()->user()->name}}</p>
                <h2>{{__('messages.user.username')}}</h2>
                <p>{{auth()->user()->username}}</p>
                <h2>{{__('messages.user.email')}}</h2>
                <p>{{auth()->user()->email}}</p>
                <a href="{{ route('user.edit', ['id' => auth()->user()->id]) }}" class= "btn edit"> edit your attributes</a>
            </div>
            <div class="payment tabShow">
            <h1>{{__('messages.user.settings.payment_info')}}</h1>
                <h2>{{__('messages.user.settings.card')}}</h2>
                <p>
                    {{-- El numerito de la tarjeta --}}
                    <input type="text" id="card_number" name="card_number" placeholder="{{__('messages.user.settings.card')}}"/>
                </p>
                <h2>{{__('messages.user.settings.type_card')}}</h2>
                <p>
                    {{-- El tipito de la tarjeta --}}
                    <input type="text" id="card_type" name="card_type" placeholder="{{__('messages.user.settings.type_card')}}"/>
                </p>
                <h2>{{__('messages.user.settings.balance')}}</h2>
                <p>3443</p>
            </div>
            <div class="wishlist tabShow">
                @include('user.wish_list')
                @yield('wish_list')
            </div>
        </div>
    </div>

@endsection
@section('user_settings_scripts')
<script>
    $(".tab").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    })
</script>
<script>
    const tabBtn=
    document.querySelectorAll(".tab");
    const tab=
    document.querySelectorAll(".tabShow");

    function tabs(panelIndex) {
        tab.forEach(function(node){
            node.style.display = "none";
        });
        tab[panelIndex].style.display = "block";
    }
    tabs(0);
</script>
@endsection
