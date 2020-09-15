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
        $data["wishList"] = WishList::all();
        return view('videogame.list')->with("data", $data);
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
        return back()->with('success', 'Item Added Succesfully');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $videogame = VideoGame::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home.index');
        }
        $wishlist = WishList::find($id);
        $wishlist->delete();
        return redirect()->route('videogame.list');
    }
}
