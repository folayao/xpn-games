<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Lang;

class CommentController extends Controller {

    public function save(Request $request) {
        Comment::validateComment($request);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        return back()->with('success', Lang::get('messages.comment.posted'));
    }


    // Falta implementar el delete
    public function delete($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back();
    }
}
