<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
      
        return view('admin.index');
    }
    public function home(){
      
        $data = Product::all();

        return view('home.index', compact('data'));
    }

    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart();
        $data ->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        return redirect()->back();
        
    }
}
