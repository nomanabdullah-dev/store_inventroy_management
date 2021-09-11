@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
                        <h3 class="card-title">User List</h3>
                        <a href="{{ route('user.create') }}" class="float-right btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=> $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }} @if(auth()->id() == $item->id) <span class="badge badge-success">you</span>@endif</td>
                                    <td>{{ $item->created_at->format('d-M-yy') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>

                                        @if(auth()->id() != $item->id)
                                        <a href="javascript:;" class="btn btn-sm btn-danger swt-delete" data-form-id="user-delete-{{ $item->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>

                                        <form id="user-delete-{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endif
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
