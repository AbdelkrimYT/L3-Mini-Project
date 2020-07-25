@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <h1>Add new airplane</h1>
        <div class="form-group">
            <label>Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->name }}"
                disabled
                placeholder="Name">
        </div>
        <div class="form-group">
            <label>Model</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->state}}"
                disabled
                placeholder="Name">
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airports.index') }}'">Go back
            </button>
        </div>
</div>
@endsection

