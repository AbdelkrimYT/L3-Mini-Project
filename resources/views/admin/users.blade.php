@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Users</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.users') }}">Users</a></li>
    </ul>
</div>

<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Users Table</h3>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($collection as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <th scope="col">{{ $data->name }}</th>
                        <th scope="col">{{ $data->email }}</th>
                        <th scope="col">role</th>
                        <th scope="col">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a
                                        href="{{ route('superadmin.user.show', $data->id) }}"
                                        class="btn btn-primary mr-1"
                                        role="button"><i class="fa fa-eye"></i> Show
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="{{ route('superadmin.user.edit', $data->id) }}"
                                        class="btn btn-warning mr-1"
                                        role="button"><i class="fa fa-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('superadmin.user.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </th>
                    </tr>
                @endforeach
                </tbody>
                </table>
                {{ $collection->links() }}
            </div>
        </div>
    </div>
</div>
@endsection