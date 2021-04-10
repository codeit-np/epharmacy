@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/doctorslst" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/doctorslst/{{ $doctor->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nmc_no">NMC Number</label>
                                        <input id="nmc_no" class="form-control" type="text" name="nmc_no" placeholder="NMC Number" value="{{ $doctor->nmc_no }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Doctor Name</label>
                                        <input id="name" class="form-control" type="text" name="name" placeholder="Full Name" value="{{ $doctor->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="education">Education</label>
                                            <input id="education" class="form-control" type="text" name="education" placeholder="Education" value="{{ $doctor->education }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="charge">Charge</label>
                                            <input id="charge" class="form-control" type="number" name="charge" placeholder="Charge" value="{{ $doctor->charge }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input id="mobile" class="form-control" type="tel" name="mobile" placeholder="Mobile" value="{{ $doctor->mobile }}">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="{{ $doctor->email }}">
                                    </div>
                                </div>
                            </div>

                            

                          <div class="row">
                              <div class="col">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input id="company" class="form-control" type="company" name="company" placeholder="company" value="{{ $doctor->company }}">
                                </div>
                              </div>
                              
                              <div class="col">
                                <div class="form-group">
                                    <label for="specialization_id">Specialization</label>
                                    <select id="specialization_id" class="form-control" name="specialization_id">
                                        @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}" {{ $specialization->id == $doctor->specialization_id ? 'selected' : '' }}>{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>

                            <div class="form-group">
                                <label for="image">Doctor Image</label>
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