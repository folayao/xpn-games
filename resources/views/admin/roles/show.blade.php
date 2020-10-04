@extends('layouts.header')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3> {{__('messages.admin.roles.name')}}: {{$role['name']}}</h3>
            <h4> {{__('messages.admin.roles.slug')}}: {{$role['slug']}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{__('messages.admin.roles.permissions')}}</h5>
            <p class="card-text">
                .......
            </p>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary"> {{__('messages.goBack')}}</a>
        </div>
    </div>
</div>



@endsection
