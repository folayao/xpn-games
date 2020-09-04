@extends('product.show')


@section('content')

<hr>
<ul class="list-unstyled list-inline">
    <li>
        <button type="button" class="btn btn-primary btn-xs" data-toggle="collapse"
            data-target="#view-comments" aria-expanded="false" aria-controls="view-comments">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            Comments
        </button>
    </li>
</ul>
<div class="collapse" id="view-comments">
    <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
        proident. <br> <br>

        <form method="POST" action="{{ route('comment.save') }}">
            @csrf
            {{-- <div class="form-group">
                <div class="form-group">
                    <textarea class="form-control" name="description" rows="2" placeholder="Escriba el comentario" value="{{ old('description') }}"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button> --}}

            <div class="form group">
                <div class="input-group">
                    <input type="text" class="form-control" id="comment-text" placeholder="Post a comment...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </span>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
