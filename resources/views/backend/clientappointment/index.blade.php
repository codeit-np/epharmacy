@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      My Appointments
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointments as $appointment)
                                   @if (Auth::user()->id == $appointment->user_id)
                                   <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->doctor->name }}</td>
                                        <td>{{ $appointment->message }}</td>
                                        <td>{{ $appointment->status == 0 ? 'Not Approved' : "Approved" }}</td>
                                    </tr>
                                   @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection