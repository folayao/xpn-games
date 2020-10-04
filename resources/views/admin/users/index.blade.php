@extends('layouts.header')

@section('content')
<!-- <link href="{{ asset('css/list.css') }}" rel="stylesheet"> -->
    <div class="card user_card">
        <div class="card-header">
            <i class="fas fa-table"></i>
            User Table
            <div class="col-md-2 float-right"><a href="/users/create"><img src="{{ asset('icons/addRole.png') }}" class="show-icon"></a> Add role</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered" id ="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>UserName</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>UserName</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Tools</th>
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
                               <a href="/users/{{ $user['id'] }}/edit"><img src="{{ asset('icons/edit.png') }}" class="show-icon"></i></a>
                               <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid = "{{$user['id']}}"><img src="{{ asset('icons/trash.png') }}" class="show-icon"></i></a>
                            </td>
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
                                        <a class="btn btn-primary" href="{{ route('user.destroy', ['id' => $user->getId()]) }}">Delete</a>
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