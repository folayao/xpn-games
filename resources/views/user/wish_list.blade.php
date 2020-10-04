@if(auth()->user()->wishlists->first() != null)

@foreach(auth()->user()->wishlists as $wishlist)
    <div class="row">
            <div class="col">
                <a href="">{{$wishlist->getName()}}</a>
            </div>
    </div>


@endforeach

    <div class="row">

    <div class="col">
                    <form method="POST" action="{{ route('wishList.store') }}">
                
                
                            @csrf
                            
                                <div class="row ">

                                    <input type="text" id="wish_list_name" name="wish_list_name" placeholder="Wishlist name..."/>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="submit" id="create_wish_list"class="btn btn-success" value="Create a wishlist" />
                                        </div>
                                    </div>
                                    

                                </div>
                        
                            

                </form>
    </div>
        
    </div>



@endif
