@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sizes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('size.index') }}">Size</a></li>
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
                        <a href="{{ route('size.index') }}" class="btn btn-outline-warning"><i class="fa fa-chevron-left"></i> Back</a>
                      </div>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('size.update', $size->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Size Name</label>
                          <input type="text" value="{{ $size->size }}" class="form-control @error('size') is-invalid @enderror" name="size" placeholder="Enter size name" required>
                          @error('size')
                            <span class="text-center" style="color: red">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
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
