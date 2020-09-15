<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\VideoGame;

class CommentController extends Controller {

    public function save(Request $request) {
        //Falta mover validación a Modelo
        // $request->validate([
        //     "description" => "required|max:255"
        // ]);
        Comment::validateComment($request);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);
        // Comment::create($request->all());

        return back();
    }

    // public function replyStore(Request $request)
    // {
    //     $data = [];
    //     $reply = new Comment();
    //     $reply->body = $request->get('body');
    //     $reply->user()->associate($request->user());
    //     $reply->parent_id = $request->get('comment_id');
    //     $data["reply"] = $reply;
    //     $videogame = VideoGame::find($request->get('videogame_id'));
    //     $data["videogame"] = $videogame;

    //     $videogame->comments()->save($reply);

    //     return back()->with("data", $data);

    // }


    // Falta implementar el destroy
    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back();
    }
}
