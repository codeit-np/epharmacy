@extends('frontend.app')
@section('total')
   {{ $totalCartItem }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <img src="{{ asset($product->image) }}" class="w-25" alt="">
                <h1>{{ $product->name }}</h1>
                <h5>Price: {{ $product->price }} </h5> 
                <h5>Category: {{ $product->category->name }}</h5>
                <p>{{ $product->description }}</p>

                <form action="/carts" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my-input">Total Item</label>
                                <input type="text" value="{{ $product->id }}" name="product_id" hidden>
                                <input type="text" value="{{ $product->price }}" name="rate" hidden>
                                <input type="number" name="qty" id="" class="form-control" value="1" min="1">
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection