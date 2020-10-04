@extends('layouts.header')

@section('content')
@can('isAdmin')
<link href="{{ asset('css/list.css') }}" rel="stylesheet">
        <div class="card-header">
            <i class="fas fa-table"></i>
            {{__('messages.admin.roles.table')}}
            <div class="col-md-2 float-right"><a href="/roles/create"><img src="{{ asset('icons/addRole.png') }}" class="show-icon"></a>{{__('messages.admin.roles.create')}}</div>
        </div>
        <div class="card-body">
            <div class="col col-md-12 card-body products">
            <div class="table-responsive">
            <table class="table table-striped table-bordered mydatatable" style="width:100%">
                <thead>
                    <tr>
                        <th>{{__('messages.id')}}</th>
                        <th>@choice('messages.role', 2)</th>
                        <th>{{__('messages.admin.roles.slug')}}</th>
                        <th>{{__('messages.admin.roles.permissions')}}</th>
                        <th>{{__('messages.admin.roles.settings')}}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{__('messages.id')}}</th>
                        <th>@choice('messages.role', 2)</th>
                        <th>{{__('messages.admin.roles.slug')}}</th>
                        <th>{{__('messages.admin.roles.permissions')}}</th>
                        <th>{{__('messages.admin.roles.settings')}}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td> {{$role['id']}}</td>
                            <td> {{$role['name']}}</td>
                            <td> {{$role['slug']}}</td>
                            <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge badge-secondary">
                                    {{ $permission->name }}
                                </span>
                                @endforeach
                            </td>
                            <td>
                               <a href="/roles/{{ $role['id'] }}/edit"><img src="{{ asset('icons/edit.png') }}" class="show-icon"></i></a>
                               <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid = "{{$role['id']}}"><img src="{{ asset('icons/trash.png') }}" class="show-icon"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('messages.admin.roles.question')}}</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">{{__('messages.admin.roles.delete')}}</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('messages.cancel')}}</button>
                                        {{-- <input type="hidden" id="role_id" name="role_id" value=""> --}}
                                        <a class="btn btn-primary" href="{{ route('role.destroy', ['id' => $role->getId()]) }}">{{__('messages.delete')}}</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>

        </div>

@endcan
    <!-- delete Modal-->

@endsection
