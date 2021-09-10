@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Show</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
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
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="display: inline; margin:0">Product Info</h4>
                            <a href="{{ route('product.index') }}" class="btn btn-outline-warning"><i class="fa fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>Product Name</td>
                                <td>{{ $product->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $product->category->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td>{{ $product->brand->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>SKU</td>
                                <td>{{ $product->sku ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Cost Price ($)</td>
                                <td>{{ $product->cost_price ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Retail Price ($)</td>
                                <td>{{ $product->retail_price ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{ $product->year ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $product->desc ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $product->status ? 'Active':'Inactive' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="display: inline; margin:0">Image</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/product_images/'.$product->image) }}" width="300px">
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="display: inline; margin:0">Product Stock</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            @foreach ($product->product_stocks as $p_stock)
                                <tr>
                                    <td>{{ $p_stock->size->size ?? '' }}</td>
                                    <td>{{ $p_stock->quantity ?? '' }}</td>
                                    <td>{{ $p_stock->location ?? '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Main content -->


@endsection
