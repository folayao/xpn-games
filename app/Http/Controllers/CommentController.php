<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller {

    // public function show($id) {
    //     $data = []; //to be sent to the view
    //     $comment = Comment::findOrFail($id);
    //     $data["comment"] = $comment;

    //     return view('comment.show')->with("data",$data);
    // }

    public function save(Request $request) {
        //Falta mover validación a Modelo
        $request->validate([
            "description" => "required|max:255"
        ]);
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
