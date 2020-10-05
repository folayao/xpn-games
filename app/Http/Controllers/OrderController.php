<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\VideoGame;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function buy(Request $request)
    {
        $order = new Order();
        $order->setTotal("0");
        $order->user_id = $request->user_id;
        $order->save();

        $totalPrice = 0;

        $videogame = $request->session()->get("videogames");
        if($videogame){
            $keys = array_keys($videogame);
            for($i=0;$i<count($keys);$i++){
                $item = new Item();
                $item->setVideoGameId($keys[$i]);
                $item->setOrderId($order->getId());
                $item->setQuantity($videogame[$keys[$i]]);
                $item->save();
            }

            $order->setTotal($request->total);
            $order->save();
            auth()->user()->orders()->save($order);
            $request->session()->forget('videogames');
        }

        return redirect()->route('videogame.list');
    }
}
