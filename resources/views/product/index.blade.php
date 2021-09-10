@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products List</h3>
                        <a href="{{ route('product.create') }}" class="float-right btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th class="text-center">Image</th>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/product_images/'.$item->image) }}" width="80px">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sku ?? '' }}</td>
                                    <td>{{ $item->category->name ?? '' }}</td>
                                    <td>{{ $item->brand->name ?? '' }}</td>
                                    <td>
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
<!-- /.Main content -->


@endsection
