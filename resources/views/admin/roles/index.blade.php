@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col">
            <h2>this is a role list</h2>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id ="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th>Slug</th>
                        <th>Permissions</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th>Slug</th>
                        <th>Permissions</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td> {{$role['id']}}</td>
                            <td> {{$role['name']}}</td>
                            <td> {{$role['slug']}}</td>
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