Esto es un carrusel
{{-- {{$videos}} --}}
@if(isset($videos))
    @foreach($videos['results'] as $video)
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                {{-- <!-- Mostramamos la fotos mediana del video -->
                                        <img class="img-resp" src="{{$video->snippet->thumbnails->medium->url}}">
                <div class="caption">
                    <!-- Mostramamos el titulo del video -->
                    <h3><a href="https://www.youtube.com/watch?v={{$video->id->videoId}}">
                            {{$video->snippet->title}}</a></h3> --}}

                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$video->id->videoId}}"
                        frameborder="0" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    @endforeach
@endif

{{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="container justify-content-md-center">
            <div class="carousel-item active">
                <h1>{{__('messages.wishlist.show')}}</h1>
</div>
@foreach($data['videogames'] as $videogame)
<div class="carousel-item">
    <h1>{{$videogame -> getTitle()}}</h1>
</div>
@endforeach
</div>
</div>
<a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">{{__('messages.wishlist.previous')}}</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">{{__('messages.wishlist.next')}}</span>
</a>
</div> --}}
