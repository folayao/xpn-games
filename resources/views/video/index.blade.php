<link rel="stylesheet" href="{{ asset('css/video.css') }}">
<!--Carousel Wrapper-->
<br>
<div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
        <li data-target="#video-carousel-example" data-slide-to="1"></li>
        <li data-target="#video-carousel-example" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="thumbnail">
                <iframe width="800" height="500" src="https://www.youtube.com/embed/{{$videos['results'][0]->id->videoId}}" frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class="carousel-item">
            <div class="thumbnail">
                <iframe width="800" height="500" src="https://www.youtube.com/embed/{{$videos['results'][1]->id->videoId}}" frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class="carousel-item">
            <div class="thumbnail">
                <iframe width="800" height="500" src="https://www.youtube.com/embed/{{$videos['results'][2]->id->videoId}}" frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#video-carousel-example" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#video-carousel-example" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--Carousel Wrapper-->
