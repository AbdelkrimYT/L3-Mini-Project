@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <h1>Add new airplane</h1>
    <form action="{{ route('airports.update', $collection['id']) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input
                type="text"
                class="form-control"
                value="{{ $collection['name'] }}"
                id="name"
                name="name"
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>State</label>
            <input
                type="text"
                class="form-control"
                value="{{ $collection['state'] }}"
                id="state"
                name="state"
                autocomplete="off">
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airports.index') }}'">Go back
            </button>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </div>
    </form>
</div>
@endsection

