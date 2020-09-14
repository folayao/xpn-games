<?php
// <!-- Hecho por Alejandro Arango, Modelo de la wishlist -->
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class wishList extends Model
{
    
    public $table = "wish_lists";
    protected $fillable = ['user_id','videogame_id'
    ];

    public static function validateWishList(Request $request) {
        $request->validate([
            "user_id" => "required",
            "videogame_id" => "required",
        ]);
    }
}
