<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use DB;

class CommentController extends Controller {

    public function create() {
        $data = []; //to be sent to the view
        $data["title"] = "Create Comment";

        return view('comment.create')->with("data",$data);
    }

    public function show($id) {
        $data = []; //to be sent to the view
        $comment = Comment::findOrFail($id);
        $data["comment"] = $comment;

        return view('comment.show')->with("data",$data);
    }

    public function save(Request $request) {
        $request->validate([
            "description" => "required|max:255"
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);
        // Comment::create($request->all());

        // return back()->with('created','Comentario creado satisfactoriamente');
        return back();
    }

    public function index(Request $request) {

        $data = []; //to be sent to the view
        $data["comments"] = Comment::all();

        return view('comment.index')->with("data",$data);
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back();
    }
}
