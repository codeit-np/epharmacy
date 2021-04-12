<?php $amount = 0; ?>
@extends('frontend.app')
@section('total')
    {{ $totalCartItem }}
@endsection
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Cart Items Details
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                           
                            @foreach ($cartitems as $index=> $item)
                             <?php $amount = $amount +  $item->rate * $item->qty; ?>
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td><img src="{{ asset($item->product->image) }}" width="24" alt=""></td>
                                    <td> {{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->rate }}</td>
                                    <td>{{ $item->rate * $item->qty }}</td>
                                    <td>
                                        <form action="/carts/{{ $item->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-right"><h5>Total Payable</h5></td>
                                <td colspan="2"><h5>NRs.{{ $amount }}</h5></td>
                            </tr>
                            
                        </table>

                        <form action="/invoices" method="post">
                            @csrf
                                @foreach ($cartitems as $item)
                                    <input type="text" value="{{ $item->product->id }}" name="id[]" hidden >
                                    <input type="text" value="{{ $item->rate }}" name="rate[]" hidden >
                                    <input type="text" value="{{ $item->qty }}" name="qty[]" hidden >
                                    <input type="text" value="{{ $item->qty * $item->rate }}" name="amount[]" hidden > <br>
                                @endforeach
                                <input type="text" name="total" value="<?php echo $amount ?>" hidden>
                                <button type="submit" class="btn btn-primary btn-sm">Confirm Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection