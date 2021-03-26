<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(){
        $data =  Product::all();
        return view('products',['product'=>$data]);
    }
    public function detail($id){
        $data = Product::find($id);
        return view('product_detail',["product"=>$data]);
    }

    public function search(Request $req){

        $data = Product::
        where('name','like','%'.$req->input('query').'%')
        ->get();

        return view('search',['product'=>$data]);
        
    }

    public function addToCart(Request $req){

        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        }else{
            return redirect('/login');
        }
       
    }

    static function cartItem(){

      $userId = Session::get('user')['id'];
      return Cart::where('user_id',$userId)->count();

    }

    public function cartList(){

        $userId = Session::get('user')['id'];
        $data =  DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as cart_id')
        ->where('cart.user_id',$userId)
        ->get();
        return view('cartlist',['product'=>$data]);
    }
    public function removeCart($id){

        Cart::destroy($id);
        return redirect('/cartlist');
    }
    public function OrderNow(){

        $userId = Session::get('user')['id'];
        $total =   DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view('order',['total'=>$total]);
    }
}
