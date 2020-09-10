@extends('layouts.master')

@section("products", $data["products"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <br><h2 class="content"><b> Productos </b></h2><br>
                <div class="row">
                    <div class="col-sm" >
                        <ul id="errors">
                            @foreach($data["products"] as $product)
                                <div class="row p-4 m-auto">
                                    <div class="col-lg">
                                        <h3><a href="{{ route('product.show', $product->getId()) }}" > Id: {{$product->getId() }}</a></h3>
                                        <h5>{{ "Producto: ". $product->getName() }}</h5>
                                        <h5>{{ "Precio: $". $product->getPrice() }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
