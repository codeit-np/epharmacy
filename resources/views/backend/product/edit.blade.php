@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="Product Name"  value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" class="form-control" type="text" name="price" placeholder="Price" value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3" placeholder="Short Description">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select id="category_id" class="form-control" name="category_id">
                                   @foreach ($categories as $category)
                                       <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input id="image" class="form-control-file" type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-sync"></i> Update Record</button>
                            
                        </form>

                        @if (session('message'))
                             <div class="my-2">
                                <div v class="alert alert-success">{{ session('message') }}</div>
                            </div>
                            @endif
                      

                        <div class="my-2">
                            <img src="{{ asset($product->image) }}" width="120" alt="">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection