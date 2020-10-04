<?php
// <!-- Hecho por Alejandro Arango, Modelo de la wishlist -->
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    public $table = "wishlists";
    protected $fillable = ['name'];

    public function videoGames(){
        return $this->belongsToMany(VideoGame::class ,'wishlists_videogames');
    }

    public function users(){
        return $this->belongsToMany(User::class ,'users_wishlists');
    }

    public function getName()
    {
        return $this->attributes['name'];
    }
    public function getId()
    {
        return $this->attributes['id'];
    }

}
