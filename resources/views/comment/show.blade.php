<div class="row">
    <h2 class="add-comments"><b> {{__('messages.comments')}}</b></h2>
</div>
@foreach($comments as $comment)
    @if ($comment->video_game_id == $data['videogame']->getId())
        <div class="container display-comment">
            <div class="row row-auto row-comment">
                <div class="col-sm">
                    <strong>{{ $comment->user->name }}</strong> {{ $comment->created_at->format('H:i - d/m/Y')}}
                    <p>{{ $comment->description }}</p>
                </div>
            </div>
        </div>
    @endif
    <br/>
@endforeach
