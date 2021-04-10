<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductListController extends Controller
{
    public function getlist($id)
    {
        if(Auth::user()){
            
            $totalCartItem = Cart::where('user_id',auth()->user()->id)->count();
        }else{
            $totalCartItem = 0;
        }
        $products = Product::where('category_id',$id)->paginate(8);
        return view('frontend.pages.products',compact('products','totalCartItem'));
    }
}
