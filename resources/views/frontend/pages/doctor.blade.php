@extends('frontend.app')
@section('content')
    <div class="container my-5">
        <h5>Online Doctor's Appointment Request</h5>
        <div class="row">
            @foreach ($doctors as $doctor)
                <div class="col-md-4 card shadow py-2 m-1">
                    <div class="d-flex">
                        <div class="w-30">
                            <img src="{{ asset($doctor->image) }}" class="img-fluid" width="120" alt="">
                        </div>
                        <div class="w-1">
                            &nbsp; &nbsp;
                        </div>
                        <div>
                           
                                <h5>{{ $doctor->name }}</h5>
                                <span class="text-primary">{{ $doctor->specialization->name }}</span> <br>
                                {{ $doctor->education }} <br>
                                {{ $doctor->company }} <br>
                                <strong>NMC No.</strong>{{ $doctor->nmc_no }} <br>
                                <strong>Charge NRs: </strong>{{ $doctor->charge }} <br>
                                <strong>Mobile: </strong><a href="tel:+977{{ $doctor->mobile }}">{{ $doctor->mobile }}sc</a> <br>
                                <strong>Email: </strong>{{ $doctor->email }} <br> <br>
                                <a href="" class="btn btn-primary btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $doctor->id }}">Book Appointment</a>
                         
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $doctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Make an Appointment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/appointments" method="post">
                                            @csrf
                                           <div class="container my-2">
                                               <div class="row">
                                                   <div class="col-md-12">
                                                    <input type="text" name="name" class="form-control" placeholder="Patient Name">
                                                   </div>
                                                   <div class="col-md-12 my-1">
                                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                                   </div>
                                                   <div class="col-md-12 my-1">
                                                    <input type="tel" name="phone" class="form-control" placeholder="Phone">
                                                   </div>

                                                   <div class="col-md-12 my-1">
                                                    <input type="text" name="gender" class="form-control" placeholder="Gender">
                                                   </div>

                                                   <div class="col-md-12 my-1">
                                                    <input type="number" name="age" class="form-control" placeholder="Age">
                                                   </div>

                                                   <div class="col-md-12 my-1">
                                                    <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                                                   </div>
                                               </div>
                                           </div>
                                      
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection