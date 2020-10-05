<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Order extends Model
{
    //attributes id, total, created_at, updated_at
    protected $fillable = ['total', 'user_id', 'item_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setUserId($id)
    {
        $this->attributes['user_id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
