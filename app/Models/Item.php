<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoGame;
use App\Models\Order;

class Item extends Model
{
    //attributes id, video_game_id, order_id, quantity, created_at, updated_at

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($q)
    {
        $this->attributes['quantity'] = $q;
    }

    public function getVideoGameId()
    {
        return $this->attributes['video_game_id'];
    }

    public function setVideoGameId($id)
    {
        $this->attributes['video_game_id'] = $id;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($id)
    {
        $this->attributes['order_id'] = $id;
    }

    public function videogame(){
        return $this->belongsTo(VideoGame::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
