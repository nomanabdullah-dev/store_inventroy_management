@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 offset-3">
                <div class="card card-primary">
                    <div class="card-header">
                      <div class="d-flex justify-content-between align-items-center">
                        <h4 style="display: inline; margin:0">Update</h4>
                        <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
                      </div>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Category Name</label>
                          <input type="text" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter category name" required>
                          @error('name')
                            <span class="text-center" style="color: red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    <!-- ./form end -->
                  </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Main content -->


@endsection
