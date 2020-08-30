<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createVideogame.css') }}">
    <title>XPN | Create VideoGame</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create VideoGame</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('videogame.save') }}">
                            @csrf
                            <input class="mt-2" type="text" placeholder="Enter title" name="title"
                                value="{{ old('title') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter price" name="price"
                                value="{{ old('price') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter category" name="category"
                                value="{{ old('category') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter designer" name="designer"
                                value="{{ old('designer') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter pegy" name="pg"
                                value="{{ old('pg') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter detail" name="details"
                                value="{{ old('detail') }}" /><br>
                            <input class="mt-2" type="text" placeholder="Enter keyword" name="keyword"
                                value="{{ old('keyword') }}" /><br>
                            <input class="mt-2 btn btn-success" type="submit" value="Send" />
                        </form>
                    </div>
                    <h4 class="card-header">Videojuegos Disponibles</h4>
                    <div class="col-md-12 card-body products">
                        <ul id="errors">
                            @foreach ($data['videogames'] as $videogame)
                                <li>({{ $videogame->getId() }}) {{ $videogame->getTitle() }} <br>
                                    Price : {{ $videogame->getPrice() }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
