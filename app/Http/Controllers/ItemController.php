<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function addToCart($id, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        $videogames = $request->session()->get("videogames");
        $videogames[$id] = $quantity;
        $request->session()->put('videogames', $videogames);
        return back()->with('success', 'Product added to cart successfully!');
    }

    public function removeCart(Request $request)
    {
        $request->session()->forget('videogames');
        return redirect()->route('videogame.list');
    }

    public function cart(Request $request)
    {
        $videogames = $request->session()->get("videogames");
        $totalPrice = 0;
        if($videogames){
            $keys = array_keys($videogames);
            for($i=0;$i<count($keys);$i++){
                $actualVideoGame = VideoGame::find($keys[$i]);
                $totalPrice = $totalPrice + $actualVideoGame->getPrice()*$videogames[$keys[$i]];
            }
            $keys = array_keys($videogames);
            $videogamesModels = VideoGame::find($keys);
            $data["videogames"] = $videogamesModels;
            $data["user_id"] = auth()->user()->id;
            $data["total_price"] = $totalPrice;

            return view('user.cart')->with("data",$data);
        }
        return redirect()->route('videogame.list');
    }
}
