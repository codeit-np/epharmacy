<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacy = Pharmacy::all();
        return view('backend.pharmacy.index',compact('pharmacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pharmacy.create');
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
            'address' => 'required',
            'contact_person' => 'required',
        ]);

        $pharmacy = new Pharmacy();
        $pharmacy->name = $request->name;
        $pharmacy->address = $request->address;
        $pharmacy->contact_person = $request->contact_person;
        $pharmacy->mobile = $request->mobile;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('pharmacy',$newName);
            $pharmacy->image = 'pharmacy/' . $newName;
        }else{
            $pharmacy->image = 'images/pharmacy.jpeg';
        }
        $pharmacy->save();

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
        $pharmacy = Pharmacy::find($id);
        return view('backend.pharmacy.edit',compact('pharmacy'));
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
            'address' => 'required',
            'contact_person' => 'required',
        ]);

        $pharmacy = Pharmacy::find($id);
        $pharmacy->name = $request->name;
        $pharmacy->address = $request->address;
        $pharmacy->contact_person = $request->contact_person;
        $pharmacy->mobile = $request->mobile;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('pharmacy',$newName);
            $pharmacy->image = 'pharmacy/' . $newName;
        }
        $pharmacy->update();

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
