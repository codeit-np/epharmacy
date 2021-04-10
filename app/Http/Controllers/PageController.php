<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function doctors()
    {
       $doctors = Doctor::all();
       return view('frontend.pages.doctor',compact('doctors'));
    }
}
