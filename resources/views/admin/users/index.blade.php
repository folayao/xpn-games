@extends('layouts.header')

@section('content')
<link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col">
            <h2>this is a user list</h2>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id ="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>Username</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{$user['name']}}</td>
                            <td> {{$user['email']}}</td>
                            <td> {{$user['username']}}</td>
                            <td>
                                Permissions
                            </td>
                            <td>
                                Tools....
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection