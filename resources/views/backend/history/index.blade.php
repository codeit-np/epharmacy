@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="/categories/create" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus-square"></i> Create Category</a> --}}
                        <strong>New Order</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Delivery Address</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (Auth::user()->is_admin == 0)
                                    @foreach ($invoices as $invoice)
                                        @if (Auth::user()->id == $invoice->user_id)
                                        <tr>
                                            <td>{{ $invoice->id }}</td>
                                            <td>{{ $invoice->created_at }}</td>
                                            <td>{{ $invoice->address }}</td>
                                            <td>{{ number_format($invoice->total) }}</td>
                                            <td>
                                                <a href="/invoices/{{ $invoice->id }}">Invoice Details</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @else
                                @foreach ($invoices as $invoice)
                               
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->created_at }}</td>
                                    <td>{{ $invoice->address }}</td>
                                    <td>{{ number_format($invoice->total) }}</td>
                                    <td>
                                        <a href="/invoices/{{ $invoice->id }}">Invoice Details</a>
                                    </td>
                                </tr>
                               
                            @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection