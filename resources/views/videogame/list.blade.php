@extends('layouts.header')
@section('content')
<link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <h4 class="card-header">Videojuegos Disponibles</h4>
    <div class="col-md-12 card-body products">
        <!-- {{-- <ul id="errors">
            @foreach ($data['videogames'] as $videogame)
                <li>({{ $videogame->getId() }}) {{ $videogame->getTitle() }} <br>
                    Price : {{ $videogame->getPrice() }}
                </li>
            @endforeach
        </ul> --}} -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    @guest
                    @else
                    <th>Show Details</th>
                    <th>Delete</th>
                    @endguest
                </tr>
            </thead>
            <tbody>
                @foreach ($data['videogames'] as $videogame)
                    <tr>
                        <td class="table-bold">{{ $videogame->getId() }}</td>
                        <td>{{ $videogame->getTitle() }}</td>
                        <td>${{ $videogame->getPrice() }}</td>
                        @guest
                        
                        @else
                        <td>
                        <!-- <button class ="btn info-btn"type="image" href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"> <img
                                    src="{{ asset('icons/icon.png') }}" class="show-icon"></button> -->
                        <a class="navbar-brand"
                                href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"><img
                                    src="{{ asset('icons/icon.png') }}" class="show-icon"></a></td>
                        {{-- EL DELETE DEBE SER SOLO PARA EL ADMIN --}}
                        <td><a class="navbar-brand"
                                href="{{ route('videogame.delete', ['id' => $videogame->getId()]) }}"> <img
                                    src="{{ asset('icons/delete.png') }}" class="show-icon"> </a></td>
                        @endguest
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
