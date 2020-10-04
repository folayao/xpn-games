<h2 class="add-comments"><b> {{__('messages.comments')}} <br></h2> </b>
<br>
@foreach($comments as $comment)
    @if ($comment->video_game_id == $data['videogame']->getId())
    {{-- PENDIENTE: Corregir la implementación del style --}}
        <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <div class="card">
                <div class="row">
                    <div class="col-sm">
                        <strong>{{ $comment->user->name }}</strong>
                        <p>{{ $comment->description }}</p>
                        @guest
                            {{-- <small>Debes iniciar sesión para comentar</small> --}}
                        @else
                        {{-- <a href="" id="reply"></a> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
        {{-- <div class="display-comment">
            <form method="post" action="{{ route('comment.save') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="description" class="form-control" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply" />
                </div>
            </form>
        </div> --}}
        @endguest
        {{-- @include('comment.show', ['comments' => $comment->replies]) --}}
        <br/>
@endforeach
