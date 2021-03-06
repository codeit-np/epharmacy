<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
           $cartitems = Cart::where('user_id',auth()->user()->id)->get();
           return view('frontend.pages.cart',compact('cartitems','totalCartItem'));
       }
    }

    public function totalItem(Request $request)
    {
        $totalItem = Cart::where('user_id',$request->user()->id)->count();
        return $totalItem;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_id' => 'required',
            'qty' => 'required',
            'rate' => 'required',
        ]);

        $cart= new Cart();
        $cart->user_id = $request->user()->id;
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->rate = $request->rate;
        $cart->save();

        $request->session()->flash('message','Product added to cart');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
