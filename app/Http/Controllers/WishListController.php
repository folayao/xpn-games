<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["wishList"] = auth()->user()->wishlists->paginate(3);
        
        return view('user.wish_list')->with("data", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wishlist = new Wishlist();
        $wishlist -> name = $request -> wish_list_name;
        $wishlist -> save();
        auth()->user()->wishlists()->attach($wishlist);
        
        // WishList::create($request->all());
        return back()->with('success', 'Item Created Succesfully');
    }

    public function wishlistAdd(Request $request,$id)
    {   
        
        $wishlist = WishList::find($id);
        
        $wishlist -> videogames() -> attach($request -> videogame);
        return back()->with('success', 'Item Added to wishlist');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


        $data = [];
        $wishlist = auth()->user()->wishlists;
        dd($wishlists);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $wishlist = WishList::find($id);
        $wishlist-> users-> detach();
        $wishlist-> videogames-> detach();
        $wishlist->delete();

        return redirect()->back();
    }
}
