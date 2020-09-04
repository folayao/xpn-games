@include('layouts.header')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/showVideogame.css')}}">
    <title>XPN | {{ $data['videogames']['title'] }}</title>
</head>

<body>
    @yield('header')
    <section class="card-product">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $data['videogames']['title'] }}</h4>
                    <b class="card-label">Category: </b>{{ $data['videogames']['category'] }} <br />
                    <b class="card-label">Price: </b> {{ $data['videogames']['price'] }}<br />
                    <b class="card-label">Designer: </b>{{ $data['videogames']['designer'] }} <br />
                    <b class="card-label">Pegy: </b>{{ $data['videogames']['pg'] }} <br />
                    <b class="card-label">Details: </b>{{ $data['videogames']['details'] }} <br />
                </div>
            </div>
    </section>
</body>

</html>
