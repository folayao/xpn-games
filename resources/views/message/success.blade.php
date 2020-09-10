@extends('layouts.master')

@section("title", $data["title"])


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create product</div>
                <div class="card-body">
                    <div class="alert alert-success">
                        {{ $data["title"] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
