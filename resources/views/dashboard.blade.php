@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_users ?? 0 }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_products ?? 0 }}</h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list"></i>
                    </div>
                    <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $total_stocks_in ?? 0 }}</h3>

                        <p>Stocks In</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cart-plus"></i>
                    </div>
                    <a href="{{ route('stockHistory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_return_products }}</h3>

                        <p>Return Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="{{ route('returnProductkHistory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products List</h3>
                        <a href="{{ route('product.create') }}" class="float-right btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th class="text-center">Image</th>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recent_products as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/product_images/'.$item->image) }}" width="60px" max-height="60px">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sku ?? '' }}</td>
                                    <td>{{ $item->category->name ?? '' }}</td>
                                    <td>{{ $item->brand->name ?? '' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('product.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fa fa-desktop"></i> Show</a>

                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>

                                        <a href="javascript:;" class="btn btn-sm btn-danger swt-delete" data-form-id="product-delete-{{ $item->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>

                                        <form id="product-delete-{{ $item->id }}" action="{{ route('product.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
