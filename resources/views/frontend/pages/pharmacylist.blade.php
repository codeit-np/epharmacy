@extends('frontend.app')
@section('content')
    <div class="container my-5">
        <h5>Pharmacy list</h5>
        <div class="row">
            @foreach ($pharmacy as $pharmacy)
                <div class="col-md-4 card shadow py-2 m-1">
                    <div class="d-flex">
                        <div class="w-30">
                            <img src="{{ asset($pharmacy->image) }}" class="img-fluid" width="120" alt="">
                        </div>
                        <div class="w-1">
                            &nbsp; &nbsp;
                        </div>
                        <div>
                           
                                <h5>{{ $pharmacy->name }}</h5>
                                <strong>Address</strong>{{ $pharmacy->address }} <br>
                                <strong>Phone: </strong>{{ $pharmacy->phone }} <br>
                                <strong>Contact Person: </strong> {{ $pharmacy->contact_person }}<br>
                                <strong>Mobile: </strong>{{ $pharmacy->mobile }} <br> <br>
                              
                            
                               
                               
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection