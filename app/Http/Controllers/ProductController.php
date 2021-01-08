<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

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
        //below code is for testing purposes so we could se if route and function is working
        //return $request->input();

        $data = Product::where('name', 'like', '%'.$request->input('query').'%')->get();

        return view('search', ['products'=>$data]);
    }

    public function addToCart(Request $request)
    {
        if ($request->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect ('/');
        }
        else
        {
            return redirect ('/login');
        }

    }

    public static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function cartlist()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cartlist', ['products' => $products]);

    }

    public function removeItem($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    public function orderNow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->sum('products.price');
        return view('ordernow', ['total' => $total]);
    }
}
