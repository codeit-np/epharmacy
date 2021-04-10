@extends('frontend.app')

@section('total')
   {{ $totalCartItem }}
@endsection
@section('slide')
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('images/1.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/2.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/3.png') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
@endsection

@section('content')
     {{-- Featured Medicine --}}
     <div class="py-5">
      <div class="container">
          <h1 class="text-center">Featured <span class="text-danger">Medicine</span></h1>
         <center> <a href="/productlist/1" class="btn btn-danger btn-sm">See more</a></center>
          <div class="row mt-4">
              @foreach ($medecines as $medicine)
                  <div class="col-md-3">
                      <div class="card">
                          <div style="height:200px;background-position: center;background-size: cover;background-image: url('{{ asset($medicine->image) }}')"></div>
                          <div class="card-body">
                            <h5 class="card-title">{{ $medicine->name }}</h5>
                            <h6 class="card-title">Rs.{{ $medicine->price }}</h6>
                            <p class="card-text">{{ Str::limit($medicine->description,50) }}</p>
                            <a href="/products/{{ $medicine->id }}" class="btn btn-primary">More Details</a>
                          </div>
                        </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>

  {{-- Baby Product --}}
  <div class="py-5">
    <div class="container">
        <h1 class="text-center">Baby <span class="text-danger">Products</span></h1>
        <center> <a href="/productlist/2" class="btn btn-danger btn-sm">See more</a></center>
          <div class="row mt-4">
            @foreach ($baby as $baby)
                <div class="col-md-3">
                    <div class="card">
                        <div style="height:200px;background-position: center;background-size: cover;background-image: url('{{ asset($baby->image) }}')"></div>
                        <div class="card-body">
                          <h5 class="card-title">{{ $baby->name }}</h5>
                          <h6 class="card-title">Rs.{{ $baby->price }}</h6>
                          <p class="card-text">{{ Str::limit($baby->description,50) }}</p>
                          <a href="/products/{{ $baby->id }}" class="btn btn-primary">More Details</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

  {{-- Beauty Product --}}
  <div class="py-5">
    <div class="container">
        <h1 class="text-center">Beauty & Cosmetic <span class="text-danger">Products</span></h1>
        <center> <a href="/productlist/3" class="btn btn-danger btn-sm">See more</a></center>
          <div class="row mt-4">
            @foreach ($beauty as $beauty)
                <div class="col-md-3">
                    <div class="card">
                        <div style="height:200px;background-position: center;background-size: cover;background-image: url('{{ asset($beauty->image) }}')"></div>
                        <div class="card-body">
                          <h5 class="card-title">{{ $beauty->name }}</h5>
                          <h6 class="card-title">Rs.{{ $beauty->price }}</h6>
                          <p class="card-text">{{ Str::limit($beauty->description,50) }}</p>
                          <a href="/products/{{ $beauty->id }}" class="btn btn-primary">More Details</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

 {{-- Nutrition Product --}}
 <div class="py-5">
  <div class="container">
      <h1 class="text-center">Nutrition & Supplements <span class="text-danger">Products</span></h1>
      <center> <a href="/productlist/4" class="btn btn-danger btn-sm">See more</a></center>
          <div class="row mt-4">
          @foreach ($nutrition as $nutrition)
              <div class="col-md-3">
                  <div class="card">
                      <div style="height:200px;background-position: center;background-size: cover;background-image: url('{{ asset($nutrition->image) }}')"></div>
                      <div class="card-body">
                        <h5 class="card-title">{{ $nutrition->name }}</h5>
                        <h6 class="card-title">Rs.{{ $nutrition->price }}</h6>
                        <p class="card-text">{{ Str::limit($nutrition->description,50) }}</p>
                        <a href="/products/{{ $nutrition->id }}" class="btn btn-primary">More Details</a>
                      </div>
                    </div>
              </div>
          @endforeach
      </div>
  </div>
</div>
@endsection