@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/categories" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/categories/{{ $category->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="Category Name" value="{{ $category->name }}">
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
                            <img src="{{ asset($category->image) }}" width="120" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection