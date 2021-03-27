<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('products', ['product' => $data]);
    }
    public function detail($id)
    {
        $data = Product::find($id);
        return view('product_detail', ["product" => $data]);
    }

    public function search(Request $req)
    {

        $data = Product::
            where('name', 'like', '%' . $req->input('query') . '%')
            ->get();

        return view('search', ['product' => $data]);

    }

    public function addToCart(Request $req)
    {

        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }

    }

    public static function cartItem()
    {

        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();

    }

    public function cartList()
    {

        $userId = Session::get('user')['id'];
        $data = DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->select('products.*', 'cart.id as cart_id')
            ->where('cart.user_id', $userId)
            ->get();
        return view('cartlist', ['product' => $data]);
    }
    public function removeCart($id)
    {

        Cart::destroy($id);
        return redirect('/cartlist');
    }
    public function OrderNow()
    {

        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
        return view('order', ['total' => $total]);
    }

    public function OrderPlace(Request $req)
    {

        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $req->address;
            $order->status = "pending";
            $order->payment = $req->payment;
            $order->payment_status = "pending";
            $order->save();
        }
        Cart::where('user_id', $userId)->delete();
        return redirect('/');
    }

    public function My_order()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('orders')
            ->join('products', 'orders.product_id', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        return view('myorders',['total'=>$total]);
    }
}
