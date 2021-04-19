@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/pharmacies" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/pharmacies" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Pharmacy Name</label>
                                        <input id="name" class="form-control" type="text" name="name" placeholder="Full Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col">
                                  
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input id="address" class="form-control" type="text" name="address" placeholder="Address">
                                        </div>
                                </div>

                                <div class="col">
                                  
                                    <div class="form-group">
                                        <label for="contact_person">Contact Person</label>
                                        <input id="contact_person" class="form-control" type="text" name="contact_person" placeholder="Contact Person">
                                    </div>
                                </div>


                                <div class="col">
                                  
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input id="mobile" class="form-control" type="text" name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                              
                            </div>
                            
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" class="form-control" type="tel" name="phone" placeholder="Phone">
                                    </div>
                                </div>

                                
                            </div>

                        

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-save"></i> Save Record</button>
                            
                        </form>

                        <div class="my-2">
                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection