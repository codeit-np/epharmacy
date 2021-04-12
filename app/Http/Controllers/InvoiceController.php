<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('backend.history.index',compact('invoices'));
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
            'amount' => 'required',
            // 'address' => 'required'
        ]);
        
        $invoice = new Invoice();
        $invoice->user_id = $request->user()->id;
        $invoice->total = $request->total;
        // $invoice->address = $request->address;
        $invoice->address = 'Duhabi';
        $invoice->save();

        foreach($request->id as $index=> $product){
            $invoiceDetails = new InvoiceDetail();
            $invoiceDetails->invoice_id = $invoice->id;
            $invoiceDetails->product_id = $request->id[$index];
            $invoiceDetails->qty = $request->qty[$index];
            $invoiceDetails->rate = $request->rate[$index];
            $invoiceDetails->amount = $request->amount[$index];

            echo "Product Name " . $request->name[$index] . "<br>";
            echo "Product Rate " . $request->rate[$index] . "<br>";
            echo "Product Qty " . $request->qty[$index] . "<br>";
            $invoiceDetails->save();
        }

            $items = Cart::where('user_id',$request->user()->id)->get();
            foreach($items as $item){
                $item->delete();
            }

            $request->session()->flash('message','Orrder Sent');
            return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        $items = InvoiceDetail::where('invoice_id',$invoice->id)->get();
        return view('backend.history.show',compact('invoice','items'));
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
        //
    }
}
