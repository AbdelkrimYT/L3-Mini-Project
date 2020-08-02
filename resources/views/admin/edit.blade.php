@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i> User Edit</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.users') }}">Users</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.user.edit', $collection['id']) }}">Edit</a></li>
    </ul>
</div>

<div class="tile">
    <h1>Frome</h1>
    <form action="{{ route('superadmin.user.update', $collection['id']) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="email" class="form-control" value="{{ $collection->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" value="{{ $collection->email }}" disabled>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select
                class="form-control"
                id="role"
                name="role">
                @foreach($collection['roles'] as $data)
                    @if ($data['id'] == $collection['user_role']->role_id)
                        <option value="{{ $data['id'] }}" selected>{{ $data['name'] }}</option>
                    @else
                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="tile-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('superadmin.users') }}'">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
            </button>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>Save change</button>
        </div>
    </form>
</div>
@endsection