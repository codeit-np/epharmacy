@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/pharmacy" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/pharmacy/{{ $pharmacy->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Pharmacy Name</label>
                                        <input id="name" class="form-control" type="text" name="name" placeholder="Full Name" value="{{ $pharmacy->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col">
                                  
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input id="address" class="form-control" type="text" name="address" placeholder="Address" value="{{ $pharmacy->address }}">
                                        </div>
                                </div>

                                <div class="col">
                                  
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person</label>
                                        <input id="contact_person" class="form-control" type="text" name="contact_person" placeholder="Contact Person" value="{{ $pharmacy->contact_person }}">
                                    </div>
                                </div>


                                <div class="col">
                                  
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input id="mobile" class="form-control" type="text" name="mobile" placeholder="Mobile" value="{{ $pharmacy->mobile }}">
                                    </div>
                                </div>
                              
                            </div>
                            
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" class="form-control" type="tel" name="phone" placeholder="phone" value="{{ $pharmacy->phone }}">
                                    </div>
                                </div>

                                
                            </div>

                        

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-sync"></i> Update Record</button>
                            
                        </form>

                        <div class="my-2">
                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                        </div>

                        <div class="my-2">
                            <img src="{{ asset($pharmacy->image )}}" width="120" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection