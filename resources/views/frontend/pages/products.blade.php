@extends('frontend.app')
@section('total')
   {{ $totalCartItem }}
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            @foreach ($products as $product)
           
            <div class="col-md-3">
                <div class="card">
                    <div style="height:200px;background-position: center;background-size: cover;background-image: url('{{ asset($product->image) }}')"></div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <h6 class="card-title">Rs.{{ $product->price }}</h6>
                      <p class="card-text">{{ Str::limit($product->description,50) }}</p>
                      <a href="/products/{{ $product->id }}" class="btn btn-primary">More Details</a>
                    </div>
                  </div>
            </div>
        @endforeach

        {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection