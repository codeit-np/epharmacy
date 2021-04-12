@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/invoices"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <strong class="text-danger">INVOICE DETAILS</strong> <br>
                        <strong>Date: {{ $invoice->created_at->format('j-M-Y') }}</strong> <br>
                        <strong>Invoice No: {{ $invoice->id }}</strong>
                        <hr>
                        <strong>Customer Name: </strong> {{ $invoice->user->name }} <br>
                        <strong>Delivery Address: </strong> {{ $invoice->address }} <br>

                        <table class="table table-sm">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>

                            @foreach ($items as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->rate) }}</td>
                                    <td>{{ number_format($item->amount) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="4" class="text-right">Total Amount</th>
                                <th>{{ number_format($invoice->total) }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection