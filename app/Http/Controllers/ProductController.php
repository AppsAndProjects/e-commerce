<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data=Product::all();

        return view('product', ['products'=>$data]);
    }

    public function detail($id)
    {
        $data = Product::find($id);

        return view('detail', ['product'=>$data]);
    }

    public function search(Request $request)
    {
        //below code is for testin purposes so we could se if route and function is working
        //return $request->input();

        $data = Product::where('name', 'like', '%'.$request->input('query').'%')->get();

        return view('search', ['products'=>$data]);
    }
}
