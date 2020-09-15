@extends('layouts.header')
@section('content')

<h1>Create new role</h1>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

<form action="/roles" method="post">
{{ csrf_field()}}

<div class="form-group">
    <label for="role_name">Role name</label>
    <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Role name ..." value="{{old('role_name')}}" >
</div>
<div class="form-group">
    <label for="role_name">Role slug</label>
    <input type="text" name="role_slug" id="role_slug" class="form-control" placeholder="Role slug ..." value="{{old('role_slug')}}" >
</div>
<div class="form-group" >
        <label for="roles_permissions">Add Permissions</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="{{ old('roles_permissions') }}">   
    </div> 
<div class="form-group pt-2">
    <input type="submit" class="btn btn-primary" value="submit">
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