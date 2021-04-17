@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       Appointments
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Doctor</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointments as $appointment)
                                 
                                   <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->user->name }}</td>
                                        <td>{{ $appointment->gender }}</td>
                                        <td>{{ $appointment->age }}</td>
                                        <td>{{ $appointment->phone }}</td>
                                        <td>{{ $appointment->address }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ $appointment->message }}</td>
                                        <td>{{ $appointment->status == 0 ? 'Not Approved' : "Approved" }}</td>
                                        <th><a href="/adminappointments/{{ $appointment->id }}/edit">Edit</a></th>
                                    </tr>
                             
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection