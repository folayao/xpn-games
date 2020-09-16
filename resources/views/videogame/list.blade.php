@extends('layouts.header')
@section('content')
<link href="{{ asset('css/list.css') }}" rel="stylesheet">


    <div class="col-md-12 card-body products">
    <div class="card-header">
Videojuegos Disponibles
@can('isAdmin')
<div class="col-md-2 float-right"><a href="/videogames/create"><img src="{{ asset('icons/addgame.png') }}" class="show-icon">  Add Game</a>
</div>
@endcan
</div>
        <table class="table table-striped table-bordered" id ="dataTable" width="100%" cellspacing="0">
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
            <tfoot>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>               
                    <th>Show Details</th>
                    @can('isAdmin')
                    <th>Delete</th>
                    @endcan
                    </tr>
                </tfoot>
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
                        <td> <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid = "{{$videogame['id']}}"><img src="{{ asset('icons/trash.png') }}" class="show-icon"></i></a>
                                    @endcan
                    </tr>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "delete" If you realy want to delete this role.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                                            <a class="btn btn-primary" href="{{ route('videogame.delete', ['id' => $videogame->getId()]) }}">Delete</a>
                                        </div>
                                    </div>
                        </div>
                    </div>
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
