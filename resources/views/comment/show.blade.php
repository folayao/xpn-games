@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->description }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comment.save') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="description" class="form-control" />
                {{-- <input type="hidden" name="videogame_id" value="{{ $videogame_id }}" /> --}}
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('comment.show', ['comments' => $comment->replies])
    </div>
@endforeach
