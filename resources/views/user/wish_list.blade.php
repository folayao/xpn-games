@if(auth()->user()->wishlists->first() != null)
<div class="row">
    @foreach(auth()->user()->wishlists as $wishlist)
        <div class="col">
            @if($wishlist->videogames->first() != null)
                <p>{{__('messages.wishlist.items')}} {{$wishlist->getName()}} <a href="{{ route('wishlist.delete', ['id' => $wishlist->getId()]) }}"> Eliminar wishlist</a></p>
            @foreach($wishlist->videogames as $videogame)
                <a href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}">
                    {{$videogame->getTitle()}}
                </a>
            @endforeach
            @else
                <p>{{__('messages.wishlist.noItems')}} {{$wishlist->getName()}}  <a href="{{ route('wishlist.delete', ['id' => $wishlist->getId()]) }}"> Eliminar wishlist</a></p>
            @endif
        </div>
    @endforeach
</div>
@else
    <p>{{__('messages.wishlist.null')}} </p>
@endif
<div class="row">

<div class="col">
    <form method="POST" action="{{ route('wishList.store') }}">
        @csrf
        <div class="row ">
            <input type="text" id="wish_list_name" name="wish_list_name" placeholder="{{__('messages.wishlist.name')}}"/>
            <div class="col">
                <div class="form-group">
                    <input type="submit" id="create_wish_list"class="btn wishlist" value="Create a wishlist" />
                </div>
            </div>
        </div>
    </form>
</div>

</div>
