<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function getlist($id)
    {
        $products = Product::where('category_id',$id)->get();
        return view('frontend.pages.products',compact('products'));
    }
}
