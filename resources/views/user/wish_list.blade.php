@if(auth()->user()->wishlists->first() != null)
@foreach(auth()->user()->wishlists as $wishlist)

    <div class="col">
        <p>{{$wishlist->getName()}}</p>
    </div>

@endforeach
@endif
