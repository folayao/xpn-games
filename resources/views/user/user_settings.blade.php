@extends('layouts.header')
@section('title', "User Settings")



    

@section('content')
<link rel="stylesheet" href="{{ asset('css/user_settings.css') }}">
    <div class="container user_settings_container">
        <div class="leftbox">
        <nav class="user_settings">
            <a href="#" onclick="tabs(0)" class="tab active">
                <img src="{{ asset('icons/user_icons/user_settings.png') }}" alt="">
            </a>
            <a href="#" onclick="tabs(1)" class="tab">
                <img src="{{ asset('icons/user_icons/credit_card.png') }}" alt="">
            </a>  
            <a href="#" onclick="tabs(2)" class="tab">
                <img src="{{ asset('icons/user_icons/wish_list.png') }}" alt="">
            </a>
            </nav>  
        </div>
        <div class="rightbox">
            <div class="profile tabShow">
                <h1>Personal info</h1>
                <h2>Full Name</h2>
                <p>{{auth()->user()->name}}</p>
                <h2>User Name</h2>
                <p>{{auth()->user()->username}}</p>
                <h2>Email</h2>
                <p>{{auth()->user()->email}}</p>
            </div>
            <div class="payment tabShow">
            <h1>Payment info</h1>
                <h2>Card number</h2>
                <p>El numerito de la tarjeta</p>
                <h2>Type of card</h2>
                <p>El tipito de la tarjeta</p>
                <h2>Credit</h2>
                <p>El credito del usuario</p>
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
