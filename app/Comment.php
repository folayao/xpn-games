<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{

    //attributes id, description, created_at, updated_at

    protected $fillable = ['description', 'user_id', 'videogame_id', 'parent_id'];

    protected $table = 'comments';

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

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
