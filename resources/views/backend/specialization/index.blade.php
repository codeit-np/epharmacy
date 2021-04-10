@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/specializations/create" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus-square"></i> Create Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Specialization</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($specializations as $specialization)
                                    <tr>
                                        <td>{{ $specialization->id }}</td>
                                        <td>{{ $specialization->name }}</td>
                                        <td>
                                            <a href="/specializations/{{ $specialization->id }}/edit">Edit</a>
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