<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data = []; //to be sent to the view
        $data["products"] = Product::all();

        return view('product.index')->with("data",$data);
    }

    public function show($id)
    {


        // $data = []; //to be sent to the view
        // $comment = Comment::findOrFail($id);
        // $data["comment"] = $comment;

        // return view('comment.show')->with("data",$data);

        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        // $listOfSizes = array("XS", "S", "M", "L", "XL");
        // $data["title"] = ;
        // $data["product"] = $product;
        $data["product"] = $product;
        // $data["sizes"] = $listOfSizes;
        return view('product.show')->with("data", $data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();
        return view('product.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name"  => "required",
            "price" => "required|numeric|gt:0",
        ]);

        Product::create($request->only(["name", "price"]));
        return back()->with('success', 'Item created successfully!');
    }
}
