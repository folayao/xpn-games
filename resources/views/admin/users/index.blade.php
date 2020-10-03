@extends('layouts.header')

@section('content')
<link href="{{ asset('css/list.css') }}" rel="stylesheet">
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        User Table
        <div class="col-md-2 float-right"><a href="/users/create"><img src="{{ asset('icons/addRole.png') }}"
                    class="show-icon"></a> {{__('messages.admin.users.create')}}</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('messages.id')}}</th>
                        <th>{{__('messages.user.name')}}</th>
                        <th>{{__('messages.user.email')}}</th>
                        <th>{{__('messages.user.username')}}</th>
                        <th>@choice('messages.role', 1)</th>
                        <th>{{__('messages.admin.roles.permissions')}}</th>
                        <th>{{__('messages.admin.roles.settings')}}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{__('messages.id')}}</th>
                        <th>{{__('messages.user.name')}}</th>
                        <th>{{__('messages.user.email')}}</th>
                        <th>{{__('messages.user.username')}}</th>
                        <th>@choice('messages.role', 1)</th>
                        <th>{{__('messages.admin.roles.permissions')}}</th>
                        <th>{{__('messages.admin.roles.settings')}}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td> {{$user['id']}}</td>
                        <td> {{$user['name']}}</td>
                        <td> {{$user['email']}}</td>
                        <td> {{$user['username']}}</td>
                        <td>
                            @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $role)
                            <span class="badge badge-secondary">
                                {{ $role->name }}
                            </span>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($user->permissions->isNotEmpty())

                            @foreach ($user->permissions as $permission)
                            <span class="badge badge-secondary">
                                {{ $permission->name }}
                            </span>
                            @endforeach

                            @endif
                        </td>
                        <td>
                            <a href="/users/{{ $user['id'] }}/edit"><img src="{{ asset('icons/edit.png') }}"
                                    class="show-icon"></i></a>
                            <a href="#" data-toggle="modal" data-target="#deleteModal"
                                data-roleid="{{$user['id']}}"><img src="{{ asset('icons/trash.png') }}"
                                    class="show-icon"></i></a>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('messages.admin.users.question')}}</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">{{__('messages.admin.users.delete')}}</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('messages.cancel')}}</button>
                                    <a class="btn btn-primary"
                                        href="{{ route('user.destroy', ['id' => $user->getId()]) }}">{{__('messages.delete')}}</a>
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
@section('js_user_page')

<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/js/admin/demo/chart-area-demo.js"></script>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('userid')

            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/users/' + user_id);
        })
</script>

@endsection
@endsection
@section('scripts')
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
@endsection
