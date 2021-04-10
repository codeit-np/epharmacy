@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/doctorslst/create" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus-square"></i> Create Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>NMC No</th>
                                    <th>Photo</th>
                                    <th>Doctor Name</th>
                                    <th>Mobile</th>
                                    <th>Company</th>
                                    <th>Specialization</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <th>{{ $doctor->nmc_no }}</th>
                                        <td><img src="{{ asset($doctor->image) }}" width="24" alt=""></td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->mobile }}</td>
                                        <td>{{ $doctor->company }}</td>
                                        <td>{{ $doctor->specialization->name }}</td>
                                        <td>
                                            <a href="/doctorslst/{{ $doctor->id }}/edit">Edit</a>
                                        </td>
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