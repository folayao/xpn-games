<?php
// <!-- Hecho por Alejandro Arango, Modelo de la wishlist -->
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    public $table = "wish_lists";
    protected $fillable = ['user_id','videogame_id'];
}
