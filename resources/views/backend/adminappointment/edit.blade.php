@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/adminappointments" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/adminappointments/{{ $appointment->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="text" name="user_id" value="{{ $appointment->user_id }}" hidden>
                            <input type="text" name="doctor_id" value="{{ $appointment->doctor_id }}" hidden>
                            <div class="form-group">
                                <label for="">Patient Name</label>
                                <input id="" class="form-control" type="text" name="name" value="{{ $appointment->user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input id="gender" class="form-control" type="text" name="gender" value="{{ $appointment->gender }}">
                            </div>

                           <div class="form-group">
                               <label for="address">Address</label>
                               <input id="address" class="form-control" type="text" name="address" value="{{ $appointment->address }}">
                           </div>

                           <div class="form-group">
                               <label for="phone">Phone</label>
                               <input id="phone" class="form-control" type="text" name="phone" value="{{ $appointment->phone }}">
                           </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input id="age" class="form-control" type="text" name="age" value="{{ $appointment->age }}">
                            </div>

                            <div class="form-group">
                                <label for="doctor">Doctor</label>
                                <input id="doctor" class="form-control" type="text" name="" value="{{ $appointment->doctor->name }}">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" name="message" rows="3">{{ $appointment->message }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="1">Approved</option>
                                    <option value="0">Not Approved</option>
                                </select>
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