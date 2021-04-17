@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/pharmacy/create" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus-square"></i> Create Pharmacy</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Pharmacy</th>
                                    <th>Contact Person</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pharmacy as $pharmacy)
                                    <tr>
                                        <th>{{ $pharmacy->id }}</th>
                                        <td><img src="{{ asset($pharmacy->image) }}" width="24" alt=""></td>
                                        <td>{{ $pharmacy->name }}</td>
                                        <td>{{ $pharmacy->contact_person }}</td>
                                        <td>{{ $pharmacy->address }}</td>
                                        <td>{{ $pharmacy->phone }}</td>
                                        <td>
                                            <a href="/pharmacy/{{ $pharmacy->id }}/edit">Edit</a>
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