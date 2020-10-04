@extends('layouts.header')

@section('content')

<h1>{{__('messages.admin.users.create')}}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/users" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">{{__('messages.user.name')}}</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="{{__('messages.user.name')}}..." value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">{{__('messages.user.email')}}</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="{{__('messages.user.email')}}..." value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="email">{{__('messages.user.username')}}</label>
        <input type="username" name="username" class="form-control" id="username" placeholder="{{__('messages.user.username')}}..." value="{{ old('username') }}">
    </div>
    <div class="form-group">
        <label for="password">{{__('messages.user.password')}}</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="{{__('messages.user.password')}}..." required minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">{{__('messages.user.confirmPasswd')}}</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('messages.user.confirmPasswd')}}..." id="password_confirmation">
    </div>
    <div class="form-group">
        <label for="role">{{__('messages.admin.roles.selectRole')}}</label>

        <select class="role form-control" name="role" id="role">
            <option value="">{{__('messages.admin.roles.selectRole')}}...</option>
            @foreach ($roles as $role)
            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

    <div id="permissions_box" >
        <label for="roles">{{__('messages.admin.roles.selectPermissions')}}</label>
        <div id="permissions_ckeckbox_list">
        </div>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="{{__('messages.submit')}}">
    </div>
</form>

@section('js_user_page')

    <script>
        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            permissions_box.hide(); // hide all boxes
            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                permissions_ckeckbox_list.empty();
                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {

                    console.log(data);

                    permissions_box.show();
                    // permissions_ckeckbox_list.empty();
                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(
                            '<div class="custom-control custom-checkbox">'+
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );
                    });
                });
            });
        });
    </script>

@endsection


@endsection
