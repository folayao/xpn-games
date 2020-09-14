<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\VideoGame;
use Illuminate\Http\Request;

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
        $data["wishList"] = WishList::all();
        return view('videogame.list')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // WishList::validateWishList($request);
        WishList::create($request->all());
        return back()->with('success', 'Item Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $data = [] ;
        $wishlist = WishList::all();
        $wishlist = $wishlist->intersect(WishList::whereIn('user_id', [auth()->user()->id])->get());
        $wishlistid= $wishlist->pluck('videogame_id');
        $videogames = VideoGame::all();
        $data['videogames'] = $videogames->intersect(VideoGame::whereIn('id', $wishlistid)->get());
        return view('user.wishList')->with("data",$data);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function edit(wishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(wishList $wishList)
    {
        //
    }
}
