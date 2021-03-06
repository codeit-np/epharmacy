<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <title>ePharmacy</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  </head>
  <body>
    {{-- Top Navbar --}}
    <div class="bg-danger text-white">
        <div class="container">
            Inarwa Road,Duhabi Chowk | Tel: +977-9804067307
        </div>
    </div>
    {{-- Navbar --}}
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="/">ePharmacy</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about">About us</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Shop
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="/productlist/1">Medicine</a></li>
                      <li><a class="dropdown-item" href="/productlist/2">Baby Products</a></li>
                      <li><a class="dropdown-item" href="/productlist/3">Beuty & Customatic Products</a></li>
                      <li><a class="dropdown-item" href="/productlist/4">Nutrition & Supplements</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="/doctorslist">Online Doctor Consultant</a></li>
                      <li><a class="dropdown-item" href="/pharmacylist">Pharmacy Stores</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact us</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/carts"><i class="fas fa-cart-plus"></i>@yield('total')</a>
                  </li>
                  @if (!Auth::user())
                        <li class="nav-item">
                          <a class="nav-link" href="/carts">Login</a>
                        </li>
                  @endif

                  @if (Auth::user())
                  <li class="nav-item">
                    <a class="nav-link" href="/home"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                  </li>
                  
                  <li class="nav-item">
                   
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="nav-icon fas fa-sign-out-alt"></i>
                                   {{ __('Logout') }}
                    </a>
        
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                    </li>

                    
                  @endif

                
                
                </ul>
              </div>
            </div>
          </nav>
    </div>
    {{-- Slide --}}
    @yield('slide')

    @yield('content')
    {{-- Feature Medicine --}}
    {{-- Feature Baby Product --}}
    {{-- Feature Beauty Product --}}

    <div class="bg-danger py-5">
      <div class="container text-white">
        <div class="row">
          <div class="col-md-4">
            <h3>About us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, libero optio dignissimos quisquam est rerum, doloribus eos ratione repellat placeat quas? Voluptatibus nesciunt et nostrum debitis sequi, laboriosam soluta totam non tenetur sint, consectetur iusto beatae, veniam obcaecati cum aut?</p>
          </div>

          <div class="col-md-4">
            <h3>Contact us</h3>
            <address>
              Duhabhi-3, Bijuli office road <br>
              Tel: <a href="tel:+97721262562" class="text-white">+977-21-262562</a> <br>

            </address>
          </div>

          <div class="col-md-4">
            <h3>Social Network</h3>
            <ul>
              <li><a class="text-white" href="#">Facebook</a></li>
              <li><a class="text-white" href="#">Twitter</a></li>
              <li><a class="text-white" href="#">YouTube</a></li>
            </ul>

            <form action="/subscribes" method="post">
              @csrf
              <input type="email" name="email" id="" placeholder="Email"> 
              <button type="submit" class="btn btn-sm btn-primary">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>