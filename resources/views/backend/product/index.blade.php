@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products/create" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus-square"></i> Create Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="/products/{{ $product->id }}/edit">Edit</a>
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