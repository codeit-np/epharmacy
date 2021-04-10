<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('backend.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view('backend.doctor.create',compact('specializations'));
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
            'nmc_no' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'education' => 'required',
            'company' => 'required',
            'charge' => 'required',
            'specialization_id' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->nmc_no = $request->nmc_no;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->mobile = $request->mobile;
        $doctor->company = $request->company;
        $doctor->education = $request->education;
        $doctor->charge = $request->charge;
        $doctor->specialization_id = $request->specialization_id;

        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('doctors',$newName);
            $doctor->image = 'doctors/' . $newName;
        }else{
            $doctor->image = 'images/profile.jpeg';
        }

        $doctor->save();

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
        $specializations = Specialization::all();
        $doctor = Doctor::find($id);
        return view('backend.doctor.edit',compact('doctor','specializations'));
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
            'nmc_no' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'education' => 'required',
            'company' => 'required',
            'charge' => 'required',
            'specialization_id' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->nmc_no = $request->nmc_no;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->mobile = $request->mobile;
        $doctor->company = $request->company;
        $doctor->education = $request->education;
        $doctor->charge = $request->charge;
        $doctor->specialization_id = $request->specialization_id;

        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('doctors',$newName);
            $doctor->image = 'doctors/' . $newName;
        }
        $doctor->update();

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
