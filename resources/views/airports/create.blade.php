@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <form action="{{ route('airports.store') }}" method="POST">
        @csrf
        <div
            class="form-group">
            <label>Airport Name</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="name" name="name"
                autofocus>
        </div>
        <div class="form-group">
            <label>State</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="state"
                name="state">
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airports.index') }}'">Return
            </button>
            <button type="submit" class="btn btn-outline-success">Add</button>
        </div>
    </form>
</div>
@endsection