<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            
            $totalCartItem = Cart::where('user_id',auth()->user()->id)->count();
        }else{
            $totalCartItem = 0;
        }
        $products = Product::all();
        return view('backend.product.index',compact('products','totalCartItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()){
           
            $totalCartItem = Cart::where('user_id',auth()->user()->id)->count();
        }else{
            $totalCartItem = 0;
        }
        $categories = Category::all();
        return view('backend.product.create',compact('categories','totalCartItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('product',$newName);
            $product->image = 'product/' . $newName;
        }

        $product->save();
        $request->session()->flash('message','Record Saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()){
           
            $totalCartItem = Cart::where('user_id',auth()->user()->id)->count();
        }else{
            $totalCartItem = 0;
        }
        $product = Product::find($id);
        return view('frontend.pages.productdetails',compact('product','totalCartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $categories = Category::all();
        $product = Product::find($id);
       
        return view('backend.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('product',$newName);
            $product->image = 'product/' . $newName;
        }

        $product->update();
        $request->session()->flash('message','Record Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
