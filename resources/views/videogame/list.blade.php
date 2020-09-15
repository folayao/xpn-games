@extends('layouts.header')
@section('content')
<link href="{{ asset('css/list.css') }}" rel="stylesheet">


    <div class="col-md-12 card-body products">
    <div class="card-header">
Videojuegos Disponibles
<div class="col-md-2 float-right"><a href="/videogames/create"><img src="{{ asset('icons/addgame.png') }}" class="show-icon">  Add Game</a></div></div>
        <table class="table table-striped" id ="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    
                   
                    <th>Show Details</th>
                    @can('isAdmin')
                    <th>Delete</th>
                    @endcan
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data['videogames'] as $videogame)
                    <tr>
                        <td class="table-bold">{{ $videogame->getId() }}</td>
                        <td>{{ $videogame->getTitle() }}</td>
                        <td>${{ $videogame->getPrice() }}</td>
                        <td>
                        <!-- <button class ="btn info-btn"type="image" href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"> <img
                                    src="{{ asset('icons/icon.png') }}" class="show-icon"></button> -->
                        <a class="navbar-brand"
                                href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"><img
                                    src="{{ asset('icons/icon.png') }}" class="show-icon"></a></td>
                                    @can('isAdmin')
                        <td><a class="navbar-brand"
                                href="{{ route('videogame.delete', ['id' => $videogame->getId()]) }}"> <img
                                   src="{{ asset('icons/delete.png') }}" class="show-icon"> </a></td>
                                    @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
<script>
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
@endsection
