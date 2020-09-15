<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller {

    public function save(Request $request) {
        Comment::validateComment($request);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        // Comment::create($request->all());
        return back();
    }


    // Falta implementar el destroy
    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back();
    }
}
