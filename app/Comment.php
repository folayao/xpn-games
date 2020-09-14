<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;

class Comment extends Model
{
    
    //attributes id, description, created_at, updated_at

    protected $fillable = ['description', 'user_id', 'videogame_id', 'parent_id'];

    protected $table = 'comments';

    public static function validateComment(Request $request){
        $request->validate([
            "description" => "required|max:255"
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function videoGame()
    // {
    //     return $this->belongsTo(VideoGame::class);
    // }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
