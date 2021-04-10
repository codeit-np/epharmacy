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
                            <form action="" method="post">
                                <h5>{{ $doctor->name }}</h5>
                                <span class="text-primary">{{ $doctor->specialization->name }}</span> <br>
                                {{ $doctor->education }} <br>
                                {{ $doctor->company }} <br>
                                <strong>NMC No.</strong>{{ $doctor->nmc_no }} <br>
                                <strong>Charge NRs: </strong>{{ $doctor->charge }} <br>
                                <strong>Mobile: </strong><a href="tel:+977{{ $doctor->mobile }}">{{ $doctor->mobile }}sc</a> <br>
                                <strong>Email: </strong>{{ $doctor->email }} <br> <br>
                                <button type="submit" class="btn btn-danger btn-sm">Book Appointment</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection