<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\DoctorNotification;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $appointments = Appointment::all();
      return view('backend.clientappointment.index',compact('appointments'));
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
            'date' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'message' => 'required',
            
        ]);

        $appointment = new Appointment();
        $appointment->date = $request->date;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->user_id = $request->user()->id;
        $appointment->name = $request->name;
        $appointment->address = $request->address;
        $appointment->phone = $request->phone;
        $appointment->gender = $request->gender;
        $appointment->age = $request->age;
        $appointment->message = $request->message;
        $appointment->save();

        $doctor = Doctor::find($request->doctor_id);
        $doctor->notify(new DoctorNotification());

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
        //
    }
}
