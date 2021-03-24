<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){

        return view('login');
    }

    public function login(Request $req){

        $user = User::where(['email'=>$req->email])->first();
        // return $user->password;
        if(!$user || !Hash::check($req->password,$user->password)){

            return "Email and Password are not match";
        }else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
