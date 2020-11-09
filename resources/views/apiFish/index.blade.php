@extends('layouts.header')

@section('content')

<table style="width:100%">
    <tr>
        {{-- <th>Fishes</th>
      <th>Accessories</th> --}}
        <th>Videogames</th>
    </tr>
    <tr>
        {{-- {{$fishes['data']}} --}}
        {{-- @foreach ($fishes['data'] as $fish)
            <td>{!!$fish!!}</td>
        @endforeach --}}
    </tr>
    <tr>
        <td></td>
    </tr>
</table>

{{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'http://127.0.0.1:8000/api/videogames/',
            // success: function (data) {
            //     console.log(data);
            // }
            success: function (data) {
                $(".display").html(data);
            }
        });
    </script>
 --}}

@endsection
