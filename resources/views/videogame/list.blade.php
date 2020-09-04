@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <title>List Videogames | XPN </title>
</head>
<body>
    @yield('header')
    <h4 class="card-header">Videojuegos Disponibles</h4>
                    <div class="col-md-12 card-body products">
                        <ul id="errors">
                            @foreach ($data['videogames'] as $videogame)
                                <li>({{ $videogame->getId() }}) {{ $videogame->getTitle() }} <br>
                                    Price : {{ $videogame->getPrice() }}
                                </li>
                            @endforeach
                        </ul>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Show Details</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['videogames'] as $videogame)
                                    <tr>
                                        <td class="table-bold">{{ $videogame->getId() }}</td>
                                        <td>{{ $videogame->getTitle() }}</td>
                                        <td><a class="navbar-brand"
                                                href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"><img
                                                    src="/icons/eye.svg" class="show-icon"></a></td>
                                        <td><a class="navbar-brand"
                                                href="{{ route('videogame.delete', ['id' => $videogame->getId()]) }}"> Delete </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
    
</body>
</html>