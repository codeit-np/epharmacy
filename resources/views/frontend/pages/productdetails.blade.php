@extends('frontend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                <input type="product_id" value="{{ $product->id }}">
                                <input type="rate" value="{{ $product->price }}">
                                <input type="number" name="total" id="" class="form-control" value="1" min="1">
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection