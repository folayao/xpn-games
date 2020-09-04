@extends('layouts.master')

@section('content')

<div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('product.index') }}">
        {{ 'Volver a lista de productos' }}
    </a>
    <div class="row justify-content-center">
        <div class="col-md-8 my-4">
            <div class="card">
                <div class="card-header">
                    {{ $data["product"]->getName() }}
                </div>
                <div class="card-body">
                    {{ $data["product"]->getPrice() }}<br /><br />
                    {{ $data["product"]->getDescription() }}<br /><br />
                </div>
            </div>

            <div class="comments-area">
                @yield('content')
            </div>


            {{-- <a href="{{ route('product.delete', $data["product"]["id"]) }}" class="btn btn-danger" onclick="
            return confirm('¿Seguro que desea eliminar este producto?')"
            ><span aria-hidden="true"></span>Eliminar producto</a> --}}
        </div>
    </div>
</div>
@endsection
