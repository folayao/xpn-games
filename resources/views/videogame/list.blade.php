@extends('layouts.header')
@section('title', "Video Game List")
@section('content')

<link href="{{ asset('css/list.css') }}" rel="stylesheet">
<link href="{{ asset('php/link.css') }}" rel="stylesheet">
<div class="container">
    <div class="row addgame">
        @can('isAdmin')
        <div class="col-md-6 float-right mb-3">
            <a href="{{route('videogame.create')}}"> {{__('messages.admin.videogame.add')}}
            </a>
        </div>
        
        @endcan
        <div class="row">

        </div>

        <div class="col-md-12 text-center mb-3">
            <ul id="select-category">
                <li  {{ (request()->query() == null) ? 'class=active' : '' }}><a  href="{{route('videogame.list',['paginate' => $data['paginate']])}}"><p>All</p> </a></li>
                <li  {{ (request()->query("category")== 'Action') ? 'class=active' : '' }}><a  href="{{route('videogame.list',['category' =>  'Action','paginate' => $data['paginate']])}}"><p><i class="fas fa-bomb"></i>  {{__('messages.videogame.categories.action')}} </p> </li></a>
                <li  {{ (request()->query("category")== 'Adventure') ? 'class=active' : '' }}><a  href="{{route('videogame.list',['category' =>  'Adventure','paginate' => $data['paginate']])}}"><p><i class="fas fa-globe-americas"></i>  {{__('messages.videogame.categories.adventure')}}</p> </a></li>
                <li  {{ (request()->query("category")== 'FPS') ? 'class=active' : '' }}><a  href="{{route('videogame.list',['category' =>  'FPS','paginate' => $data['paginate']])}}"><p><i class="fas fa-skull-crossbones"></i>  {{__('messages.videogame.categories.fps')}}</p> </a></li>
                <li  {{ (request()->query("category")== 'RPG') ? 'class=active' : '' }}><a  href="{{route('videogame.list',['category' =>  'RPG','paginate' => $data['paginate']])}}"><p><i class="fab fa-drupal"></i>  {{__('messages.videogame.categories.rpg')}}</p> </a></li>
                <li  {{ (request()->query("category")== 'Sports') ? 'class=active' : '' }}><a  href="{{route('videogame.list',['category' =>  'Sports','paginate' => $data['paginate']])}}"><p><i class="fas fa-quidditch"></i>  {{__('messages.videogame.categories.sports')}}</p> </a></li>
                <li  {{ (request()->query("category")== 'Simulation') ? 'class=active' : '' }}><a  href="{{route('videogame.list',['category' =>  'Simulation','paginate' => $data['paginate']])}}"><p><i class="fas fa-cubes"></i>  {{__('messages.videogame.categories.simulation')}}</p> </a></li>  
            </ul>
        </div>

    </div>
        <div class="row">
            <div class="col-auto">
            <div class=" search-box">
            <form action="{{route('videogame.list')}}" method="GET" role="search">
            <!-- @csrf -->
                <input type="text" name="search" Placeholder="{{__('messages.search')}}" class ="search-txt">
                <button type="submit" class="btn search-icon"><i class="fas fa-search "></i></button>
            </form>
        </div>
            </div>

        
    </div>
    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    VideoGames per page : {{$data['paginate']}}
  </a>

  <div class="dropdown-menu mega-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{route('videogame.list',['paginate' =>  '12','search' => $data['search'],'category' => $data['category']])}}">12</a>
    <a class="dropdown-item" href="{{route('videogame.list',['paginate' =>  '24', 'search' => $data['search'],'category' => $data['category']])}}">24</a>
    <a class="dropdown-item" href="{{route('videogame.list',['paginate' =>  '48', 'search' => $data['search'],'category' => $data['category']])}}">48</a>
  </div>
</div>
</div>

<div class="container">
{{$data["videogames"]->appends(['search' => $data['search'],'paginate' => $data['paginate'],'category' => $data['category']])->links()}}
    <div class="row mr-5 ml-5 ">
    
        @foreach ($data["videogames"] as $videogame)
        <div class="col-md-4 col-sm-6">
            
            <div class="product-grid">
                <div class="product-image">
                    <a href="">
                        <img src="{{ $videogame->image }}">
                    </a>
                    @if ($loop->iteration <= $data["quantityNewVG"])
                        <div class="product-trend-label">
                            <span >
                                {{__('messages.new')}}
                            </span>
                        </div>
                    @endif

                    <ul class="social">





                    <form action="{{ route('item.addToCart',['id' => $videogame->getId()]) }}" method="POST">
                     @csrf
                        <input type="hidden" name="quantity" value="1">
                        <li><button class="addToCart" type="submit"> 
                            <a href="" data-toggle="tooltip" data-placement="right" title="{{__('messages.cart.add')}}">
                            <i class="fas fa-cart-plus"></i></a>
                        </button>
                        </li>
                        </form>
                        <li><a href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}"
                                data-tip="Show me more" data-toggle="tooltip" data-placement="right"
                                title="{{__('messages.videogame.info')}}"><i class="fas fa-info"></i></a>
                        </li>
                        <li><a href="" data-tip="Wishlist" data-toggle="tooltip" data-placement="right"
                                title="{{__('messages.wishlist.add')}}"><i class="fas fa-heart"></i></a>
                        </li>
                        
                        @can('isAdmin')
                        <li><a href="{{route('videogame.delete', ['id'=>$videogame->getId()])}}" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fas fa-trash-alt"></i></a></li>
                        @endcan
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title">
                        <a href="{{ route('videogame.show', ['id' => $videogame->getId()]) }}">
                            {{$videogame->getTitle()}}
                        </a>
                    </h3>
                    <div class="price"> $ {{$videogame->getPrice()}}</div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

{{$data["videogames"]->appends(['category' => $data['category']])->links()}}
@endsection
@section('scripts')

<script>
    $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script src="{{ asset('js/category.js') }}"></script>
@endsection
