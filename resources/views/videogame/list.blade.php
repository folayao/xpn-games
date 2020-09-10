@extends('layouts.header')
@section('content')
    <h4 class="card-header">Videojuegos Disponibles</h4>
    <div class="col-md-12 card-body products">
        {{-- <ul id="errors">
            @foreach ($data['videogames'] as $videogame)
                <li>({{ $videogame->getId() }}) {{ $videogame->getTitle() }} <br>
                    Price : {{ $videogame->getPrice() }}
                </li>
            @endforeach
        </ul> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Show Details</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['videogames'] as $videogame)
                    <tr>
                        <td class="table-bold">{{ $videogame->getId() }}</td>
                        <td>{{ $videogame->getTitle() }}</td>
                        <td>${{ $videogame->getPrice() }}</td>
                        <td><a class="navbar-brand"
                                href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"><img
                                    src="/icons/eye.svg" class="show-icon"></a></td>
                        {{-- EL DELETE DEBE SER SOLO PARA EL ADMIN --}}
                        <td><a class="navbar-brand"
                                href="{{ route('videogame.delete', ['id' => $videogame->getId()]) }}"> Delete </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
