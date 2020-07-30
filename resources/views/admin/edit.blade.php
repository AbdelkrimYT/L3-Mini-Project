@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <form action="{{ route('superadmin.user.update', $collection['id']) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <label for="exampleInputEmail1">{{ $collection['name'] }}</label>
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
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('superadmin.users') }}'">Go back
            </button>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </div>
    </form>
</div>
@endsection