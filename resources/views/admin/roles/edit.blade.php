@extends('layouts.header')
@section('content')

<h1>{{__('messages.admin.roles.update')}}</h1>
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif



<form action="/roles/{{$role->id}}" method="post">
    @csrf
    @method('PATCH')


    <div class="form-group">
        <label for="role_name">{{__('messages.admin.roles.name')}}</label>
        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..." value="{{$role->name}}" >
    </div>
    <div class="form-group">
        <label for="role_slug">{{__('messages.admin.roles.slug')}}</label>
        <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{$role->slug}}" >
    </div>
    <div class="form-group" >
        <label for="roles_permissions">{{__('messages.admin.roles.addPermissions')}}</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach ($role->permissions as $permission)
            {{$permission->name. ","}}
        @endforeach">
    </div>
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="{{__('messages.submit')}}">
    </div>
</form>

@section('css_role_page')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection
@section('js_role_page')
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });

    </script>
    @endsection
@endsection
